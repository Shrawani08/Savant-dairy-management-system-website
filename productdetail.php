<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product details</title>
    <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
    <link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">
    <link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">
    <link rel="icon" href="images/grocery.png">
    <script>
        $(document).ready(function () {
  // MDB Lightbox Init
  $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
  });
});
    </script> 

</head>
<body onload="getCartCount()">


<?php
    // if(isset($_SESSION['email'])){ 
        ?> <?php
    // include_once "usernavbar.php"; ?> <?php 
// } else { ?>
    <?php
    //  include_once "usernavbar2.php";
     ?> <?php 
    //  } 
     ?>

<?php
include_once "usernavbar3.php";
?>

<div class="container">
<section class="mb-5">

  <div class="row">

  <?php
        include_once "connection.php";
        $productid = $_GET['productid'];
        $selectQuery = "select * from `product` where `productid`=$productid";
        $data = mysqli_query($con, $selectQuery);
        while ($row = mysqli_fetch_array($data)) {
            ?>
            <div class="col-md-6 mb-4 mb-md-0">

            <div id="mdb-lightbox-ui"></div>

            <div class="mdb-lightbox">

                <div class="row product-gallery mx-1">

                <div class="col-sm-12 offset-3" style="margin-top: 50px; margin-bottom: 30px;">
                    <img style="width:250px;height:250px" src="<?php echo $row['photo']; ?>" alt="flour" >
                </div>
    <?php
        include_once "connection.php";
        $productid = $_GET['productid'];
        $selectQuery1 = "select photo from `productphoto` where `productid`=$productid";
        $data1 = mysqli_query($con, $selectQuery1);
        while ($row1 = mysqli_fetch_array($data1)) {
            ?>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item">
                        <img src="<?php echo $row1['photo']; ?>"
                            class="img-fluid">
                        <div class="mask rgba-white-slight"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
                </div>
            </div>
            </div>

            <div class="col-md-6" style="margin-top: 60px;">

            <h2> <?php echo $row['productname'] ;   ?></h2>
            <hr style="background-color: aqua;">

            <?php
            if ($row['discount'] > 0) {
            ?>              
            <p style="font-size: large;"><span class="mr-1"><strong>M.R.P <del>&#x20b9; <?php echo $row['price'] ;  ?></strong></del></span></p>
            <p style="font-size: large;"><span class="mr-1"><strong>OUR PRICE : &#x20b9; <?php echo round( $p = $row['price'] - ($row['price']  * ($row['discount']  / 100)), 2) ;   ?></strong></span></p>

            <?php
            } else {
            ?>
            <p style="font-size: large;"><span class="mr-1"><strong>M.R.P &#x20b9; <?php echo $row['price'] ;  ?></strong></span></p>
            <?php
            }
            ?>
            <!-- <p class="pt-1"></p> -->
            <div class="table-responsive">
            <table class="table table-sm table-borderless mb-0">
                <tbody>
                <tr>
                    <td><strong>&rarr; Cash on delivery eligible</strong></td>
                </tr>
                <tr>
                    <td><strong>&rarr; speed to delivery</strong></td>
                </tr>
                <tr>
                    <td><strong>&rarr; offerExtra 5% off* with Axis Bank Buzz Credit Card T&C</strong></td>
                </tr>
                </tbody>
            </table>
            </div>
            <hr style="background-color: aqua;">
            <p><?php echo $row['description'] ;   ?></p>
            <hr style="background-color: aqua;">
            <?php
            if ($row['stock'] > 0) {
                ?>
            <button type="button" onclick="addToCart(<?php echo $row['productid'] ?>,1)" class="btn btn-primary btn-md mr-1 mb-2"><i
                class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
                <?php
            }
            ?>
            </div>
            </div>
            <hr style="width: 60%;"><br>
            <h3>Product Information</h3>
            <table class="table">
            <thead class="thead-light">
            <tr>
            <th>Country Of Origin:</th>
            <th>Food Type:</th>
            </tr>
            </thead>
            <tbody>

            <?php
            }
            ?>
<tr>
<td>India</td>
<td><img src="images/greeeen.jpg" alt="green stamp" width="30px"></td>
</tr>
</tbody>
</table>
        </div>
<?php
include_once "adminfooter.php";
?>
<script src="AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="AdditionalFiles/js/popper.min.js"></script>
<script src="AdditionalFiles/js/bootstrap.js"></script>

<script src="AdditionalFiles/js/script.js"></script>


</body>
</html>