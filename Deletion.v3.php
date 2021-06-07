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



  // <?php
  // // 假定数据库用户名：root，密码：123456，数据库：RUNOOB
  // $con=mysqli_connect("localhost","root","123456","RUNOOB");
  // if (mysqli_connect_errno($con))
  // {
  //     echo "连接 MySQL 失败: " . mysqli_connect_error();
  // }
  //
  // // 执行查询
  // mysqli_query($con,"SELECT * FROM websites");
  // mysqli_query($con,"INSERT INTO websites (name, url, alexa, country)
  // VALUES ('百度','https://www.baidu.com/','4','CN')");
  //
  // mysqli_close($con);



  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $conn = db_conn();

  //$query = "SELECT userid, city FROM history";

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
