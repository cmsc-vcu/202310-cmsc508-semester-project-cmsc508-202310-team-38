<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "cmsc508.com";
$username = "team38";
$password = "Shout4_team38_GOTEAM";
$database = "CMSC508_team38";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

