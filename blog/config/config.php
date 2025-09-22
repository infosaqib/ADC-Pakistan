<?php
$servername = "localhost";
$username = "u311137911_wasimakram"; 
$password = "Gn5^8Fboe"; 
$dbname = "u311137911_armydogpk_db";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}