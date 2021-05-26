<?php
if(isset($_GET['submit'])){
	if($_GET['submit'] == "logout"){
		setcookie('login', "");
		setcookie('id', "");
		setcookie('admin', "");
		setcookie('email', "");
	}
	header("Location: ./homepage.php");
}
if(isset($_COOKIE['login'])){
?>
    <div class="top" style="background-color: #c42a65;padding-top: 20px; text-align: right;"> 
        <h1 style="color:white;text-align: center;">Foodie  Map  for  U</h1>
        <?php echo '<h4 style="padding-right: 20px">Your Email '.$_COOKIE['email']."</h4>"; ?>
        <?php
            if($_COOKIE['admin']){
                echo '<img src="./asset/admin.png" alt="admin.png" width="50" height="50" vspace="37" style="margin-right: 40px;">';
                echo '<a href="./manage.php"><img src="./asset/manage.png" alt="manage.png" width="50" height="50" vspace="37" style="margin-right: 40px;"></a>';
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
?>
	<div class="top" style="background-color: #c42a65;padding-top: 20px; text-align: right;"> 
		<h1 style="color:white;text-align: center;">Foodie  Map  for  U</h1>

		<a href="./login.php"><img src="./asset/login.png" width="50" height="50" vspace="37" style="margin-right: 40px;"></a>

		<a href="./registration.php"><img src="./asset/register.png" alt="register.png" width="50" height="50" vspace="37" style="margin-right: 40px;"></a>
	</div>
<?php
}
?>