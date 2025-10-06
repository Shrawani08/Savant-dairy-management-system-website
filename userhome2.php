<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milky Store</title>

    <link rel="icon" href="dairy image set/logo.jpg">
    <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
    <link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">
    <link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">
    <link rel="stylesheet" href="AdditionalFiles/css/userhome.css">
    <script src="AdditionalFiles/js/owl.carousel.min.js"></script>

    <style>
        .box {
            width: 100%;
            height: 100%;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        ._bgRed {
            background-color: red;
        }

        #offer {
            margin-top: 130px;
            margin-left: 210px;
        }

        #info {
            size: 5px;
            color: black;
            padding-left: 0;
        }

        .bdy-bg{
            background: rgba(240, 240, 240, 1.0);
            background: -webkit-linear-gradient(top, rgba(240, 240, 240, 1.0), rgba(78, 151, 170, 1.0));
            background: -moz-linear-gradient(top, rgba(240, 240, 240, 1.0), rgba(78, 151, 170, 1.0));
            background: linear-gradient(to bottom, rgba(240, 240, 240, 1.0), rgba(78, 151, 170, 1.0));
        }

        #info {
            size: 5px;
            color: black;
            padding-left: 0;
        }

        #info:hover {
            cursor: pointer;
            size: 5px;
            color: black;
            padding-left: 0;
        }

        h6 {
            font-weight: bold !important;
        }

        h4 {
            font-weight: bold !important;
        }

    </style>


</head>
<body onload="getCartCount()" class="bdy-bg">

<?php
include_once 'usernavbar2.php';
?>
<div>

<?php
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "query answer sent") {
            $solvedquery = $_GET['solvedquery'];
            $query = $_GET['query'];
            ?>
            <div style="margin-top: 10px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Hey, <?php echo $email; ?>...As You Contacted us With Your Query as:</strong><br>
                 <small>" <i> <?php echo $query; ?> "</i></small><br>
                 <strong>ApnaKiryana Reply:- </strong><small><i> <?php echo $solvedquery; ?></i></small><br>
                    </div>
            </div>
            </div>
            <?php
        }
}
    ?>

<?php 
if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "added") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Hey ,<?php echo $email; ?>   Your Problem is Registered with us...We Will try To Contact You Soon</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
}
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "notadded") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Hello ,Your Problem is Not Registered to us Due to Some Error......Try it Again After Some Time</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 7px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="#"><img class="d-block w-100" src="banners/banner image.webp" alt="First slide"></a>
        </div>

        <div class="carousel-item">
            <a href="#"><img class="d-block w-100" src="banners/banner 2.webp" alt="Third slide"></a>
        </div>

        <div class="carousel-item">
            <a href="#"><img class="d-block w-100" src="banners/Bulk-order-banner-3.webp" alt="fifth slide"></a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- //Carousel -->


<img class="rounded mx-auto d-block" src="banners/banner4.jpg"
     style="width: 100%;margin-top: 10px;">

<img src="banners/b6.jpg" alt="banner" style="width: 100%;margin-top: 10px;">
<hr>

<div class="container">
    <div class="row">
        <?php
        include_once "connection.php";

        $selectQuery = "select * from `product` LIMIT 8";
        $data = mysqli_query($con, $selectQuery);
        while ($row = mysqli_fetch_array($data)) {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <form action="manage_cart.php" method="post" enctype="multipart/form-data">
                    <div class="card mb-5 shadow-lg border-0">
                        <a href="productdetail.php?productid=<?php echo $row["productid"]; ?>">
                            <?php
                            if ($row['discount'] == 0) {
                            } else {
                                ?>
                                <span id="offer"
                                      class="text-uppercase position-absolute _bgRed px-4 py-1 text-white">
                                    <?php echo $row['discount']; ?>% OFF
                                </span>
                                <?php
                            }
                            ?>
                            <span id="info" class="text-uppercase position-absolute px-4 py-1"><i
                                        class="fas fa-info-circle"></i></span>
                            <img class="img-fluid" id="prodpic" src="<?php echo $row['photo']; ?>"
                                 style="width:250px;height:200px" alt="flour"></a>

                            <div class="card-body">
                                <h3 class="card-title"> <?php echo $row['productname'] ;   ?></h3>
                                <p class="card-subtitle text-truncate"><?php echo $row['description'] ;   ?> </p>

                            <?php
                            if ($row['discount'] > 0) {
                                ?>
                       
                                <h6><del class="text-dark">&#x20b9;<?php echo $row['price'] ;   ?></del></h>
                        
                                <h4><span class="text-success ml-0 ">&#x20b9;<?php echo round( $p = $row['price'] - ($row['price']  * ($row['discount']  / 100)), 2) ;   ?></span></h4>

                                <?php
                                } else {
                                ?>
                                <div class="col-6">
                                <h4><span class="text-success">&#x20b9;<?php echo $row['price'] ;   ?></span></h4>
                                </div>
                            <?php
                            }
                        ?>
                            <div class="py-2 text-center">
                                <?php
                                if ($row['stock'] > 0) {
                                    ?>
                                    <button onclick="addToCart(<?php echo $row['productid'] ?>,1)" class="btn btn-info btn-block"
                                            type="button">
                                        Add To Cart
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <button style="cursor: not-allowed" class="btn btn-danger btn-block" type="button">
                                        Out of Stock
                                    </button>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<div class="container">
    <hr>
    <h2><strong>Shop By Categories</strong></h2>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            include_once "connection.php";
            $selectQuery = "select * from `categories`";
            $data = mysqli_query($con, $selectQuery);
            while ($row = mysqli_fetch_array($data))
            {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-5 border-10">

                    <a href="showproduct.php?categories=<?php echo $row["categories"]; ?>">
                        <img class="img-fluid rounded" src="<?php echo $row['catphoto']; ?>" style="width:300px;height:150px"
                             alt="image not found">
                        <div class="card-body">
                            <div class="card-title" style="text-align: center;"><h4
                                        class="text-dark"><?php echo $row['categories']; ?></h4>
                    </a></div>
            </div>

        </div>
    </div>
    <?php
    }
    ?>
</div>
</div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 7px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="#"><img class="d-block w-100" src="dairy image set/01 dairy-head image.jpg" alt="First slide"></a>
        </div>
        <div class="carousel-item">
            <a href="#"><img class="d-block w-100" src="dairy image set/02 toast-khari-head-image.jpg" alt="Second slide"></a>
        </div>
        <div class="carousel-item">
            <a href="#"><img class="d-block w-100" src="dairy image set/03 cakes-muffins-head-image.jpg" alt="Third slide"></a>
        </div>
        <div class="carousel-item">
            <a href="#"><img class="d-block w-100" src="dairy image set/04 breads-and-buns-head-image.jpg" alt="fourth slide"></a>
        </div>
        <div class="carousel-item">
            <a href="#"><img class="d-block w-100" src="dairy image set/05 bakery-snacks-image.jpg" alt="fifth slide"></a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
<br>


<script src="AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="AdditionalFiles/js/popper.min.js"></script>
<script src="AdditionalFiles/js/bootstrap.js"></script>

<script src="AdditionalFiles/js/script.js"></script>
<?php
include_once "adminfooter.php";
?>
</body>
</html>