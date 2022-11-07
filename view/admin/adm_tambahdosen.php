<?php
require "../../database/connect.php";
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};


$judul = "Tambah Dosen";
include 'layouts/header.php';
?>
          <!-- MAIN VIEW -->
          <div class="container">
               <header>
                    <h3>Tambah Dosen di Teknik Elektro UNS</h3>
               </header>

               <form action="function.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                         <label for="nip" class="form-label">NIP</label>
                         <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                         <label for="nama_dosen" class="form-label">Nama dosen</label>
                         <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
               </form>
               <p class="mt-5">
                    <a class="btn btn-outline-info" href="adm_daftardosen.php" >Lihat Daftar Dosen</a>
               </p>
          </div>

<?php
include 'layouts/footer.php';
?>