<?php
require '../../database/connect.php';

function ubah($data)
{
     global $conn;
     // ambil data dari tiap inputan ke suatu variabel
     $nim = $data["nim"];
     $kode_mk = $data["kode_mk"];
     $nilai = htmlspecialchars($data["nilai_mk"]);
     // htmlspecialchars agar elemen html yang dimasukkan ke form tidak ngefek ke tampilan sistem

     // Percobaan Update Langsung
     $update = "UPDATE mk_diambil SET nilai_mk = '$nilai'
                WHERE nim_mhs = '$nim' AND kode_mk = '$kode_mk'";

     mysqli_query($conn, $update);

     // Return angka ketika ada data yang berhasil di update lalu dipakai untuk isset hapus.php
     return  mysqli_affected_rows($conn);
}

function valid($data_validasi)
{
     global $conn;
     // ambil data dari tiap inputan ke suatu variabel
     $nim = $data_validasi["nim"];
     $nip = $data_validasi["nip"];
     $status_krs = $data_validasi["status_krs"];
     // htmlspecialchars agar elemen html yang dimasukkan ke form tidak ngefek ke tampilan sistem

     // Percobaan Update Langsung
     $update = "UPDATE pa SET status_krs = '$status_krs'
                WHERE nim = '$nim' AND nip = '$nip'";

     mysqli_query($conn, $update);

     // Return angka ketika ada data yang berhasil di update lalu dipakai untuk isset hapus.php
     return  mysqli_affected_rows($conn);
}
