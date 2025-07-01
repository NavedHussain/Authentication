<?php
// connection.php
$server   = "localhost";
$dbUser   = "root";
$dbPass   = "";
$database = "users";

$conn = mysqli_connect($server, $dbUser, $dbPass, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
