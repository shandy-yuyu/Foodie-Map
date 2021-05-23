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
function cheat_user() {
  setcookie('login', true, time()+1800);
  // setcookie('id', $row['id']);
  setcookie('id', 2);
  // setcookie('username', $row['username']);
  setcookie('email', "alan@gmail.com");
  setcookie('admin', 1);
}