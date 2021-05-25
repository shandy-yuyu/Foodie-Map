<?php
require_once dirname(__FILE__)."./db_check.php";

session_start();
if (isset($_GET['submit'])){
  $query = [
    'email' => htmlspecialchars($_GET["email"]),
    'password' => htmlspecialchars($_GET["password"])
  ];
  $conn = db_check();
  checkData($query['email'], $query['password'], $conn);
}

function checkData($email, $password, $conn) {
  $sql = "SELECT id, email, admin FROM userlis WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 0) {
    echo "帳號或密碼錯誤";
    header("Location: ./login.php?error=帳號密碼錯誤");
  } 
  else {
    $row = mysqli_fetch_assoc($result);
    print_r($row);
    setcookie('login', true, time()+1800);
    setcookie('id', $row['id']);
    // setcookie('username', $row['username']);
    setcookie('email',  $row['email']);
    setcookie('admin', $row['admin']);
    header("Location: ./homepage.php"); 
  }
}
