<?php
require "../../database/connect.php";
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};
//membuat value sebelumnya tampil
if (isset($_GET['nip'])) {
     $nip_lama = $_GET['nip'];
     $daftardosen = mysqli_query($conn,"SELECT * FROM dosen  WHERE nip = '$nip_lama'");
     while ($dosen = mysqli_fetch_array($daftardosen)) {
        $nama_dosen = $dosen['nama'];
        $nip = $dosen['nip'];
     };
}
// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen

$judul = "Update Dosen";
include 'layouts/header.php';
?>
          <!-- MAIN VIEW -->
          <div class="container">
               <header>
                    <h3>Ubah Data Dosen di Teknik Elektro UNS</h3>
               </header>

               <form action="function.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ubah_dosen">
                    <input type="hidden" name="nip_lama" value="<?=$nip_lama?>">
                    <div class="mb-3">
                         <label for="nip" class="form-label">NIP</label>
                         <input type="text" class="form-control" id="nip" name="nip" required value="<?= $nip_lama ?>">
                    </div>
                    <div class="mb-3">
                         <label for="nama_dosen" class="form-label">Nama Dosen</label>
                         <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required value="<?= $nama_dosen?> ">
                    </div>
                    <button type="submit" name="ubah" class="btn btn-primary">Submit</button>
               </form>
             <a class="btn btn-outline-info" href="adm_daftardosen.php">Lihat Daftar Dosen</a>
          </div>

<?php
include 'layouts/footer.php';
?>