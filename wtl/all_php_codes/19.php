<?php

$table_name = 19;

$data_inserted = false;

if (isset($_POST["roll"]) && isset($_POST["name"])  && isset($_POST["year"]) && isset($_POST["department"]) && isset($_POST["grades"])) {


    $roll = $_POST["roll"];
    $name = $_POST["name"];
    $year = $_POST["year"];
    $department = $_POST["department"];
    $grades = $_POST["grades"];

    
}



$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server, $username, $password);


mysqli_query($con, "CREATE DATABASE if not exists wtl_exam");
mysqli_query($con, "use wtl_exam");
mysqli_query($con, "CREATE TABLE if not exists `$table_name`(roll INT(20), name VARCHAR(100), year varchar(100), department varchar(100) ,grades varchar(10))");

if (!$con) {
    die("connection failed!" . mysqli_connect_error());
}


if (!empty($year) && !empty($roll) && !empty($name) && !empty($department) && !empty($grades)) {
    $sql = "INSERT INTO `$table_name` (`roll`, `name`, `year`, `department`,`grades`) VALUES ('$roll', '$name', '$year', '$department','$grades')";

    if (mysqli_query($con, $sql)) {
        $data_inserted = true;
    } else {
        echo "ERROR: $con->error";
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wrollth=device-wrollth, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>




    <div class="container" style="color: black !important;">
        <form id="contact" roll="contact" action="19.php" method="post">
            <h3>Registration form</h3>
            <h4>Fill The Data</h4>

            <input name="roll" placeholder="Roll Number" type="text" required autofocus>

            <input name="name" placeholder="Name" type="text" required>

            <input name="year" placeholder="year" type="text" required>

            <input name="department" placeholder="Department" type="text" required>


            <div class="radio_pack">
            <input type="radio" id="radio1" name="grades" value="first" checked>

<label for="radio1">First</label>

<input type="radio" id="radio2" name="grades" value="second" >

<label for="radio2">Second</label>

<input type="radio" id="radio3" name="grades" value="pass" >

<label for="radio3">Pass</label>

            </div>
            


            <button name="submit" type="submit" roll="contact-submit" data-submit="...Sending">Submit</button>

            <?php

            if ($data_inserted) {
                echo "<h2>DATA INSERTED</h2>";
            }
            ?>
        </form>



        <form  id="contact" roll="contact" action="19.php" method="post">
      <h3>SEARCH STUDENT DATA</h3>


      <input id="year" name="year_search" type="number" min="1900" max="2099" step="1" value="2016" />


      <div class="radio_pack">

      <input type="radio" id="radio1" name="grades_search" value="first" checked>

<label for="radio1">First</label>

<input type="radio" id="radio2" name="grades_search" value="second" >

<label for="radio2">Second</label>

<input type="radio" id="radio3" name="grades_search" value="pass" >

<label for="radio3">Pass</label>
      </div>
       
   

        <button name="submit" type="submit" roll="contact-submit" data-submit="...Sending">Search</button>
     
    
    </form>


    </div>



    <h1>ALL STUDENTS</h1>


     <?php


if(isset($_POST['year_search']) && isset($_POST['grades_search'])){

    $year=$_POST['year_search'];
    $grades=$_POST['grades_search'];



    $sql_search="SELECT * FROM `$table_name` WHERE `year`='$year' and `grades`='$grades'";

    $rs= mysqli_query($con, $sql_search);

    $nrows = mysqli_num_rows($rs);

    if ($nrows > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            echo "
             <br> <ul><li> roll: {$row['roll']} </li> <li> COMPANY NAME: {$row['name']} </li> <li>CITY: {$row['year']} </li> <li> DEPARTMENT: {$row['department']} </li>
             <li> grades: {$row['grades']} </li></ul> </br>";
        }
    }

    }
    ?> 




</body>

</html>