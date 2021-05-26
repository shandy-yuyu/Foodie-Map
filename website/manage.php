<?php
    require_once dirname(__FILE__)."./db_conn.php";
    require_once dirname(__FILE__)."./head.php";
    if(isset($_GET['del'])){
        $sql = "Delete from restaurant where id = ".$_GET['del'];
        $conn = db_conn();
        $result = mysqli_query($conn, $sql);
    }
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
    <link rel="stylesheet"  type="text/css"  href="resume.css" >
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
</head>
<title>Page Title</title>
<body style="background-color: #FFFFFF;">

<div style="text-align: center;padding: 20px;">
    <form
    id="form"
    method="get"
    action="./add_rest_action.php"       
    >       
    <h5>新增餐廳</h5>
    <label>
        餐廳名稱
        <input
        id="rest_name"
        name="rest_name"
        require="" 
        >
    </label>
    <br>
    <label>
        地址
        <input
        id="rest_address"
        name="rest_address"  
        required=""
        >
    </label>
    <br>
    <label>
        緯度(ex.23.42), 可不填
        <input
        id="rest_lat"
        name="rest_lat"
        >
    </label>
    <br>
    <label>
        經度(ex.121.22), 可不填
        <input
        id="rest_lon"
        name="rest_lon"  
        >
    </label>
    <br>
    <button 
        name="submit" 
        value="add" 
        type="submit"
    ><b>新增</b></button>
    </form>	
</div>

<div style="text-align: center; padding: 20px;">
    <h5>已新增的餐廳</h5>
    <table style="width:80%;text-align: center;align-self: center;align: center;">
    <tr>
        <th>餐廳名稱</th>
        <th>地址</th>
        <th>緯度</th>
        <th>經度</th>
        <th>刪除</th>
    </tr>
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
</table>
</div>

<?php
    if(isset($_GET['message'])){
      echo "<script> alert(\"".$_GET['message']."\") </script>";
      $_GET['message'] = "";
    }
?>
