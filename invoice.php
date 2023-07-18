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
		<h3 class="style"><a href="">Customer Invoice</a></h3>
		<div class="specials-grids">
			<table align="left" cellpadding="20" cellspacing="0" border="1" class="cart_table">
				<tr>
					<td>Customer Details</td>
					<td>Product image</td>
					<td>Product name</td>
					<td>Product Description</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Total Price</td>
					<td>Order date</td>
					<td>Delete</td>
				</tr>
				<?php
				$t = mysqli_query($conn, "SELECT * FROM cart");
				while ($w = mysqli_fetch_array($t)) {
					$bid = $w['stid'];
					$cid = $w['cid'];
					$pid = $w['pid'];
					$qty = $w['qty'];
					$date = $w['date'];

					$sid = $_SESSION['sid'];
					if ($sid != '') {
						$u = mysqli_query($conn, "SELECT * FROM product WHERE pid=$pid AND sid='$sid'");
					} else {
						$u = mysqli_query($conn, "SELECT * FROM product WHERE pid=$pid");
					}
					$_SESSION['m'] = $m = mysqli_num_rows($u);
					while ($y = mysqli_fetch_array($u)) {
						$pimage = $y['pimage'];
						$pname = $y['pname'];
						$pdescp = $y['pdescp'];
						$price = $y['price'];

						$tot = ($qty * $price);
						$i = mysqli_query($conn, "SELECT * FROM buyer WHERE bid=$bid");
						while ($j = mysqli_fetch_array($i)) {
							$username = $j['busername'];
							$mobileno = $j['mobileno'];
							$address = $j['address'];
							$pinno = $j['pinno'];
							$dist = $j['dist'];
							if ($m != 0) {
								echo "<tr>
										<td>Username: $username<br/>Mobileno: $mobileno<br/>Address: $address<br/>Pinno: $pinno<br/>Dist: $dist<br/></td>
										<td><img src='upload/$pimage' height='50px' /></td>
										<td>$pname</td>
										<td>$pdescp</td>
										<td>$price</td>
										<td>$qty</td>
										<td>$tot</td>
										<td>$date</td>
										<td><a href='invoice.php?cid=$cid'>Delete</a></td>
									</tr>";
							}
							if ($m == 0) {
								echo "<tr><td colspan='8'>No invoice available $m</td></tr>";
							}
						}
					}
				}
				?>
			</table>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
</div>
<?php
if (isset($_GET['cid'])) {
	$cid = $_GET['cid'];
	mysqli_query($conn, "DELETE FROM cart WHERE cid='$cid'");
	echo "<script type='text/javascript'>alert('Invoice deleted successfully');</script>";
	echo '<meta http-equiv="refresh" content="0;url=invoice.php">';
}
include "footer.php";
?>
