<?php

require "function.php";
if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
            alert('user baru berhasil dibuat!')
                    </script>";
    } else {
        echo mysqli_error($conn);
    }
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
    <title>Signin Template · Bootstrap v5.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="login-box">
        <h2>Sign Up SiaLite</h2>
        <form action="" method="POST">
            <div class="user-box">
                <input type="text" name="nim_nip" id="nim_nip" required="">
                <label for="nim_nip">NIM/NIP</label>
            </div>
            <div class="user-box">
                <input type="password" id="nim_nip" name="password" required="">
                <label for="password">Password</label>
            </div>
            <div>
                <button type="submit" name="register"> Sign Up </button>
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
        <p>Sudah punya akun? <button><a href="login.php">Login</a></button></p>
    </div>

    <!--  -->

</body>

</html>