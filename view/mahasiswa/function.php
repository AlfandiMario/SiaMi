<?php
require '../../database/connect.php';

if(isset($_POST['ambil_mk'])){
    $nim = $_POST['nim_mhs'];
    $kode_mk =$_POST['kode_mk'];
    $hasil_cek = cek($nim,$kode_mk);
    if($hasil_cek){
        tambah($nim,$kode_mk);
    }
}

function cek($nim, $kode_mk){
    global $conn;
    $result = mysqli_query($conn, "SELECT kode_mk FROM mk_diambil WHERE kode_mk = '$kode_mk' AND nim_mhs = '$nim'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Mata Kuliah Sudah Ada'); document.location.href = 'javascript:history.back()';</script>";
        return false;
    }
    return true;
}
function tambah($nim, $kode_mk){
    global $conn; 
    $mkdiambil = "INSERT INTO mk_diambil VALUES ('', '$nim','$kode_mk', 0)";
    mysqli_query($conn, $mkdiambil);
    $cek =  mysqli_affected_rows($conn);

    if ($cek > 0) {
        echo "
         <script>
         alert ('Mata kuliah berhasil ditambahkan!');
         document.location.href = 'javascript:history.back()';
         </script>";
        # code...
    } else {
        echo "
         <script>
         alert ('gagal!');
         document.location.href = 'javascript:history.back()';
         </script>";
    }
}

?>