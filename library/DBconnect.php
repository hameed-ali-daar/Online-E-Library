<?php
$servername="localhost";
$user="root";
$password="";
$DBname="library";

$conn = mysqli_connect($servername, $user, $password, $DBname);
if (!$conn){
    die("connection failed". mysqli_connect_error());
}

$db_library = "CREATE DATABASE IF NOT EXISTS library";

$tbl_user = "CREATE TABLE IF NOT EXISTS tbl_user
(
    uid INT (50),
    username varchar (50),
    email varchar (50),
    password varchar (50),
    cpassword varchar (50)
)";
$tbl_admin = "CREATE TABLE IF NOT EXISTS tbl_admin
(
    aid INT (50),
    username varchar (50),
    email varchar (50),
    password varchar (50),
    cpassword varchar (50)
)";

$db = $conn->query($db_library);
$tbl2 = $conn->query($tbl_user);
$tbl3 = $conn->query($tbl_admin);

?>