<?php
include_once "connection.php";
// include_once "adminhome.php";
$action = $_POST['action'];
switch ($action) {
    case 'add':

        $productname = $_POST['productname'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $stock= $_POST['stock'];
        // $photo= $_POST['photo'];
        $description= $_POST['description'];
        $subcategoryid=$_POST['subcategory'];
        $categoy=$_POST['categories'];

        $temp_path = $_FILES['photo']['tmp_name'];
        $org_path = $_FILES['photo']['name'];
        $filesize=round( $_FILES['photo']['size']/1024,2);
        $ext = strtolower(pathinfo($org_path, PATHINFO_EXTENSION));
        if ($ext != "jpg" && $ext != "png") {
            echo "please select jpg or png file only";
        }

        else {
            move_uploaded_file($temp_path, "uploads/$org_path");

            // INSERT INTO `product`(`productid`, `productname`, `price`, `discount`, `stock`, `photo`, `description`, `subcategoryid`) VALUES ()

            $insertQuery = "INSERT INTO `product`(`productname`, `price`, `discount`, `stock`, `photo`, `description`, `subcategoryid`,`categoryname`) VALUES ('$productname','$price ','$discount','$stock','uploads/$org_path','$description','$subcategoryid','$categoy')";
            // echo $insertQuery;
            $result = mysqli_query($con, $insertQuery);

                if ($result) {
                    $msg="added";
                    header("location:products.php?msg=$msg");
                } else {
                    $msg="notadded";
                    header("location:products.php?msg=$msg");
                }
            }
                break;
    case 'delete':
            $id = $_POST['productid'];

            $deleteQuery = "delete from `product` where productid='$id'";
            // echo $deleteQuery;
            if (mysqli_query($con, $deleteQuery)) {
                $msg="success";
                header("location:products.php?msg=$msg");
            } else {
                $msg="failed";
                header("location:products.php?msg=$msg");
                // echo $deleteQuery;
            }
            break;

    case 'update':
        $productid = $_POST['productid'];
        $productname = $_POST['productname'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $stock= $_POST['stock'];
        // $photo= $_POST['photo'];
        $description= $_POST['description'];
        // $subcategoryid=$_POST['subcategory'];


        $temp_path = $_FILES['photo']['tmp_name'];
        $org_path = $_FILES['photo']['name'];
        $filesize=round( $_FILES['photo']['size']/1024,2);
        $ext = strtolower(pathinfo($org_path, PATHINFO_EXTENSION));
        if ($ext != "jpg" && $ext != "png") {
            echo "please select jpg or png file only";
        }
        // elseif ($filesize >20)
        // {
        //     echo "Image Size must be Less than or equal to 20 KB";
        // }
        else {
            move_uploaded_file($temp_path, "uploads/$org_path");
            $updateQuery = "UPDATE `product` SET `productname`='$productname',`price`='$price',`discount`='$discount',`stock`='$stock',`photo`='uploads/$org_path',`description`='$description' WHERE `productid`='$productid'";
            $result = mysqli_query($con, $updateQuery);
            if ($result) {
                // echo $updateQuery;
                $msg="updated";
                header("location:products.php?msg=$msg");
            } else {
                $msg="notupdated";
                header("location:products.php?msg=$msg");
            }
    }


}