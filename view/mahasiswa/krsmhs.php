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

// Untuk menampilkan lihat nilai sesuai MK yang diambil
$mk_ambil = mysqli_query($conn, "SELECT * FROM mk_diambil INNER JOIN mk ON mk_diambil.kode_mk=mk.kode_mk WHERE mk_diambil.nim_mhs = '$nim_mhs'");
$judul = 'Kartu Rencana Studi';
include 'layouts/header.php';
?>

<div class="container-sm">
     <header>
          <h3><?= $judul ?></h3>
     </header>
     <hr>
     <h6>Nama : <?= $nama_mhs ?> </h6>
     <h6>NIM : <?= $nim_mhs; ?> </h6>
     <h6>Semester : <?= $semester; ?> </h6>

     <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
               <tr>
                    <th scope="col" style="width: 10%;">No</th>
                    <th scope="col" style="width: 15%;" class="text-center">Kode Mata Kuliah</th>
                    <th scope="col" style="width: 40%;" class="text-center">Mata Kuliah</th>
                    <th scope="col" style="width: 15%;" class="text-center">Bobot SKS</th>
                    <th scope="col" style="width: 20%;" class="text-center">Aksi</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $i = 1;
               $jumlah = 0;

               while ($matkul = mysqli_fetch_array($mk_ambil)) {
                    $bobot = $matkul["bobot_sks"];
                    $jumlah += $bobot;
                    var_dump($bobot);
               ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td><?= $matkul["kode_mk"] ?></td>
                         <td><?= $matkul["nama_mk"] ?></td>
                         <td class="text-center"><?= $matkul["bobot_sks"] ?></td>
                         <td class="text-center">
                              <form action="function.php" method="POST">
                                   <input type="hidden" name="kode_mk" value="<?= $matkul["kode_mk"] ?>">
                                   <input type="hidden" name="nim_mhs" value="<?= $nim_mhs ?>">
                                   <?php if ($status_krs == 'VALID' || $status_krs == 'REQUEST') { ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger mx-auto" disabled>Hapus</button>
                                   <?php } else { ?>
                                        <button type="submit" name="hapus_krs" class="btn btn-sm btn-outline-danger mx-auto" onclick="return confirm ('Hapus Mata Kuliah dari KRS? ')">Hapus</button>
                                   <?php } ?>
                              </form>
                         </td>
                    </tr>
               <?php } ?>
          </tbody>
     </table>

     <form action="function.php" method="POST">
          <input type="hidden" name="nim_mhs" value="<?= $nim_mhs ?>">
          <button type="submit" name="req_valid" class="btn btn-outline-dark"> Minta Validasi PA</button>
     </form>

</div>

</main>
</body>

</html>
<?php
include 'layouts/footer.php' ?>