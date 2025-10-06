<?php
include_once 'adminheader2.php';
date_default_timezone_set("Asia/Kolkata");


include_once 'connection.php';

$billid = $_POST["billid"];
$trackingid = $_POST["trackid"];
$company = $_POST["companyname"];
$trackingurl = $_POST["trackingurl"];
$trackingremarks = $_POST["remarks"];
$fullname = $_POST["fullname"];
$currentDateTime = date('Y-m-d H:i:s');

$update = "UPDATE `bill` SET `status`='shipped',`trackingid`='$trackingid',`companyname`='$company',`trackingurl`='$trackingurl',`trackremarks`='$trackingremarks' WHERE `billid`='$billid'";

//$msg = "Dear " . $fullname . ",\nYour Order is shipped with .\n tracking id " . $trackingid . "\n shipping Date/Time " . $currentDateTime . "\n with shipping partner " . $company . "\n with track remarks " . $trackingremarks;

if (mysqli_query($con, $update)) {

    ?>
    <script>
        alert("Order Shipped.")
        window.location.href = "vieworder.php";
    </script>
<?php
} else {
    echo "Update Failed";
    //  header("location:vieworder.php");
}

