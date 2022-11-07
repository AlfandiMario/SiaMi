<?php
session_start();
require '../../database/connect.php';
require 'function.php';


session_start();
if ($_SESSION['role'] != 'dosen') {
     $_SESSION['halaman'] = "dosen";
     header("Location: ../kick.php");
};

$matkul = $_GET["mk"];
$nilai_mk = mysqli_query($conn, "SELECT mahasiswa.*, mk_diambil.* FROM `mahasiswa` 
INNER JOIN mk_diambil ON mahasiswa.nim = mk_diambil.nim_mhs
WHERE mk_diambil.kode_mk = '$matkul';");

require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Nilai</title> 
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="../../css/daftarmk.css" rel="stylesheet"> 
</head>
<body>
    <div class="container-sm">
               <header>
                    <h1>Daftar Nilai'.$matkul .'</h1>
               </header>';
               $html .=
                    '
                    <br></br>
               <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                         <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Nilai</th>
                         </tr>
                    </thead>
                    <tbody>';
                         $i = 1;
                         while ($matkul = mysqli_fetch_array($nilai_mk)) {
                            $html .='
                              <tr>
                                   <td>'.$i++.'</td>
                                   <td>'. $matkul["nama"].'</td>
                                   <td>'. $matkul["nilai_mk"].'</td>
                              </tr>';
                         }
                    
  $html .='</tbody>
  </table>
</div>
</body>';




$mpdf->WriteHTML($html);
$mpdf->Output("KHS.pdf", \Mpdf\Output\Destination::INLINE);
