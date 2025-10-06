<?php
include_once "connection.php";
// include_once "adminhome.php";
$action = $_POST['action'];
switch ($action) {
    case 'contactt':

        @session_start();
        if (isset($_SESSION["email"])) {
            $email = $_SESSION["email"];
            $problem = $_POST['problem'];
            $insertQuery = "INSERT INTO `contactus`(`email`, `message`) VALUES ('$email','$problem')";
            $result = mysqli_query($con, $insertQuery);
            if ($result) {
                $msg="added";
                header("location:userhome2.php?msg=$msg");
            } else {
                $msg="notadded";
                header("location:userhome2.php?msg=$msg");
            }
        }
    break;

    case 'update':
        $email = $_POST['email'];
        $query = $_POST['query'];
        $solvedquery = $_POST['solved'];
        $querynum = $_POST['querynum'];
        $updateQuery = "UPDATE `contactus` SET return_message='$solvedquery' WHERE `queryid`='$querynum'";
        echo $updateQuery;
            $result = mysqli_query($con, $updateQuery);
            if ($result) {

                $msg="query answer sent";
                header("location:repliedquery.php?msg=$msg&queri=$query&solvedquery=$solvedquery&mail=$email");
            } else {
                $msg="query answer not sent";
                header("location:contactusqueries.php?msg=$msg");
            }
            $msg="query answer sent";
            header("location:contactusqueries.php?msg=$msg");
    break;
        

        case 'delete':
            $queryid = $_POST['queryid'];
            $deleteQuery = "DELETE from `contactus` WHERE `queryid`='$queryid'";
            echo $deleteQuery;
            if (mysqli_query($con, $deleteQuery)) {
                $msg="delsuccess";
                header("Location: contactusqueries.php?msg=$msg");
            } else {
                $msg="delfailed";
                
                header("Location: contactusqueries.php?msg=$msg");
            }
            break;
        }
        
