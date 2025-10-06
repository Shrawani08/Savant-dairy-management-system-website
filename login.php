<!DOCTYPE HTML>
<html lang="en">
<?php
session_start(); 
include("connection/connect.php"); 
error_reporting(0); 

?>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="login_style.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
</head>

<body>
<?php
include("./connection/connect.php"); 
$username_error = $password_error = "";
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];

	if(!empty($username) && !empty($password))   
     {
      $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      if($row && password_verify($password, $row['password']))  // Verifying hashed password
      {
        $_SESSION["username"] = $row['username']; 
        $_SESSION["user_id"] = $row['u_id']; 
          header("Location:index.php"); 
          exit();
      } 
      else
      { 
          echo "<script>alert('Invalid Username or Password!');</script>";
        
      }
      $stmt->close();
  }
  else{
    echo "<script>alert('Username or Password cannot be empty!');</script>";
  }
}

?>

	
  <div class="container">
    <div class="header">
      <h2>Login Form</h2>
    </div>

    <form action="login.php" method="post" class="form" id="form">
      <div class="input-container">
        <label for="username">Username</label>
        <input type="text" placeholder="Enter your username" id="username" name="username" autocomplete="off"/>

        <small class="error-message"><?php echo $username_error; ?></small>

      </div>
      <div class="input-container">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" autocomplete="off" />
        <i class="fa-solid fa-eye toggle-password " onclick="togglePassword('password', this)"></i>
  
        <small class="error-message"><?php echo $password_error; ?></small>

        
      </div>
      <button type="submit" id="button" class="btn" name="submit" value="Login">Login
      </button>
    </form>

    <form class="login-form">
      <!-- <button type="button" onclick="window.location.href='signup.html'">SIGN UP</button> -->
      <p>Don't have an account?<a class="loginpagelink" href="signup.php">SIGNUP</a></p>
    </form>
  </div>
  <script src="./script2.js"></script>


</body>

</html>