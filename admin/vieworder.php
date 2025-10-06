<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milky Store</title>

<link rel="icon" href="dairy image set/logo.jpg">
    <?php
    // include_once "headerfiles.php";
    ?>
    <!--    <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">-->
    <!--<link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">-->
    <!--<link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">-->
    <script>
        // $(document).ready(function () {
        //     $("#accordion").accordion();
        // });

        // $(document).ready(function () {
        //     $("#accordion").accordion();
        // })
    </script>

    <script>
        function showmodal(bid) {
            // console.log(bid);
            document.getElementById("billid").value = bid;
            $("#deliverorder").modal("show");
            // $("#modaldetail").modal("show");
        }
    </script>
</head>
<body>
<?php
include_once 'adminheader2.php';
?>

<div class="container">
    <h2 class="text-center"><b>Orders Panel</b></h2>

    <div class="row mt-2 col-sm-12">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>Pending Orders</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th colspan="2" class="text-center">User Detail</th>
                    <th class="text-center">Order Remarks</th>
                    <th class="text-center text-primary" colspan="2">Controls</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k = 0;
                include_once "connection.php";
                $sql1 = "SELECT * FROM `bill` inner JOIN users on bill.email = users.email WHERE bill.status ='pending'";
                $result = mysqli_query($con, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["billid"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td colspan="2" class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td class="text-center text-dark"><?php echo $order["remarks"]; ?></td>

                        <td class="text-center text-info"><a class="text-success"
                                                             href="vieworderdetail.php?q=<?php echo $order['billid']; ?>&r=<?php echo $order['fullname']; ?>&s=<?php echo $order['mobile']; ?>">View
                                Detail</a></td>
                        <td class="text-center text-success"><a class="text-info"
                                                                href="shiporder.php?q=<?php echo $order['billid']; ?>">Ship
                                <!--                                                                href="shiporder.php?q=-->
                                <?php //echo $order['billid']; ?><!--&r=--><?php //echo $order['fullname']; ?><!--&s=-->
                                <?php //echo $order['mobile']; ?><!--">Ship-->
                                Order</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>Shipped Orders</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">User Detail</th>
                    <th class="text-center text-primary" colspan="2">Controls</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k = 0;
                include_once "connection.php";
                $sql1 = "SELECT * FROM `bill` inner JOIN users on bill.email = users.email WHERE bill.status ='shipped'";
                $result = mysqli_query($con, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["billid"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td>
                            <!-- <strong  class="btn btn-info" value='<?php echo $order['billid']; ?>' data-toggle="modal" data-target="#deliverorder">Deliver Order</strong> -->
                            <strong class="btn btn-info"
                                    onclick="showmodal(<?php echo $order['billid']; ?>)">Deliever Order</strong>
<!--                                    onclick="showmodal('--><?php //echo $order['billid']; ?><!--')">Deliever Order</strong>-->

                        </td>
                        <td class="text-center text-info"><a
                                    href="vieworderdetail.php?q=<?php echo $order['billid']; ?>&r=<?php echo $order['fullname']; ?>&s=<?php echo $order['mobile']; ?>">View
                                Detail</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>Delivered Orders</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">User Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k = 0;
                include_once "connection.php";
                $sql1 = "SELECT * FROM `bill` inner JOIN users on bill.email = users.email WHERE bill.status ='delievered'";
                $result = mysqli_query($con, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["billid"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td class="text-center text-info"><a class="text-info"
                                                             href="vieworderdetail.php?q=
                                <?php echo $order['billid']; ?>&r=<?php echo $order['fullname']; ?>&s=
                                <?php echo $order['mobile']; ?>">View
                                Detail</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>Cancelled Orders</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">User Detail</th>
                    <th class="text-center">Remarks</th>
                    <TH>Controls</TH>
                </tr>
                </thead>
                <tbody>
                <?php
                $fullname = "";
                $mobile = "";
                $k = 0;
                include_once "connection.php";
                $sql1 = "SELECT * FROM `bill` inner JOIN users on bill.email = users.email WHERE bill.status ='cancelled'";
                $result = mysqli_query($con, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["id"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td class="text-center text-dark"><?php echo $order["returnremarks"]; ?></td>
                        <td class="text-center text-info"><a class="text-info"
                                                             href="vieworderdetail.php?q=
                                <?php echo $order['id']; ?>&r=<?php echo $order['fullname']; ?>&s=
                                <?php echo $order['mobile']; ?>">View Detail</a></td>
                    </tr>
                    <?php
                    $mobile = $order["mobile"];
                    $fullname = $order["fullname"];
                }
                ?>
                </tbody>
            </table>


            <div class="modal" id="deliverorder">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="row justify-content-center mt-4">
                                <h1>Order Received By: </h1>
                            </div>
                        </div>
                        <div class="modal-body justify-content-center">
                            <form action="orderreceivedaction.php" method="post">
                                <div class="row offset-3 col-sm-6 mt-4">
                                    <input type="text" name="person" id="person" class="form-control">
                                </div>
                                <div class="row offset-3 col-sm-6 mt-4">
                                    <input type="hidden" value="" name="billid" id="billid">
                                    <input type="hidden" value="<?php echo $fullname; ?>" class="form-control"
                                           name="fullname"
                                           id="fullname">
                                    <input type="hidden" value="<?php echo $mobile; ?>" class="form-control"
                                           name="mobile"
                                           id="mobile">

                                    <input type="submit" name="" id="" value="Add"
                                           class="btn btn-info btn-block">
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            <!--    <div id="datewiseorder" class="table-responsive"></div>-->

        </div>
        <?php
        include_once 'footerfiles.php';
        ?>


</body>
</html>
