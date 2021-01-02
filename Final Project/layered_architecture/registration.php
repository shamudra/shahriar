<?php 
    session_start();
    $message = $_SESSION["error_message"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hospital Management System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <div class="logo"><span style="font-weight: bold; font-size: xx-large; position: relative; top: 15px;">HMS</span></div>
            <div class="menu"><span style="position: relative; top: 25px;"><a href="registration.php">Registration</a></span></div>
            <div class="menu"><span style="position: relative; top: 25px;"><a href="login.php">Login</a></span></div>
            <div class="menu"><span style="position: relative; top: 25px;"><a href="home.php">Home</a></span></div>
        </div>
        <div style="position: absolute; top: 90px; left: 200px;">
            <form action="../controller/user.php" method="post">
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