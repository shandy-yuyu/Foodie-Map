<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<head>
    <link rel="stylesheet"  type="text/css"  href="resume.css" >

<title>Page Title</title>
<body style="background-color: #FFFFFF;">

<div>
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


<?php
    if(isset($_GET['message'])){
      echo "<script> alert(\"".$_GET['message']."\") </script>";
    }
?>
