<?php
    require_once dirname(__FILE__)."./db_conn.php";

    $conn = db_conn();
    if($_GET['submit'] == 'add'){
        $query = [
            'rest_name' => htmlspecialchars($_GET["rest_name"]),
            'rest_address' => htmlspecialchars($_GET["rest_address"]),
            'rest_lat' => htmlspecialchars($_GET["rest_lat"]),
            'rest_lon' => htmlspecialchars($_GET["rest_lon"])
        ];
        if($query['rest_lat'] == ""){
            $query['rest_lat'] = 'NULL';
        }
        if($query['rest_lon'] == ""){
            $query['rest_lon'] = 'NULL';
        }
        $sql = "INSERT INTO `restaurant` (`name`, `address`, `latitude`, `longitude`, `datasource`) 
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