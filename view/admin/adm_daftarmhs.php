<?php
require "../../database/connect.php";
// Create connection
// Untuk menampilkan daftar dosen
$daftarmhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nama");

session_start();
if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};
$judul = "Daftar Mahasiswa";
include 'layouts/header.php';
?>
<!-- MAIN VIEW -->
<div class="container-sm">
     <header>
          <h3>Daftar Mahasiswa</h3>
     </header>
     <hr>
     <table class="table table-bordered text-center" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Dosen PA</th>
                    <!-- <th scope="col">KBK</th>
                    <th scope="col">Pengampu</th> -->
                    <th scope="col">Aksi</th>

                    <!-- <th scope="col">Mata Kuliah Diampu</th> -->
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
                         <td style="width: 10%;"><?= $i++ ?></td>
                         <td style="width: 20%;"><?= $mhs["nim"] ?></td>
                         <td style="width: 30%;"><?= $mhs["nama"] ?></td>
                         <td style="width: 10%;"><?= $mhs["semester"] ?></td>
                         <td style="width: 20%;"><?= $result["nama"] ?></td>

                         <!-- <td></td> -->
                         <td>
                              <div class="d-flex justify-content-center">
                                   <a class="btn btn-outline-info" href="adm_ubahmhs.php?nim=<?= $mhs["nim"]; ?>">Edit</a>
                                   <form action="function.php" method="post" style="margin :0px;width:auto;">
                                        <input type="hidden" name="nim" value="<?= $mhs['nim'] ?>">
                                        <button type="submit" name="hapus" class="btn btn-outline-danger mx-2" onclick="return confirm ('yakin?')">
                                             Hapus
                                        </button>
                                   </form>
                              </div>
                         </td>
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>
     <a class="btn btn-outline-info" href="adm_tambahmhs.php">Tambah Mahasiswa</a>
</div>
<?php

include 'layouts/footer.php';
?>