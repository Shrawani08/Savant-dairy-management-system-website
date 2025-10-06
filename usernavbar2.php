<?php
ob_start();
include_once "connection.php";
@session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    $user = "select * from users where email='$email'";
    $user_result = mysqli_query($con, $user);
    $user_row = mysqli_fetch_array($user_result);
} else {
    header("location:userhome.php");
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

<!--</head>-->
<!--<body>-->

<!-- 
      <script src="Additionalfiles/js/jquery.min.js"></script>
      <script src="Additionalfiles/js/popper.min.js"></script>
      <script src="Additionalfiles/js/bootstrap.js"></script> -->
<!--</body>-->
<!--</html>-->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <a class="navbar-brand" href="#" style="font-weight: bolder; color: white; font-size:x-large;"><img class="logo" src="dairy image set/logo.jpg"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item acitve">
                <a class="nav-link" style=" font-size:medium; font-weight:bold; color: white;" href="userhome2.php">
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
                   id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">CONTACT US
                </a>
                <ul class="dropdown-menu bg-dark " aria-labelledby="navbarScrollingDropdown">
                <li class="nav-item"><a class="nav-link" style="font-size:medium; font-weight: bold; color: white;" data-toggle="modal" data-target="#contact">REGISTER YOUR PROBLEMS <i class="fas fa-phone-alt"></i></a></li>

                <li><a class="dropdown-item text-light" style="font-weight: bold; color: white; " href="repliedquery.php">REPLY'S By MilkyStore.com</a></li>

                
              
                </ul>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="font-size:medium; font-weight: bold; color: white;" href="#"
                   id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">USER
                </a>
                <ul class="dropdown-menu bg-dark " aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item text-light" style="font-weight: bold; color: white; " href="userchangepassword.php">CHANGE PASSWORD</a></li>
                    <li><a class="dropdown-item text-light" style="font-weight: bold; color: white; " href="myorders.php">MY ORDERS</a></li>
                    <li><a class="dropdown-item text-light" style="font-weight: bold; color: white; " href="userlogout.php">LOGOUT</a></li>
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

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONTACT US</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <form method="post" action="manage_contactus.php">
        <label><b>ENTER YOUR PROBLEMS HERE</b></label>
        <textarea class="pl-2" name="problem" id="" cols="56.5" rows="15" placeholder=" Enter your problem..." style="resize: none;"></textarea>
      </div>
      <div class="modal-footer">
      <input type="hidden" name="action" value="contactt">
            <input type="submit" class="btn btn-primary btn-block" value="Send Problem">
        
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

