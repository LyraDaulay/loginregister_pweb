<?php
    session_start();
    if(isset($_SESSION['username'])) {
        header("Location= auth/form-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
</head>
<body>
    <h1>Selamat datang <?= $_SESSION['fullname']?></h1>
    <a href="auth/logout.php" class="btn btn-info">Logout</a>
</body>
</html>
