<?php
@session_start();
if (!isset($_SESSION['username'])) {
   header("Location:adminlogin.php");
    exit();
}
?>
 
<link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
<link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">
<link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">

<style>
    li {
        margin: auto 10px;
    }

    .navbar-nav mr-auto {
        padding: auto 40px;

    }

    li a:hover {
        border: 2px solid white;
        border-radius: 7px;
        background: none;
    }


    .grid {
        display: grid;
        grid-gap: 15px;
        grid-template-areas:
  'box1  box2 ';
        margin-bottom: 20px;
    }

    .logo {
        width: 200px;
        height: 50px;
    }

    .navbar-nav li a {
        font-size: .9rem !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#" style="font-weight: bolder; color: white; font-size:x-large;"><img class="logo" src="dairy image set/logo.jpg"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item acitve">
                <a class="nav-link" style=" font-size:medium; font-weight:bold; color: white;" href="userhome.php">
                    <i class="fa fa-home"></i> USERPAGE
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="font-size:medium; font-weight: bold; color: white;" href="#"
                   id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    ADMIN
                </a>
                <ul class="dropdown-menu bg-dark " aria-labelledby="navbarScrollingDropdown">
                    <li>
                     <a class="dropdown-item text-light" href="adminchangepassword.php" style="font-weight: bold; color: white;" >CHANGE PASSWORD</a>
                     <a class="dropdown-item text-light" href="adminlogout.php" style="font-weight: bold; color: white;" >LOGOUT</a>
                </ul>
            </li>

            <li class="nav-item acitve">
                <a class="nav-link" style=" font-size:medium; font-weight:bold; color: white;" href="admindashboard.php">
                    <i class="fa fa-home"></i> DASHBOARD
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="font-size:medium; font-weight: bold; color: white;" href="#"
                   id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    CATEGORIES
                </a>
                <ul class="dropdown-menu bg-dark " aria-labelledby="navbarScrollingDropdown">
                    <li>
                     <a class="dropdown-item text-light" href="categories.php" style="font-weight: bold; color: white;" >CATEGORIES</a>
                     <a class="dropdown-item text-light" href="subcategories.php" style="font-weight: bold; color: white;" >SUB-CATEGORIES</a>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" style="font-size:medium; font-weight: bold; color: white;"
                   href="products.php">
                    PRODUCTS <i class="fas fa-box-open"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" style="font-size:medium; font-weight: bold; color: white;"
                   href="vieworder.php">
                    ORDERS <i class="fas fa-box-open"></i>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" style="font-size:medium; font-weight: bold; color: white;"
                   href="salesreport.php">
                    SALES <i class="fas fa-box-open"></i>
                </a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" style="font-size:medium; font-weight: bold; color: white;"
                   href="contactusqueries.php">
                    CONTACT US QUERIES <i class="fas fa-box-open"></i>
                </a>
            </li>
            </ul>
    </div>
    <?php
include_once "footerfiles.php";
?>
</nav>

  