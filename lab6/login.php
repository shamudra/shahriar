<?php
    session_start();
    $message="";
    $cookie_user_name="";
    $cookie_password="";
    if(isset($_COOKIE["user_name"])){
        $cookie_user_name = $_COOKIE["user_name"];
    }
    if(isset($_COOKIE["password"])){
        $cookie_password = $_COOKIE["password"];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST["user_name"]) && isset($_POST["password"])){
            $user_name = $_POST["user_name"];
            $password = $_POST["password"];
            if($user_name == ""){
                $message .= 'User name cannot be empty<br>';
            }
            else if($password == ""){
                $message .= 'Password cannot be empty<br>';
            }
            else if(user_verified($user_name, $password)){
                if(isset($_POST["remember"])){
                    setcookie("user_name", $user_name, time() + (86400 * 30), "/");
                    setcookie("password", $password, time() + (86400 * 30), "/");
                }
                $_SESSION["user"] = $user_name;
                header("location: dashboard.php");
            }
            else {
                $message .= 'Wrong username or password<br>';
            }
        }
    }

    function user_verified($user_name, $password){
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $dbname= "lab6";
        $conn = new mysqli($servername, $username, $pass, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "select * from users where user_name = '".$user_name."' AND password = '".$password."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
        $conn->close();
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
        <div style="position: relative; top: 90px; margin: 20px; padding: 20px; border: 1px solid black;">
            <h1>Login</h1>
            <div>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>User Name</td>
                            <td><input type="text" name="user_name" value="<?php echo $cookie_user_name; ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" value="<?php echo $cookie_password; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="checkbox" name="remember">Remember Me</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="float: right;"><button type="submit">Login</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <span style="color: red;"><?php echo $message; ?></span>
        </div>
    </body>
</html>