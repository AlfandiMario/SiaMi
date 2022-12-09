<?php
require "../../database/connect.php";
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};
//membuat value sebelumnya tampil
if (isset($_GET['kode_mk'])) {
     $kodemk_lama = $_GET['kode_mk'];
     $daftarmk = mysqli_query($conn, "SELECT * FROM mk LEFT JOIN dosen ON mk.NIP_pengampu=dosen.nip WHERE mk.kode_mk = '$kodemk_lama'");

     while ($mk = mysqli_fetch_array($daftarmk)) {
          $nama_mk = $mk["nama_mk"];
          $kode_mk = $mk["kode_mk"];
          $semester = $mk["semester"];
          $kategori = $mk["kategori"];
          $bobot_sks = $mk["bobot_sks"];
          $pengampu = $mk["nip"];
          $nama_pengampu = $mk["nama"];
     };
}
// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen

$judul = "Update MK";
include 'layouts/header.php';
?>
<!-- MAIN VIEW -->
<div class="container">
     <header>
          <h3>Ubah Mata Kuliah di Teknik Elektro UNS</h3>
     </header>

     <form action="function.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ubah_mk">
          <input type="hidden" name="kode_mklama" value="<?= $kodemk_lama ?>">
          <div class="mb-3">
               <label for="kode_mk" class="form-label">Kode MK</label>
               <input type="text" class="form-control" id="kode_mk" name="kode_mk" required value="<?= $kodemk_lama ?>">
          </div>
          <div class="mb-3">
               <label for="nama_mk" class="form-label">Nama MK</label>
               <input type="text" class="form-control" id="nama_mk" name="nama_mk" required value="<?= $nama_mk ?> ">
          </div>
          <div class="mb-3">
               <label for="pengampu">Semester</label>
               <select class="form-select" name="semester">
                    <option selected value="<?= $semester ?>"><?= $semester ?></option>
                    <?php
                    for ($valuesemester = 1; $valuesemester <= 15; $valuesemester++) :
                         if ($semester != $valuesemester) :
                    ?>
                              <option value="<?= $valuesemester ?>"><?= $valuesemester ?></option>
                    <?php
                         endif;
                    endfor;
                    ?>
               </select>
          </div>
          <div class="mb-3">
               <label for="kategori">Kategori Mata Kuliah</label>
               <select class="form-select" name="kategori">
                    <option selected value="WAJIB"> Wajib </option>
                    <option value="UMUM">Umum</option>
                    <option value="KBK">KBK</option>
               </select>
          </div>
          <div class="mb-3">
               <label for="bobot_sks">Bobot SKS</label>
               <select class="form-select" name="bobot_sks">
                    <option selected value="<?= $bobot_sks ?>"> <?= $bobot_sks ?> </option>
                    <?php for ($i = 0; $i < 9; $i++) :
                         if ($bobot_sks != $i) :
                    ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endif;
                    endfor; ?>
               </select>
          </div>
          <div class="mb-3">
               <label for="pengampu">Dosen Pengampu</label>
               <select class="form-select" name="pengampu">
                    <option selected value="<?= $pengampu ?>"> <?= $nama_pengampu . " (" . $pengampu . ")" ?> </option>
                    <?php
                    // var_dump($pengampu);
                    $daftardosen = mysqli_query($conn, "SELECT * FROM dosen ORDER BY nama ASC");
                    while ($dsn = mysqli_fetch_assoc($daftardosen)) :
                         $namadosen = $dsn["nama"];
                         $nip = $dsn["nip"];
                         if ($nama_pengampu != $namadosen) :
                    ?>
                              <option value="<?= $nip ?>"><?= $namadosen . " (" . $nip . ")" ?> </option>
                    <?php
                         endif;
                    endwhile; ?>
               </select>
          </div>
          <button type="submit" name="ubah" class="btn btn-primary">Submit</button>
     </form>
     <a class="btn btn-outline-info" href="adm_daftarmk.php">Lihat Daftar Mata Kuliah</a>
</div>

<?php
include 'layouts/footer.php';
?>