<?php
// include_once 'mycart.php';

include_once 'connection.php';
include_once 'usernavbar2.php';
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    $user = "select * from users where email='$email'";
    $user_result = mysqli_query($con, $user);
    $user_row = mysqli_fetch_array($user_result);
}

date_default_timezone_set("Asia/Kolkata");
$billid = $_POST["billid"];
$qty = $_POST["qty"];
$remarks = $_POST["remarks"];
$currentDateTime = date('Y-m-d H:i:s');


$update = "UPDATE `bill` SET `status`='cancelled', `returnremarks`='$remarks' WHERE `billid`='$billid'";
echo $update;
$msg = "Dear " . $user_row["fullname"] . ",\nYour Order is Cancelled with following reason .\n " . $remarks . "\n Date/Time " . $currentDateTime;


if (mysqli_query($con, $update)) {
    $ch = curl_init();
    $mobile = $user_row["mobile"];

    $message = urlencode($msg);
    curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "username=JulyBatchPHP2019&password=PHFDUD2Y&message=" . $message . "&phone_numbers=" . $mobile);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    print_r($ch);
    $server_output = curl_exec($ch);

    curl_close($ch);
    echo "Update Success";
    // header("location:myorders.php"); 

    $msgged = "cancelledorder";
    header("location:myorders.php?msg=$msgged");
} else {
    echo "Update Failed";
    header("location:myorders.php");
}

