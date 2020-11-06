<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <form method="post" action="">
        <fieldset style="width:300px; height: 100px;">
            <legend>BLOOD GROUP</legend>
            <select name="bgroup" id="bgroup">
                <option value="">Select</option>
                <option value="op">O+</option>
                <option value="on">O-</option>
                <option value="ap">A+</option>
                <option value="an">A-</option>
                <option value="bp">B+</option>
                <option value="bn">O+</option>
                <option value="abp">AB+</option>
                <option value="abn">AB-</option>
            </select> <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //$gender = $_POST["gender"];
        if($_POST['bgroup']==""){
            echo '<span style="color: red;">Blood group must be selected</span><br>';
        }
    }
?>