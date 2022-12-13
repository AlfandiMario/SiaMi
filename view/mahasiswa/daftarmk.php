<?php
require '../../database/connect.php';

session_start();
if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};


// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen
$daftarmk = mysqli_query($conn, "SELECT * FROM mk LEFT JOIN dosen ON mk.NIP_pengampu=dosen.nip ORDER BY kode_mk");
$judul = 'Daftar MK Tayang';

include 'layouts/header.php';
?>

<div class="container-sm">
     <header>
          <h3>Daftar Mata Kuliah di Teknik Elektro UNS</h3>
     </header>
     <hr>
     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="text-center">
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode MK</th>
                    <th scope="col">Nama MK</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Pengampu</th>
                    <th scope="col">Bobot</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($mk = mysqli_fetch_array($daftarmk)) {
               ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td class="text-center"><?= $mk["kode_mk"] ?></td>
                         <td><?= $mk["nama_mk"] ?></td>
                         <td class="text-center"><?= $mk["semester"] ?></td>
                         <td><?= $mk["nama"] ?></td>
                         <td class="text-center"><?= $mk["bobot_sks"] . " SKS" ?></td>
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>
     </main>
</div>

</body>

</html>