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
?>

<body>
  <br />	<br />	<br />	<br />
  <tr><td align="center"><b><font size="80"><font face="細明體, Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deletion table</font></font></b></td></tr>
  <br />	<br />	<br />	<br />




</table>
<table width=”1000” border=”1”>

       <tr height=”50” align=”center”>

          <td width=”50”>Userid</td>

         <td width=”200”>City</td>

          <td width=”450”><button type="button">Delete</button> </strong></center></td>

       </tr>

<?php
  echo " <table width='500' height='120' border='1'>";
  for ($i=1; $i<=10; $i++)
  {
    echo "<tr>";
    for ($j=1; $j<=3; $j++)
    {
      echo "<td height='30'></td>";
    }
      echo "</tr>";
    }
?>


<?php
  $result = mysqli_query($conn, "SELECT userid, city FROM history");

  
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

