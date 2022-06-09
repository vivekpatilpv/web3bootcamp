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
$insert="insert into Table1 values('SUSMIT','1','50')";
$result1=mysqli_query($connection,$insert);
if($result1)
{
    echo "inserted";
} 
else {
    echo "not inserted";
}
?>