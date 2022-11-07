<?php

require "../database/connect.php";
function register($data)
{
    global $conn;
    $role_id = NULL;

    $nim_nip = stripslashes($data['nim_nip']);
    $datamhs = mysqli_query($conn, "SELECT * from mahasiswa WHERE nim='$nim_nip'");
    if (mysqli_num_rows($datamhs) === 1) {
        $role_id = 3;
    }
    $datadosen = mysqli_query($conn, "SELECT * from dosen WHERE nip='$nim_nip'");
    if (mysqli_num_rows($datadosen) === 1) {
        $role_id = 2;
    }
    $dataadmin = mysqli_query($conn, "SELECT * from admin WHERE nama='$nim_nip'");
    if (mysqli_num_rows($dataadmin) === 1) {
        $role_id = 1;
    }
    // $datadosen = mysqli_query($conn, "SELECT * from admin WHERE nama=''");
    // if (mysqli_num_rows($datadosen) === 1) {
    //     $role_id = 1;
    // }
    if ($role_id === NULL) {
        echo "<script>
        alert('Anda bukan civitas elektro')
        </script>";
        return false;
    }
    $password = mysqli_real_escape_string($conn, $data['password']);
    //$role_id=$data['role_id'];
    // $password2= mysqli_real_escape_string($conn, $data['conpass']);
    $hasil = mysqli_query($conn, "SELECT * from user WHERE nim_nip='$nim_nip'");

    if (mysqli_fetch_assoc($hasil)) {
        echo "<script>
        alert('username yang anda masukan sudah ada!!')
        </script>";
        return false;
    }

    // if ($password!==$password2){
    //     echo "<script>
    //     alerta('password tidak sesuai!!')
    //     </script>";
    //     return false;
    // }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES ('','$nim_nip','$password','$role_id')");
    return mysqli_affected_rows($conn);
}
