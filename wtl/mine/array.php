<html>
<head>
<title>PHP ARRAY OPERATIONS</title>
</head>
<body>
<?php

	//demonstration of count function.
	echo "1) count():<br>";
	$games=array("Snake & Ladder","Ludo","Cricket","Hokey");
	$len=count($games);
	echo "<strong>Number of elements in array games = $len</strong><br>";
	for($i=0;$i<$len;$i++)
	{
		echo "<strong>".$games[$i]."</strong><br>";
	}
	
	//demonstration of count function.
	echo "<br>2) array_sum():<br>";
	$mks=array(78,56,89,65,90);
	$sum=array_sum($mks);
	echo "<strong>Sum of array elements = $sum</strong><br>";


    //demonstration of array_reverse function.
	echo "3) array_reverse():<br>";
	$cities=array("D"=>"Delhi","M"=>"Mumbai","N"=>"Nagpur");
	print_r($cities);
	echo "<br><strong>Reversed array:</strong> <br>";
	$rev=array_reverse($cities);
	print_r($rev);
	echo("<br><br>");
	
	//demonstration of shuffle function.
	echo "<br>4) shuffle():<br>";
	shuffle($cities);
	print_r($cities);

    //demonstration of sort function.
	echo "5) sort(): -> ascending order<br>";
	$nos=array(90,56,45,89,70);
	echo "Array nos before sorting:<br>";
	foreach($nos as $n)
		echo "<strong> $n &nbsp;&nbsp;</strong>";
	echo "<br>";
	echo "Array nos after sorting:<br>";
	sort($nos);
	foreach($nos as $n)
		echo "<strong> $n &nbsp;&nbsp;</strong>";
	echo "<br><br>";
	
	//demonstration of rsort function.
	echo "6) rsort(): -> descending order<br>";
	$nos1=array(10,90,20,56,45,30,70);
	echo "Array nos1 before sorting:<br>";
	foreach($nos1 as $n)
		echo "<strong> $n &nbsp;&nbsp;</strong>";
	echo "<br>";
	echo "Array nos1 after sorting:<br>";
	sort($nos1);
	foreach($nos1 as $n)
		echo "<strong> $n &nbsp;&nbsp;</strong>";



        //demonstration of current function.
	$players=array("Shilpa","Monica","Shruti","Pranav","Rakesh");
	echo "Array elements are: ";
	foreach($players as $p)
		echo $p."&nbsp;&nbsp;";
    
	echo "<br><br>7)reset():".reset($players)."<br>";
	echo "8)next():".next($players)."<br>";
	echo "9)end():".end($players)."<br>";
	echo "10)prev():".prev($players)."<br>";
	echo "11)current():".current($players)."<br>";
	echo "<br>12)each():<br>";
	print_r(each($players));

    //demonstration of array_unique function.
	echo "13) array_unique():<br>";
	$no=array(10,56,20,10,45,30,45);
	echo "original array:<br>";
	foreach($no as $m)
		echo "<strong>".$m."&nbsp;&nbsp;</strong>";
	$no1=array_unique($no);
	echo "<br>unique array:<br>";
	foreach($no1 as $m)
		echo "<strong>".$m."&nbsp;&nbsp;</strong>";
		
	//demonstration of array_merge function.
	echo "<br><br>14) array_merge():<br>";
	$fruits=array("A"=>"Apple","M"=>"Mango","O"=>"Orange");
	$flowers=array("R"=>"Rose","M"=>"Mogra","H"=>"Hibiscus");
	echo "original fruits array:<br>";
	foreach($fruits as $f)
		echo "<strong>".$f."&nbsp;&nbsp;</strong>";
	echo "<br>original flowers array:<br>";
	foreach($flowers as $f)
		echo "<strong>".$f."&nbsp;&nbsp;</strong>";
	$res=array_merge($fruits,$flowers);
	echo "<br>resultant array:<br>";
	foreach($res as $f)
		echo "<strong>".$f."&nbsp;&nbsp;</strong>";

        //demonstration of array_pop function.
	echo "15) array_pop():<br>";
	$fruits=array("A"=>"Apple","M"=>"Mango","O"=>"Orange");
	echo "Original fruits array<br>";
	foreach($fruits as $g)
		echo "<strong>".$g."&nbsp;&nbsp;</strong>";
	array_pop($fruits);
	echo "<br>Changed fruits array ('Orange' deleted)<br>";
	foreach($fruits as $g)
		echo "<strong>".$g."&nbsp;&nbsp;</strong>";
		
	//demonstration of array_push function.
	echo "<br><br>16) array_push():<br>";
	$fruits1=array("A"=>"Apple","M"=>"Mango","O"=>"Orange");
	echo "Original fruits1 array<br>";
	foreach($fruits1 as $g)
		echo "<strong>".$g."&nbsp;&nbsp;</strong>";
	array_push($fruits1,"Guava","Papaya","Banana");
	echo "<br>Changed fruits array (3 values added)<br>";
	foreach($fruits1 as $g)
		echo "<strong>".$g."&nbsp;&nbsp;</strong>";
	echo "<br>Array repesentation:<br>";
	print_r($fruits1);
?>
</body>
</html>