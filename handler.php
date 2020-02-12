<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

include('account.php');
include('functions.php');

$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);

$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);

if (!authenticate($user, $pass)){
    echo "<script>alert(\"Incorrect Credentials...\");</script>";
    redirect("index.html");
    die();
}

//Passed all checks
$_SESSION['user'] = $user;
$_SESSION['logged'] = true;

redirect('dashboard.php');
?>