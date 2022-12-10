<?php
require '../../database/connect.php';
require 'function.php';
// Ambil Data Mahasiswa Dari Get
session_start();
$nim_mhs = ($_GET["nim"]);
$nama_mhs = ($_GET["nama"]);
//$angkatan_mhs = ($_SESSION["angkatan"]);
$nip = $_SESSION["nip"];
if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};

// Untuk menampilkan lihat nilai sesuai MK yang diambil
$mk_ambil = mysqli_query($conn, "SELECT * FROM mk_diambil INNER JOIN mk ON mk_diambil.kode_mk=mk.kode_mk WHERE mk_diambil.nim_mhs = '$nim_mhs'");
$pa = mysqli_query($conn, "SELECT * FROM pa WHERE nim = '$nim_mhs'");

$judul = 'Lihat Nilai';
include 'layout/header.php';
?>

<div class="container-sm mt-4">

     <header>
          <h3>Kartu Rencana Studi</h3>
     </header>
     <hr>
     <h6>Nama : <?= $nama_mhs; ?> </h6>
     <h6>NIM : <?= $nim_mhs; ?> </h6>
     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Nilai</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;

               while ($matkul = mysqli_fetch_array($mk_ambil)) {
               ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td><?= $matkul["kode_mk"] ?></td>
                         <td><?= $matkul["nama_mk"] ?></td>
                         <td><?= 0 ?></td>
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>
     <?php
     if (isset($_POST["validkan"])) {
          //Cek data apakah sudah diubah atau belum
          if (valid($_POST)  > 0) {
               echo "
            <script>
            alert ('Ubah Validasi Berhasil!');
            document.location.href = 'dsn_bimbingan.php';
            </script>";
          } else {
               echo "
            <script>
            alert ('gagal!');
            </script>";
          }
     }
     ?>
     <?php
     while ($validasi_krs = mysqli_fetch_array($pa)) {
     ?>
          <form action="" method="POST" enctype="multipart/form-data">
               <?php
               //$valid = "Valid";
               //$tdkvalid = "Belum Tervalidasi";
               if ($validasi_krs['status_krs'] === "Valid") { ?>
                    <input type="hidden" name="nim" value="<?= $validasi_krs['nim']; ?>">
                    <input type="hidden" name="nip" value="<?= $validasi_krs['nip'] ?>">
                    <input type="hidden" name="status_krs" value="Belum Tervalidasi">
                    <button type="submit" name="validkan">Batalkan Validasi KRS</button>
               <?php } else { ?>
                    <input type="hidden" name="nim" value="<?= $validasi_krs['nim']; ?>">
                    <input type="hidden" name="nip" value="<?= $validasi_krs['nip'] ?>">
                    <input type="hidden" name="status_krs" value="Valid">
                    <button type="submit" name="validkan">Validasi KRS</button>
               <?php } ?>

          </form>
     <?php
     }
     ?>
     </main>
</div>


</body>

</html>
<?php
