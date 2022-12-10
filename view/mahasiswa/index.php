<?php
session_start();

if ($_SESSION['role'] != 'mahasiswa') {
     $_SESSION['halaman'] = "mahasiswa";
     header("Location: ../kick.php");
};
$judul = 'SiaMi Elektro UNS';

include 'layouts/header.php';
?>

<div class="container mx-auto">
     <header style="text-align:center; margin-top:20%">
          <h2>Selamat Datang di SiaMi, <?= $_SESSION["nama"]; ?>!</h2>
          <p>Tetap semangat dan semoga harimu menyenangkan :)</p>
     </header>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="sidebars.js"></script>
</body>

</html>