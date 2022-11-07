<?php
session_start();

if ($_SESSION['role'] != 'admin') {
     $_SESSION['halaman'] = "admin";
     header("Location: ../kick.php");
};

$judul = "Selamat Datang";
include 'layouts/header.php';
?>
          <div class="container">
               <header style="text-align:center; margin-top:20%">
                    <h2>Selamat Datang di SiaLite,<?= $_SESSION["nama"]; ?>!</h2>
                    <p>Tetap semangat dan semoga harimu menyenangkan :)</p>
               </header>
          </div>

<?php
include 'layouts/footer.php';
?>