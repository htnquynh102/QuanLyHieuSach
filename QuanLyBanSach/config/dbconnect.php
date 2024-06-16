<?php
$server = "localhost:3306";
$user = "root";
$password = "Nhuquynh123@";
$db = "quanlybansach";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}
?>