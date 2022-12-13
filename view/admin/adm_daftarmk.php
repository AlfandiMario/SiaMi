<?php
session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};
require "../../database/connect.php";

// Untuk menampilkan daftar mata kuliah dan nama pengampu dengan Foreign Key NIP dosen
$daftarmk = mysqli_query($conn, "SELECT * FROM mk LEFT JOIN dosen ON mk.NIP_pengampu=dosen.nip ORDER BY mk.kode_mk");


$judul = "Daftar MK";
include 'layouts/header.php';
?>

<!-- MAIN VIEW -->
<div class="container-sm">
     <header>
          <h3>Daftar Mata Kuliah di Teknik Elektro UNS</h3>
     </header>
     <hr>
     <table class="table table-bordered " width="100%" cellspacing="0">
          <thead class="text-center">
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode MK</th>
                    <th scope="col">Nama MK</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Pengampu</th>
                    <th scope="col">Bobot</th>
                    <th scope="col">Aksi</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;
               while ($mk = mysqli_fetch_assoc($daftarmk)) :

               ?>
                    <tr>
                         <td class="text-center"><?= $i++ ?></td>
                         <td class="text-center"><?= $mk["kode_mk"] ?></td>
                         <td><?= $mk["nama_mk"] ?></td>
                         <td class="text-center"><?= $mk["semester"] ?></td>
                         <td><?= $mk["nama"] ?></td>
                         <td class="text-center"><?= $mk["bobot_sks"] . " SKS" ?></td>
                         <td>
                              <div class="d-flex justify-content-center">
                                   <a class="btn btn-outline-info" href="adm_ubahmk.php?kode_mk=<?= $mk["kode_mk"]; ?>">Edit</a>
                                   <form action="function.php" method="POST" style="margin :0px;width:auto;">
                                        <input type="hidden" name="kode_mk" value="<?= $mk["kode_mk"] ?>">
                                        <button type="submit" name="hapus" class="btn btn-outline-danger mx-2" onclick="return confirm ('yakin?')">Hapus</button>
                                   </form>
                              </div>
                         </td>
                    </tr>

               <?php
               endwhile; ?>
          </tbody>
     </table>
     <a class="btn btn-outline-info" href="adm_tambahmk.php">Tambah Daftar Mata Kuliah</a>
</div>
<?php
include 'layouts/footer.php'
?>