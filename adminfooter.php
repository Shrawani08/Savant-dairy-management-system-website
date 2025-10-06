
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Footer Design</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">

  <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
<link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js">
<link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">
  <style>

body{
	line-height: 1.5;
	font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #24262b;
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}
.developed{
	color: white;
	text-align: center;
}
/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}

  </style>
</head>
<body>

  <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>COMPANY</h4>
  	 			<ul>
  	 				<li><a href="Aboutus.php">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="privacypolicy.php">privacy policy</a></li>
  	 				<li><a href="adminlogin2.php">Admin</a></li>
  	 			</ul>
  	 		</div>
  	 		<!-- <div class="footer-col">
  	 			<h4>CONTACT US</h4>
  	 			<ul>
  	 				<li><a href="faq.php">FAQ</a></li>
  	 				<li><a href="#">shipping</a></li>
  	 				<li><a href="#">returns</a></li>
  	 				<li><a href="#">order status</a></li>
  	 				<li><a data-toggle="modal" data-target="#paymentoptions" href="#">Payment options</a></li>
  	 			</ul>
  	 		</div> -->
  	 		<div class="footer-col">
  	 			<h4>Our Physical Stores</h4>
  	 			<ul>
  	 				<li><a href="physicalstores.php">Amritsar</a></li>
  	 				<li><a href="physicalstores.php">Ludhiana</a></li>
  	 				<li><a href="physicalstores.php">Patiala</a></li>
  	 				<li><a href="physicalstores.php">Jalandhar</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
			<div class="footer-col">
  	 			<h4>DEVELOPED BY</h4>
  	 			<ul>
  	 			
  	 				<li><a href="#">Prince Sharma (github: ps8847)</a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 	</div>
  	 </div>
	   <hr style="color: white;">
	<div class="container">
	   <div class="row">
        <div class="col-sm-6 developed">
            <strong> &copy; <?php echo date('Y'); ?> </strong>
        </div>
    </div>
<div class="modal fade" id="paymentoptions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Options Available</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label><b>PAYMENT OPTIONS</b></label>
		<br>
		<img src="images/download-4.jpg"style="width:200px;height:100px" alt="upi">
		<img src="images/images-3.jpg"style="width:200px;height:100px" alt="bank">
		<br>
		<img src="images/mc.png"style="width:200px;height:100px" alt="upi">
		<img src="images/vi.png"style="width:200px;height:100px" alt="bank">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  </footer>
</body>
</html>
