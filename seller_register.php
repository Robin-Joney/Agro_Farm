<?php
include "config.php";
include "header.php";
?>
<div class="wrap">
<div class="wrapper">	
	<div class="main">
		<div class="content">
			<a href="index.php"><h2>Agro Corner</h2></a>
		</div>

		<div class="ser-main">
			<div class="ser-grid-list img_style">
				<h3 class="style"><a href="">SELLER REGISTRATION</a></h3>
				<div class="contact-form">
					<form method="POST" action="" name="buyer_register">
						<div>
							<span><label>USERNAME</label></span>
							<span><input name="username" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>PASSWORD</label></span>
							<span><input name="password" type="password" class="textbox"></span>
						</div>
						<div>
							<span><label>DATE</label></span>
							<span><input name="date" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>MOBILE NO</label></span>
							<span><input name="mobileno" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>LOCATION</label></span>
							<span><input name="address" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>PIN CODE</label></span>
							<span><input name="pinno" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>DIST</label></span>
							<span><input name="dist" type="text" class="textbox"></span>
						</div>
						<div>
							<span><input type="submit" value="Register" name="register"></span>
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
if (isset($_POST['register'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$pinno = mysqli_real_escape_string($conn, $_POST['pinno']);
	$dist = mysqli_real_escape_string($conn, $_POST['dist']);
	
	mysqli_query($conn, "INSERT INTO seller(susername, spassword, date, mobileno, address, pinno, dist) 
	VALUES ('$username', '$password', '$date', '$mobileno', '$address', '$pinno', '$dist')");

	echo "<script type='text/javascript'>alert('Seller account registered successfully');</script>";
	echo '<meta http-equiv="refresh" content="0;url=seller_login.php">';
}

include "footer.php";
?>
