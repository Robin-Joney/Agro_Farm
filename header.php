<?php
error_reporting(0);
session_start();
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Agro-Farm </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--start slider -->
	<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
    <script type='text/javascript' src="js/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.mobile.customized.min.js"></script>
    <script type='text/javascript' src="js/jquery.easing.1.3.js"></script> 
    <script type='text/javascript' src="js/camera.min.js"></script> 
    
    <script>
		jQuery(function(){
			jQuery('#camera_wrap_1').camera({
				height: '550px',
				loader: 'bar',
				pagination: false,
				thumbnails: true
			});
		});
	</script>
</head>
<body>
<div style="float:right; text-align:right; position:relative; right:0px;">
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,ta', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
<div class="slider">
	<!-- #camera_wrap_1 -->
	<div class="fluid_container">
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <div  data-src="images/slider1.jpg">
            </div>
            <div  data-src="images/slider2.jpg">
            </div>
            <div  data-src="images/slider3.jpg">
            </div>
             </div><!-- #camera_wrap_1 -->
         <div class="clear"></div>
	</div>
	<!-- end #camera_wrap_1 -->
</div>
<div class="header_bg">
<div class="wrap">
<div class="wrapper1">	
	<div class="menu">	
				<ul class="top-nav">
                <?php
				$fn1=basename($_SERVER['SCRIPT_FILENAME']);
				$fn2=explode(".",$fn1);
				$fn=$fn2[0];
				?>
					 <li  <?php if($fn=='index' || $fn=='') echo 'class="active"' ?> ><a href="index.php">HOME</a></li>
                     <?php
					 if(($_SESSION['sid']=='')&&($_SESSION['bid']=='')&&($_SESSION['aid']==''))
					 {
					 ?>
					 <li <?php if($fn=='buyer_register') echo 'class="active"' ?>><a class="hsubs" href="buyer_register.php">BUYER REGISTRATION</a></li>
					 <li <?php if($fn=='buyer_login') echo 'class="active"' ?>><a class="hsubs" href="buyer_login.php">BUYER LOGIN</a></li>
                      <li <?php if($fn=='seller_register') echo 'class="active"' ?>><a class="hsubs" href="seller_register.php">SELLLER REGISTRATION</a></li>
                      <li <?php if($fn=='seller_login') echo 'class="active"' ?>><a class="hsubs" href="seller_login.php">SELLLER LOGIN</a></li>
                      <li <?php if($fn=='admin') echo 'class="active"' ?>><a class="hsubs" href="admin.php">ADMIN LOGIN</a></li>
                      <!-- <li><a href="logout.php">LOGOUT</a></li> -->
                      <?php
					  }
					  if(isset($_SESSION['aid']))
					  {
					  ?>
                      <li <?php if($fn=='view_product') echo 'class="active"' ?>><a class="hsubs" href="view_product.php">VIEW PRODUCT</a></li>
                       <li <?php if($fn=='view_seller') echo 'class="active"' ?>><a class="hsubs" href="view_seller.php">VIEW SELLER</a></li>
                       <li <?php if($fn=='admindashboard') echo 'class="active"' ?>><a class="hsubs" href="admindashboard.php">VIEW BUYER</a></li>
                       <li <?php if($fn=='invoice') echo 'class="active"' ?>><a class="hsubs" href="invoice.php">VIEW INVOICE</a></li>
                       <li><a href="logout.php">LOGOUT</a></li>
                      <?php
					  }
					  if(isset($_SESSION['sid']))
					  {
					  ?>
                      <li <?php if($fn=='seller_profile') echo 'class="active"' ?>><a class="hsubs" href="seller_profile.php">SELLLER PROFILE</a></li>
                      <li <?php if($fn=='add_products') echo 'class="active"' ?>><a class="hsubs" href="add_products.php">ADD PRODUCT</a></li>
                          <li <?php if($fn=='view_product') echo 'class="active"' ?>><a class="hsubs" href="view_product.php">VIEW PRODUCT</a></li>
                      <li <?php if($fn=='invoice') echo 'class="active"' ?>><a class="hsubs" href="invoice.php">INVOICE</a></li>
                      <li><a href="logout.php">LOGOUT</a></li>
                      <?php
					  }
					  if(isset($_SESSION['bid']))
					  {
					  ?>
                      <li <?php if($fn=='buyer_profile') echo 'class="active"' ?>><a class="hsubs" href="buyer_profile.php">BUYER PROFILE</a></li>
                      <li <?php if($fn=='shop') echo 'class="active"' ?>><a class="hsubs" href="shop.php">SHOP PRODUCT</a></li>
                      <li <?php if($fn=='order') echo 'class="active"' ?>><a class="hsubs" href="order.php">ORDERS</a></li>
                      <li><a href="logout.php">LOGOUT</a></li>
                      <?php
					  }
					  ?>
                      <div class="clear"></div>
				</ul>

        
		<div class="clear"></div>
	</div>
</div>
</div>
</div>

<!-- start main -->
<div class="main_bg">
