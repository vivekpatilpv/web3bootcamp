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
	Player ID : <input type="text" name="playerid"><br><br>
	Player Name : <input type="text" name="playername"><br><br>
	Gamegenre : <input type="text" name="genre"><br><br>
	Score : <input type="text" name="gscore"><br><br>
	<input type="submit" name="submit">
</form>
<?php
$localhost = "localhost";
$user = "root";
$pass = "";
     
$g_id = $_REQUEST['playerid'];
$g_name = $_REQUEST['playername'];
$g_genre = $_REQUEST['genre'];
$g_score = $_REQUEST['gscore'];

$conn = mysqli_connect($localhost,$user,$pass);
if(!$conn){
	echo "Error!";
}else{
	echo "Connected  <br>";
}

$str= "create database Sportsinfo";
/*if(mysqli_query($conn,$str)){
	echo "db connected";
} else{
	echo "error not connectwe";
}*/

mysqli_select_db($conn,"Sportsinfo");

/*$createTable = "CREATE TABLE playerinfo(PlayerId int, PlayerName varchar(50),Playergenre varchar(30),Score int)";
if(mysqli_query($conn,$createTable)){
echo "table created";
}else{
 	echo "Error";
 }*/
 $insertTable = "INSERT INTO playerinfo(PlayerId , PlayerName,Playergenre, Score) VALUES('$g_id','$g_name','$g_genre','$g_score')";

 if(mysqli_query($conn,$insertTable)){
      echo "data inserted";
 }else{
      echo "fuck";
 }

 $displayData = "SELECT * FROM playerinfo WHERE Score = (SELECT MAX(Score) FROM playerinfo);";
 $data = mysqli_query($conn,$displayData);
 while($row = mysqli_fetch_assoc($data)){
    echo "<br>" ." ".$row["PlayerId"] ." ".$row['PlayerName']." ".$row['Playergenre']." ".$row['Score'];
 }
?>
</body>
</html>