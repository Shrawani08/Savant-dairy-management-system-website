<?php
include "cart.php";
@session_start();
include("connection/connect.php");

date_default_timezone_set("Asia/Kolkata");

if (isset($_SESSION["username"])) {
    $email = $_SESSION["username"];

    $user = "SELECT * FROM `users` where username='$email'";
    $user_result = mysqli_query($db, $user);
    $user_row = mysqli_fetch_array($user_result);
}

// $address = $_POST['address'];
// $city = $_POST['city'];
// $zipcode = $_POST['zipcode'];
// $remarks = $_POST['remarks'];
// $paymentmethod = $_POST['paymentmethod'];
$address = $_POST['address'] ?? ''; // Default to empty string if not set
$city = $_POST['city'] ?? '';
$zipcode = $_POST['zipcode'] ?? '';
$remarks = $_POST['remarks'] ?? '';
$paymentmethod = $_POST['paymentmethod'] ?? '';
$ar = array();
$grandTotal = 0;

if (isset($_SESSION['products'])) {
    $ar = $_SESSION['products'];
    foreach ($ar as $item) {
        $discountedPriceTotal = round($item->price - (($item->price * $item->discount) / 100), 2);
        $netpriceTotal = $discountedPriceTotal * $item->qty;
        $grandTotal += $netpriceTotal;
    }
}

$currentDateTime = date('Y-m-d H:i:s');

//INSERT INTO `bill`(`billid`, `grandtotal`, `datetime`, `paymentmethod`, `city`, `zipcode`, `address`,
// `remarks`, `status`, `trackingid`, `companyname`, `trackingurl`, `trackremarks`, `personreceived`,
// `returnremarks`, `email`) VALUES ();
$sql = "INSERT INTO `bill`(`grandtotal`, `datetime`, `paymentmethod`, `city`, `zipcode`, `address`, `remarks`,`status`, `trackingid`, `companyname`, `trackingurl`, `trackremarks`, `personreceived`, `returnremarks`, `email`) 
VALUES ('$grandTotal','" . $currentDateTime . "','$paymentmethod','$city','$zipcode','$address','$remarks','pending',null,null,null,null,null,null,'$email')";
mysqli_query($db, $sql);
//echo $sql;

// Current Bill ID
$billid = $db->insert_id;

$msg = "Dear " . $user_row['username'] . ",\nThank you for Shopping with us.\n Order No. " . 'billid' . "\n Order Date/Time " . $currentDateTime . "\n";

foreach ($ar as $item) {
    $discountedPriceTotal = round($item->price - (($item->price * $item->discount) / 100), 2);
    $netpriceTotal = $discountedPriceTotal * $item->qty;
    

    //INSERT INTO `bill_details`(`id`, `price`, `discount`, `netprice`, `quantity`, `productid`, `billid`) VALUES ()
    $s = "INSERT INTO `bill_details`(`price`, `discount`, `netprice`, `quantity`, `productid`, `billid`) 
VALUES ('" . $item->price . "', '" . $item->discount . "', '" . $discountedPriceTotal . "', '" . $item->qty . "', '" . $item->id . "', '" . $billid . "')";
    mysqli_query($db, $s);

    // Update Product Stock
    $stock = $item->stock - $item->qty;
    $update = "UPDATE `product` SET `stock`='$stock' WHERE `productid`=" . $item->id;
    mysqli_query($db, $update);

    $msg .= $item->productname . " (" . $discountedPriceTotal . " X " . $item->qty . ") = " . $netpriceTotal . "\n";
}

$_SESSION['products'] = null;
unset($_SESSION['products']);

if ($paymentmethod == "cash") {
    header("Location:thanks.php?bid=" . $billid);
} else {
    echo $billid;
}
?>
