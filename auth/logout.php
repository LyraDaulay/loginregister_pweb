<?php
    session_start();
    session_unset();
    header("Location: form-login.php");
?>