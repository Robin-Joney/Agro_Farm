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

			<h3 class="style"><a href="">Seller</a></h3>
			<div class="specials-grids">
				<table align="left" cellpadding="20" cellspacing="0" border="1" class="cart_table">
					<tr>
						<td>Seller</td>
						<td>Mobile No</td>
						<td>Address</td>
						<td>Pin</td>
						<td>District</td>
						<td>Action</td>
					</tr>
					<?php
					$query = "SELECT * FROM seller";
					$result = mysqli_query($conn, $query);

					while ($row = mysqli_fetch_array($result)) {
						$sid = $row['sid'];
						$username = $row['susername'];
						$mobileno = $row['mobileno'];
						$address = $row['address'];
						$pinno = $row['pinno'];
						$dist = $row['dist'];

						echo "<tr>";
						echo "<td>$username</td>";
						echo "<td>$mobileno</td>";
						echo "<td>$address</td>";
						echo "<td>$pinno</td>";
						echo "<td>$dist</td>";
						echo "<td><a href='view_seller.php?sid=$sid'>Delete</a></td>";
						echo "</tr>";
					}
					?>
				</table>
				<div class="clear"> </div>
			</div>

		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
if (isset($_GET['sid'])) {
	$sid = $_GET['sid'];
	mysqli_query($conn, "DELETE FROM seller WHERE sid='$sid'");
	echo "<script type='text/javascript'>alert('Seller account deleted successfully');</script>";
	echo '<meta http-equiv="refresh" content="0;url=view_seller.php">';
}
include "footer.php";
?>
