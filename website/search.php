<?php
    require_once dirname(__FILE__)."./db_conn.php";
    require_once dirname(__FILE__)."./head.php";
    require_once dirname(__FILE__)."./nav_bar.php";
?>


<?php
    require_once dirname(__FILE__)."./db_conn.php";

    $conn = db_conn();
    if($_GET['submit'] == 'add'){
        $query = [
            'city' => htmlspecialchars($_GET["city"]),
            'district' => htmlspecialchars($_GET["district"]),
            'lat1' => htmlspecialchars($_GET["lat1"]),
            'lat2' => htmlspecialchars($_GET["lat2"]),
            'lat3' => htmlspecialchars($_GET["lat3"]),
            'long1' => htmlspecialchars($_GET["long1"]),
            'long2' => htmlspecialchars($_GET["long2"]),
            'long3' => htmlspecialchars($_GET["long3"])
        ];
        if($query['lat1'] == "")  { $query['lat1'] = 'NULL';  }
        if($query['lat2'] == "")  { $query['lat2'] = 'NULL';  }
        if($query['lat3'] == "")  { $query['lat3'] = 'NULL';  }

        if($query['long1'] == "") {  $query['long1'] = 'NULL';  }
        if($query['long2'] == "") {  $query['long2'] = 'NULL';  }
        if($query['long3'] == "") {  $query['long3'] = 'NULL';  }

        if($query['lat1']=="" && $query['lat2']=="" && $query['lat3']=="" && $query['long1']=="" && $query['long2']=="" && $query['long3']==""){
          $sql = "SELECT FROM `restaurant` WHERE  $_COOKIE["rest_address"] like 'concat($query["district"],$_COOKIE["rest_address"])%'";
        }

        VALUES (\"".$query['rest_name']."\", \"".$query['rest_address']."\", ".$query['rest_lat'].", ".$query['rest_lon'].", ".$_COOKIE['id'].");";
        $result = mysqli_query($conn, $sql);

        
        $conn->close();
        if($result){
            header("Location: ./manage.php?message=新增成功");
        }
        else{
            header("Location: ./manage.php?message=新增失敗");
        }
    }
?>



<?php
    $userid = $_COOKIE['id'];
    $sql = "SELECT id, name, address, latitude, longitude FROM restaurant WHERE datasource = '$userid'";
    $conn = db_conn();
    $result = mysqli_query($conn, $sql);
    $conn->close();

    for($i = 0; $i < $result->num_rows; $i += 1){
        //fetch_assoc()
        $row = $result->fetch_assoc();
        echo '<tr>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['address'].'</td>';
        echo '<td>'.$row['latitude'].'</td>';
        echo '<td>'.$row['longitude'].'</td>';
        // echo '<td>'.$row['lowest_price'].'</td>';
        echo '<td>';
        ?>
        <form
        id="form2"
        method="get"
        action="./manage.php"       
        > 
        <button 
            name="del" 
            value="<?php echo $row['id']; ?>" 
            type="submit"
        ><b>刪除</b></button>
        </form>
        <?php	
        echo '</td>';
        echo '</tr>';
    }
?>

