<?php
require '../../database/connect.php';

// Ambil Data Mahasiswa Dari Session
session_start();
$nim_mhs = ($_SESSION["nim"]);
$nama_mhs = ($_SESSION["nama"]);
$semester = ($_SESSION["semester_mhs"]);

if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};

$cek_krs = mysqli_query($conn, "SELECT status_krs FROM pa WHERE nim = '$nim_mhs'");
$result = mysqli_fetch_assoc($cek_krs);
$status_krs = $result["status_krs"];
// var_dump($status_krs);

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
     <h6>Nama : <?= $nama_mhs ?> </h6>
     <h6>NIM : <?= $nim_mhs; ?> </h6>
     <h6>Semester : <?= $semester; ?> </h6>

     <?php if ($status_krs == 'VALID') { ?>
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
     <?php } else { ?>
          <div class="container mx-auto my-auto">
               <header class="text-center mt-5">
                    <h4> KRS Anda Belum Tervalidasi</h4>
                    <p> Silahkan hubungi Dosen Pembimbing Akademik untuk melakukan konsultasi</p>
               </header>
          </div>
     <?php } ?>

     </main>
</div>


</body>

</html>
<?php
include 'layouts/footer.php' ?>