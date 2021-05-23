<?php
require_once dirname(__FILE__)."/db_check.php";

session_start();
if (isset($_GET['submit'])){
  $query = [
    'email' => htmlspecialchars($_GET["email"]),
    'password' => htmlspecialchars($_GET["password"])
  ];
  $conn = db_check();
  checkData($query['email'], md5($query['password'], false), $conn);
}

function checkData($email, $password, $conn) {
  $sql = "SELECT id, email FROM userlis WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 0) {
    echo "帳號或密碼錯誤";
    header("Location: /php_project_demo/views/login.php?error=帳號密碼錯誤");
  } else {
    $row = mysqli_fetch_assoc($result);
    echo "登入成功";
    $_SESSION['login'] = true;
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];
    header("Location: /php_project_demo/views/blog.php");
  }
}
