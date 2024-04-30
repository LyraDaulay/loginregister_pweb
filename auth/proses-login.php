<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }
    </style>
</head>
<body>
    <div class="popup">
        <?php
        include_once '../koneksi.php';

        if (isset($_POST['login'])) {  
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordEncrypt = md5($password);

            $sql = "SELECT * FROM users WHERE username=?";
            $data = [$username];
            try {
                $stmt = $koneksi->prepare($sql);
                $stmt->execute($data);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($result) > 0) {
                    if ($result[0]['password'] == $passwordEncrypt) {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['fullname'] = $result[0]['fullname'];
                        header("Location: ../administrator.php");
                    } else {
                        echo "<p>Username dan Password salah</p>";
                    }
                } else {
                    echo "<p>Username dan Password salah</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Error: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>Tidak ada data yang dikirim, silahkan kembali ke halaman sebelumnya dan lengkapi data</p>";
        }
        ?>
    </div>
</body>
</html>
