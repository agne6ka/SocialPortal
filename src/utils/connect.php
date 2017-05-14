<?php
/**
 *  Connect to database
 */
require_once "../config/database.php";

$conn = new mysqli($serverName, $userName, $password, $baseName);

if ($conn->connect_error){
    die('Connection unsuccessful ERROR: ' . $conn->connect_error);
}
