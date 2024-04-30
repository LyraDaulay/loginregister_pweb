<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(0, 0, 0, 0.5); 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .popup {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .checkmark {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25px;
            height: 25px;
            background-color: #4CAF50;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
    </style>
</head>
<body>
    <div class="popup">
        <div class="checkmark">&#10003;</div> 
        <?php
        include_once '../koneksi.php';

        if (isset($_POST['submit'])) {  
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];

            $passwordEncrypt = md5($password);

            $sql = "INSERT INTO users VALUES (?, ?, ?)";
            $data = [$username, $passwordEncrypt, $fullname];
            try {
                $stmt = $koneksi->prepare($sql);
                $stmt->execute($data);
                echo "<p>Registrasi user baru telah disimpan</p>";
                //header("Location: tampil_mhs.php");
            } catch (PDOException $e) {
                echo "<p>Error: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>Tidak ada data yang dikirim, silakan kembali ke halaman sebelumnya dan lengkapi data</p>";
        }
        ?>
    </div>
</body>
</html>