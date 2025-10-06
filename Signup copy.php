
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
    <link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">
    <link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">

<link rel="icon" href="dairy image set/logo.jpg">
    <style>
        .l-bg-blue-dark {
            background: linear-gradient(to right, #373b44, #4286f4) !important;
            color: #fff;
        }
    </style>

    <script>
        function showpassword() {
            var x = document.getElementById("npass");
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
include_once 'usernavbar.php';
?>

<form action="user_signup_and_login_action.php" method="post">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="col-sm-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-body">
                        <h3 class="card-title" style="text-align: center;">SignUp Form</h3>
                        <hr>
                        <!-- <div class="row"> -->
                        <div>
                            <?php
                            if (isset($_GET['msg'])) {
                            if ($_GET['msg'] == "notadded") {
                            ?>
                            <div style="margin-top: 15px;">
                                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                                <div class="alert alert-danger">
                                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                                    <strong>Sorry, Account is Not Created..try after Some Time</strong>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        ?>

                        <?php
                        if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "emailexcist") {
                        ?>
                        <div style="margin-top: 15px;">
                            <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                            <div class="alert alert-danger">
                                <a href="#" data-dismiss="alert" class="close">&times;</a>
                                <strong>Email Excist Already!</strong>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    ?>

                    <?php
                    if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "numberexcist") {
                    ?>
                    <div style="margin-top: 15px;">
                        <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                        <div class="alert alert-danger">
                            <a href="#" data-dismiss="alert" class="close">&times;</a>
                            <strong>Phone Number Excist Already!</strong>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                ?>

                <?php
                if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "numberandemailexcist") {
                ?>
                <div style="margin-top: 15px;">
                    <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                    <div class="alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <strong>Phone Number and Email Excist Already! for a particular Account</strong>
                    </div>
                </div>
            </div>
            <?php
            }
            }
            ?>
        </div>
        <div class="col-sm-auto">
            <div class="form-group">
                <label for="nname">Enter Full name</label>
                <input type="text" name="fname" id="nname" class="form-control" placeholder="Full name">
            </div>
            <div class="form-group">
                <label for="email">Enter email id</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="npass">Enter Password</label>
                <input type="password" id="npass" name="password" class="form-control" placeholder="Password"
                       aria-describedby="passwordid"><input type="checkbox" onclick="showpassword()">&nbsp;show password
                <small id="passwordid" class="form-text form-muted text-info">Password must contain 8 to 16
                    characters</small>
            </div>
            <div class="form-group">
                <label for="cpass">Confirm Password</label>
                <input type="password" id="cpass" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label for="phonenumber">Enter Mobile number</label>
                <input type="tel" name="pno" id="phonenumber" class="form-control" placeholder="Phone number">
            </div>
            <div class="form-group">
                <label>Gender:&nbsp;</label>
                <input type="radio" name="Gender" checked value="Male" id="male"><label for="male">&nbsp;Male</label>
                <input type="radio" name="Gender" value="Female" id="female"><label for="female">&nbsp;Female</label>
                <input type="radio" name="Gender" value="others" id="others"><label for="others">&nbsp;Others</label>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="add">
                <button type="submit" value="submit" onsubmit="submit()" class="btn btn-warning btn-block">Submit
                </button>
            </div>
            <button type="reset" value="reset" onclick="reset()" class="btn btn-warning btn-block">Clear form</button>
            <br>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</form>
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