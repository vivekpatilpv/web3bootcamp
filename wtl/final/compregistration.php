<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
	Company ID : <input type="text" name="compid"><br><br>
	Company Name : <input type="text" name="compname"><br><br>
	Location : <input type="text" name="complocation"><br><br>
	Department : <input type="text" name="compdepartment"><br><br>
	Job Role : <input type="text" name="jobrole"><br><br>
	<input type="submit" name="submit">
</form>
<?php
$localhost = "localhost";
$user = "root";
$pass = "";
     
$c_id = $_REQUEST['compid'];
$c_name = $_REQUEST['compname'];
$c_location = $_REQUEST['complocation'];
$c_department = $_REQUEST['compdepartment'];
$c_jobrole = $_REQUEST['jobrole'];

$conn = mysqli_connect($localhost,$user,$pass);

if(!$conn){
	echo "Error!";
}else{
	echo "Connected  <br>";
}
$str= "create database CompanyNEW";
/*if(mysqli_query($conn,$str)){
	echo "db connected";
} else{
	echo "error not connectwe";
}*/

mysqli_select_db($conn,"CompanyNEW");

/*$createTable = "CREATE TABLE staffinfo(CompanyId int, CompanyName varchar(50),CompanyLocation varchar(30),Departmet varchar(30),Jobrole varchar(30))";
if(mysqli_query($conn,$createTable)){
echo "table created";
}else{
 	echo "Error";
 }*/

$insertTable = "INSERT INTO staffinfo(CompanyId , CompanyName,CompanyLocation, Departmet,Jobrole) VALUES('$c_id','$c_name','$c_location','$c_department','$c_jobrole')";

if(mysqli_query($conn,$insertTable)){
 	echo "data inserted";
}else{
 	echo "fuck";
}

$displayData = "SELECT *from staffinfo where Jobrole ='Manager'";
$data = mysqli_query($conn,$displayData);
while($row = mysqli_fetch_assoc($data)){
    echo "<br>" ." ".$row['CompanyId'] ." ".$row['CompanyName']." ".$row['CompanyLocation']." ".$row['Departmet']." ".$row['Jobrole'];
}
?>
</body>
</html>