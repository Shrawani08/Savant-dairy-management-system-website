<?php
// session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
    <?php
    // include_once 'headerfiles.php';
    ?>
</head>
<body>
<?php
include_once 'adminheader2.php';
?>
<div class="container">
    <table class="table">
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
        $k = 0;
        include_once "connection.php";
        $billid = $_GET["q"];
        $fullname = $_GET["r"];
        $mobile = $_GET["s"];
        $sql = "SELECT bill_details.price,bill_details.discount,bill_details.netprice,bill_details.quantity,product.productname,product.photo FROM `bill_details` INNER JOIN bill on bill_details.billid = bill.billid INNER JOIN product ON bill_details.productid=product.productid where bill_details.billid='$billid'";
        // echo $sql;
        $result = mysqli_query($con, $sql);
        $grandTotal = 0;
            while ($detail = mysqli_fetch_array($result)) {
                $k++;
                ?>
                <tr>
                    <td><?php echo $k; ?></td>
                    <td><?php echo $detail["productname"]; ?></td>
                    <td><?php echo $detail["price"]; ?></td>
                    <td><?php echo $detail["discount"] . "%"; ?></td>
                    <td><?php echo $detail["quantity"]; ?></td>
                    <?php
                    $price = ($detail["quantity"])*($detail["netprice"]);
                    ?>
                    <td><?php echo $price; ?></td>
                    <td><img src="<?php echo $detail["photo"]; ?>" style="height: 80px;width: 80px" alt=""></td>
                </tr>
                <?php
                $grandTotal += $price;
                // $graandtotal = 
                
            }
        ?>
        </tbody>
        <tfoot class="text-right">
        <tr>
            <td colspan="5">Total Amount</td>
            <td><strong><?php echo $grandTotal; ?>
                    <input type="hidden" name="grandTotal" id="grandTotal"
                           value="<?php echo round($grandTotal, 0) ?>">
                </strong></td>
        </tr>
        </tfoot>
    </table>
</div>


</body>
</html>
<?php
