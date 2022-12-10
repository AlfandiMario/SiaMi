<?php
require '../../database/connect.php';
require 'function.php';


session_start();
$nip = $_SESSION["nip"];
if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};

$daftarmk = mysqli_query($conn, "SELECT dosen.*, mk.* FROM mk
INNER JOIN dosen ON mk.NIP_pengampu = dosen.nip
WHERE dosen.nip = $nip;");

$judul = 'Input Nilai';
include 'layout/header.php';
?>


<div class="container-sm mt-4">
     <header>
          <h3>Daftar Nilai</h3>
     </header>
     <hr>
     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode MK</th>
                    <th scope="col">Nama MK</th>
                    <th scope="col">Aksi</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($mk = mysqli_fetch_array($daftarmk)) {
               ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                         <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $mk["kode_mk"] ?></td>
                              <td><?= $mk["nama_mk"] ?></td>
                              <td><button type="submit" name="submit"><a href="dsn_editnilai_filter.php?mk=<?= $mk["kode_mk"]; ?>">Ubah</a></button></td>
                         </tr>
                    </form>
               <?php
               } ?>
          </tbody>
     </table>
</div>
</main>

</body>