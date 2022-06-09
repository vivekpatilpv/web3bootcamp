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
	Student RollNO : <input type="text" name="studentRollNo"><br><br>
	Student Name : <input type="text" name="studentName"><br><br>
	Student contact : <input type="text" name="studentContact"><br><br>
	Student class : <input type="text" name="Class"><br><br>
	Mentor Name : <input type="text" name="Mentor"><br><br>
    Issues Discussed : <input type="text" name="Issues"><br><br>
	<input type="submit" name="submit">
</form>
<?php
$localhost = "localhost";
$user = "root";
$pass = "";

$roll_no = $_REQUEST['studentRollNo'];
$s_name = $_REQUEST['studentName'];
$s_contact = $_REQUEST['studentContact'];
$s_class = $_REQUEST['Class'];
$s_mentor = $_REQUEST['Mentor'];
$s_issues = $_REQUEST['Issues'];

//echo $roll_no ." ". $s_name." " .$s_contact." " .$s_class." " .$s_mentor." ".$s_issues;

$conn = mysqli_connect($localhost,$user,$pass);

/*if(!$conn){
	echo "Error!";
}else{
	echo "Connected  <br>";
}

$str= "create database Studentdata";
if(mysqli_query($conn,$str)){
	echo "db connected";
} else{
	echo "error not connectwe";
}*/

mysqli_select_db($conn,"Studentdata");

/*$createTable = "CREATE TABLE student(studentRoll int, studentName varchar(50),contactNo int,Class varchar(8),mentors varchar(50),issues varchar(50))";
if(mysqli_query($conn,$createTable)){
echo "table created";
}else{
 	echo "Error";
 }*/

 $insertTable = "INSERT INTO student(studentRoll , studentName,contactNo, Class,mentors,issues) VALUES('$roll_no','$s_name','$s_contact','$s_class','$s_mentor','$s_issues')";

  if(mysqli_query($conn,$insertTable)){
  	echo "data inserted";
    setcookie('issue',"1",time()+3600);
    echo "<br>cookie set";
  }else{
  	echo "fuck";
  }
  if(isset($_COOKIE['issue'])){
	 $select = "SELECT *FROM student";
	 $result = mysqli_query($conn,$select);
	 while($row = mysqli_fetch_assoc($result)){
		 echo "<br>" ." ".$row['studentRoll'] ." ".$row['studentName']." ".$row['contactNo']." ".$row['Class']." ".$row['mentors']." ".$row['issues'];
	}
}else{
	echo "cookie not set";
}
?>
</body>
</html>