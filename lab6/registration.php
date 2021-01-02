<?php 
    $message = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["address"]) && isset($_POST["user_name"]) && isset($_POST["password"])){
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $address = $_POST["address"];
            $user_name = $_POST["user_name"];
            $password = $_POST["password"];
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
            else {
                require 'database_connection.php';
                $sql = "insert into users ( id, user_name, password, first_name, last_name, address) values (NULL, '".$user_name."','".$password."','".$first_name."','".$last_name."','".$address."')";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
                header("location: login.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hospital Management System</title>
    </head>
    <body>
        <div style="position: fixed; top: 0px; left: 0px; height: 90px; width: 100%; background-color: #b0b0b0;">
            <div style="float: left; height: 70px; width: 70px; padding: 10px; text-align: center;"><span style="font-weight: bold; font-size: xx-large; position: relative; top: 15px;">HMS</span></div>
            <div style="float: right; height: 70px; width: 70px; padding: 10px; text-align: center;"><span style="position: relative; top: 25px;"><a href="registration.php">Registration</a></span></div>
            <div style="float: right; height: 70px; width: 70px; padding: 10px; text-align: center;"><span style="position: relative; top: 25px;"><a href="login.php">Login</a></span></div>
            <div style="float: right; height: 70px; width: 70px; padding: 10px; text-align: center;"><span style="position: relative; top: 25px;"><a href="home.php">Home</a></span></div>
        </div>
        <div style="position: absolute; top: 90px; left: 200px;">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="first_name" value=""></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="last_name" value=""></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" value=""></td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="user_name" value=""></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="float: right;"><button type="submit">Register</button></td>
                    </tr>
                </table>
            </form>
            <span style="color: red;"><?php echo $message; ?></span>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>