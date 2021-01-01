<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname= "lab6";
    $conn = new mysqli($servername, $username, $pass, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // function execute_query($sql){
    //   return $conn->query($sql);
    // }
?>