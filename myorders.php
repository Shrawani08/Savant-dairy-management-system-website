<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
</head>
<body onload="getCartCount()">
<?php
include_once 'usernavbar2.php';
?>
<br>

<div>
<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "cancelledorder") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <small>The Order Which You Choosed For Cancellation is  </small><strong>Cancelled Successfully</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<div class="container-fluid">
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Sr no.</th>
            <th>Bill id</th>
            <th>Bill Date</th>
            <th>Address</th>
            <th>Payment Method</th>
            <th>Grand Total</th>
            <th>Status</th>
            <th>View Detail</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $k = 0;
        $order = "SELECT * FROM `bill` where email='$email'";
        $result = mysqli_query($con, $order);
        while ($bill = mysqli_fetch_array($result)) {
            $k++;
            ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $bill["billid"]; ?></td>
                <td><?php echo $bill["datetime"]; ?></td>
                <td><?php echo $bill["address"] . "   " . $bill["city"] . "   " . $bill["zipcode"]; ?></td>
                <td><?php echo $bill["paymentmethod"]; ?></td>
                <td><?php echo $bill["grandtotal"]; ?></td>
                <td><?php echo $bill["status"]; ?></td>
                <?php
                if($bill["status"]== "cancelled"){

                }
                else{
                    ?>
                <td><a href="billdetail.php?q=<?php echo $bill["billid"];?>&a=<?php echo $bill["status"]; ?>"><i class="fa fa-s15 fa-info-circle"></i></a></td>
                <?php
                } ?>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    </div>
    <br>
    <?php
    include_once 'adminfooter.php';
    ?>

<script src="AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="AdditionalFiles/js/popper.min.js"></script>
<script src="AdditionalFiles/js/bootstrap.js"></script>

<script src="AdditionalFiles/js/script.js"></script>
</div>
</body>
</html>
<?php
