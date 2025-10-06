<!DOCTYPE html>
<html lang="en">
<?php
//session_start();
include("connection/connect.php");


if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $user = "select * from users where username='$username'";
    $user_result = mysqli_query($db, $user);
    $user_row = mysqli_fetch_array($user_result);
} 
?>

<head>
    <meta charset="utf-8">
    <title>Savant Dairy Outlet Wanewadi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
            top: 13px;
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
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5" style = "padding-left:0.5em !important;">
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
                <a href="contact.html" class="nav-item nav-link ms-2">Contact</a>
            <a href="mycart.php" class="nav-item nav-link" style="margin-left:13px;display:flex;">Cart    <span class="badge-pill badge-danger " id="cartCount"></span></a>
            
            </div>

            <div class="searchcontainer ms-0">
                <form action="./admin/searchaction.php" method="post" class="form-inline my-2 my-lg-0">
                    <input type="text" placeholder="Search" class="search-input required" name="serachText" style="position:relative;bottom:10px;">
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


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 text-start">
                                    <p class="fs-4 text-white">Welcome to Savant Dairy Outlet Wanewadi</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">The Shop of Dairy
                                        products</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-8 text-end">
                                    <p class="fs-4 text-white">Welcome to Savant Dairy Outlet Wanewadi</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">Best Organic Dairy
                                        Products are here </h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <div class="row g-2">
                        <div class="col-6 position-relative wow fadeIn" data-wow-delay="0.7s">
                            <div class="about-experience bg-secondary rounded">
                                <h1 class="display-1 mb-0">23</h1>
                                <small class="fs-5 fw-bold">Years Experience</small>
                            </div>
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded" src="img/service-1-PARSHW.jpg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                            <img class="img-fluid rounded" src="img/service-2-PARSHW.jpg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.5s">
                            <img class="img-fluid rounded" src="img/service-3-PARSHW.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    <h1 class="mb-4">Know About Our Savant Dairy and Savant Dairy Outlet Wanewadi & Our History</h1>
                    <p class="mb-4">We Start Our Dairy Product Shop 1 years ago. The best response of customer I got at
                        stating of this outlet which is placed at wanewadi.</p>
                    <div class="row g-5 pt-2 mb-5">
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="img/service-PARSHW.png" alt="">
                            <h5 class="mb-3">Dedicated Services</h5>
                            <span>Here We can provide good and organic dairy products at best price. </span>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="img/product-PARSHW.png" alt="">
                            <h5 class="mb-3">Our Products</h5>
                            <span>
                                Q.milk,
                                C.milk,
                                F.milk,
                                A2 milk,
                                Shrikhand,
                                Amrakhand,
                                Fruitkhand,
                                Basundi,
                                A2 ghee,
                                R.ghee,
                                AND MANY MORE...
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title bg-white text-start text-primary pe-3">Why Us!</p>
                    <h1 class="mb-4">Few Reasons Why People Choosing Us!</h1>
                    <p class="mb-4">Our Products are 100% natural and organic. Customers also like the taste and quality
                        of our products and our rates of products are reasonable than others. </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Antibiotic Free</p>
                    <p><i class="fa fa-check text-primary me-3"></i>100% natural</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Untouched Products</p>

                </div>
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="text-center bg-primary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/experience-PARSHW.png" alt="">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">23</h1>
                                    <span class="fs-5 fw-semi-bold text-secondary">Years Experience</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/award.png" alt="">
                                    <h1 class="display-6" data-toggle="counter-up">78</h1>
                                    <span class="fs-5 fw-semi-bold text-primary">Award Winning by company</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/animal.png" alt="">
                                    <h1 class="display-6" data-toggle="counter-up">1100</h1>
                                    <span class="fs-5 fw-semi-bold text-primary">Total Animals</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="text-center bg-primary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/client-PARSHW.png" alt="">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">51940</h1>
                                    <span class="fs-5 fw-semi-bold text-secondary">Happy Clients</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Banner Start -->
    <div class="container-fluid banner my-5 py-5" data-parallax="scroll" data-image-src="img/banner.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-4">
                            <img class="img-fluid rounded" src="img/banner-1.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="text-white mb-3">We Sell Best Dairy Products</h2>
                            <p class="text-white mb-4">We Sell Best Dairy Products which is 100% natural and organic.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-4">
                            <img class="img-fluid rounded" src="img/banner-2.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="text-white mb-3">We Deliver Fresh Milk and milk products </h2>
                            <p class="text-white mb-4">We can deliverd our products daily to our customers thats why our
                                products are fresh and healthy </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Services</p>
                <h1 class="mb-5">Services That We Offer For Entrepreneurs</h1>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="img/service-1-PARSHW.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="img/service-1-PARSHW.jpg" alt="">
                            </div>
                            <h5 class="mb-3">Best Designing For Their Outlet </h4>
                                <p class="mb-4">We can design The Outlet if someone wants to start.</p>
                                <a class="btn btn-square rounded-circle" href=""><i
                                        class="bi bi-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="img/service-1-PARSHW.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="img/service-1-PARSHW.jpg" alt="">
                            </div>
                            <h5 class="mb-3">Give Trainings For Management Of Dairy Farm </h4>
                                <p class="mb-4">We Gives Ideas And Techniques To That Person Who Wants To Start Dairy
                                    Farming.</p>
                                <a class="btn btn-square rounded-circle" href=""><i
                                        class="bi bi-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="img/service-1-PARSHW.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="img/service-1-PARSHW.jpg" alt="">
                            </div>
                            <h5 class="mb-3">Offer Jobs For Experince In Dairy Farming And Marketing</h4>
                                <p class="mb-4">If Someone Wants To Start Dairy Farming And He/She Wants To Get
                                    Knowlwdge About Dairy Farming They Will Be Able To Experienced it, As Will as We
                                    Offer Good Salary For Them.</p>
                                <a class="btn btn-square rounded-circle" href=""><i
                                        class="bi bi-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Service End -->


                <!-- Gallery Start -->
                <div class="container-xxl py-5 px-0">
                    <div class="row g-0">
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="row g-0">
                                <div class="col-12">
                                    <a class="d-block" href="img/512x512bb.jpg" data-lightbox="gallery">
                                        <img class="img-512x512bb" src="img/512x512bb.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a class="d-block" href="img/gallery-1-PARSHW.jpg" data-lightbox="gallery">
                                        <img class="img-fluid" src="img/gallery-1-PARSHW.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="row g-0">
                                <div class="col-12">
                                    <a class="d-block" href="img/gallery-2-PARSHW.jpg" data-lightbox="gallery">
                                        <img class="img-fluid" src="img/gallery-2-PARSHW.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a class="d-block" href="img/gallery-6-PARSHW.jpg" data-lightbox="gallery">
                                        <img class="img-fluid" src="img/gallery-6-PARSHW.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="row g-0">
                                <div class="col-12">
                                    <a class="d-block" href="img/gallery-7-PARSHW.jpg" data-lightbox="gallery">
                                        <img class="img-fluid" src="img/gallery-7-PARSHW.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a class="d-block" href="img/gallery-3-PARSHW.jpg" data-lightbox="gallery">
                                        <img class="img-fluid" src="img/gallery-3-PARSHW.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="row g-0">
                                <div class="col-12">
                                    <a class="d-block" href="img/gallery-4-PARSHW.jpg" data-lightbox="gallery">
                                        <img class="img-fluid" src="img/gallery-4-PARSHW.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a class="d-block" href="img/gallery-8-PARSHW.jpg" data-lightbox="gallery">
                                        <img class="img-fluid" src="img/gallery-8-PARSHW.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gallery End -->


                <!-- Product Start -->

                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                            <p class="section-title bg-white text-center text-primary px-3">Our Products</p>
                            <h1 class="mb-5">Our Dairy Products For Healthy Living</h1>
                        </div>
                        <!-- Product items start -->
                        <form action="manage_cart.php" method="post" enctype="multipart/form-data">
                        <div class="row gx-4">
                                 <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/product-1-PARSHW.jpg" alt="">
                                            <div class="product-overlay">
                                          
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>

                                                <button class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(10,1)"><i
                                                        class="bi bi-cart"></i></button>
                       
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">A2 Milk</a>
                                            <span class="text-primary me-1">85 Rs. for 1 LItre</span>
                                           
                                            <span class="text-decoration-line-through">90/- </span>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Q.milk.jpeg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(11,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Q.milk</a>
                                            <span class="text-primary me-1">28 Rs. for Half Litre</span>
                                            <span class="text-decoration-line-through">33/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Q.milk.jpeg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(12,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">C.milk</a>
                                            <span class="text-primary me-1">25 Rs. for Half Litre</span>
                                            <span class="text-decoration-line-through">27/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Q.milk.jpeg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(13,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">F.milk</a>
                                            <span class="text-primary me-1">35 Rs. for Half Litre</span>
                                            <span class="text-decoration-line-through">36/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/A2 Ghee.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(14,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">A2 Ghee</a>
                                            <span class="text-primary me-1">1250 Rs. for 1 Litre</span>
                                            <span class="text-decoration-line-through">1800/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/R Ghee.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(15,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">R.Ghee</a>
                                            <span class="text-primary me-1">650 Rs. for 1 Litre</span>
                                            <span class="text-decoration-line-through">750/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Shrikhand.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(16,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Shrikhand</a>
                                            <span class="text-primary me-1">65 Rs. for 200gm</span>
                                            <span class="text-decoration-line-through">70/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Amrakhand.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(17,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Amrakhand</a>
                                            <span class="text-primary me-1">70 Rs. for 200gm</span>
                                            <span class="text-decoration-line-through">75/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/D Basundi.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(18,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">D.Basundi</a>
                                            <span class="text-primary me-1">70 Rs. for 200gm</span>
                                            <span class="text-decoration-line-through">85/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Fruitkhand.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(19,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Fruitkhand</a>
                                            <span class="text-primary me-1">70 Rs. for 200gm</span>
                                            <span class="text-decoration-line-through">75/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Lassi.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(20,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Lassi</a>
                                            <span class="text-primary me-1">25 Rs. for full cup</span>
                                            <span class="text-decoration-line-through">30/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Tak.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(21,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Buttermilk</a>
                                            <span class="text-primary me-1">18 Rs. for full cup</span>
                                            <span class="text-decoration-line-through">20/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Dahi.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(22,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Dahi</a>
                                            <span class="text-primary me-1">17 Rs. for 200gm</span>
                                            <span class="text-decoration-line-through">20/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Paneer.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(24,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Paneer</a>
                                            <span class="text-primary me-1">75 Rs. for 200gm</span>
                                            <span class="text-decoration-line-through">85/-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/Khava.jpg" alt="">
                                            <div class="product-overlay">
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                                        class="bi bi-link"></i></a>
                                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""
                                                    onclick="addToCart(25,1)"><i class="bi bi-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5" href="">Khava</a>
                                            <span class="text-primary me-1">80 Rs. for 250gm</span>
                                            <span class="text-decoration-line-through">85/-</span>
                                        </div>

                                    </div>        
</form>               
                                        </div>
 
                                <!-- Product End -->


                                <!-- Team Start -->
                                <div class="container-xxl py-5">
                                    <div class="container">
                                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s"
                                            style="max-width: 500px;">
                                            <p class="section-title bg-white text-center text-primary px-3">Our Team</p>
                                            <h1 class="mb-5">For Outlet Developments</h1>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                                <div class="team-item rounded p-4">
                                                    <img class="img-fluid rounded mb-4" src="img/Dada.jpg" alt="">
                                                    <h5>Dr.Ravindra Sawant</h5>
                                                    <p class="text-primary">Founder</p>
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-square btn-outline-secondary rounded-circle mx-1"
                                                            href=""><i class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square btn-outline-secondary rounded-circle mx-1"
                                                            href=""><i class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square btn-outline-secondary rounded-circle mx-1"
                                                            href=""><i class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                                <div class="team-item rounded p-4">
                                                    <img class="img-fluid rounded mb-4" src="img/Parshw-PARSHW.jpeg"
                                                        alt="">
                                                    <h5>Parshw Shaha</h5>
                                                    <p class="text-primary">Outlater</p>
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-square btn-outline-secondary rounded-circle mx-1"
                                                            href=""><i class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square btn-outline-secondary rounded-circle mx-1"
                                                            href=""><i class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square btn-outline-secondary rounded-circle mx-1"
                                                            href="https://www.instagram.com/qr/"><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Team End -->






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


                                <!-- Back to Top -->
                                <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
                                        class="bi bi-arrow-up"></i></a>


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