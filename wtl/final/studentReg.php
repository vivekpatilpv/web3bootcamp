<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Reg</title>
</head>
<body>
<form method="POST">
	Student ID : <input type="text" name="studentID"><br>
	Student Name : <input type="text" name="studentName"><br>
	Student Email : <input type="text" name="studentEmail"><br>
	12th Marks : <input type="text" name="marks"><br>
	JEE Marks : <input type="text" name="jeeScore"><br>
	<input type="submit" name="submit">
</form>

<?php 
$s_id = $s_name = $s_email = $s_hsc = $s_jee = "";


$localhost = "localhost";
$user = "root";
$pass = "";

$id = $_REQUEST['studentID'];
$s_name = $_REQUEST['studentName'];
$s_email = $_REQUEST['studentEmail'];
$s_hsc = $_REQUEST['marks'];
$s_jee = $_REQUEST['jeeScore'];

 echo $id . $s_name .$s_email .$s_hsc .$s_jee;


$conn = mysqli_connect($localhost,$user,$pass);

if(!$conn){
	echo "Error!";
}else{
	echo "Connected  <br>";
}
$str= "create database companyReg";
if(mysqli_query($conn,$str)){
	echo "db connected";
} else{
	echo "error not connectwe"
}

mysqli_select_db($conn,"companyReg");

$createTable = "CREATE TABLE student(studentId int, studentName varchar(50),emailId varchar(30),grade12 int,jeeScore int)";
if(mysqli_query($conn,$createTable)){
echo "table created";
}else{
 	echo "Error";
 }

// $insertTable = "INSERT INTO student(studentId , studentName,emailId, grade12,jeeScore) VALUES('$id','$s_name','$s_email','$s_hsc','$s_jee')";

// if(mysqli_query($conn,$insertTable)){
// 	echo "data inserted";
// }else{
// 	echo "fuck";
// }
$fetchData = "select *from student limit 2";
$data = mysqli_query($conn,$fetchData);

while($row = mysqli_fetch_assoc($data)){
	echo $row['jeeScore'] ."=>" .$row['studentName'] ."<br>";
}

?>
</body>
</html>