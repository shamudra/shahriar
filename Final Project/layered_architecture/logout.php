<?php
    session_start();
    session_unset();
    //echo $_SESSION["user"];
    header("location: login.php");
?>