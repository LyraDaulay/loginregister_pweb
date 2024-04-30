<?php
    class Koneksi {
        public static function getKoneksi(){
            $dsn = "mysql:host=localhost;dbname=db4b";
$username = "root";
$password = "";

$koneksi = null;
try {
    $koneksi = new PDO(
        $dsn,
        $username,
        $password
    );
    $koneksi->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );
    // echo "Koneksi ke database sukses";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
        }
    }

?>