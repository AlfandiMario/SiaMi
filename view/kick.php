<?php
    session_start();
    $halaman = $_SESSION['halaman'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabisa</title>
</head>
<body>
    <div style="font-size: 70px; text-align:center;">
        <h1>
            Lu Tu Bukan <?=$halaman?>
        </h1>
    </div>
    
</body>
</html>