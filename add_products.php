<?php
include "config.php";
include "header.php";

if(isset($_POST['submit']))
{
    $pimage = $_FILES['pimg']['name'];
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $cat = $_POST['cat'];
    $pdescp = mysqli_real_escape_string($conn, $_POST['pdescp']);
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $sid = $_SESSION['sid'];

    $query = "INSERT INTO product (pname, pdescp, cat, price, qty, pimage, sid)
              VALUES ('$pname', '$pdescp', '$cat', '$price', '$qty', '$pimage', '$sid')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    move_uploaded_file($_FILES['pimg']['tmp_name'], "upload/$pimage");
    echo "<script type='text/javascript'>alert('Product added successfully');</script>";
    echo '<meta http-equiv="refresh" content="0;url=add_products.php">';
}

include "footer.php";
?>
