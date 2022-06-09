<?php
$connection=mysqli_connect("localhost","root","");
if($connection)
{
    echo "connect";
} 
else {
    echo "could not connect";
}
$createdb="CREATE DATABASE database1";
$result=mysqli_query($connection,$createdb);
if($result)
{
    echo "create";
} 
else {
    echo "could not create";
}
?>