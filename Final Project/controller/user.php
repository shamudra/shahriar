<?php
require "../validation_php/registration.php";
require "../model/user.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["address"]) && isset($_POST["user_name"]) && isset($_POST["password"])){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $address = $_POST["address"];
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $message = validate($first_name, $last_name, $address, $user_name, $password);
        if($message==""){
            if(registration($first_name, $last_name, $address, $user_name, $password)){
                header("location: ../layered_architecture/login.php");
            }
        }
        else{
            session_start();
            $_SESSION["error_message"]=$message;
            header("location: ../layered_architecture/registration.php");
        }
    }
}
?>