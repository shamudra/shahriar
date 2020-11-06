<?php

    $name_message="";
    $email_message="";
    $dob_message="";
    $gender_message="";
    $degree_message="";
    $bgroup_message="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST["name"])){
            $name_message="";
            $name = $_POST["name"];
            if($name == ""){
                $name_message .= '<span style="color: red;">Name cannot be empty</span><br>';
            }
            if(str_word_count($name)<2){
                $name_message .= '<span style="color: red;">Name must contain at least two words</span><br>';
            }
            $first = substr($name,0,1);
            if(!($first >= 'a' && $first <= 'z') && !($first >= 'A' && $first <= 'Z')){
                $name_message .= '<span style="color: red;">Name must start with a letter</span><br>';
            }
            if(preg_match('/[^A-Za-z. ]/', $name)){
                $name_message .= '<span style="color: red;">Name can contain a-z, A-Z, period, dash only</span><br>';
            }
            if($name_message==""){
                $name_message .= '<span style="color: green;">Successful</span><br>';
            }

        }
        if(isset($_POST["email"])){
            $email_message="";
            $email = $_POST["email"];
            if($email == ""){
                $email_message .= '<span style="color: red;">Email cannot be empty</span><br>';
            }
            if(!preg_match("/^([a-z0-9\+_\-]+)@([a-z0-9\-]+\.)+com$/i", $email)){
                $email_message .= '<span style="color: red;">Email must be in a valid format: anything@example.com</span><br>';
            }
            if($email_message==""){
                $email_message .= '<span style="color: green;">Successful</span><br>';
            }
        }
        if(isset($_POST["day"]) || isset($_POST["month"]) || isset($_POST["year"])){
            $dob_message="";
            $day = $_POST["day"]; 
            $month = $_POST["month"];
            $year = $_POST["year"];
            if($day == "" || $month == "" || $year == ""){
                $dob_message .= '<span style="color: red;">Day, month or year cannot be empty</span><br>';
            }
            if(!(ctype_digit($day) && $day>=1 && $day<=31 && ctype_digit($month) && $month>=1 && $month<=12 && ctype_digit($year) && $year>=1953 && $year<=1998)){
                $dob_message .= '<span style="color: red;">Day, month and year must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)</span><br>';
            }
            if($dob_message==""){
                $dob_message .= '<span style="color: green;">Successful</span><br>';
            }
        }
        if(isset($_POST["gen"])){
            $gender_message="";
            if(!isset($_POST["gender"])){
                $gender_message .= '<span style="color: red;">Atleast one of them must be selected</span><br>';
            }
            if($gender_message==""){
                $gender_message .= '<span style="color: green;">Successful</span><br>';
            }
        }
        if(isset($_POST["deg"])){
            $degree_message="";
            $checks = 0;
            if(isset($_POST['ssc'])){ $checks++;}
            if(isset($_POST['hsc'])){ $checks++;}
            if(isset($_POST['bsc'])){ $checks++;}
            if(isset($_POST['msc'])){ $checks++;}
            if($checks<2){
                $degree_message .= '<span style="color: red;">Atleast two of them must be selected</span><br>';
            }
            if($degree_message==""){
                $degree_message .= '<span style="color: green;">Successful</span><br>';
            }
        }
        if(isset($_POST["bgroup"])){
            $bgroup_message="";
            if($_POST['bgroup']==""){
                $bgroup_message .= '<span style="color: red;">Blood group must be selected</span><br>';
            }
            if($bgroup_message==""){
                $bgroup_message .= '<span style="color: green;">Successful</span><br>';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <table>
        
        <tr>
            <td>
                <form method="post" action="">
                    <fieldset style="width:300px; height: 100px;">
                        <legend>NAME</legend>
                        <input type="text" id="name" name="name"> <hr>
                        <input type="submit" value="Submit">
                    </fieldset>
                </form>
            </td>
            <td id="name"><?php echo $name_message; ?></td>
        </tr>

        <tr>
            <td>
                <form method="post" action="">
                    <fieldset style="width:300px; height: 100px;">
                        <legend>EMAIL</legend>
                        <input type="text" id="email" name="email"><span style="font-weight:bold; font-size: large;"> i</span> <hr>
                        <input type="submit" value="Submit">
                    </fieldset>
                </form>
            </td>
            <td id="email"><?php echo $email_message; ?></td>
        </tr>

        <tr>
            <td>
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
            </td>
            <td id="dob"><?php echo $dob_message; ?></td>
        </tr>

        <tr>
            <td>
                <form method="post" action="">
                    <fieldset style="width:300px; height: 100px;">
                        <legend>GENDER</legend>
                        <input type="hidden" id="gen" name="gen">
                        <label class="radio-inline"><input type="radio" name="gender">Male</label>
                        <label class="radio-inline"><input type="radio" name="gender">Female</label>
                        <label class="radio-inline"><input type="radio" name="gender">Other</label> <hr>
                        <input type="submit" value="Submit">
                    </fieldset>
                </form>
            </td>
            <td id="gender"><?php echo $gender_message; ?></td>
        </tr>

        <tr>
            <td>
                <form method="post" action="">
                    <fieldset style="width:300px; height: 100px;">
                        <legend>DEGREE</legend>
                        <input type="hidden" id="deg" name="deg">
                        <input type="checkbox" name="ssc" value="ssc" /> SSC
                        <input type="checkbox" name="hsc" value="hsc" /> HSC
                        <input type="checkbox" name="bsc" value="bsc" /> BSc
                        <input type="checkbox" name="msc" value="msc" /> MSc <hr>
                        <input type="submit" value="Submit">
                    </fieldset>
                </form>
            </td>
            <td id="degree"><?php echo $degree_message; ?></td>
        </tr>

        <tr>
            <td>
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
            </td>
            <td id="bgroup"><?php echo $bgroup_message; ?></td>
        </tr>

</body>
</html>