<?php
function registration($first_name, $last_name, $address, $user_name, $password){
    require 'database_connection.php';
    $sql = "insert into users ( id, user_name, password, first_name, last_name, address) values (NULL, '".$user_name."','".$password."','".$first_name."','".$last_name."','".$address."')";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}
?>