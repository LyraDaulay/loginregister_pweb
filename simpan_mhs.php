<?php
include_once 'koneksi.php';

if (isset($_POST['submit'])) {  
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa VALUES (?, ?, ?)";
    $data = [$nim, $nama, $alamat];
    try {
        $stmt = $koneksi->prepare($sql);
        $stmt->execute($data);
        echo "Data mahasiswa baru telah disimpan";
        header("Location: tampil_mhs.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}else{
    echo "Tidak ada data yang dikirim, silakan kembali ke halaman sebelumnya dan lengkapi data";
}

