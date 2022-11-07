<?php
?>
<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Hugo 0.84.0">
     <title><?=$judul?></title>

     <!-- Bootstrap core CSS -->
     <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

     <!-- Custom styles for this template -->
     <link href="../../css/daftarmk.css" rel="stylesheet">

     <style>
          form {
               width: 50ch;
               margin-left: auto;
               margin-right: auto;
               margin-top: 10vh;
          }
     </style>
</head>

<body>
     <main>
          <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
               <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none mx-auto">
                    <i class="bi bi-boxes"></i>
                    <span class="fs-4">SiaLite</span>
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
                         <a href="adm_daftarmk.php" class="nav-link link-dark">
                              <i class="bi bi-card-checklist"></i>
                              Daftar MK Tayang
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="adm_daftardosen.php" class="nav-link link-dark">
                              <i class="bi bi-person-lines-fill"></i>
                              Daftar Dosen
                         </a>
                    </li class="nav-item">
                    <li class="nav-item">
                         <a href="adm_daftarmhs.php" class="nav-link link-dark">
                              <i class="bi bi-journal-bookmark-fill"></i>
                              Daftar Mahasiswa
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