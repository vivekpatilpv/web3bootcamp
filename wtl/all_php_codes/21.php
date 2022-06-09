<?php

$table_name = 21;

$data_inserted = false;

if (isset($_POST["id"]) && isset($_POST["name"])  && isset($_POST["genre"]) && isset($_POST["score"])) {


    $id = $_POST["id"];
    $name = $_POST["name"];
    $genre = $_POST["genre"];
    $score = ($_POST["score"]);
}



$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server, $username, $password);



mysqli_query($con, "CREATE DATABASE if not exists wtl_exam");
mysqli_query($con, "use wtl_exam");
mysqli_query($con, "CREATE TABLE if not exists `$table_name`(id INT(20), name VARCHAR(100), genre varchar(100), score INT(10))");

if (!$con) {
    die("connection failed!" . mysqli_connect_error());
}




if (!empty($genre) && !empty($id) && !empty($name) && !empty($score)) {
    $sql = "INSERT INTO `$table_name` (`id`, `name`, `genre`, `score`) VALUES ('$id', '$name', '$genre', '$score')";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>




    <div class="container" style="color: black !important;">
        <form id="contact" action="21.php" method="post">
            <h3>Registration form</h3>
            <h4>Fill The Data</h4>

            <input name="id" placeholder="Player ID" type="text" required autofocus>

            <input name="name" placeholder="Player Name" type="text" required>

            <input name="genre" placeholder="Player Genre" type="text" required>

            <input name="score" placeholder="Player score" type="text" required>




            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>

            <?php
            if ($data_inserted) {
                echo "<h2>DATA INSERTED</h2>";
            }
            ?>
        </form>



        <!-- <form id="contact" action="16.php" method="post">
      <h3>SEARCH BY CITY</h3>
     
        <input name="search" placeholder="ENTER CITY NAME..." type="text"  required autofocus>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Search</button>
     
    
    </form> -->


    </div>



    <h1>Highest Score</h1>



    <?php




    $sql = "SELECT `name` , `score`  FROM `$table_name` ORDER BY `score` DESC limit 1";



    $rs = mysqli_query($con, $sql);

    $nrows = mysqli_num_rows($rs);

    if ($nrows > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            echo "
 <br> <ul><li>NAME: {$row['name']} </li> <li>SCORE: {$row['score']} </li></ul> </br>";
        }
    }

    ?>




</body>

</html>