<?php
include_once "connection.php";
// include_once "adminhome.php";
$action = $_POST['action'];
switch ($action){
    case 'add':

        $subcategoryname = $_POST['subcategoryname'];
        $description= $_POST['description'];
        $categories = $_POST['categories'];
        // $brand = $_POST['brand'];
        $insertQuery = "INSERT INTO `subcategory`(`subcategoryname`, `description`, `categories`) VALUES ('$subcategoryname','$description','$categories')";
            $result = mysqli_query($con, $insertQuery);

                if ($result) {
                    $msg="added";
                    header("location:subcategories.php?msg=$msg");
                } else {
                    $msg="notadded";
                    header("location:subcategories.php?msg=$msg");
                }
                break;
    case 'delete':
            $subcatid = $_POST['sub_categories'];

            $deleteQuery = "delete from `subcategory` where subcategoryid='$subcatid'";
            // echo $deleteQuery;
            if (mysqli_query($con, $deleteQuery)) {
                $msg="success";
                header("location:subcategories.php?msg=$msg");
            } else {
                $msg="failed";
            
                header("Location: subcategories.php?msg=$msg");
            }
            break;
    case 'update':
        $subcatID = $_POST['subcatID'];
        $subcategoryname = $_POST['subcategoryname'];
        $description= $_POST['description'];
        $categories = $_POST['categories'];
        // $brand = $_POST['brand'];
        $updateQuery = "UPDATE `subcategory` SET `subcategoryname`='$subcategoryname',`description`='$description',`categories`='$categories' WHERE `subcategoryid`='$subcatID'";
        // echo $updateQuery;
        $result = mysqli_query($con, $updateQuery);
        if ($result) {
            $msg="updated";
            header("Location: subcategories.php?msg=$msg");
        } else {
            $msg="notupdated";
            header("Location: subcategories.php?msg=$msg");
        }
    
    }
