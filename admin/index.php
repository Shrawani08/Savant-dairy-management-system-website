<?php
// ob_start();
// session_start();

// @session_start();
// $username = $password = $error ="";

// if (isset($_POST['submit'])) {
//     $username = trim($_POST['username']);
//     $password = trim($_POST['password']);
    
//     include('../connection/connect.php');
//     $stmt = $db->prepare("SELECT * FROM admin WHERE username = ?");
// $stmt->bind_param("s", $username);
// $stmt->execute();
// $result = $stmt->get_result();
// if ($result->num_rows == 0) {
//     $error = "Invalid Username";
// } else {
//     $row = $result->fetch_assoc();
//     if ($row['password'] == $password) {
//             $_SESSION['username'] = $username;
//             header("Location:dashboard.php");
//             exit();
//         } else {
//             echo "<script>alert('Invalid Username or Password!');</script>";
//             $error = "Incorrect password";
//         }
//     }
// }
// @session_start();
// $username = $password = $usernameError = $passwordError ="";

// if (isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
    
//     include( "../connection/connect.php");
//     $selectcmd = "select * from admin where username='$username'";
//     $data = mysqli_query($db, $selectcmd);
//     if (mysqli_num_rows($data) == 0) {
//         $usernameError = "Invalid Username";
//     } else {
//         $row = mysqli_fetch_assoc($data);
//         if ($row['password'] == $password) {
//             $_SESSION['username'] = $username;
//             header("Location:dashboard.php");
//         } else {
//             $passwordError = "Incorrect password";
//         }
//     }
// }

session_start();
$username = $password = $usernameError = $passwordError = "";

// Database Connection
include_once "../connection/connect.php";
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Use Prepared Statement to Prevent SQL Injection
    $stmt = $db->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $usernameError = "Invalid Username";
    } else {
        $row = $result->fetch_assoc();

        if ( $row['password'] == $password) {
            $_SESSION['username'] = $username;
            header("Location: search2go.php");
            exit();
        } else {
            $passwordError = "Incorrect password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/admin_login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>



<div class="login-container">
        <h2>Admin Login</h2>
  <form class="login-form" action="index.php" method="post">
    <div class="input-group">
    <label for="username">Enter username</label>
    <input type="text" placeholder="Username" id="username" name="username" required />

        <i class="fa-solid fa-circle-check icons"></i>
        <i class="fa-solid fa-circle-exclamation icons"></i>
        <small><?php echo $usernameError; ?></small>
    </div>
    <!-- <p class="message" style="color:red;"></p> -->

    <div class="input-group">
    <label for="password">Enter password</label>
    <input type="password" placeholder="Password" id="password" name="password" required />
    <i class="fa-solid fa-eye toggle-password eye1" style ="padding-right:8px;"onclick="togglePassword('password', this)"></i>
        <i class="fa-solid fa-circle-check icons"></i>
        <i class="fa-solid fa-circle-exclamation icons"></i>
        <small><?php echo $passwordError; ?></small>
    </div>
    <!-- <p class="message" style="color:red;"></p> -->
    <input type="submit" name="submit" value="Login" class = "btn" />
  </form>
</div>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/js/index.js"></script>
<script src = "../script2.js"></script>

</body>
</html>

