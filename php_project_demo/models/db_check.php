
<?php
function db_conn() {
$servername = "localhost";
$username = "root";
$password = "";
$database = "term_project";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
return $conn;
}
