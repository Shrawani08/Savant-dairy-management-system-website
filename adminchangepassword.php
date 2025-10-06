<?php
@session_start();
if (!isset($_SESSION['username'])) {
   header("Location:adminlogin.php");
    exit();
}
?>


<?php
$errorMessage = '';
$successMessage = '';
if (isset($_POST['changepassword'])) {
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $username = $_SESSION['username'];
    $confirmnewpassword = $_POST['confirmnewpassword'];
    if ($newpassword != $confirmnewpassword) {
        $errorMessage = "New Password & Confirm New Password Not Match";
    } else {
        include_once "connection.php";
        $selectCMD = "select * from admin_login where username='$username' and password='$oldpassword'";
        $data = mysqli_query($con, $selectCMD);
        if (mysqli_num_rows($data) == 0) {
            $errorMessage = "Invalid Old Password";
        } else {

            $updateCMD = "update admin_login set password='$newpassword' where username='$username'";
            if (mysqli_query($con, $updateCMD)) {
                $successMessage = "Password Updated";
                header("location:adminlogin.php?msg=$successMessage");
            } else {
                $errorMessage = $updateCMD;
            }

        }
    }
}
?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Change Password</title>
    <?php
    // include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader2.php";
?>

<?php 
if (isset($_SESSION['username'])){
    $user = $_SESSION['username'];
            ?>
            <div style="margin-top: 15px; ">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Changing Password For ADMIN as USERNAME = <?php echo $user; ?> </strong>
                    </div>
            </div>
            </div>
            <?php
        }

    ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <br>
            <h2 class="text-center badge-pill badge-info">Change Password</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="oldpassword">Old Password</label>
                    <input type="password" required name="oldpassword" id="oldpassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" required name="newpassword" id="newpassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirmnewpassword">Confirm New Password</label>
                    <input type="password" required name="confirmnewpassword" id="confirmnewpassword"
                           class="form-control">
                </div>
                <div class="form-group">
                <form onsubmit="return confirm('Are you Sure to Cahnge Your Password ?')" method="post">
                    <input type="submit" name="changepassword" value="Update Password" class="btn btn-info btn-block">
</form>
                    <br>
                    <?php
                    if ($errorMessage != '') {
                        echo "<div class='alert alert-danger'>$errorMessage</div>";
                    }
                    if ($successMessage != '') {
                        echo "<div class='alert alert-success'>$successMessage</div>";
                    }
                    ?>
                </div>

            </form>
        </div>
    </div>


</div>

<?php
include_once "footerfiles.php";
?>
</body>
    </html>