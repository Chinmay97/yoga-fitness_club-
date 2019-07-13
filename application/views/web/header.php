<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Online Yoga Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/owl.theme.default.min.css">

	<!-- Flaticons  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/fonts/flaticon/font/flaticon.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/bootstrap-datepicker.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url() ?>assets/web/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
  <?php
			  	$user_type=$this->session->userdata('user_type');
					$user_name=$this->session->userdata('user_name');
					$user_id=$this->session->userdata('user_id');
					//$webUser=$this->session->userdata('webUser');

						$user_type=isset($user_type)?$user_type:0;
						$user_name=isset($user_name)?$user_name:0;
						$user_id=isset($user_id)?$user_id:0;
			?>


	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu" style="background-color: #483eff87;">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div id="colorlib-logo"><a href="index.html">Live Yoga.com</a></div>
						</div>
						<div class="col-md-9 text-right menu-1">
							<ul>
								<li class="ac tive"><a href="<?php echo base_url() ?>index.php/web/Dboard">Home</a></li>
								<li class="has-dropdown">
									<a href="classes.html">Classes</a>
									<ul class="dropdown">
										<li><a href="classes-single.html">Classes Single</a></li>
										<li><a href="#">Cardio Classes</a></li>
										<li><a href="#">Muscle Classes</a></li>
										<li><a href="#">Fitness Classes</a></li>
										<li><a href="#">Body Building</a></li>
									</ul>
								</li>

								<li><a href="shop.html">Shop</a></li>
								<?php if($user_type==0){ ?>
										<li><a href="<?php echo base_url() ?>index.php/web/Login">LogMe In!</a></li>
						  	<?php }else{ ?>
										<li class="has-dropdown"><a href="#">Hello <?php echo $user_name; ?></a>
											 		<ul class="dropdown">
															<li><a href="<?php echo base_url() ?>index.php/web/Mbr_profile">Go to Profile</a></li>
															<li><a href="<?php echo base_url() ?>index.php/web/Dboard/logmeout">Logout!</a></li>
													</ul>
										</li>
							 <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
