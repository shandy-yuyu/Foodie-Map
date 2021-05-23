<?php

  session_start();

  if (isset($_GET['delete']))
  {
    $query = ['name' => ($_GET["name"]), 'rate' => ($_GET["rate"])];
    $link  =mysqli_connect(“localhost","root","123″) or die(“無法連接".mysql_error());  // 建立MySQL的資料庫連結
    mysqli_select_db($link,"abc")or die (“無法選擇資料庫".mysql_error()); 
    mysqli_query($link, ‘SET CHARACTER SET utf8’);
    mysqli_query($link,  “SET collation_connection = ‘utf8_general_ci"");
    $sql ="DELETE FROM history WHERE name=".$_GET[name];
    mysqli_query($link,$sql)or die (“無法刪除".mysql_error());
    mysql_close($link);
    header( “location:index.php");
  }
​?>
