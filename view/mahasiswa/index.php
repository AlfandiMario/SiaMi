<?php
session_start();

if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};

// var_dump($_SESSION["nama"]);
// var_dump($_SESSION["nim"]);
// var_dump($_SESSION["angkatan"]);
// var_dump($_SESSION['role']);
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

     <!-- Custom styles for this template -->
     <link href="../../css/style.css" rel="stylesheet">
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
                         <a href="daftarmk.php" class="nav-link link-dark">
                              <i class="bi bi-card-checklist"></i>
                              Daftar MK Tayang
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="daftardosen.php" class="nav-link link-dark">
                              <i class="bi bi-person-lines-fill"></i>
                              Daftar Dosen
                         </a>
                    </li class="nav-item">
                    <li class="nav-item">
                         <a href="daftarmhs.php" class="nav-link link-dark">
                              <i class="bi bi-person-lines-fill"></i>
                              Daftar Mahasiswa
                         </a>
                    </li class="nav-item">
                    <li class="nav-item">
                         <a href="lihatnilai.php" class="nav-link link-dark">
                              <i class="bi bi-journal-bookmark-fill"></i>
                              Lihat Nilai
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="ambilmk.php" class="nav-link link-dark">
                              <i class="bi bi-card-list"></i>
                              Ambil MK
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

          <div class="container">
               <header style="text-align:center; margin-top:20%">
                    <h2>Selamat Datang di SiaMi, <?= $_SESSION["nama"]; ?>!</h2>
                    <p>Tetap semangat dan semoga harimu menyenangkan :)</p>
               </header>
          </div>

          <!-- Agar Sidebar Tingginya Full -->
          <div class="b-example-divider"></div>

     </main>


     <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

     <script src="sidebars.js"></script>
</body>

</html>