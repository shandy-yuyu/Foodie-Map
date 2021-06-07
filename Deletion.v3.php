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




  if(isset($_GET['message']))
  {
    $sql = "DELETE FROM history WHERE userid = ".$_GET['submit'];
    echo $sql;
    $conn = db_conn();
    $result = mysqli_query($conn, $sql);

    if ($result)
    {
      header("Location: ./manage.php?message = Data has been deleted from history");
    }

    else
    {
      header("Location: ./manage.php?message = Fail to delete data from history");
    }

  }






  setcookie('id', '2');
  $userid = $_COOKIE['id'];
  $sql = "SELECT city FROM history WHERE userid = '$userid' ";
  $conn = db_conn();
  $result = mysqli_query($conn, $sql);
  $conn-> close();



  



  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $conn = db_conn();

  

  $result = mysqli_query($conn, "SELECT userid, city FROM history");

  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($result))
  {
    printf("%s (%s)\n", $row["userid"], $row["city"]);
  }


  if(isset($_GET['message']))
  {
    echo "<script> alert(\"".$_GET['message']."\") </script>";
    $_GET['message'] = "";
  }

?>
