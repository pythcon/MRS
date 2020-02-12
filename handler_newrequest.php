<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

include('account.php');
include('functions.php');

$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);
$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_SPECIAL_CHARS);
$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
//IMPLEMENT FILES
$files="";

$user = $_SESSION['user'];

submitRequest($user, $location, $area, $category, $description, $files);

echo"
    <script>
        alert(\"Request Added.\");
        window.location.replace(\"/dashboard.php\");
    </script>";
?>