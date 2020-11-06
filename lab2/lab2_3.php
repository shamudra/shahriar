<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <form method="post" action="">
        <fieldset style="width:300px; height: 100px;">
            <legend>DATE OF BIRTH</legend>
            <label style="position:absolute; left:45px;" for="day">dd</label>
            <label style="position:absolute; left:110px;" for="month">mm</label>
            <label style="position:absolute; left:190px;" for="year">yyyy</label><br>
            <input style="width:50px;" type="text" id="day" name="day"> /
            <input style="width:50px;" type="text" id="month" name="month"> /
            <input style="width:75px;" type="text" id="year" name="year"> <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>
<?php
    if($_POST){
        $day = $_POST["day"]; 
        $month = $_POST["month"];
        $year = $_POST["year"];
        if($day == "" || $month == "" || $year == ""){
            echo '<span style="color: red;">Input cannot be empty</span><br>';
        }
        if(!(ctype_digit($day) && $day>=1 && $day<=31 && ctype_digit($month) && $month>=1 && $month<=12 && ctype_digit($year) && $year>=1953 && $year<=1998)){
            echo '<span style="color: red;">Input must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)</span><br>';
        }
        else{
            echo '<span style="color: green;">Successful</span><br>';
        }
    }
?>