<?php
include('account.php');
//PHP FUNCTIONS

function redirect($targetfile){
    global $db;

    header("refresh: 0, url = $targetfile");

    exit();
}
    
function gatekeeper(){
    //check if authenticated
    if (!$_SESSION['logged']){
        echo"
        <script>
            alert(\"Not logged in...\");
            window.location.replace(\"/index.html\");
        </script>";
        exit();
    }
}

function authenticate($user, $pass){
    global $db_hostname;
    global $db_username;
    global $db_password;
    global $db_project;
    $dsn = "mysql:host=$db_hostname;dbname=$db_project";
    try {
        $db = new PDO($dsn, $db_username, $db_password);
        $sql = "SELECT * FROM users WHERE email='$user' AND pass='$pass'";
        $q = $db->prepare($sql);
        $q->execute();
        $results = $q->fetchAll();

        if($q->rowCount() > 0){
            return true;
        }else{
            return false;
        } 
        $q->closeCursor();


    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}

function submitRequest($user, $location, $area, $category, $description, $files){
    global $db_hostname;
    global $db_username;
    global $db_password;
    global $db_project;
    
    $dsn = "mysql:host=$db_hostname;dbname=$db_project";
    try {
        $db = new PDO($dsn, $db_username, $db_password);
        
        $sql = "SELECT * FROM requests";
        $q = $db->prepare($sql);
        $q->execute();
        $results = $q->fetchAll();

        $rows = $q->rowCount();
        
        $sql = "INSERT INTO requests(rid, user, location, area, category, description, files) VALUES ($rows + 1, '$user', '$location', '$area' '$category', '$description', '$files')";
        $q = $db->prepare($sql);
        
        echo"
        <script>
            alert(\"(".$rows+1."), $user, $location, $area, $category, $description, $files\");
        </script>";

        if($q->execute() === false){
            die('Error creating new request.');
        }
        
        $q->closeCursor();


    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}
    


?>