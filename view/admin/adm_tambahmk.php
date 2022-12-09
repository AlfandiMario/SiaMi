<?php
require "../../database/connect.php";
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};

// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen
$daftarmk = mysqli_query($conn, "SELECT * FROM mk LEFT JOIN dosen ON mk.NIP_pengampu=dosen.nip ORDER BY mk.kode_mk");
$daftardosen = mysqli_query($conn, "SELECT * FROM dosen ORDER BY nip ASC");
$judul = "Tambah MK";
include 'layouts/header.php';
?>
<!-- MAIN VIEW -->
<div class="container">
     <header>
          <h3>Tambah Mata Kuliah di Teknik Elektro UNS</h3>
     </header>

     <form action="function.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
               <label for="kode_mk" class="form-label">Kode MK</label>
               <input type="text" class="form-control" id="kode_mk" name="kode_mk">
          </div>
          <div class="mb-3">
               <label for="nama_mk" class="form-label">Nama MK</label>
               <input type="text" class="form-control" id="nama_mk" name="nama_mk">
          </div>
          <div class="mb-3">
               <label for="pengampu">Semester</label>
               <select class="form-select" name="semester">
                    <option selected value="1"> 1 </option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                    <option value="3">5</option>
                    <option value="3">6</option>
                    <option value="3">7</option>
                    <option value="3">8</option>
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
                    <option selected value="1"> 1 </option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                    <option value="3">5</option>
                    <option value="3">6</option>
                    <option value="3">7</option>
                    <option value="3">8</option>
               </select>
          </div>
          <div class="mb-3">
               <label for="pengampu">Dosen Pengampu</label>
               <select class="form-select" name="pengampu">
                    <?php
                    $i = 1;
                    while ($dosen = mysqli_fetch_assoc($daftardosen)) {
                         $pengampu = $dosen["nama"];
                         $nip = $dosen["nip"];
                    ?>
                         <option value="<?= $nip ?>"><?= $pengampu . " (" . $nip . ")"; ?></option>
                    <?php } ?>
               </select>
          </div>
          <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
     </form>
     <p class="mt-5">
          <a class="btn btn-outline-info" href="adm_daftarmk.php">Lihat Daftar Mata Kuliah</a>
     </p>
</div>

<?php
include 'layouts/footer.php';
?>