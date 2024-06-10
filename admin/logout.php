<?php
    session_start();

    //Menghapus session
    session_destroy();
    unset($_SESSION);

    //redirect ke halaman login
    header("Location: login.php");
?>