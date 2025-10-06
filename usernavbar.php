

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

<nav class="navbar navbar-expand-lg navbar-blue bg-primary sticky-top">
    <a class="navbar-brand" href="#" style="font-weight: bolder; color: white; font-size:x-large;"><img class="logo" src="dairy image set/logo.jpg"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-bars "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item acitve">
                <a class="nav-link" style=" font-size:medium; font-weight:bold; color: white;" href="userhome.php">
                    <i class="fa fa-home"></i> HOME
                </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" style="font-weight: bold; font-size:large; color: white;" href="#">  <i class="fa fa-user"></i>  ADMIN</a></li> -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="font-size:medium; font-weight: bold; color: white;" href="#"
                   id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    CATEGORIES
                </a>
                <ul class="dropdown-menu bg-dark " aria-labelledby="navbarScrollingDropdown">
                    <?php
                    include_once "connection.php";
                    $selectcategories = "select * from categories";
                    $categoriesData = mysqli_query($con, $selectcategories);
                    while ($rowcat = mysqli_fetch_assoc($categoriesData)) {
                    ?>
                    <li><a class="dropdown-item text-light" style="font-weight: bold; color: white; "
                           href="showproduct.php?categories=<?php echo $rowcat['categories']; ?>">
                            <?php echo $rowcat['categories'] ?>
                            <?php } ?></a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" style="font-size:medium; font-weight: bold; color: white;"
                   href="Aboutus.php">
                    ABOUT <i class="fas fa-box-open"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="font-size:medium; font-weight: bold; color: white;" href="#"
                   id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">LOGIN/SIGNUP
                </a>
                <ul class="dropdown-menu bg-dark " aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item text-light" style="font-weight: bold; color: white; " href="Login.php">LOGIN
                            ACCOUNT</a></li>
                    <li><a class="dropdown-item text-light" style="font-weight: bold; color: white; " href="Signup.php">REGISTER
                            ACCOUNT</a></li>
                </ul>
            </li>

            <?php
            $count = 0;
//            if (isset($_SESSION['products'])) {
//                $count = count($_SESSION['products']);
//            }
            ?>

            <li class="nav-item">
                <a class="nav-link" style="font-size:medium; font-weight: bold; color: white;"
                   href="mycart.php">
                    CART <i class="fas fa-shopping-cart">
                        <span class="badge-pill badge-danger ml-2 md-5" id="cartCount"></span>
<!--                        <span class="badge-pill badge-danger ml-2 md-5" id="cartCount">--><?php //echo $count; ?><!--</span>-->
                    </i>
                </a>
            </li>
        </ul>

        <form action="searchaction.php" method="post" class="form-inline my-2 my-lg-0">
            <input required name="serachText" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" name="submit" type="submit">Search</button>
        </form>
    </div>
</nav>

