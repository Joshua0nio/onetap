<?php
//this are variables for database connection
$servername = "localhost";
$username = "root";
$password = '';
$db = "epiz_32045753_onetap_db";


$conn = mysqli_connect($servername, $username, $password, $db);


if (!$conn) {
    die("<script>alert('failed to connect')</script>");
}
