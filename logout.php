<?php

session_start();

setcookie('user_id', $_SESSION['user_id'], 60);

unset($_SESSION['user_id']);

header('location:index.php');

die();
