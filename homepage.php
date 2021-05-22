
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

<div id=top>
    <div style="text-align:center;line-height:150px;"><h1 color="white">testtest</h1></div>
    <?php
        if(isset($_COOKIE['username'])){
            echo "<h4>Hi, ".$_COOKIE['username']."</h4>";
        }
        else{
            echo "<h4>BUG line 22, unset cookie['uername']</h4>";
        }
        if(isset($_COOKIE['admin']) && $_COOKIE['admin']){
            echo "<a href=\"./manage.php\"><b>manage restaurant</b></a>";
        }
    ?>
</div>

<div id=contact>
    <img src="border.png" width="1440" height="50" style="float: center;">
    <img src="border.png" width="20" height="20" style="float: center;">
    <img src="https://i2.wp.com/img.huablog.tw/uploads/20200827141557_19.jpg" width="450" height="450" style="float: center;">
    <img src="border.png" width="20" height="20" style="float: center;">
    <img src="https://handler.travel/wp-content/uploads/2020/04/1sfood-1024x768.jpg" width="450" height="450" style="float: center;">
    <img src="border.png" width="20" height="20" style="float: center;">
    <img src="https://cdn1.wishnote.tw/500/2018/10/02/500_1320280_1538486878.jpeg" width="450" height="450" style="float: center;">
</div>

<div id=bottom>
    <div style="text-align:center;line-height:150px;"><font color="white">2021-Fall-DB-Group3 Copyright©</font></div>
</div>


</body>
</html>