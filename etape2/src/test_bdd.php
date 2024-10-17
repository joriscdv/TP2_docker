<?php
$servername = "data";
$username = "user";
$password = "password";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS visits (count INT)");
$conn->query("INSERT INTO visits (count) VALUES (1)");

$result = $conn->query("SELECT SUM(count) AS total FROM visits");
$row = $result->fetch_assoc();
echo "Total visits: " . $row['total'];

$conn->close();
?>
