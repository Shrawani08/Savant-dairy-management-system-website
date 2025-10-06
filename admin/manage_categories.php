<?php
include_once "connection.php";
// include_once "adminhome.php";
$action = $_POST['action'];
switch ($action) {
    case 'add':
        $categories = $_POST['categories'];
        $description = $_POST['description'];
        $temp_path = $_FILES['photo']['tmp_name'];
        $org_path = $_FILES['photo']['name'];
        $filesize=round( $_FILES['photo']['size']/1024,2);
        $ext = strtolower(pathinfo($org_path, PATHINFO_EXTENSION));
        if ($ext != "jpg" && $ext != "png") {
            ?>
            <script>
            alert("use correct image types");
            </script>
            <?php
        }

        else {
            move_uploaded_file($temp_path, "uploads/$org_path");
            $insertQuery = "INSERT INTO `categories`(`categories`, `description`, `catphoto`) VALUES ('$categories','$description','uploads/$org_path')";
            $result = mysqli_query($con, $insertQuery);

            if ($result) {
                $msg="added";
                header("location:categories.php?msg=$msg");
            } else {
                $msg="notadded";
                header("location:categories.php?msg=$msg");
            }
        break;
        }
    case 'delete':
        $id = $_POST['categories'];

        $deleteQuery = "delete from `categories` where categories='$id'";
        if (mysqli_query($con, $deleteQuery)) {
            $msg="success";
            header("Location: categories.php?msg=$msg");
        } else {
            // echo "<script>
            // alert('Deletion Failed.');
            // window.location.href='categories.php';
            // </script>";
            $msg="failed";
            
            header("Location: categories.php?msg=$msg");
        }
        break;
    case 'update':
        $categories = $_POST['categories'];
        $description = $_POST['description'];

        $temp_path = $_FILES['photo']['tmp_name'];
        $org_path = $_FILES['photo']['name'];
        $filesize=round( $_FILES['photo']['size']/1024,2);
        $ext = strtolower(pathinfo($org_path, PATHINFO_EXTENSION));
        if ($ext != "jpg" && $ext != "png") {
            echo "please select jpg or png file only";
        }

        else {
            move_uploaded_file($temp_path, "uploads/$org_path");
        $insertQuery = "update `categories`  set  `categories`='$categories', `description`='$description', `catphoto`='uploads/$org_path' where `categories`='$categories'";
        $result = mysqli_query($con, $insertQuery);
        if ($result) {
            $msg="updated";
            header("Location: categories.php?msg=$msg");
        } else {
            $msg="notupdated";
            header("Location: categories.php?msg=$msg");
        }
    }
}
?>


