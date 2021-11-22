<?php
function getDB() {
$dbhost="localhost";
$dbuser="vikaslo_usr";
$dbpass="EBDQacwWn9x2knr";
$dbname="vikaslo_fitnessity_co_db";
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}

/* User Sessions */
//session_start();
//$session_user_id=$_SESSION['user_id']; 
//$session_user_id = 1;
?>
