<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
</head>
<body>
<div class="container">
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Sr no.</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Discount ( in %)</th>
            <th>Qty</th>
            <th>Net Price</th>
            <th>Photo</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include("connection/connect.php");
                $status = $_GET["a"];
        $bill = 0;
        $k = 0;
        $billid = $_GET["q"];

        $sql = "SELECT bill_details.price,bill_details.discount,bill_details.netprice,bill_details.quantity,product.productname,product.photo FROM `bill_details` INNER JOIN bill on bill_details.billid = bill.billid INNER JOIN product ON bill_details.productid=product.productid where bill_details.billid='$billid'";
    //    $sql = "SELECT * FROM `bill_details` INNER JOIN bill on bill_details.billid = bill.id INNER JOIN product ON bill_details.productid=product.productid where billid='$billid'";
    //     echo $sql;
        $result = mysqli_query($db, $sql);
        while ($detail = mysqli_fetch_array($result)) {
            $k++;
        //    $status = $detail["status"];
        //    $bill = $detail["billid"];
           $quantity =$detail["quantity"];
            ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $detail["productname"]; ?></td>
                <td><?php echo $detail["price"]; ?></td>
                <td><?php echo $detail["discount"] . "%"; ?></td>
                <td><?php echo $detail["quantity"]; ?></td>
                <td><?php echo $detail["netprice"]; ?></td>
                <td><img src="<?php echo $detail["photo"]; ?>" style="height: 90px;width: 90px" alt=""></td>
            </tr>
            <?php
        }
        ?>
<?php
// $quantity = $detail["quantity"];
?>
        </tbody>
    </table>
    <?php
    if ($status == "delievered" or $status == "shipped") {
        ?>
    <?php
    } else {
    ?>
   <div class="row justify-content-center">
        <h1 class=""><a href="cancelorder.php?q=<?php echo $billid; ?>&r=<?php echo $quantity; ?>">Cancel Order &times;</a></h1>
    </div>
    <?php
    }
    ?>
</div>
<div>
</div>
<?php
    include_once 'adminfooter.php';
    ?>

<script src="AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="AdditionalFiles/js/popper.min.js"></script>
<script src="AdditionalFiles/js/bootstrap.js"></script>

<script src="script3.js"></script>
</body>
</html>
<?php
