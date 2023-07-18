<?php
include "config.php";
include "header.php";

if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    mysqli_query($conn, "DELETE FROM buyer WHERE bid='$bid'");
    echo "<script type='text/javascript'>alert('Buyer account deleted successfully');</script>";
    echo '<meta http-equiv="refresh" content="0;url=admindashboard.php">';
}

?>
<div class="wrap">
<div class="wrapper">	
	<div class="main">
		<div class="content">
			<a href="index.php"><h2>Agro Corner</h2></a>
		</div>

		<h3 class="style"><a href="">Buyer</a></h3>
		<div class="specials-grids">
            <table align="left" cellpadding="20" cellspacing="0" border="1" class="cart_table">
                <tr>
                    <td>Buyer</td>
                    <td>Mobile No</td>
                    <td>Address</td>
                    <td>Pin</td>
                    <td>District</td>
                    <td>Action</td>
                </tr>
                <?php
                $query = "SELECT * FROM buyer";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $bid = $row['bid'];
                    $username = $row['busername'];
                    $mobileno = $row['mobileno'];
                    $address = $row['address'];
                    $pinno = $row['pinno'];
                    $dist = $row['dist'];

                    echo "<tr>
                            <td>$username</td>
                            <td>$mobileno</td>
                            <td>$address</td>
                            <td>$pinno</td>
                            <td>$dist</td>
                            <td><a href='admindashboard.php?bid=$bid'>Delete</a></td>
                          </tr>";
                }
                ?>
            </table>
            <div class="clear"></div>
        </div>

	</div>
	<div class="clear"></div>
</div>
</div>
<?php
include "footer.php";
?>
