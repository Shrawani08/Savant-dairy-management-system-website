
<!DOCTYPE html>
<html lang="en">
<?php
//session_start();
include("../connection/connect.php");


if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $user = "select * from users where username='$username'";
    $user_result = mysqli_query($db, $user);
    $user_row = mysqli_fetch_array($user_result);
} 
?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "query answer sent") {
            $email = $_GET['mail'];
            ?>
            <?php
        }
    }
    ?>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
    <link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">
    <link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .searchicon {
            position: absolute;
            top: 20px;
        }

        .searchcontainer {
            position: relative;
            top: 10px;
            margin-left: 20px;
        }
    </style>
    
</head>

<body onload = "getCartCount()">
    <!-- getcart count function done -->
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-light">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 bg-secondary d-inline-flex align-items-center text-dark py-2 px-4">
                    <span class="me-2 fw-semi-bold"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                    <span>+91 9921617179</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <h1 class="m-0">SAVANT</h1>

        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" style="justify-content: flex-start;">
            <div class="navbar-nav ms-4 p-4 p-lg-0" style="justify-content: flex-start;">
                <a href="index.html" class="nav-item nav-link active ms-3">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="product.html" class="nav-item nav-link">Products</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="gallery.html" class="dropdown-item">Gallery</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>

                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link ms-3">Contact</a>
            <a href="mycart.php" class="nav-item nav-link" style="margin-left:30px;display:flex;">Cart <span class="badge-pill badge-danger " id="cartCount"></span></a>
            
            </div>

            <div class="searchcontainer ms-0">
                <form action="./admin/searchaction.php" method="post" class="form-inline my-2 my-lg-0">
                    <input type="text" placeholder="Search" class="search-input required" name="serachText">
                    <button type="submit" name="submit" style="color:white;border:1px solid white;"><i
                            class="fa fa-search searchicon"></i></button>
                </form>

                <!-- <button class ="btn btn-outline-light my-2 my-sm-0" name ="submit" type = "submit">Search</button>  -->
            </div>
            <div class="signindiv">
                <button class="signin btn " id="signin">Sign In</button>

            </div>

        </div>
    </nav>
    <!-- Navbar End -->


<div class="container">
    <div class="card-body">
    <br>
        <h3 class="text-center"><b>Query's Answers Replied To '<?php echo $email ?>' <?php  ?> : </b></h3>
    <br>
    
    </div>
</div>


<?php
       $srno = 1;
        $sql = "SELECT * FROM contactus where `email`='$email'";
        $result = mysqli_query($con, $sql);
        while ($detail = mysqli_fetch_array($result)) {
            ?>

<div class="container">
    <div class="card-body">
    <br>
        <h5 class="text-left"><b>'<?php echo $srno ?>'. <?php echo $detail[2] ?> <?php  ?> </b></h5>
    <br>
    <h6 class="text-left"><b>Replied By MilkyStore.com :-  <?php echo $detail[3] ?> <?php  ?> </b></h6>
    </div>
</div>

            <?php
            $srno++;
        }
        ?>


<div class="container">

     <!-- Footer Start -->
     <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="container py-5">
                                        <div class="row g-5">
                                            <div class="col-lg-3 col-md-6">
                                                <h5 class="text-white mb-4">Our Office</h5>
                                                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Wanewadi,
                                                    Tal.Baramati, Dist.Pune, Maharastra, India</p>
                                                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9921617179</p>
                                                <p class="mb-2"><i
                                                        class="fa fa-envelope me-3"></i>parshwashaha9921617179@gmail.com
                                                </p>
                                                <div class="d-flex pt-3">
                                                    <a class="btn btn-square btn-secondary rounded-circle me-2"
                                                        href=""><i class="fab fa-Instagram"></i></a>
                                                    <a class="btn btn-square btn-secondary rounded-circle me-2"
                                                        href=""><i class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-secondary rounded-circle me-2"
                                                        href=""><i class="fab fa-youtube"></i></a>
                                                    <a class="btn btn-square btn-secondary rounded-circle me-2"
                                                        href=""><i class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <h5 class="text-white mb-4">Quick Links</h5>
                                                <a class="btn btn-link" href="">About Us</a>
                                                <a class="btn btn-link" href="">Contact Us</a>
                                                <a class="btn btn-link" href="">Our Services</a>
                                                <a class="btn btn-link" href="">Terms & Condition</a>
                                                <a class="btn btn-link" href="">Support</a>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <h5 class="text-white mb-4">Business Hours</h5>
                                                <p class="mb-1">Sunday - Saturday</p>
                                                <h6 class="text-light">09:00 am - 09:00 pm</h6>

                                            </div>
                                            <form class="col-lg-3 col-md-6"
                                                action="mailto:parshwashaha9921617179@gmail.com">
                                                <h5 class="text-white mb-4">Newsletter</h5>
                                                <p>If You Have Any Queries Just Mail Us !!!</p>
                                                <div class="position-relative w-100">
                                                    <input type="submit"
                                                        class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2"></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Footer End -->


                                <!-- Copyright Start -->
                                <div class="container-fluid bg-secondary text-body copyright py-4">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                                &copy; <a class="fw-semi-bold" href="#">Savant Dairy Outlet
                                                    Wanewadi</a>, All Right Reserved.
                                            </div>
                                            <div class="col-md-6 text-center text-md-end">
                                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                                Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">Parshw
                                                    Shaha</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Copyright End -->

                                <!-- JavaScript Libraries -->
                                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                                <script
                                    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                                <script src="lib/wow/wow.min.js"></script>
                                <script src="lib/easing/easing.min.js"></script>
                                <script src="lib/waypoints/waypoints.min.js"></script>
                                <script src="lib/owlcarousel/owl.carousel.min.js"></script>
                                <script src="lib/counterup/counterup.min.js"></script>
                                <script src="lib/parallax/parallax.min.js"></script>
                                <script src="lib/lightbox/js/lightbox.min.js"></script>

                                <!-- Template Javascript -->
                                <script src="js/main.js"></script>
                                <!-- <script src="js/script.js"></script> -->
                                 
<script src="./AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="./AdditionalFiles/js/popper.min.js"></script>
<script src="./AdditionalFiles/js/bootstrap.js"></script>

<script src="./AdditionalFiles/js/script.js"></script>
<script src="./script3.js"></script>

</body>

</html>
