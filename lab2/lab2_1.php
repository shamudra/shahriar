<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <form method="post" action="">
        <fieldset style="width:300px; height: 100px;">
            <legend>NAME</legend>
            <input type="text" id="name" name="name"> <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>
<?php
    if($_POST){
        $name = $_POST["name"];
        if($name == ""){
            echo '<span style="color: red;">Input cannot be empty</span><br>';
        }
        if(str_word_count($name)<2){
            echo '<span style="color: red;">Input must contain at least two words</span><br>';
        }
        $first = substr($name,0,1);
        if(!($first >= 'a' && $first <= 'z') && !($first >= 'A' && $first <= 'Z')){
            echo '<span style="color: red;">Input must start with a letter</span><br>';
        }
        if(preg_match('/[^A-Za-z. ]/', $name)){
            echo '<span style="color: red;">Input can contain a-z, A-Z, period, dash only</span><br>';
        }
        else{
            echo '<span style="color: green;">Successful</span><br>';
        }
    }
?>