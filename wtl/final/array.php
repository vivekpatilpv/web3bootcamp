<?php
/*$numbers = array( "nikita", 2, 3, "dhvani", 5);
echo "Numeric array";
sort($numbers);
rsort($numbers);
foreach( $numbers as $value ) {
    echo "Value is $value <br />";
 }

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "associative array <br>";
asort($age);
ksort($age);
arsort($age);
krsort($age);
foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";}*/

echo "multidimensional array <br>";
$carr = array(
	array("abc", 10,20),
	array("pqr",20,30 )
);

echo "reverse order";
array_multisort($carr, SORT_ASC, $array);
foreach($carr as $index => $data){
	foreach($data as $key => $val){
		echo $val ."<br>";
	}
}
?>