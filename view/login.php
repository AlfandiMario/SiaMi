<?php

require "../database/connect.php";
session_start();

if (isset($_SESSION["login"])) {
  $role = $_SESSION['role'];
  header("Location: $role/index.php");
  exit();
}

if (isset($_POST["login"])) {
  $nim_nip = $_POST['nim_nip'];
  $password = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE nim_nip='$nim_nip'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $_SESSION["login"] = true;
      $role_id = $row['role_id'];

      $datamhs = mysqli_query($conn, "SELECT * from mahasiswa WHERE nim='$nim_nip'");
      if (mysqli_num_rows($datamhs) === 1) {
        $mhs = mysqli_fetch_assoc($datamhs);
        $nama = $mhs['nama'];
        $nim = $mhs['nim'];
        $angkatan = $mhs['angkatan'];
        $_SESSION["nama"] = $nama;
        $_SESSION["nim"] = $nim;
        $_SESSION["angkatan"] = $angkatan;
      }

      $datadosen = mysqli_query($conn, "SELECT * from dosen WHERE nip='$nim_nip'");
      if (mysqli_num_rows($datadosen) === 1) {
        $dosen = mysqli_fetch_assoc($datadosen);
        $nama = $dosen['nama'];
        $nip = $dosen['nip'];
        $_SESSION["nama"] = $nama;
        $_SESSION["nip"] = $nip;
      }
      $dataadmin = mysqli_query($conn, "SELECT * from admin WHERE nama='$nim_nip'");
      if (mysqli_num_rows($dataadmin) === 1) {
        $admin = mysqli_fetch_assoc($dataadmin);
        $nama = $admin['nama'];
        $_SESSION["nama"] = $nama;
      }

      $result = mysqli_query($conn, "SELECT * FROM role WHERE id='$role_id'");
      $tbrole = mysqli_fetch_assoc($result);
      $role = $tbrole['nama'];
      $_SESSION['role'] = $role;
      //cek remember me
      // if(isset($_POST['remember'])){

      //     setcookie('id',$row['id'],time()+180);
      //     setcookie('key',hash('sha256',$row['username']),time()+180);
      // }

      header("Location: $role/index.php");
      exit();
    }
  }
  $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Log In</title>

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php if (isset($error)) : ?>
    <script>
      alert('Username / Password Salah!');
    </script>
  <?php endif; ?>


  <!-- Custom styles for this template -->
  <!-- <link href="../css/signin.css" rel="stylesheet"> -->
  <link href="../css/login.css" rel="stylesheet">
</head>

<body class="text-center">

  <div class="login-box">
    <h2>Login SiaLite</h2>
    <form action="" method="POST">
      <div class="user-box">
        <input type="text" name="nim_nip" required="">
        <label>NIM/NIP</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <div>
        <button type="submit" name="login"> Login </button>
      </div>
      <!-- <a href="">
        <span></span>
        <span></span> -->
      <!-- <button type="submit" name="login"> Login </button> -->
      <!-- <span></span>
        <span></span>
        Login
      </a> -->
    </form>
    <p>Belum punya akun? <button><a href="signup.php">Sign Up</a></button></p>
  </div>

</body>

</html>