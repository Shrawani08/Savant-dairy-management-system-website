<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Savant Dairy Outlet Wanewadi</title>
    <link rel="stylesheet" href="../AdditionalFiles/fontawesome/css/all.css">
    <link rel="icon" href="dairy image set/logo.jpg">
    <link rel="stylesheet" href="../AdditionalFiles/css/bootstrap.css">
<link rel="stylesheet" href ="../AdditionalFiles/css/bootstrap-grid.js">
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../scss/bootstrap/_reboot.css">

    <?php
    @session_start();
    include('../connection/connect.php');
    ?>


    <script src="../AdditionalFiles/js/script.js"></script>

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
<body onload="getCartCount()">
<!-- <?php
if (isset($_SESSION["email"])) {
    include "usernavbar2.php";
} else {
    // include_once 'connection.php';
    include "usernavbar.php";
}
?> -->

<?php
    include('../connection/connect.php');
        $proname = $_POST['serachText'];
        ?>
        <div class="col-lg-12 text-center border rounded bg-light my-5">
        <h2>All Products with name as "<?php echo $proname;   ?>" is :</h2>
    </div>
<br>

<div class="container">
    <div class="row">
        <?php
        if (isset($_POST["submit"])) {
            include("../connection/connect.php");
            $search = $_POST["serachText"];

            if ($search != "") {
                $selectQuery = "select * from product where productname like '%$search%'";
                $data = mysqli_query($db, $selectQuery);
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
                                    <!-- <span id="offer"
                                          class="text-uppercase position-absolute _bgRed px-4 py-1 text-white"> -->
                                         <?php //echo $row['discount']; ?>
                                    </span>
                                    <?php
                                }
                                ?>
                                <!-- <span id="info" class="text-uppercase position-absolute px-4 py-1"><i
                                            class="fas fa-info-circle"></i></span> -->
                                <img class="img-fluid" id="prodpic" src="<?php echo $row['photo']; ?>"
                                     style="width:250px;height:200px" alt="flour"></a>

                            <div class="card-body">
                                <h3 class="card-title"> <?php echo $row['productname']; ?></h3>
                                <p class="card-subtitle text-truncate"><?php echo $row['description']; ?> </p>

                                <?php
                                if ($row['discount'] > 0) {
                                    ?>

                                    <h6>
                                        <h6><?php echo $row['price']; ?>&#x20b9;</h6>
                                    </h6>

                                     

                                    <?php
                                } else {
                                    ?>
                                    <div class="col-6">
                                        <h4><span class="text-success">&#x20b9;<?php echo $row['price']; ?></span></h4>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="py-2 text-center">
                                    <?php
                                    if ($row['stock'] > 0) {
                                        ?>
                                        <button onclick="addToCart(<?php echo $row['productid'] ?>,1)"
                                                class="btn btn-info btn-block"
                                                type="button">
                                            Add To Cart
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button style="cursor: not-allowed" class="btn btn-danger btn-block"
                                                type="button">
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
            } else {
            ?>
                <script>
                    alert("Enter product name to search...");
                </script>
                <?php
            }
        }
        ?>
    </div>
</div>
 <?php
// include_once 'adminfooter.php';
?> 

<script src="./AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="./AdditionalFiles/js/popper.min.js"></script>
<script src="./AdditionalFiles/js/bootstrap.js"></script>

<script src="./AdditionalFiles/js/script.js"></script>
<script src ="./script3.js"></script>
</body>
</html>
