
<?php

$table_name=14;

$data_inserted=false;

if(isset($_POST["id"]) && isset($_POST["name"])  && isset($_POST["location"]) && isset($_POST["department"]) && isset($_POST["date"])  ){


 $id=$_POST["id"];
 $name=$_POST["name"];
 $location=$_POST["location"];
 $department=$_POST["department"];
 $date=$_POST["date"];


}



$server="localhost";
$username="root";
$password="";


$con=mysqli_connect($server,$username,$password);


    mysqli_query($con, "CREATE DATABASE if not exists wtl_exam");
    mysqli_query($con, "use wtl_exam");
    mysqli_query($con, "CREATE TABLE if not exists `$table_name`(id INT(5), name VARCHAR(100), location varchar(100), department varchar(100), date DATE   )");

if(!$con){
    die("connection failed!". mysqli_connect_error());

}


if (!empty($location) && !empty($id) && !empty($name) && !empty($department) && !empty($date)) {
$sql="INSERT INTO `$table_name` (`id`, `name`, `location`, `department`,`date`) VALUES ('$id', '$name', '$location', '$department','$date')";
  
  if( mysqli_query($con,$sql)){
      $data_inserted=true;

  }else{
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
    



<div class="container"  style="color: black !important;">  
    <form id="contact" action="14.php" method="post">
      <h3>Registration form</h3>
      <h4>Fill The Data</h4>
     
        <input name="id" placeholder="Company ID" type="text"  required autofocus>
    
        <input name="name" placeholder="Company Name" type="text"  required>
     
        <input name="location" placeholder="Location" type="text" required>
    
        <input name="department" placeholder="Department" type="text"  required>

        <input name="date" placeholder="Ex. 2022-06-08" type="text"  required>
    

        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
     
    <?php
    
    if($data_inserted){
    echo "<h2>DATA INSERTED</h2>";
    }
    ?>
    </form>



    <!-- <form id="contact" action="13.php" method="post">
      <h3>SEARCH BY CITY</h3>
     
        <input name="search" placeholder="ENTER CITY NAME..." type="text"  required autofocus>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Search</button>
     
    
    </form> -->

    
  </div>

  

  <h1>All Companies</h1>



          <?php


          $sql="SELECT * FROM `$table_name` WHERE `date` < '2022-06-08'";
          
        
            $rs=mysqli_query($con,$sql);
        
            $nrows=mysqli_num_rows($rs);
        
            if($nrows>0){
              while($row=mysqli_fetch_assoc($rs)){
              echo "
             <br> <ul><li> ID: {$row['id']} </li> <li> COMPANY NAME: {$row['name']} </li> <li>CITY: {$row['location']} </li> <li> DEPARTMENT: {$row['department']} </li>
             <li> DATE: {$row['date']} </li></ul> </br>"; 


              }
            }
        
          
          ?>
      



</body>
</html>