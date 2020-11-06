<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <form method="post" action="">
        <fieldset style="width:300px; height: 100px;">
            <legend>GENDER</legend>
            <label class="radio-inline"><input type="radio" name="gender">Male</label>
            <label class="radio-inline"><input type="radio" name="gender">Female</label>
            <label class="radio-inline"><input type="radio" name="gender">Other</label> <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //$gender = $_POST["gender"];
        if(!isset($_POST['gender'])){
            echo '<span style="color: red;">Atleast one of them must be selected</span><br>';
        }
    }
?>