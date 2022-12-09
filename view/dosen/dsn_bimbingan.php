<?php
require '../../database/connect.php';


session_start();
$nip = $_SESSION["nip"];
if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};

$daftarbimbingan = mysqli_query($conn, "SELECT dosen.*, pa.*, mahasiswa.*  FROM pa
INNER JOIN dosen ON pa.nip = dosen.nip INNER JOIN mahasiswa ON pa.nim = mahasiswa.nim
WHERE dosen.nip = $nip;");
?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Hugo 0.84.0">
     <title>SiaMi</title>

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
                         <a href="dsn_daftarmhs.php" class="nav-link link-dark">
                              <i class="bi bi-person-lines-fill"></i>
                              Daftar Mahasiswa
                         </a>
                    </li class="nav-item">
                    <li class="nav-item">
                         <a href="dsn_bimbingan.php" class="nav-link link-dark">
                              <i class="bi bi-person-lines-fill"></i>
                              Bimbingan Akademik
                         </a>
                    </li>
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
                    <h3>Daftar Mahasiswa Bimbingan</h3>
               </header>
               <hr>
               <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                         <tr>
                              <th scope="col">No</th>
                              <th scope="col">NIM</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Status KRS</th>
                              <th scope="col">Detail KRS</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $i = 1;

                         while ($bimbingan = mysqli_fetch_array($daftarbimbingan)) {
                            //var_dump($bimbingan);
                         ?> 
                              <form action="" method="POST" enctype="multipart/form-data">
                                   <tr> 
                                        <td><?= $i++ ?></td>
                                        <td><?= $bimbingan["nim"] ?></td>
                                        <td><?= $bimbingan["nama"] ?></td>
                                        <td><?= $bimbingan["status_krs"] ?></td>
                                        <td><button type="submit" name="submit"><a 
                                            href="dsn_bimbingankrs.php?nim=<?= $bimbingan["nim"]; ?>& nama=<?= $bimbingan["nama"]; ?>"
                                                >Lihat</a></button></td>
                                        
                                    </tr>
                              </form>
                         <?php
                         } ?>
                    </tbody>
               </table>
          </div>
     </main>

</body>