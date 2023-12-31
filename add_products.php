<?php
include "config.php";
include "header.php";

if (isset($_POST['submit'])) {
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $cat = mysqli_real_escape_string($conn, $_POST['cat']);
    $pdescp = mysqli_real_escape_string($conn, $_POST['pdescp']);
    $price = floatval($_POST['price']);
    $qty = intval($_POST['qty']);
    $sid = (isset($_SESSION['sid'])) ? $_SESSION['sid'] : 0;

    $pimage = '';
    if (isset($_FILES['pimg']) && $_FILES['pimg']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "upload/";
        $pimage = uniqid() . '_' . basename($_FILES['pimg']['name']);
        $targetPath = $uploadDir . $pimage;

        $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            move_uploaded_file($_FILES['pimg']['tmp_name'], $targetPath);
        } else {
            echo "<script type='text/javascript'>alert('Invalid file format for image.');</script>";
        }
    }

    // Check if the product already exists
    $existingProductQuery = "SELECT * FROM product WHERE pname='$pname' AND sid='$sid'";
    $existingProductResult = mysqli_query($conn, $existingProductQuery);

    if (mysqli_num_rows($existingProductResult) > 0) {
        // Product exists, update the details
        $updateQuery = "UPDATE product SET pdescp='$pdescp', cat='$cat', price='$price', qty='$qty', pimage='$pimage'
                        WHERE pname='$pname' AND sid='$sid'";
        mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));
        echo "<script type='text/javascript'>alert('Product updated successfully');</script>";
    } else {
        // Product does not exist, insert a new record
        $insertQuery = "INSERT INTO product (pname, pdescp, cat, price, qty, pimage, sid)
                        VALUES ('$pname', '$pdescp', '$cat', '$price', '$qty', '$pimage', '$sid')";
        mysqli_query($conn, $insertQuery) or die(mysqli_error($conn));
        echo "<script type='text/javascript'>alert('Product added successfully');</script>";
    }

    echo '<meta http-equiv="refresh" content="0;url=add_products.php">';
}

?>

<!-- HTML Form for Adding/Editing Products -->
<style>
    .contact-form{
        font-size: larger;
    }
    input[type=file] {
    width: 350px;
    max-width: 100%;
    color: #444;
    padding: 5px;
    font-size: medium;

    }
    .q{
        width: 30%;
    }

    
</style>
<div class="container ">
    <div class="main">
        <div class="content">
            <a href="index.php"><h2>Agro Corner</h2></a>
        </div>
        <div style="margin-left:9.5%">
        <h3 class="style"><a href="#">Add Product</a></h3>
        <div class="specials-grids">
            <form class="contact-form" action="add_products.php"  method="post" enctype="multipart/form-data">
                <!-- Add your input fields for product details here -->

                <table style="margin-top: -1.1%; width: 53%;">
                    <tbody>
                        <tr>
                            <td><label for="pname">Product Name</label></td>
                            <td>:</td>
                            <td><input style="width:50%; height:10px" type="text" id="pname" name="pname" required></td>
                        </tr>
                        <tr>
                            <td><label for="cat">Category</label></td>
                            <td>:</td>
                            <td><input style="width:50%; height:10px" type="text" id="cat" name="cat" required></td>
                        </tr>
                        <tr>
                            <td><label for="pdescp">Description</label></td>
                            <td>:</td>
                            <td><textarea style="width:50%; height:50px" style="height:5%" id="pdescp" name="pdescp" required></textarea></td>
                        </tr>
                        <tr>
                            <td> <label for="price">Price</label></td>  
                            <td>:</td>
                            <td><input style="width:50%; height:10px" type="text" id="price" name="price" required></td>
                            
                        </tr>
                        <tr>
                            <td><label for="qty">Quantity</label></td>
                            <td>:</td>
                            <td><input style="width:50%; height:10px" type="text" type="number" id="qty" name="qty" required></td>
                        </tr>
                        <tr>
                            <td><label for="pimg">Product Image</label></td>
                            <td>:</td>
                            <td><input class="choose"type="file" id="pimg" name="pimg" accept="image/*" required></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <input  class="a_btn" type="submit" name="submit" value="Add Product">
            </form>
        </div>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>
