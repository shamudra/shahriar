<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <form method="post" action="">
        <fieldset style="width:300px; height: 100px;">
            <legend>DEGREE</legend>
            <input type="checkbox" name="ssc" value="ssc" /> SSC
            <input type="checkbox" name="hsc" value="hsc" /> HSC
            <input type="checkbox" name="bsc" value="bsc" /> BSc
            <input type="checkbox" name="msc" value="msc" /> MSc <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $checks = 0;
        if(isset($_POST['ssc'])){ $checks++;}
        if(isset($_POST['hsc'])){ $checks++;}
        if(isset($_POST['bsc'])){ $checks++;}
        if(isset($_POST['msc'])){ $checks++;}
        if($checks<2){
            echo '<span style="color: red;">Atleast two of them must be selected</span><br>';
        }
    }
?>