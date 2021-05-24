<?php
require_once dirname(__FILE__)."./db_check.php";

$query = [
  'email' => htmlspecialchars($_GET["email"]),
  'admin' => htmlspecialchars($_GET["admin"]),
  'password'=> htmlspecialchars($_GET["password"])
];
$conn = db_check();
insertData($query['email'], $query['password'], $query['admin'], $conn);

function insertData($email, $password, $admin, $conn) {
  $email_sql = "SELECT id FROM userlis WHERE email = '$email'";
  $email_result = mysqli_query($conn, $email_sql);
  if(mysqli_num_rows($email_result) > 0) {
    echo "該email已註冊過";
    echo '<br>';
  }
  if(mysqli_num_rows($email_result) === 0 ) {
    $sql = "INSERT INTO userlis (email, password, admin)
    VALUES ('$email', '$password', '$admin')";
    if (mysqli_query($conn, $sql)) {
      echo "資料新增成功";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
$conn->close();
