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

$createTable="CREATE TABLE Table1 (
  name varchar(30) not null,
  rollno int,
  marks int)";

$result1=mysqli_query($connection,$createTable);
if($result1)
{
    echo "created table";
} 
else {
    echo "could not create table";
}
?>