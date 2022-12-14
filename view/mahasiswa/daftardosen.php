<?php
require '../../database/connect.php';

session_start();
if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};

// Untuk menampilkan daftar dosen
$daftardosen = mysqli_query($conn, "SELECT * FROM dosen ORDER BY nama");

$judul = "Daftar Dosen";
include 'layouts/header.php';
?>
<div class="container-sm">
     <header>
          <h3>Daftar Dosen</h3>
     </header>
     <hr>
     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <!-- <th scope="col">Mata Kuliah Diampu</th> -->
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($dosen = mysqli_fetch_array($daftardosen)) {
               ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td class="text-center"><?= $dosen["nip"] ?></td>
                         <td><?= $dosen["nama"] ?></td>
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