
<?php
  if(isset($_GET['message']))
  {
    $sql = "DELETE FROM history WHERE id = ".$_GET['submit'];
    echo $sql;
    $conn = db_conn();
    $result = mysqli_query($conn, $sql);

    if ($result)
    {
      header("Location: ./manage.php?message = Data has been deleted from history")
    }

    else
    {
      header("Location: ./manage.php?message = Fail to delete data from history")
    }

  }

?>



<?php

  $userid = $_COOKIE['id']
  $sql = "SELECT name, city FROM restaurant WHERE datasource = '$userid' ";
  $conn = db_conn();
  $result = mysqli_query($conn, $sql);
  $conn-> close;

  for($i = 0; $i < $result->num_rows; $i =$i + 1)
  {
    $row = $result->fetch_assoc()
    echo'<tr>'
    echo'<td>'.$row['name']'</td>';
    echo'<td>'.$row['city']'</td>';
    echo'<td>'


    <form
    id = "form"
    method = "get"
    action = "./manage.php"
    >

    <button
      name = "submit"
      value = "<?php echo $row['id']; ?>"
      type = "submit"
    ><b>Delete</b></button>
    </form>
    echo '</td>'
    echo '</tr>'

  }

?>



<?php

  if(isset($_GET['message']))
  {
    echo"<script> alert (\"".$_GET[.'message']."\") <script>";
    $_GET['message'] = "";
  }

?>
