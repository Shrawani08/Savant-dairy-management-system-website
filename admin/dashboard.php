<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
// if(empty($_SESSION["adm_id"]))
// {
// 	header('location:index.php');
//     exit;
// }
// else
// {
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Admin Dashboard</title>
    <style>
        
    .card {
        background-color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
    }
    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }
    
    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }
    
    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }
    
    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }
    
    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
    
    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }
    
    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }
    
    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
</style>
</head>
<body>
<?php
include_once "adminhome.php";
?>
<br>
<div class="col-md-12 ">
    <div class="row ">
    <?php
        // include("../connection/connect.php");

        $selectQuery1 = "select * from `bill`";
        $data1 = mysqli_query($db, $selectQuery1);
        $userdata1 = mysqli_num_rows($data1);
            ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Orders</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $userdata1; ?>
                            </h2>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    
    <div class="row ">
    <?php
    // include("../connection/connect.php");
        

        $selectQuery1 = "select * from `categories`";
        $data1 = mysqli_query($db, $selectQuery1);
        $userdata1 = mysqli_num_rows($data1);
            ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Categories Of Products</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $userdata1; ?>
                            </h2>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    <div class="row ">
    <?php
        include("../connection/connect.php");
        

        $selectQuery1 = "select * from `product`";
        $data1 = mysqli_query($db, $selectQuery1);
        $userdata1 = mysqli_num_rows($data1);
            ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Products are</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $userdata1;?>
                            </h2>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="row ">
    <?php
    // include("../connection/connect.php");
        

        // $selectQuery1 = "select COUNT(price) from `bill_details`";
        // echo $selectQuery1;
        // $data1 = mysqli_query($con, $selectQuery1);
        // $userdata1 = mysqli_num_rows($data1);

        $result = mysqli_query($db, 'SELECT SUM(price) As value_sum FROM `bill_details`');
        $row = mysqli_fetch_assoc($result);
        $userdata1 = $row['value_sum'];
            ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Sale till now is</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">Rs. 
                            <?php echo $userdata1; ?>
                            </h2>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="row ">
    <?php
    // include("../connection/connect.php");
        

        $result = mysqli_query($db, 'SELECT SUM(price) As value_sum FROM `bill_details`');
        $row = mysqli_fetch_assoc($result);
        $userdata1 = $row['value_sum'];
        $percentage = 30;
        $profit = ($percentage / 100) * $userdata1;
            ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-orange">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Profit till now is</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">Rs. 
                            <?php echo $profit; ?>
                            </h2>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="row ">
    <?php
    // include("../connection/connect.php");
        

        $result = mysqli_query($db, 'SELECT SUM(stock) As value_sum FROM `product`');
        $row = mysqli_fetch_assoc($result);
        $userdata1 = $row['value_sum'];
            ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-cyan">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Stock:</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $userdata1; ?>
                            </h2>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="row ">

        <?php
    // include("../connection/connect.php");
        

        $selectQuery = "select * from `users`";
        $data = mysqli_query($db, $selectQuery);
        $userdata = mysqli_num_rows($data);
            ?>
            <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Customers</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $userdata; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
                </div>
            </div>
        </div>
    </div>
</div> 
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>
<?php
//}
?>