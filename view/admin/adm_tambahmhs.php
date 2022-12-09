<?php
require "../../database/connect.php";
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};

$daftardosen = mysqli_query($conn, "SELECT * FROM dosen ORDER BY nip ASC");

$judul = "Tambah Mahasiswa";
include 'layouts/header.php';
?>
<!-- MAIN VIEW -->
<div class="container">
     <header>
          <h3>Tambah Mahasiswa di Teknik Elektro UNS</h3>
     </header>

     <div class="row mx-2">
          <form action="function.php" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim">
               </div>
               <div class="mb-3">
                    <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs">
               </div>
               <div class="mb-3">
                    <label for="angkatan" class="form-label">Semester</label>
                    <select class="form-select" name="semester_mhs">
                         <?php
                         for ($i = 1; $i < 15; $i++) { ?>
                              <option value="<?= $i ?>"> <?= $i ?> </option>
                         <?php
                         }
                         ?>
                    </select>
               </div>
               <div class="mb-3">
                    <label for="pengampu">Dosen Pembimbing Akademik</label>
                    <select class="form-select" name="dosen_pa">
                         <?php
                         $i = 1;
                         while ($dosen = mysqli_fetch_assoc($daftardosen)) {
                              $pengampu = $dosen["nama"];
                              $nip = $dosen["nip"];
                         ?>
                              <option value="<?= $nip ?>"><?= $pengampu . " (" . $nip . ")" ?></option>
                         <?php } ?>
                    </select>
               </div>
               <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
          </form>
          <p class="mt-5">
               <a class="btn btn-outline-info" href="adm_daftarmhs.php">Lihat Daftar Mahasiswa</a>
          </p>
     </div>
</div>

<?php
include 'layouts/footer.php';
?>