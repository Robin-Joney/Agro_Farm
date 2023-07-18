<?php
include "config.php";
include "header.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $login_query = "SELECT * FROM buyer WHERE busername='$username' AND bpassword='$password'";
    $result = mysqli_query($conn, $login_query) or die("Cannot access the database");
    $count = mysqli_num_rows($result);
    
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['bid'] = $row['bid'];
        echo "<script type='text/javascript'>alert('Buyer Logged in successfully');</script>";
        echo '<meta http-equiv="refresh" content="0;url=buyer_profile.php">';
    } else {
        echo "<script type='text/javascript'>alert('Buyer account username or password incorrect!');</script>";
    }
}

?>
<div class="wrap">
<div class="wrapper">	
	<div class="main">
		<div class="content">
			<a href="index.php"><h2>Agro Corner</h2></a>
		</div>

		<div class="ser-main">
			<div class="ser-grid-list img_style">
				<h3 class="style"><a href="">LOG IN</a></h3>
				<div class="contact-form">
					<form method="post" action="" name="buyer_login">
						<div>
							<span><label>USERNAME</label></span>
							<span><input name="username" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>PASSWORD</label></span>
							<span><input name="password" type="password" class="textbox"></span>
						</div>
						<div>
							<span><input type="submit" value="login" name="login"></span>
						</div>
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>

	</div>
	<div class="clear"></div>
</div>
</div>
<?php
include "footer.php";
?>
