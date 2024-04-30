<?php
include_once('koneksi.php');

if (isset($_GET['id'])) {
    $nim = $_GET['id'];

    // Query SQL untuk menghapus data mahasiswa berdasarkan NIM
    $sqlDeleteMhs = "DELETE FROM mahasiswa WHERE nim = :nim";

    try {
        // Persiapkan statement SQL
        $statement = $koneksi->prepare($sqlDeleteMhs);

        // Bind parameter nim
        $statement->bindParam(':nim', $nim);

        // Eksekusi statement
        $statement->execute();

        // Setelah berhasil menghapus, langsung arahkan ke form_mhs.php
        header('Location: tampil_mhs.php');
        exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan header
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    // Jika tidak ada id yang diberikan, kembalikan ke halaman utama
    header('Location: tampil_mhs.php');
    exit();
}
?>
