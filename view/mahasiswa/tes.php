<?php
require '../../database/connect.php';

// if(isset($_POST['ambil_mk'])){
//     $nim = $_POST['nim_mhs'];
//     $kode_mk =$_POST['kode_mk'];
//     $kbk =$_POST['kategori'];
//     echo $kbk;
    
//     function tes($kbk){
//     if($kbk == Null ){
//         echo "bukan kbk";
//         return true;
//     }else{
//     echo "kbk";
//     $cek_kbk = mysqli_query($conn, "SELECT kbk FROM mahasiswa WHERE nim = '$nim'");
//     $ya = mysqli_fetch_array($cek_kbk);
//     printf($ya["kbk"]);
//     if($ya["kbk"] == $kbk){
//         echo "<script>alert('Ya KBK Anda'); document.location.href = 'javascript:history.back()';</script>";
//         return true;
//      }
//      echo "<script>alert('Bukan KBK Anda'); document.location.href = 'javascript:history.back()';</script>";
//      return false;
//      }
//  }}
 


// function kategori($kode_mk, $kbk){
//     global $conn;
//     echo '$kbk';
// }