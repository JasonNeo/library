<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- third party -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/bootstrap4/bootstrap.min.css">
    <link href="<?= base_url(); ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>plugins/OwlCarousel2-2.2.1/animate.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/responsive.css">

    <!-- custom -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/elvin.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/my_styles.css">

</head>
<body>

<div id="loader-container">
	<div class="loader">
		<div class="square" ></div>
		<div class="square"></div>
		<div class="square last"></div>
		<div class="square clear"></div>
		<div class="square"></div>
		<div class="square last"></div>
		<div class="square clear"></div>
		<div class="square "></div>
		<div class="square last"></div>
	</div>
</div>
<div class="super_container">
	<!-- Header -->
	<header class="header">
		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="<?= base_url(); ?>">
									<div class="d-flex align-items-center">
										<img class="img-logo img-fluid" src="<?= base_url(); ?>assets/images/logo_600.png" alt="">
									</div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="<?= base_url(); ?>about">About us</a></li>
									<li><a href="<?= base_url(); ?>book/all">Catalogue</a></li>
									<?php
										$isLoggedIn = $this->session->userdata('isLoggedIn');
										if (!$isLoggedIn):
									?>
									<li>
										<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCenter" data-type="loginMe">Login</button>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCenter" data-type="register">Register</button>
									</li>
									<?php
										// logged in
										else:
									?>
									<li>
										<form action="<?= base_url(); ?>user" method="post">
											<button type="submit" class="btn btn-outline-primary" id="account_btn">Account</button>
										</form>
									</li>
									<li>
										<form action="<?= base_url(); ?>user/logout" method="post">
											<button type="submit" class="btn btn-outline-primary" id="logout_btn">Log Out</button>
										</form>
									</li>
									<?php
										endif;
									?>
								</ul>

								<!-- Hamburger -->
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="<?= base_url(); ?>">Home</a></li>
				<li class="menu_mm"><a href="<?= base_url(); ?>about">About</a></li>
				<li class="menu_mm"><a href="<?= base_url(); ?>contact">Contact</a></li>
			</ul>
		</nav>
	</div>