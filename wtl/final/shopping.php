<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
<form method="POST">
    Item ID : <input type="text" name="itemid"><br><br>
	Item Name : <input type="text" name="itemName"><br><br>
	Item Quantity : <input type="text" name="itemquantity"><br><br>
    Item to be deleted : <input type="text" name="itemdelete"><br><br>
	<input type="submit" name="submit">
</form>

<?php
$localhost = "localhost";
$user = "root";
$pass = "";

$item_id = $_REQUEST['itemid'];
$item_name = $_REQUEST['itemName'];
$item_quantity = $_REQUEST['itemquantity'];
$item_delete = $_REQUEST['itemdelete'];

$conn = mysqli_connect($localhost,$user,$pass);
/*if(!$conn){
	echo "Error!";
}else{
	echo "Connected  <br>";
}*/

/*$str= "create database Shopping";
if(mysqli_query($conn,$str)){
	echo "db connected";
} else{
	echo "error not connectwe";
}*/

mysqli_select_db($conn,"Shopping");

/*$createTable = "CREATE TABLE ItemsInfo(ItemID int, ItemName varchar(50),ItemQuantity int)";
if(mysqli_query($conn,$createTable)){
echo "table created";
}else{
 	echo "Error";
 }*/

$insertTable = "INSERT INTO ItemsInfo(ItemID , ItemName,ItemQuantity) VALUES('$item_id','$item_name','$item_quantity')";

if(mysqli_query($conn,$insertTable)){
    echo "data inserted";
}else{
    echo "fuck";
}
$delete= "DELETE FROM ItemsInfo WHERE ItemID=$item_delete";
$result1= mysqli_query($conn,$delete);
$select = "SELECT *FROM ItemsInfo";
$result = mysqli_query($conn,$select);
while($row = mysqli_fetch_assoc($result)){
    echo "<br>" ." ".$row['ItemID'] ." ".$row['ItemName']." ".$row['ItemQuantity'];
}


?>
</body>
</html>