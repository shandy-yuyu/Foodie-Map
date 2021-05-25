<?php
require_once dirname(__FILE__)."./head.php";
if(isset($_GET['submit'])){
    if($_GET['submit'] == "logout"){
        unset($_COOKIE['login']);
        unset($_COOKIE['id']);
        unset($_COOKIE['admin']);
        unset($_COOKIE['email']);
    }
}
if(isset($_COOKIE['login'])){
?>
    <div class="top" style="background-color: #c42a65;padding-top: 20px; text-align: right;"> 
        <h1 style="color:white;text-align: center;">Foodie  Map  for  U</h1>
        <?php echo '<h4 style="padding-right: 20px">Your Email '.$_COOKIE['email']."</h4>"; ?>
        <?php
            if($_COOKIE['admin']){
                echo '<img src="./asset/admin.png" alt="admin.png" width="50" height="50" vspace="37" style="margin-right: 40px;">';
                echo '<a href="./manage.php"><img src="./asset/mange.png" alt="mange.png" width="50" height="50" vspace="37" style="margin-right: 40px;"></a>';
            }
            else{
                echo '<img src="./asset/user.png" alt="user.png" width="50" height="50" vspace="37" style="margin-right: 40px;">';
                echo '<a href="./search.php"><img src="./asset/search.png" alt="search.png" width="50" height="50" vspace="37" style="margin-right: 40px;"></a>';
            }
        ?>
        <form
            id="form"
            method="get"
            text-align="right"
        >
        <button 
            name="submit" 
            value="logout" 
            type="submit"
        ><b>登出</b></button>
        </form>
    </div>
<?php
}
else{
    require_once dirname(__FILE__) . "./nav_bar.php";
}

?>



<div style="background-color: white;padding-top: 20px;padding-bottom: 20px;">
    <img src="./asset/rest1.jpg" width="25%" style="margin: 3%;">
    <img src="./asset/rest2.jpg" width="25%" style="margin: 3%;">
    <img src="./asset/rest3.jpg" width="25%" style="margin: 3%;">
</div>

<div id=bottom style="background-color: #c42a65;">
    <div style="text-align:center;line-height:130px;"><font color="white">2021-Fall-DB-Group3 Copyright</font></div>
</div>

