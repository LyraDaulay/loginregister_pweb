<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@1.14.4/dist/full.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ff5c7a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #ff4361;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include_once('koneksi.php');
        $nim = '';
        $nama = '';
        $alamat = '';
        if (isset($_GET['id'])) {
            $sqlSelectMhs = "SELECT * FROM mahasiswa WHERE nim=?";
            try {
                $statement = $koneksi->prepare($sqlSelectMhs);
                $statement->execute([$_GET['id']]);
                $mhs = $statement->fetchAll(PDO::FETCH_ASSOC);
                $nim = $mhs[0]['nim'];
                $nama = $mhs[0]['nama'];
                $alamat = $mhs[0]['alamat'];
            } catch (PDOException $e) {

            }
        }
        ?>
        <form action="simpan_mhs.php" method="post">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" id="nim" value="<?php echo $nim ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" value="<?php echo $nama ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo $alamat ?>">
            </div>
            <button type="submit" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>
