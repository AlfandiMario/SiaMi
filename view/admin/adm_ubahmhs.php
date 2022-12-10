<?php
require "../../database/connect.php";
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};
//membuat value sebelumnya tampil
if (isset($_GET['nim'])) {
     $nim_lama = $_GET['nim'];
     $daftarmahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa JOIN pa ON mahasiswa.nim=pa.nim WHERE mahasiswa.nim = '$nim_lama'");
     // var_dump($daftarmahasiswa);

     while ($mhs = mysqli_fetch_array($daftarmahasiswa)) {
          // var_dump($mhs);
          $nama_mhs = $mhs['nama'];
          $nim = $mhs['nim'];
          $semester_mhs = $mhs['semester'];
          $nip_pa = $mhs['nip'];
     };
     $query_pa = mysqli_query($conn, "SELECT * FROM dosen WHERE nip = '$nip_pa'");
     while ($pa = mysqli_fetch_assoc($query_pa)) {
          $nama_pa = $pa["nama"];
     };
     $daftardosen = mysqli_query($conn, "SELECT * FROM dosen ORDER BY nip ASC");
}

$judul = "Update Mahasiswa";
include 'layouts/header.php';
?>
<!-- MAIN VIEW -->
<div class="container">
     <header>
          <h3>Ubah Data Mahasiswa di Teknik Elektro UNS</h3>
     </header>

     <div class="row mx-2">
          <form action="function.php" method="post" enctype="multipart/form-data">
               <input type="hidden" name="ubah_mhs">
               <input type="hidden" name="nim_lama" value="<?= $nim_lama ?>">
               <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required value="<?= $nim_lama ?>" required>
               </div>
               <div class="mb-3">
                    <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required value="<?= $nama_mhs ?> " required>
               </div>
               <div class="mb-3">
                    <label for="semester_mhs" class="form-label">Semester</label>
                    <select class="form-select" name="semester_mhs" required>
                         <option selected value="<?= $semester_mhs ?>"> <?= $semester_mhs ?></option>
                         <?php
                         for ($i = 1; $i < 15; $i++) :
                              if ($semester_mhs != $i) :
                         ?>
                                   <option value="<?= $i ?>"> <?= $i ?> </option>
                         <?php
                              endif;
                         endfor;
                         ?>
                    </select>
               </div>
               <div class="mb-3">
                    <label for="kbk" class="form-label">KBK</label>
                    <small>(Jika sudah memilih KBK)</small>
                    <select class="form-select" name="kbk">
                         <option value=""> </option>
                         <option value="TKT"> Teknik Komputer dan Telekomunikasi (TKT) </option>
                         <option value="TTL"> Teknik Tenaga Listrik (TTL) </option>
                         <option value="KM"> Kontrol dan Mekatronika </option>
                    </select>
               </div>
               <div class="mb-3">
                    <label for="dosen_pa">Dosen Pembimbing Akademik</label>
                    <select class="form-select" name="dosen_pa" required>
                         <option selected value="<?= $nip_pa ?>"> <?= $nama_pa . " (" . $nip_pa . ")" ?></option>
                         <?php
                         $i = 1;
                         while ($dosen = mysqli_fetch_assoc($daftardosen)) {
                              $pengampu = $dosen["nama"];
                              $nip = $dosen["nip"];
                              if ($nip_pa != $nip) :
                         ?>
                                   <option value="<?= $nip ?>"> <?= $pengampu . "(" . $nip . ")"  ?></option>
                         <?php endif;
                         } ?>
                    </select>
               </div>
               <button type="submit" name="ubah" class="btn btn-primary my-3">Submit</button>
          </form>
     </div>


     <a class="btn btn-outline-info mt-3" href="adm_daftarmhs.php">Lihat Daftar Mahasiswa</a>
</div>

<?php
include 'layouts/footer.php';
?>