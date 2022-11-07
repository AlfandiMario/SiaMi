<?php
require "../../database/connect.php";
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};


$judul = "Tambah Mahasiswa";
include 'layouts/header.php';
?>
          <!-- MAIN VIEW -->
          <div class="container">
               <header>
                    <h3>Tambah Mahasiswa di Teknik Elektro UNS</h3>
               </header>

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
                         <label for="angkatan" class="form-label">Angkatan</label>
                         <input type="text" class="form-control" id="angkatan" name="angkatan">
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
               </form>
               <p class="mt-5">
                    <a class="btn btn-outline-info" href="adm_daftarmhs.php" >Lihat Daftar Mahasiswa</a>
               </p>
          </div>

<?php
include 'layouts/footer.php';
?>