<?php
$conn= new mysqli('mysql-karolinazatylny.alwaysdata.net','217224','karolcia9','karolinazatylny_123');
if ($conn->connect_error) {
    die("connection failed: ".mysqli_connect_error());

}
?>