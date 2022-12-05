<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "siportal_kel3";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

session_start();
if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};


// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen
$daftarmk = mysqli_query($conn, "SELECT * FROM mk LEFT JOIN dosen ON mk.NIP_pengampu=dosen.nip ORDER BY kode_mk");

?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Hugo 0.84.0">

     <!-- Bootstrap core CSS -->
     <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

     <!-- Custom styles for this template -->
     <link href="../../css/daftarmk.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="css/sb-admin-2.css" rel="stylesheet">

     <!-- Custom styles for this page -->
     <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
          <!-- Agar Sidebar Tingginya Full -->
          <div class="b-example-divider"></div>

          <div class="container-sm">
               <header>
                    <h3>Daftar Mata Kuliah di Teknik Elektro UNS</h3>
               </header>
               <hr>
               <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                         <tr>
                              <th scope="col">No</th>
                              <th scope="col">Kode MK</th>
                              <th scope="col">Nama MK</th>
                              <th scope="col">Semester</th>
                              <th scope="col">Pengampu</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $i = 1;

                         while ($mk = mysqli_fetch_array($daftarmk)) {
                         ?>
                              <tr>
                                   <td><?= $i++ ?></td>
                                   <td><?= $mk["kode_mk"] ?></td>
                                   <td><?= $mk["nama_mk"] ?></td>
                                   <td><?= $mk["semester"] ?></td>
                                   <td><?= $mk["nama"] ?></td>
                                   <!-- <td></td> -->
                              </tr>

                         <?php
                         } ?>
                    </tbody>
               </table>
     </main>
     </div>

</body>

</html>