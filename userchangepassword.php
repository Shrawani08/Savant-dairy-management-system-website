<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
    <link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">
    <link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">
    <link rel="icon" href="images/grocery.png">

    <title>Change Password</title>

    <style>
        body {
            line-height: 1.5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .container::after {
            background: url('images/background image.jpg') no-repeat center/cover;
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.2;
        }
    </style>

    <script>
        function clicknewpassword() {
            var x = document.getElementById("newpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function clickoldpassword() {
            var x = document.getElementById("oldpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function clicknewconpassword() {
            var x = document.getElementById("newconpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>
<body onload="getCartCount()">

<?php
include_once 'usernavbar2.php';
?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body justify-content-center">
                    <h3 class="card-title">Change Password</h3>
                    <hr>
<div>
<?php
                        if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "not changed") {
                        ?>
                        <div style="margin-top: 15px;">
                            <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                            <div class="alert alert-danger">
                                <a href="#" data-dismiss="alert" class="close">&times;</a>
                                <strong>Password Not Changed</strong>
                            </div>
                        </div>
                        <?php
                    }
                    }
                    ?>
                    </div>
                </div>
                <form action="user_signup_and_login_action.php" method="post">
                    <div class="form-group">
                        <label for="oldpassword">Enter Old Password</label>
                        <input type="password" name="oldpassword" id="oldpassword"
                               placeholder="enter old password"
                               data-rule-required="true" data-msg-required="Please enter old password"
                               class="input-field form-control" ><input type="checkbox" onclick="clickoldpassword()">&nbsp;Show old password
                    </div>
                    <div class="form-group">
                        <label for="newpassword">Enter New Password</label>
                        <input type="password" name="newpassword" id="newpassword"
                               placeholder="enter new password"
                               data-rule-required="true" data-msg-required="Please enter new password"
                               class="input-field form-control"><input type="checkbox" onclick="clicknewpassword()">&nbsp;Show new password
                    </div>
                    <div class="form-group">
                        <label for="newconpassword">Confirm New Password</label>
                        <input type="password" name="newconpassword" id="newconpassword"
                               placeholder="enter confirm password"
                               data-rule-required="true" data-msg-required="Please enter confirm new password"
                               data-rule-equalto="#newpassword"
                               data-msg-equalto="New Password and confirm new password must be same"
                               class="input-field form-control"><input type="checkbox" onclick="clicknewconpassword()">&nbsp;Show new password
                    </div>
                    <input type="hidden" name="action" value="changepassword">
                    <input type="submit" value="Change Password" class="btn btn-danger btn-block">
                    </form>

                    <div>
                        <?php
                        if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "Password Changed Successfully") {
                        ?>
                        <div style="margin-top: 15px;">
                            <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                            <div class="alert alert-suucess">
                                <a href="#" data-dismiss="alert" class="close">&times;</a>
                                <strong>Password Changed Succesfully</strong>
                            </div>
                        </div>
                        <?php
                    }
                    }
                    ?>
                        <?php
                        if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "password Not Changed") {
                        ?>
                        <div style="margin-top: 15px;">
                            <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                            <div class="alert alert-danger">
                                <a href="#" data-dismiss="alert" class="close">&times;</a>
                                <strong>No User Found</strong>
                            </div>
                        </div>
                        <?php
                    }
                    }
                    ?>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<?php
include_once "adminfooter.php";
?>

<script src="AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="AdditionalFiles/js/popper.min.js"></script>
<script src="AdditionalFiles/js/bootstrap.js"></script>

<script src="AdditionalFiles/js/script.js"></script>

</body>
</html>