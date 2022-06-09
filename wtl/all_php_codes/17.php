<?php

$table_name = 16;

$data_inserted = false;

if (isset($_POST["id"]) && isset($_POST["name"])  && isset($_POST["quantity"])) {


    $id = $_POST["id"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
}



$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server, $username, $password);



mysqli_query($con, "CREATE DATABASE if not exists wtl_exam");
mysqli_query($con, "use wtl_exam");
mysqli_query($con, "CREATE TABLE if not exists `$table_name`(id INT(5), name VARCHAR(100), quantity INT(10))");

if (!$con) {
    die("connection failed!" . mysqli_connect_error());
}




if (!empty($quantity) && !empty($id) && !empty($name)) {
    $sql = "INSERT INTO `$table_name` (`id`, `name`, `quantity`) VALUES ('$id', '$name', '$quantity')";

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
        <form id="contact" action="17.php" method="post">
            <h3>Registration form</h3>
            <h4>Fill The Data</h4>

            <input name="id" placeholder="Item ID" type="text" required autofocus>

            <input name="name" placeholder="Item Name" type="text" required>

            <input name="quantity" placeholder="Item Quantity" type="text" required>




            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>

            <?php
            if ($data_inserted) {
                echo "<h2>DATA INSERTED</h2>";
            }
            ?>
        </form>



        <form id="contact" action="17.php" method="post">
      <h3>DELETE ITEM</h3>
     
        <input name="search" placeholder="ENTER ITEM NAME" type="text"  required autofocus>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">DELETE</button>
     
    </form>


    </div>



    <h1>All Products</h1>



    <?php
   
   
   if(isset($_POST['search'])){

    $search=$_POST['search'];

    $sql_delete="DELETE FROM `$table_name` WHERE `name`='$search'";

    mysqli_query($con, $sql_delete);
}
    

        $sql_search = "SELECT * FROM `$table_name`";



        $rs = mysqli_query($con, $sql_search);

        $nrows = mysqli_num_rows($rs);

        if ($nrows > 0) {
            while ($row = mysqli_fetch_assoc($rs)) {
                echo "
             <br> <ul><li> ID: {$row['id']} </li> <li> Item NAME: {$row['name']} </li>  <li> ITEM QUANTITY: {$row['quantity']} </li></ul> </br>";
            }
        }
    



    

    ?>




</body>

</html>