<?php
@session_start();
include_once "connection.php";

$action = $_POST['action'];

switch ($action) {
    case 'add':
        $fullname = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phno = $_POST['pno'];
        $gender = $_POST['Gender'];

        $insertQuery = "INSERT INTO `users`(`email`, `fullname`, `password`, `gender`, `mobile`) VALUES ('$email','$fullname','$password','$gender','$phno')";
        $result = mysqli_query($con, $insertQuery);
        $selectcmd = "select * from users where email='$email'";
        $data = mysqli_query($con, $selectcmd);
        $selectcmd1 = "select * from users where mobile='$phno'";
        $data1 = mysqli_query($con, $selectcmd1);
        $selectcmd2 = "select * from users where mobile='$phno' and email='$email'";
        $data2 = mysqli_query($con, $selectcmd2);
        if ($result) {
            $msg = "added";
            // echo $insertQuery;
            header("location:Login.php?msg=$msg");
        } elseif (mysqli_num_rows($data) == 1) {
            $msg = "emailexcist";
            header("location:Signup.php?msg=$msg");
        } elseif (mysqli_num_rows($data1) == 1) {
            $msg = "numberexcist";
            header("location:Signup.php?msg=$msg");
        } elseif (mysqli_num_rows($data2) == 1) {
            $msg = "numberandemailexcist";
            header("location:Signup.php?msg=$msg");
        } else {
            $msg = "notadded";
            header("location:Signup.php?msg=$msg");
        }
        break;

    case 'Login':
        if (isset($_POST['email'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];

            $selectcmd = "select * from users where email='$username'";
            $data = mysqli_query($con, $selectcmd);

            if (mysqli_num_rows($data) == 0) {
                $usernameError = "invalid Username";
                header("Location:Login.php?msg=$usernameError");
            } else {
                $row = mysqli_fetch_assoc($data);
                if ($row['password'] == $password) {
                    $_SESSION['email'] = $username;
                    $success = "Login Successfully";
                    header("Location:userhome2.php?msg=$success");
                } else {
                    $passwordError = "Incorrect password";
                    header("Location:Login.php?msg=$passwordError");
                }
            }
        }

        break;

    case 'changepassword':
        $email = $_SESSION["email"];
        $oldpassword = $_POST["oldpassword"];
        $newpassword = $_POST["newpassword"];
        $newconpassword = $_POST["newconpassword"];

        $qury = "select * from users where email ='$email' and password ='$oldpassword'";
        $result = mysqli_query($con, $qury);

        if (mysqli_num_rows($result) > 0) {
            $q2 = "update users set password ='$newpassword' where email='$email'";
            echo $q2;
            if (mysqli_query($con, $q2)) {
                $success = "Password Changed Successfully";
                header("Location:Login.php?msg=$success");
            } else {
                $passwordError = "password Not Changed";
                header("location:userchangepassword.php?msg=$passwordError");
            }
        }
        else{
            $msg="not changed";
            header("location:userchangepassword.php?msg=$msg");

        }
}

?>


