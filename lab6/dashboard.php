<?php 
    session_start(); 
    if(!isset($_SESSION["user"])){
        header("location: login.php");
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
            <h1>Welcome <?php echo $_SESSION["user"]; ?></h1>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>