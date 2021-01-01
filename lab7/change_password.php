<?php 
    $message = "";
    session_start(); 
    if(!isset($_SESSION["user"])){
        header("location: login.php");
    }
    
    $user="";
    require 'database_connection.php';
    $sql = "select * from users where user_name = '".$_SESSION['user']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
    $conn->close();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST["last_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])){
            $last_password = $_POST["last_password"];
            $new_password = $_POST["new_password"];
            $confirm_password = $_POST["confirm_password"];
            if($last_password == ""){
                $message .= 'Last password cannot be empty<br>';
            }
            else if($new_password == ""){
                $message .= 'New password cannot be empty<br>';
            }
            else if($confirm_password == ""){
                $message .= 'Confirm password cannot be empty<br>';
            }
            else if($last_password != $user["password"]){
                $message .= 'Last password is not correct<br>';
            }
            else if($new_password != $confirm_password){
                $message .= 'Confirm password does not match new password<br>';
            }
            else {
                require 'database_connection.php';
                $sql = "UPDATE users SET password='".$new_password."' WHERE id='".$user['id']."'";
                $result = $conn->query($sql);
                $conn->close();
                header("location: dashboard.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hospital Management System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <div class="center">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Last Password</td>
                        <td><input type="password" name="last_password" value=""></td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td><input type="password" name="new_password" value=""></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" name="confirm_password" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="float: right;"><button type="submit">Change Password</button></td>
                    </tr>
                </table>
            </form>
            <span style="color: red;"><?php echo $message; ?></span>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>