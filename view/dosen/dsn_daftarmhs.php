<?php
require '../../database/connect.php';

session_start();
if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};

// Untuk menampilkan daftar nilai
$daftarmhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nama");

$judul = 'Daftar Mahasiswa';
include 'layout/header.php';
?>

<div class="container-sm mt-4">
     <header>
          <h3>Daftar Mahasiswa</h3>
     </header>
     <hr>
     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="text-center">
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Dosen PA</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($mhs = mysqli_fetch_array($daftarmhs)) {
                    $nim = $mhs["nim"];
                    $query = mysqli_query($conn, "SELECT * FROM pa INNER JOIN dosen on pa.nip=dosen.nip WHERE pa.nim = '$nim'");
                    $result = mysqli_fetch_assoc($query);
                    $nama_pa = $result["nama"];
               ?>
                    <tr>
                         <td style="width: 7%;" class="text-center"><?= $i++ ?></td>
                         <td style="width: 15%;"><?= $mhs["nim"] ?></td>
                         <td style="width: 25%;"><?= $mhs["nama"] ?></td>
                         <td style="width: 10%;" class="text-center"><?= $mhs["semester"] ?></td>
                         <td style="width: 30%;"><?= $result["nama"] ?></td>
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>



</div>
</body>

</html>