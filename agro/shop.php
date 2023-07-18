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
			<h3 class="style"><a href="">Shop Product</a></h3>
			<div class="specials-grids">
				<?php
				$query = "SELECT * FROM product";
				$result = mysqli_query($conn, $query);
				
				while($row = mysqli_fetch_array($result))
				{
					$pimage = $row['pimage'];
					$pname = $row['pname'];
					$pdescp = $row['pdescp'];
					$price = $row['price'];
					$qty = $row['qty'];
					$cat = $row['cat'];
					$subcat = $row['subcat'];
					$pid = $row['pid'];
				?>
				<div class="special-grid">
					<div class="gallery img_style">
						<img src="upload/<?php echo $pimage; ?>" title="<?php echo $pimage; ?>">
					</div>
					<h3 class="style"><a href="#"><?php echo $pname; ?></a></h3>
					<p><?php echo $pdescp; ?></p><br />
					<p>Rs.<?php echo $price; ?></p><br />
					<a href="addtocart.php?pid=<?php echo $pid; ?>">
						<input type="button" value="Add to cart" class="add_cart" />
					</a>
				</div>
				<?php
				}
				?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>
