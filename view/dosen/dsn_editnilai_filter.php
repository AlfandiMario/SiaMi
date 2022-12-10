<?php
require '../../database/connect.php';
require 'function.php';


session_start();
if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};
$nip = $_SESSION["nip"];
$matkul = $_GET["mk"];
$nilai_mk = mysqli_query($conn, "SELECT mahasiswa.*, mk_diambil.* FROM `mahasiswa` 
INNER JOIN mk_diambil ON mahasiswa.nim = mk_diambil.nim_mhs
WHERE mk_diambil.kode_mk = '$matkul';");

// var_dump($nilai_mk);

if (isset($_POST["submit"])) {
     //Cek data apakah sudah diubah atau belum
     if (ubah($_POST)  > 0) {
          echo "
         <script>
         alert ('data berhasil diubah!');
         document.location.href = 'dsn_editnilai_filter.php?mk=$matkul';
         </script>";
     } else {
          echo "
         <script>
         alert ('gagal!');
         </script>";
     }
}
$judul = 'Input Nilai';
include 'layout/header.php';

?>
<div class="container-sm mt-4">
     <header>

          <h3>Daftar Nilai</h3>
          <p class="mt-0" style="margin-left: 80%; width: 25ch; margin-right:5%;">
               <a class="btn btn-outline-info" href="cetak.php?mk=<?= $matkul; ?>">Cetak Daftar Nilai</a>
          </p>

     </header>





     <table class="table">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Aksi</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($mk = mysqli_fetch_array($nilai_mk)) {
               ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                         <tr>
                              <input type="hidden" name="nim" value="<?= $mk['nim']; ?>">
                              <input type="hidden" name="kode_mk" value="<?= $mk['kode_mk'] ?>">
                              <td><?= $i++ ?></td>
                              <td><?= $mk["nama"] ?></td>
                              <td><input type="int" name="nilai_mk" required value="<?= $mk["nilai_mk"] ?>"></td>
                              <td><button type="submit" name="submit">Ubah</button></td>
                         </tr>
                    </form>
               <?php
               } ?>
          </tbody>
     </table>

</div>
</main>

</body>