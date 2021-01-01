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
        if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["address"])){
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $address = $_POST["address"];
            if($first_name == ""){
                $message .= 'First name cannot be empty<br>';
            }
            else if($last_name == ""){
                $message .= 'Last name cannot be empty<br>';
            }
            else if($address == ""){
                $message .= 'Address cannot be empty<br>';
            }
            else {
                require 'database_connection.php';
                $sql = "UPDATE users SET first_name='".$first_name."', last_name='".$last_name."',address='".$address."' WHERE id='".$user['id']."'";
                $result = $conn->query($sql);
                $conn->close();
                header("location: view_profile.php");
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
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <div style="position: absolute; top: 90px; left: 200px;">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="first_name" value="<?php echo $user['first_name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="last_name" value="<?php echo $user['last_name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" value="<?php echo $user['address']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="float: right;"><button type="submit">Edit</button></td>
                    </tr>
                </table>
            </form>
            <span style="color: red;"><?php echo $message; ?></span>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>