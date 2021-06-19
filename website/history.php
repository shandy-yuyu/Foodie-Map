<?php
  require_once dirname(__FILE__)."./db_conn.php";
  require_once dirname(__FILE__)."./head.php";
  require_once dirname(__FILE__)."./nav_bar.php";
?>
<head>
    <style>
        table{
            margin-left: auto;
            margin-right: auto;
        }
        tr th{
            font-weight:bold;
            align-items: center;
        }
        tr th, tr td{
            padding:5px;
        }
        th{
            border: 5px solid #C1DAD7;
        }
        td{
            border: 5px solid #C1DAD7;
        }
    </style>
<title>history</title>
<body>
<h2 style="color: black;text-align: center;">搜尋紀錄</h2>
<?php
  $conn = db_conn();
  $result = mysqli_query($conn, "SELECT distinct city, latitude, longitude  FROM history where userid=".$_COOKIE['id']);
?>
  
  <table>
  <tr>
      <th>城市</th>
      <th>緯度</th>
      <th>經度</th>
  </tr>
<?php
  $conn->close();
  for($i = 0; $i < $result->num_rows; $i += 1){
      $row = $result->fetch_assoc();
      echo '<tr>';
      echo '<td>'.$row['city'].'</td>';
      echo '<td>'.$row['latitude'].'</td>';
      echo '<td>'.$row['longitude'].'</td>';
      echo '<tr>';
  }
?>

