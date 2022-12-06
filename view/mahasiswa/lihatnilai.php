<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "si-uas";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Ambil Data Mahasiswa Dari Session
session_start();
$nim_mhs = ($_SESSION["nim"]);
$nama_mhs = ($_SESSION["nama"]);
$angkatan_mhs = ($_SESSION["angkatan"]);

if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};

// Untuk menampilkan lihat nilai sesuai MK yang diambil
$mk_ambil = mysqli_query($conn, "SELECT * FROM mk_diambil INNER JOIN mk ON mk_diambil.kode_mk=mk.kode_mk WHERE mk_diambil.nim_mhs = '$nim_mhs'");
$judul = 'Lihat Nilai';
include 'layouts/header.php';
?>
<div class="container-sm">
     <header>
          <h3>Kartu Hasil Studi</h3>
     </header>
     <hr>
     <h6>Nama : <?= $_SESSION["nama"]; ?> </h6>
     <h6>NIM : <?= $_SESSION["nim"]; ?> </h6>
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
                         <td><?= $matkul["nilai_mk"] ?></td>
                    </tr>

               <?php
               } ?>
          </tbody>
     </table>

     <p class="mt-5">
          <a class="btn btn-outline-info" href="cetak.php">Cetak KHS</a>
     </p>
     </main>
</div>


</body>

</html>
<?php
include 'layouts/footer.php' ?>