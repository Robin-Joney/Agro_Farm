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

			<h3 class="style"><a href="">View Product</a></h3>
			<div class="specials-grids">
				<table align="left" cellpadding="20" cellspacing="0" border="1" class="cart_table">
					<tr>
						<td>Category</td>
						<td>Product name</td>
						<td>Product Description</td>
						<td>Product image</td>
						<td>Price</td>
						<td>Quantity</td>
						<td>Action</td>
					</tr>
					<?php
					$sid = $_SESSION['sid'];
					if ($sid != '') {
						$query = "SELECT * FROM product WHERE sid='$sid'";
					} else {
						$query = "SELECT * FROM product";
					}

					$result = mysqli_query($conn, $query);
					
					while ($row = mysqli_fetch_array($result)) {
						$pimage = $row['pimage'];
						$pname = $row['pname'];
						$pdescp = $row['pdescp'];
						$price = $row['price'];
						$pid = $row['pid'];
						$qty = $row['qty'];
						$cat = $row['cat'];

						echo "<tr>";
						echo "<td>$cat</td>";
						echo "<td>$pname</td>";
						echo "<td>$pdescp</td>";
						echo "<td><img src='upload/$pimage' width='100px'/></td>";
						echo "<td>$price</td>";
						echo "<td>$qty</td>";
						echo "<td><a href='view_product.php?pid=$pid'>Delete</a></td>";
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
if (isset($_GET['pid'])) {
	$pid = $_GET['pid'];
	mysqli_query($conn, "DELETE FROM product WHERE pid='$pid'");
	echo "<script type='text/javascript'>alert('Product deleted successfully');</script>";
	echo '<meta http-equiv="refresh" content="0;url=view_product.php">';
}
include "footer.php";
?>
