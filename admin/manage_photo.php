<?php
include_once "connection.php";
// include_once "adminhome.php";
$action = $_POST['action'];
switch ($action) {
    case 'add':

        $temp_path = $_FILES['photo']['tmp_name'];
        $org_path = $_FILES['photo']['name'];
        $filesize=round( $_FILES['photo']['size']/1024,2);
        $ext = strtolower(pathinfo($org_path, PATHINFO_EXTENSION));
        if ($ext != "jpg" && $ext != "png") {
            echo "please select jpg or png file only";
        }
        else {
        move_uploaded_file($temp_path, "uploads/$org_path");
        $caption= $_POST['caption'];
        $pid= $_POST['pid'];

        $insertQuery = "INSERT INTO `productphoto`(`photo`, `caption`, `productid`) VALUES ('uploads/$org_path','$caption','$pid')";
        $result = mysqli_query($con, $insertQuery);

                if ($result) {
                    $msg="photoadded";
                    header("location:products.php?msg=$msg");
                } else {
                    $msg="photonotadded";
                    header("location:products.php?msg=$msg");
                }
            }
                break;
    case 'delete':

            $id = $_POST['id'];

            $deleteQuery = "delete from `productphoto` where id='$id'";
            // echo $deleteQuery;
            if (mysqli_query($con, $deleteQuery)) {
                $msg="deletesuccess";
                header("location:viewphoto.php?msg=$msg");
            } 
            else {
                $msg="deletefailed";
                header("location:viewphoto.php?msg=$msg");
            }
            break;

    case 'update':
        
            $temp_path = $_FILES['photo']['tmp_name'];
            $org_path = $_FILES['photo']['name'];
            $filesize=round( $_FILES['photo']['size']/1024,2);
            $ext = strtolower(pathinfo($org_path, PATHINFO_EXTENSION));
            if ($ext != "jpg" && $ext != "png") {
                echo "please select jpg or png file only";
            }
            else {
            move_uploaded_file($temp_path, "uploads/$org_path");
            $caption= $_POST['caption'];
            $pid= $_POST['id'];
            $updateQuery = "UPDATE `productphoto` SET `photo`='uploads/$org_path',`caption`='$caption' WHERE `id`='$id'";
            $result = mysqli_query($con, $updateQuery);

                if ($result) {
                        // echo $updateQuery;
                        $msg="updated";
                        header("location:viewphoto.php?msg=$msg");
                    } else {
                        $msg="notupdated";
                        header("location:viewphoto.php?msg=$msg");
                    }
            }
}