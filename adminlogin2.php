<?php
@session_start();
$username = $password = $usernameError = $passwordError ="";

if (isset($_POST['loginadmin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    include_once "connection.php";
    $selectcmd = "select * from admin_login where username='$username'";
    $data = mysqli_query($con, $selectcmd);
    if (mysqli_num_rows($data) == 0) {
        $usernameError = "invalid Username";
    } else {
        $row = mysqli_fetch_assoc($data);
        if ($row['password'] == $password) {
            $_SESSION['username'] = $username;
            header("Location:adminhome.php");
        } else {
            $passwordError = "Incorrect password";
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
            #navbar {
                position: sticky;
                background: black;
                opacity: .6;
                color: white;
            }

            #logo {
                margin: 10px 34px;
                padding-top: 20px;
            }

            #logo img {
                height: 59px;
                margin: 3px 6px;
            }

            #navbar:after {
                content: '';
                display: block;
                clear: both;
            }

            .menuoptions {
                margin-right: 150px;
                float: right;
            }

            .menuoptions:hover {
                color: black;
            }

            .menuoptions li {
                display: inline-block;
                list-style: none;
                position: relative;
                font-weight: bolder;
            }

            .menuoptions li a {
                display: inline-block;
                color: white;
                padding: 20px;
                text-decoration: none;
            }

            .menuoptions li:hover {
                background: #555;
            }

            #hrheh {
                font-family: Georgia, 'Times New Roman', Times, serif;
                font-weight: bold;
            }
          </style>
     </head>
<body style="background-image: url('bdybg2.jpg'); background-size: 100% 500px; background-repeat: no-repeat;">
        <nav class="sticky-top">
            <div class="wrapper">
                <nav id="navbar">
                <div id="logo">
                <img src="dairy image set/logo.jpg" alt="Milkystore.com">
                    <ul class="menuoptions">
                        <li class="item"><a href="userhome.php"><b>User Home</b></a></li>
                    </ul>
                </div>
            </div>
        </nav>
     <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content mt-5">
               <div class="login-form mt-150">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                     <div class="form-group">
                     <h3 class="badge-pill badge-danger"><b>ADMIN LOGIN</b></h3>
                        <label for="username" class="badge-pill badge-dark"><b>USERNAME</b></label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Username" required>
                        <?php
                    if ($usernameError != '') {
                        echo "<label class='error'>$usernameError</label>";
                    }
                    ?>
                     </div>
                     <div class="form-group">
                        <label for="password" class="badge-pill badge-dark"><b>Password</b></label>
                        <input type="password" name="password" value="<?php echo $password; ?>"  class="form-control" placeholder="Password" required>
                        <?php
                    if ($passwordError != '') {
                        echo "<label class='error'>$passwordError</label>";
                    }
                    ?>


                     </div>
                     <div class="d-grid gap-2 ">
                     <button type="submit" name="loginadmin" class="btn btn-primary btn-block">Sign in</button>
                     </div>
					</form>
                    <br>
                    <br>
               </div>
            </div>
         </div>
      </div>
      <?php
      include_once "footerfiles.php";
      ?>
      <?php
      include_once "adminfooter.php";
      ?>
   </body>
</html>