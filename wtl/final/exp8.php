<?php
require_once('configexp8.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		student info
	</title>
</head>
<body>

	<div>
		<?php
        if (isset($_POST["submit1"])) {
	    $str = $_POST["years"];
	    $str2=$_POST["class"];
	    
	    $sth = $db->prepare("SELECT * FROM stu WHERE year in (SELECT year FROM stu WHERE grade ='$str2')");

	    $sth->setFetchMode(PDO:: FETCH_OBJ);
	    $sth -> execute();
	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>rollno</th>
				<th>name</th>
				<th>department</th>
				<th>year</th>
				<th>grade</th>
			</tr>
			<tr>
				<td><?php echo $row->rollno; ?></td>
				<td><?php echo $row->name;?></td>
				<td><?php echo $row->department;?></td>
				<td><?php echo $row->year;?></td>
				<td><?php echo $row->grade;?></td>

			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}
    }
    
	?>

	</div>
    <form action="exp8.php" method="post">
    <label for="cars">years:</label>
  <select name="years">
    <option value="2021" >2021</option>
    <option value="2022" >2022</option>
    <option value="2023" >2023</option>
    <option value="2024" >2024</option>
  </select>
  <br><br>
  
</form>

<form method="post">

<input type="radio" id="firstclass" name="class" value="first class">
<label for="firstclass">first class</label><br>
<input type="radio" id="seondclass" name="class" value="second class">
<label for="seondclass">Second class</label><br>
<input type="radio" id="all" name="class" value="all">
<label for="all">ALL</label><br>
<input type="submit" name="submit1" value="display">

</form>
</body>
</html>