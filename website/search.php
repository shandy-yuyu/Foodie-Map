<?php
require_once dirname(__FILE__)."./db_conn.php";
require_once dirname(__FILE__)."./head.php";
require_once dirname(__FILE__)."./nav_bar.php";
?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<title>Search</title>
<body style="background-color: #FFFFFF;">

<div style="text-align: center;padding: 20px;">
    <form
    id="form"
    method="get"
    >
    <h4>搜尋餐廳</h4>
    <label>縣/市區<input id="city" name="city" type="text"></label><br>
    <label>緯度 (ex.23.42), 可不填<input id="lat" name="lat" type="number"></label><br>
    <label>經度 (ex.121.22), 可不填<input id="lon" name="lon" type="number"></label><br>

    <button 
        name="submit" 
        value="add" 
        type="submit"
    ><b>搜尋</b></button>
    </form>
</div>

<a href="./history.php" style="text-decoration:none;"><h5 style="color: black;text-align: center;">搜尋歷史</h5></a>

<div style="text-align: center; padding: 20px;">
    <h5>搜尋結果</h5>
    <table>
    <tr>
        <th>餐廳名稱</th>
        <th>地址</th>
        <th>緯度</th>
        <th>經度</th>
    </tr>
    
    <?php
    $userid = $_COOKIE['id'];
    $conn = db_conn();
    if(isset($_GET['submit'])&&$_GET['submit'] == 'add'){
        $query = [
            'city' => htmlspecialchars($_GET["city"]),
            'lat' => htmlspecialchars($_GET["lat"]),
            'lon' => htmlspecialchars($_GET["lon"])
        ];
        if($query['lat'] == ""){
            $query['lat'] = 'NULL';
        }
        if($query['lon'] == ""){
            $query['lon'] = 'NULL';
        }
        $his = "INSERT INTO `history` (`userid`, `city`, `latitude`, `longitude`) 
        VALUES (\"".$userid."\", \"".$query['city']."\", ".$query['lat'].", ".$query['lon'].");";
        mysqli_query($conn, $his);
        if($query['lat']=="" && $query['lon']==""){
            if($query['city'] == ""){
                $sql = "SELECT * FROM restaurant";
            }
            else{
                $tmp = '%'.$query['city'].'%';
                $sql = "SELECT * FROM restaurant WHERE name like '$tmp'";
            }
        }
        else{
            $tmp_lon = $query['lon'];
            $tmp_lat = $query['lat'];
            $sql = "SELECT * FROM restaurant WHERE (longitude-'$tmp_lon'<1) and (latitud-'$tmp_lat'<1)";
        }
        $result = mysqli_query($conn, $sql);
        $conn->close();
        for($i = 0; $i < $result->num_rows; $i += 1){
            $row = $result->fetch_assoc();
            echo '<tr>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['address'].'</td>';
            echo '<td>'.$row['latitude'].'</td>';
            echo '<td>'.$row['longitude'].'</td>';
            echo '<tr>';
        }
    }
?>
    </table>
</div>
</body>
</html>
