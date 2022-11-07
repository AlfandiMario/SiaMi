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
     $daftarmahasiswa = mysqli_query($conn,"SELECT * FROM mahasiswa  WHERE nim = '$nim_lama'");
     while ($mhs = mysqli_fetch_array($daftarmahasiswa)) {
        $nama_mhs = $mhs['nama'];
        $nip = $mhs['nim'];
        $angkatan = $mhs['angkatan'];
     };
}
// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen

$judul = "Update Mahasiswa";
include 'layouts/header.php';
?>
          <!-- MAIN VIEW -->
          <div class="container">
               <header>
                    <h3>Ubah Data Mahasiswa di Teknik Elektro UNS</h3>
               </header>

               <form action="function.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ubah_mhs">
                    <input type="hidden" name="nim_lama" value="<?=$nim_lama?>">
                    <div class="mb-3">
                         <label for="nim" class="form-label">NIM</label>
                         <input type="text" class="form-control" id="nim" name="nim" required value="<?= $nim_lama ?>">
                    </div>
                    <div class="mb-3">
                         <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                         <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required value="<?= $nama_mhs?> ">
                    </div>
                    <div class="mb-3">
                         <label for="angkatan" class="form-label">Angkatan</label>
                         <input type="text" class="form-control" id="angkatan" name="angkatan" required value="<?= $angkatan?> ">
                    </div>
                    <button type="submit" name="ubah" class="btn btn-primary">Submit</button>
               </form>
             <a class="btn btn-outline-info" href="adm_daftarmhs.php">Lihat Daftar Mahasiswa</a>
          </div>

<?php
include 'layouts/footer.php';
?>