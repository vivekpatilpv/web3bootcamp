<?php
$connection=mysqli_connect("localhost","root","");
if($connection)
{
    echo "connect";
} 
else {
    echo "could not connect";
}

mysqli_select_db($connection,"database1");
$fetch="select * from Table1";
$result1=mysqli_query($connection,$fetch);
$array=mysqli_fetch_assoc($result1);
echo json_encode($array);







// $result = mysql_query("SHOW COLUMNS FROM sometable");
// if (!$result) {
// echo 'Could not run query: ' . mysql_error();
// exit;
// }
// if (mysql_num_rows($result) > 0) {
// while ($row = mysql_fetch_assoc($result)) {
//     print_r($row);
// }
// }
?>