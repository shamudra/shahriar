<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <form method="post" action="">
        <fieldset style="width:300px; height: 100px;">
            <legend>EMAIL</legend>
            <input type="text" id="email" name="email"><span style="font-weight:bold; font-size: large;"> i</span> <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>
<?php
    if($_POST){
        $email = $_POST["email"];
        if($email == ""){
            echo '<span style="color: red;">Input cannot be empty</span><br>';
        }
        if(!preg_match("/^([a-z0-9\+_\-]+)@([a-z0-9\-]+\.)+com$/i", $email)){
            echo '<span style="color: red;">Must be a valid email address: anything@example.com</span><br>';
        }
        else{
            echo '<span style="color: green;">Successful</span><br>';
        }
    }
?>