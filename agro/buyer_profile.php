<?php
include "config.php";
include "header.php";

session_start(); // Add session start statement

?>

<div class="wrap">
    <div class="wrapper">	
        <div class="main">
            <div class="content">
                <a href="index.php"><h2>Agro Corner</h2></a>
            </div>

            <div class="ser-main">
                <?php
                $bid = $_SESSION['bid'];
				$l = mysqli_query($conn, "SELECT * FROM buyer WHERE bid='$bid'"); // Added $conn parameter
                while ($g = mysqli_fetch_array($l)) {
                    $username = $g['busername'];
                    $password = $g['bpassword'];
                    $date = $g['date'];
                    $mobileno = $g['mobileno'];
                    $address = $g['address'];
                    $pinno = $g['pinno'];
                    $dist = $g['dist'];
                ?>

                    <div class="ser-grid-list img_style">
                        <h3 class="style"><a href="">Welcome <?php echo $username; ?></a></h3>

                        <div class="contact-form">
                            <table align="left" width="400px">
                                <tr>
                                    <td>Date of registration</td>
                                    <td>:</td>
                                    <td><?php echo $date; ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile number</td>
                                    <td>:</td>
                                    <td><?php echo $mobileno; ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?php echo $address; ?></td>
                                </tr>
                                <tr>
                                    <td>Pin code</td>
                                    <td>:</td>
                                    <td><?php echo $pinno; ?></td>
                                </tr>
                                <tr>
                                    <td>Dist</td>
                                    <td>:</td>
                                    <td><?php echo $dist; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php
include "footer.php";
?>
