<?php

$table_name = 25;

$data_inserted = false;

if (isset($_POST["visited"]) && isset($_POST["name"])  && isset($_POST["domain"])) {


    $visited = $_POST["visited"];
    $name = $_POST["name"];
    $domain = $_POST["domain"];
}



$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server, $username, $password);



mysqli_query($con, "CREATE DATABASE if not exists wtl_exam");
mysqli_query($con, "use wtl_exam");
mysqli_query($con, "CREATE TABLE if not exists `$table_name`(visited DATE, name varchar(100), domain VARCHAR(100))");

if (!$con) {
    die("connection failed!" . mysqli_connect_error());
}




if (!empty($visited) && !empty($name) && !empty($domain)) {
    $sql = "INSERT INTO `$table_name` (`visited`, `name`, `domain`) VALUES ('$visited', '$name', '$domain')";

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
        <form id="contact" action="25.php" method="post">
            <h3>Registration form</h3>
            <h4>Fill The Data</h4>

            <input name="visited" placeholder="Date Visited" type="text" required autofocus>

            <input name="name" placeholder="Company Name" type="text" required>

            <input name="domain" placeholder="Company Domain" type="text" required>




            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>

            <?php
            if ($data_inserted) {
                echo "<h2>DATA INSERTED</h2>";
            }
            ?>
        </form>



        


    </div>



    <h1>All Products</h1>



    <?php
   
   

    

        $sql_search = "SELECT `visited`,UPPER(`name`) AS `name`,UPPER(`domain`) AS `domain` FROM `$table_name`";



        $rs = mysqli_query($con, $sql_search);

        $nrows = mysqli_num_rows($rs);

        if ($nrows > 0) {
            while ($row = mysqli_fetch_assoc($rs)) {
                echo "
             <br> <ul><li> VISITED: {$row['visited']}<li> COMPANY NAME: {$row['name']} </li>  <li> COMPANY DOMAIN: {$row['domain']} </li></ul> </br>";
            }
        }
    



    

    ?>




</body>

</html>