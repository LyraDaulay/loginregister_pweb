<?php
    include "Mahasiswa.php";
    include "orang.php";

    use OOP\Mahasiswa;

    $mhs = new Mahasiswa();
    $mhs-> setNama("Rudi");
    $mhs-> setNim("12345567");

    echo $mhs->tampilData();
?>