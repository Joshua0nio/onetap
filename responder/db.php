<?php
//this are variables for database connection
$servername = "sql312.epizy.com";
$username = "epiz_32045753";
$password = "HsJBYjdevR3ic";
$db = "epiz_32045753_onetap_db";


$conn = mysqli_connect($servername, $username, $password, $db);


if(!$conn){
    die("<script>alert('failed to connect')</script>");
}
?>