<!DOCTYPE html>
<html lang="en" charset="utf-8">
<head>
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="./signup_style.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css" />

</head>
<?php
ob_start();
session_start();
//header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection/connect.php");
file_put_contents("debug_log.txt", "Received request: " . print_r($_POST, true) . "\n", FILE_APPEND);

if (!$db) {
  die(json_encode(["error"=>"Database connection failed".mysqli_connect_error()]));
  }
// header("Content-Type:application/json");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
  if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die(json_encode(["error" => "Invalid request"]));
  }
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$phoneNo = trim($_POST['phoneNo']);

if (!$db) {
die("Database connection failed!");
}
// die("Checkpoint1");
if (empty($username) || empty($email) || empty($password) || empty($phoneNo)) {
  echo json_encode(["error" =>"All fields are required"]);
  exit();
} elseif (strlen($password) < 6) {
  echo json_encode(["error" =>"Password must be of atleast 6 characters"]);
  exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
echo json_encode(["error" => "Invalid email address!"]);
  exit();
} elseif (!preg_match('/^[0-9]{10,15}$/', $phoneNo)) {
echo json_encode(["error" => "Phone number must be between 10 to 15 digits!"]);
exit();
} else {
  $stmt = $db->prepare("SELECT username FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
      echo json_encode(["error" =>"Username already exists!Please login"]);
      exit();
    }
  else {
      $stmt->close();

      $stmt = $db->prepare("SELECT email FROM users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
          echo json_encode(["error"=>"Email already exists!"]);
          exit();
      } else {
          $stmt->close();
          $hashed_password = password_hash($password, PASSWORD_BCRYPT);
          
          $stmt = $db->prepare("INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("ssss", $username, $email, $hashed_password, $phoneNo);

          if ($stmt->execute()) {
          
              echo json_encode(["success" =>"Registration successful"]);
          }  else {
            echo json_encode(["error" =>"Database error".$stmt->error]);
          }
          $stmt->close();
          exit();
      
      }
  }
}
}
?>
  
<body>
  <div class="container">
    <div class="header">
      <h2>REGISTRATION FORM</h2>
    </div>
    <form action="signup.php" method="post" class="form" id="form">
      
      <div class="input-container">
        <label for="username">Username</label>
        <input type="text" placeholder=" Enter your user name" id="username" name="username" autocomplete="off" />
        <i class="fa-solid fa-circle-check icons"></i>
        <i class="fa-solid fa-circle-exclamation icons"></i>
        <small>Error Msg</small>
      </div>

      <div class="input-container">
        <label for="email">Email</label>
        <input type="text" placeholder=" Enter email address" id="email" name="email" autocomplete="off"/>
        <i class="fa-solid fa-circle-check icons"></i>
        <i class="fa-solid fa-circle-exclamation icons"></i>
        <small>Error Msg</small>
      </div>


      <div class="input-container">
        <label for="phoneNo">Phone Number</label>
        <input type="number" id="phoneNo" placeholder="Enter your phone number" name="phoneNo" autocomplete="off" />
        <i class="fa-solid fa-circle-check icons"></i>
        <i class="fa-solid fa-circle-exclamation icons"></i>
        <small>Error Msg</small>
      </div>
      <div class="input-container">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Set a password" name="password" autocomplete="off" />
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password', this)"></i>
        <i class="fa-solid fa-circle-check icons"></i>
        <i class="fa-solid fa-circle-exclamation icons"></i>
        <small>Error Msg</small>
      </div>
      <div class="input-container">
        <label for="cpassword">Confirm Password</label>
        <input type="password" id="cpassword" placeholder="Enter password again" name="cpassword" autocomplete="off" />
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('cpassword', this)"></i>
        <i class="fa-solid fa-circle-check icons"></i>
        <i class="fa-solid fa-circle-exclamation icons"></i>
        <small>Error Msg</small>
      </div>

    
      <button type="submit" class="btn" value="register" name ="submitreg" >Sign Up
      </button>
    </form>

    <form class="sign-form" id = "sign-form">
      <!-- onclick="window.location.href='login.html'" -->
      <p>Already have an account?<a class="loginpagelink" href="login.php">LOGIN</a></p>
    </form>
  </div>
  <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script>


$(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault();
        
        // Perform validation
        if (validate()) {
            // If validation passes, submit the form using AJAX
            $.ajax({
                type: "POST",
                url: "signup.php", 
                data: $(this).serialize(), 
                datatype : "json",
                headers: {
        'X-Requested-With': 'XMLHttpRequest'
    },
                success: function(response) {
                   alert("Registration successful");
                   window.location.href = "login.php";
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                    alert("An error occurred while submitting the form.");
                }
            });
        }
    });
    


//final data validation


isEmail=(emailVal)=>{
    //more validating email
    var atsymbol = emailVal.indexOf("@");
    if(atsymbol<1){
        return false;
    }
    var dotposition = emailVal.lastIndexOf(".")
    if(dotposition<atsymbol+2){
return false;
    }
    if(dotposition === emailVal.length -1){
        return false;
    }
    return true;
}
const validate= () =>{
    const username = document.getElementById('username');
const email = document.getElementById('email');
const phone = document.getElementById('phoneNo');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');
    
    const usernameVal = username.value.trim();
    const emailVal = email.value.trim();
    const phoneVal = phone.value.trim();
    const passwordVal = password.value.trim();
    const cpasswordVal = cpassword.value.trim();
    // const passwordRegex = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{5,}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{5,}$/;
let isvalid = true;
    
    //validate username
    if(usernameVal ===""){
        setErrorMsg(username,"Username cannot be blank");
        isvalid = false;
    }
    else if(usernameVal.length<=2){
        setErrorMsg(username,"Username of minimum 3 characters");
        isvalid = false;

    }
    else{
        setSuccessMsg(username);
    }
    //validate email
    if(emailVal ===""){
        setErrorMsg(email,"Email cannot be blank");
        isvalid = false;

    }
    else if(!isEmail(emailVal)){
        setErrorMsg(email,"Not a valid Email");
        isvalid = false;

    }
    else{
        setSuccessMsg(email);
    }

    //validate phone
    if(phoneVal ===""){
        setErrorMsg(phone,"Phone cannot be blank");
        isvalid = false;

    }
    else if(phoneVal.length!=10){
        setErrorMsg(phone,"Not a valid Phone Number");
        isvalid = false;

    }
    else{
        setSuccessMsg(phone);
    }
    //validate password
    if(passwordVal ===""){
        setErrorMsg(password,"Password cannot be blank");
        isvalid = false;

    }
    else if(!passwordRegex.test(passwordVal)){
        setErrorMsg(password,"Create a stronger password with special character,lowercase letter,uppercase letter");
        isvalid = false;

    }
    else{
        setSuccessMsg(password);
    }

//validate cpassword
if(cpasswordVal ===""){
    setErrorMsg(cpassword,"Confirm Password cannot be blank");
    isvalid = false;

}
else if(passwordVal!= cpasswordVal){
    setErrorMsg(cpassword,"Passwords do not match");
    isvalid = false;

}
else{
    setSuccessMsg(cpassword);
}
return isvalid;
}
function setErrorMsg(input,errormsgs){
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = "input-container error";
    small.innerText = errormsgs;
    const eyeIcon = formControl.querySelector(".toggle-password");
    if (eyeIcon) {
        eyeIcon.style.right = "30px"; 
    }
    const checkIcon = formControl.querySelector(".fa-circle-check");
    const errorIcon = formControl.querySelector(".fa-circle-exclamation");

    if (errorIcon) errorIcon.style.visibility = "visible";  
    if (checkIcon) checkIcon.style.visibility = "hidden";  
}
function setSuccessMsg(input){
    const formControl = input.parentElement;
    
    formControl.className = "input-container success";
    const eyeIcon = formControl.querySelector(".toggle-password");
    if (eyeIcon) {
        eyeIcon.style.right = "30px"; 
    }
    const checkIcon = formControl.querySelector(".fa-circle-check");
    const errorIcon = formControl.querySelector(".fa-circle-exclamation");

    if (checkIcon) checkIcon.style.visibility = "visible";
    if (errorIcon) errorIcon.style.visibility = "hidden";
}
});
function togglePassword(fieldId, icon) {
    const passwordField = document.getElementById(fieldId);

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
   
    </body>
    
  </html>