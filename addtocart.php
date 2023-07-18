<?php
include "config.php";
include "header.php";
session_start();

if (isset($_POST['checkout'])) {
    $stid = $_SESSION['bid'];
    $pid = $_GET['pid'];
    $qty = $_POST['qty'];
    $date = date("Y-m-d");

    $stmt = $conn->prepare("INSERT INTO cart (stid, pid, qty, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $stid, $pid, $qty, $date);
    $stmt->execute();

    echo "<script type='text/javascript'>alert('Product ordered successfully');</script>";
    echo '<meta http-equiv="refresh" content="0;url=order.php">';
}

?>

<div class="wrap">
    <div class="wrapper">	
        <div class="main">
            <div class="content">
                <a href="index.php"><h2>Agro Corner</h2></a>
            </div>
            <h3 class="style"><a href="">View Cart</a></h3>
            <div class="specials-grids">
                <form action="" method="post">
                    <?php
                    $pid = $_GET['pid'];
                    $stmt = $conn->prepare("SELECT * FROM product WHERE pid = ?");
                    $stmt->bind_param("i", $pid);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        $pimage = $row['pimage'];
                        $pname = $row['pname'];
                        $pdescp = $row['pdescp'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                    ?>
                        <table align="left" cellpadding="10" cellspacing="0" border="1" class="cart_table">
                            <tr>
                                <td>Product image</td>
                                <td>Product name</td>
                                <td>Product Description</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Checkout</td>
                            </tr>
                            <tr>
                                <td><img src='upload/<?php echo $pimage; ?>' height='50px'></td>
                                <td><?php echo $pname; ?></td>
                                <td><?php echo $pdescp; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><input type='text' name='qty' class='cart_box'></td>
                                <td><input type='submit' name='checkout' value='Checkout' class='add_cart'></td>
                            </tr>
                        </table>
                    <?php
                    }
                    ?>
                </form>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
