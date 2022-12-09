<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "si-uas";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
require 'function.php';
// Ambil Data Mahasiswa Dari Get
session_start();
$nim_mhs = ($_GET["nim"]);
$nama_mhs = ($_GET["nama"]);
//$angkatan_mhs = ($_SESSION["angkatan"]);

if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};

// Untuk menampilkan lihat nilai sesuai MK yang diambil
$mk_ambil = mysqli_query($conn, "SELECT * FROM mk_diambil INNER JOIN mk ON mk_diambil.kode_mk=mk.kode_mk WHERE mk_diambil.nim_mhs = '$nim_mhs'");
$pa = mysqli_query($conn, "SELECT * FROM pa WHERE nim = '$nim_mhs'");
$judul = 'Lihat Nilai';
//include '../mahasiswa/layouts/header.php';
?>
<?php  ?>
<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
     <meta name="generator" content="Hugo 0.84.0">
     <title><?= $judul ?></title>

     <!-- Bootstrap core CSS -->
     <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

     <!-- Custom styles for this template -->
     <link href="../../css/ambilmk.css" rel="stylesheet">
</head>

<body>
     <main>
          <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
               <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none mx-auto">
                    <i class="bi bi-boxes"></i>
                    <span class="fs-4">SiaMi</span>
               </a>
               <hr>            
                       
          </div>
          <!-- Agar Sidebar Tingginya Full -->
          <div class="b-example-divider"></div>
<div class="container-sm">
     <header>
          <h3>Kartu Rencana Studi</h3>
     </header>
     <hr>
     <h6>Nama : <?= $nama_mhs; ?> </h6>
     <h6>NIM : <?= $nim_mhs; ?> </h6>
     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Nilai</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($matkul = mysqli_fetch_array($mk_ambil)) {
               ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td><?= $matkul["kode_mk"] ?></td>
                         <td><?= $matkul["nama_mk"] ?></td>
                         <td><?= 0 ?></td>
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>
    <?php
    if (isset($_POST["validkan"])) {
        //Cek data apakah sudah diubah atau belum
        if (valid($_POST)  > 0) {
             echo "
            <script>
            alert ('Ubah Validasi Berhasil!');
            document.location.href = 'dsn_bimbingan.php';
            </script>";
        } else {
             echo "
            <script>
            alert ('gagal!');
            </script>";
        }
   }
    ?>
     <?php
     while ($validasi_krs = mysqli_fetch_array($pa)) {
        ?>
             <form action="" method="POST" enctype="multipart/form-data">
                <?php
                //$valid = "Valid";
                //$tdkvalid = "Belum Tervalidasi";
                  if($validasi_krs['status_krs'] === "Valid"){ ?>
                       <input type="hidden" name="nim" value="<?= $validasi_krs['nim']; ?>">
                       <input type="hidden" name="nip" value="<?= $validasi_krs['nip'] ?>">   
                       <input type="hidden" name="status_krs" value="Belum Tervalidasi">                        
                       <button type="submit" name="validkan">Batalkan Validasi KRS</button>
                    <?php }
                    else { ?>
                       <input type="hidden" name="nim" value="<?= $validasi_krs['nim']; ?>">
                       <input type="hidden" name="nip" value="<?= $validasi_krs['nip'] ?>">   
                       <input type="hidden" name="status_krs" value="Valid">                        
                       <button type="submit" name="validkan">Validasi KRS</button>
                    <?php } ?>
                  
             </form>
        <?php
        } 
     ?>
     </main>
</div>


</body>

</html>
<?php
