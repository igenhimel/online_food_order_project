<?php
session_start();
$host="localhost";
$user="root";
$password="";
$databasename="food_order";

$connect=mysqli_connect($host,$user,$password);

$m=mysqli_select_db($connect,$databasename);

if($m){
    echo "";
}

else{
    echo "Not connected";
}







?>
