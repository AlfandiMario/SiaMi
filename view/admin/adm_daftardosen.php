<?php
session_start();
require "../../database/connect.php";
// Create connection
// Untuk menampilkan daftar dosen
$daftardosen = mysqli_query($conn, "SELECT * FROM dosen ORDER BY nama");


if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};
$judul = "Daftar Dosen";
include 'layouts/header.php';
?>
<!-- MAIN VIEW -->
<div class="container-sm">
     <header>
          <h3>Daftar Dosen</h3>
     </header>
     <hr>
     <table class="table table-bordered text-center" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                    <!-- <th scope="col">Mata Kuliah Diampu</th> -->
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($dosen = mysqli_fetch_array($daftardosen)) {
                    // Menampilkan Jumlah Beban SKS tiap dosen
                    // $nip = $dosen["nip"];
                    // $query = mysqli_query($conn, "SELECT bobot_sks FROM mk WHERE NIP_pengampu = '$nip'");
                    // $mk = mysqli_fetch_assoc($query);
                    // $jumlah = [$mk];
                    // var_dump($mk);
               ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td><?= $dosen["nip"] ?></td>
                         <td><?= $dosen["nama"] ?></td>
                         <td>
                              <div class="d-flex justify-content-center">
                                   <a class="btn btn-outline-info" href="adm_ubahdosen.php?nip=<?= $dosen["nip"]; ?>">Edit</a>
                                   <form action="function.php" method="post" style="margin :0px;width:auto;">
                                        <input type="hidden" name="nip" value="<?= $dosen['nip'] ?>">
                                        <button type="submit" name="hapus" class="btn btn-outline-danger mx-2" onclick="return confirm ('yakin?')">
                                             Hapus
                                        </button>
                                   </form>
                              </div>
                         </td>
                         <!-- <td></td> -->
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>
     <a class="btn btn-outline-info" href="adm_tambahdosen.php">Tambah Dosen</a>
</div>
<?php
include 'layouts/footer.php';
?>