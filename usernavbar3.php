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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <a class="navbar-brand" href="#" style="font-weight: bolder; color: white; font-size:x-large;"><img class="logo" src="dairy image set/logo.jpg"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item acitve">
                
                <a class="nav-link" style=" font-size:medium; font-weight:bold; color: white;" <?php
                if(isset($_SESSION['email'])){ ?> href="userhome.php" <?php } else {?> href='userhome2.php' <?php } ?> >
                    <i class="fa fa-home"></i> HOME
                </a>
            </li>
</nav>
</ul>
</div>