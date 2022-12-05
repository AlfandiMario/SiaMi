<?php
require '../../database/connect.php';
require 'function.php';


session_start();
if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};
$nip = $_SESSION["nip"];
$matkul = $_GET["mk"];
$nilai_mk = mysqli_query($conn, "SELECT mahasiswa.*, mk_diambil.* FROM `mahasiswa` 
INNER JOIN mk_diambil ON mahasiswa.nim = mk_diambil.nim_mhs
WHERE mk_diambil.kode_mk = '$matkul';");

// var_dump($nilai_mk);

if (isset($_POST["submit"])) {
     //Cek data apakah sudah diubah atau belum
     if (ubah($_POST)  > 0) {
          echo "
         <script>
         alert ('data berhasil diubah!');
         document.location.href = 'dsn_editnilai_filter.php?mk=$matkul';
         </script>";
     } else {
          echo "
         <script>
         alert ('gagal!');
         </script>";
     }
}
?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Hugo 0.84.0">
     <title>Input Nilai</title>

     <!-- Bootstrap core CSS -->
     <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
     <!-- alt="..." on <img> element -->


     <!-- Custom styles for this template -->
     <link href="../../css/dsn_editnilai.css" rel="stylesheet">
</head>

<body>
     <main>
          <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
               <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none mx-auto">
                    <i class="bi bi-boxes"></i>
                    <span class="fs-4">SiaMi</span>
               </a>
               <hr>
               <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                         <a href="index.php" class="nav-link link-dark">
                              <i class="bi bi-house-fill"> </i>
                              Home
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="dsn_daftarmk.php" class="nav-link link-dark">
                              <i class="bi bi-card-checklist"></i>
                              Daftar MK Tayang
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="dsn_daftardosen.php" class="nav-link link-dark">
                              <i class="bi bi-person-lines-fill"></i>
                              Daftar Dosen
                         </a>
                    </li class="nav-item">
                    <li class="nav-item">
                         <a href="dsn_editnilai.php" class="nav-link link-dark">
                              <i class="bi bi-journal-bookmark-fill"></i>
                              Input Nilai Mahasiswa
                         </a>
                    </li>
               </ul>
               <hr>
               <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="bi bi-person-circle"></i>
                         <strong><?= $_SESSION["nama"]; ?></strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                         <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>
                    </ul>
               </div>
          </div>
          <!-- Agar Sidebar Tingginya Full -->
          <div class="b-example-divider"></div>

          <div class="container-sm">
               <header>

                    <h3>Daftar Nilai</h3>
                    <p class="mt-0" style="margin-left: 80%; width: 25ch; margin-right:5%;">
                         <a class="btn btn-outline-info" href="cetak.php?mk=<?= $matkul; ?>">Cetak Daftar Nilai</a>
                    </p>

               </header>





               <table class="table">
                    <thead>
                         <tr>
                              <th scope="col">No</th>
                              <th scope="col">Mahasiswa</th>
                              <th scope="col">Nilai</th>
                              <th scope="col">Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $i = 1;

                         while ($mk = mysqli_fetch_array($nilai_mk)) {
                         ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                   <tr>
                                        <input type="hidden" name="nim" value="<?= $mk['nim']; ?>">
                                        <input type="hidden" name="kode_mk" value="<?= $mk['kode_mk'] ?>">
                                        <td><?= $i++ ?></td>
                                        <td><?= $mk["nama"] ?></td>
                                        <td><input type="int" name="nilai_mk" required value="<?= $mk["nilai_mk"] ?>"></td>
                                        <td><button type="submit" name="submit">Ubah</button></td>
                                   </tr>
                              </form>
                         <?php
                         } ?>
                    </tbody>
               </table>

          </div>
     </main>

</body>