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
		<h3 class="style"><a href="">ADMIN LOG IN</a></h3>
		
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
						   		<span><input type="submit" value="login" name="login" ></span>
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
if(isset($_POST['login']))
{
	$username=mysqli_real_escape_string($conn, $_POST['username']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);
	$login_qry="SELECT * FROM admin WHERE aname='$username' and apass='$password'";
	$result=mysqli_query($conn, $login_qry)or die("cant access");
	$count=mysqli_num_rows($result);
	if($count>0){
		$n=mysqli_fetch_array($result);
		$_SESSION['aid']=$n['aid'];
	
		echo "<script type='text/javascript'>alert('Admin Logged in successfully');</script>";
	
		echo '<meta http-equiv="refresh" content="0;url=admindashboard.php">';
	}
	else{
		echo "<script type='text/javascript'>alert('Admin account username or password incorrect!');</script>";
	}
}

include "footer.php";
?>
