<?php
function validate($first_name, $last_name, $address, $user_name, $password){
    $message="";
    if($first_name == ""){
        $message .= 'First name cannot be empty<br>';
    }
    else if($last_name == ""){
        $message .= 'Last name cannot be empty<br>';
    }
    else if($address == ""){
        $message .= 'Address cannot be empty<br>';
    }
    else if($user_name == ""){
        $message .= 'User name cannot be empty<br>';
    }
    else if($password == ""){
        $message .= 'Password cannot be empty<br>';
    }
    return $message;
}
?>