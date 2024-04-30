<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px; 
        }

        .container {
            max-width: 1200px; 
            width: 100%;
            margin: auto; 
        }

        .table-container {
            background-color: #f9f9f9; 
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            background-color: #ff9; 
        }

        th {
            background-color: #ff9; 
            color: #ff5c7a; 
        }

        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #ff5c7a; 
            color: #fff; 
            border: none; 
            padding: 10px 20px; 
            border-radius: 5px; 
            text-decoration: none; 
            transition: background-color 0.3s; 
        }

        .btn-primary:hover {
            background-color: #ff4361; 
        }

        .btn-primary.edit {
            background-color: #ff5c7a; 
        }

        .btn-primary.delete {
            background-color: #ff5c7a; 
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="btn-container">
            <a href="form_mhs.php" class="btn btn-primary">TAMBAH DATA</a>
        </div>

        <div class="table-container">
            <?php
            include_once('koneksi.php');

            $sqlSelectMhs = "SELECT * FROM mahasiswa";
            try {
                $statement = $koneksi->prepare($sqlSelectMhs);
                $statement->execute();
                $mhs = $statement->fetchAll(PDO::FETCH_ASSOC);
                echo '<table>';
                echo '<tr>';
                echo '<th>NIM</th>';
                echo '<th>NAMA</th>';
                echo '<th>ALAMAT</th>';
                echo '<th>ACTION</th>';
                echo '</tr>';
                foreach ($mhs as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['nim'] . '</td>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . $row['alamat'] . '</td>';
                    echo '<td>
                            <a href="form_mhs.php?id=' . $row['nim'] . '" class="btn btn-primary edit">edit</a>
                            <a href="delete_mhs.php?id=' . $row['nim'] . '" class="btn btn-primary delete" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">delete</a>
                        </td>';
                    echo '</tr>';
                }
                echo '</table>';
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
        </div>
    </div>
</body>

</html>
