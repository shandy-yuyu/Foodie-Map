<?php
require_once dirname(__FILE__)."./db_check.php";

function insertData($email, $password, $pwc, $admin, $conn) {
  $email_sql = "SELECT id FROM userlis WHERE email = '$email'";
  $email_result = mysqli_query($conn, $email_sql);
  if(mysqli_num_rows($email_result) > 0) {
    header("Location: ./registration.php?error=該email已註冊過");
  }
  if($password !== $pwc){
    header("Location: ./registration.php?error=兩次密碼不符");
  }
  // if($admin != "0" && $admin != "1"){
  //   header("Location: ./registration.php?error=admin必須是 0 或是 1");
  // }
  if(mysqli_num_rows($email_result) === 0 ) {
    $sql = "INSERT INTO userlis (email, password, admin)
    VALUES ('$email', '$password', '$admin')";
    if (mysqli_query($conn, $sql)) {
      
      header("Location: ./registration.php?success=註冊成功");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$query = [
  'email' => htmlspecialchars($_GET["email"]),
  'admin' => htmlspecialchars($_GET["admin"]),
  'password'=> htmlspecialchars($_GET["password"]),
  'pwc'=> htmlspecialchars($_GET["passwordConfirm"])

];
print_r($query);
$conn = db_check();
insertData($query['email'], $query['password'], $query['pwc'], $query['admin'], $conn);

$conn->close();
