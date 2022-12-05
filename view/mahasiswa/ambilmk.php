<?php
require '../../database/connect.php';

// $conn = new mysqli($servername, $username, $password, $db);
session_start();

if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};
// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen
$daftarmk = mysqli_query($conn, "SELECT * FROM mk LEFT JOIN dosen ON mk.NIP_pengampu=dosen.nip ORDER BY kode_mk");

$judul = "Ambil MK";
include 'layouts/header.php';
?>

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
                    <th scope="col">Aksi</th>
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
                         <form action="function.php" method="POST">
                              <input type="hidden" name="nim_mhs" value="<?= $_SESSION['nim'] ?>">
                              <input type="hidden" name="kode_mk" value="<?= $mk['kode_mk'] ?>">
                              <td>
                                   <button type="submit" name="ambil_mk"> Ambil MK</button>
                              </td>
                         </form>
                    </tr>
               <?php } ?>
          </tbody>
     </table>
</div>
<?php
include 'layouts/footer.php';
?>