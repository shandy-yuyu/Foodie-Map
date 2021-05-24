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
  $sql = "SELECT id, email FROM userlis WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 0) {
    echo "帳號或密碼錯誤";
    header("Location: ./php_project_demo/views/login.php?error=帳號密碼錯誤");
  } else {
    $row = mysqli_fetch_assoc($result);
    echo "登入成功";
    $_SESSION['login'] = true;
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];
  header("Location: ./php_project_demo/views/blog.php"); //這邊要改成我們的介面
  }
}
function cheat_user() {
  setcookie('login', true, time()+1800);
  // setcookie('id', $row['id']);
  setcookie('id', SELECT id
                  FROM userlis U
                  where U.email = email);
  // setcookie('username', $row['username']);
  setcookie('email',  SELECT email
                      FROM userlis U
                      where U.email = email);
  setcookie('admin', SELECT admin
                     FROM userlis U
                     where U.email = email);
}
//沒有加useet是因為登出介面不在這裡 登出介面出來之後會在那邊加進去
