<?php
require '../../database/connect.php';

session_start();
if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};

// Untuk menampilkan daftar dosen
$daftarmhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nama");

$judul = "Daftar Mahasiswa";
include 'layouts/header.php';
?>
<div class="container-sm">
     <header>
          <h3>Daftar Mahasiswa</h3>
     </header>
     <hr>
     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Angkatan</th>
                    <!-- <th scope="col">Mata Kuliah Diampu</th> -->
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($mhs = mysqli_fetch_array($daftarmhs)) {
               ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td><?= $mhs["nim"] ?></td>
                         <td><?= $mhs["nama"] ?></td>
                         <td><?= $mhs["semester"] ?></td>
                         <!-- <td></td> -->
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>
</div>
</main>


</body>

</html>