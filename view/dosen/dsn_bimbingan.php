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

$judul = 'Bimbingan Akademik';
include 'layout/header.php';
?>

<div class="container-sm mt-4">
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
                              <td><button type="submit" name="submit"><a href="dsn_bimbingankrs.php?nim=<?= $bimbingan["nim"]; ?>& nama=<?= $bimbingan["nama"]; ?>">Lihat</a></button></td>

                         </tr>
                    </form>
               <?php
               } ?>
          </tbody>
     </table>
</div>
</main>

</body>