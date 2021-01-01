<?php 
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
            <h1>Name: <?php echo $user['first_name'];?> <?php echo $user['last_name'];?></h1>
            <h1>Address: <?php echo $user['address'];?></h1>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>