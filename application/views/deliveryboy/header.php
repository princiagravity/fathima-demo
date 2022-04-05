<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Gravity-Ecommerce Portal">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
  <title>Gravity-Ecommerce Portal</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url()?>img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="<?php echo base_url()?>img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo base_url()?>img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>img/icons/icon-180x180.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/default/lineicons.min.css">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url()?>style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="<?php echo base_url()?>manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="<?php echo site_url('DeliveryController/home')?>"><img src="<?php echo base_url()?>img/core-img/logo-small.png" alt=""></a></div>
        <!-- Search Form-->
        <!--<div class="top-search-form">-->
        <!--  <form action="" method="">-->
        <!--    <input class="form-control" type="search" placeholder="Enter your keyword">-->
        <!--    <button type="submit"><i class="fa fa-search"></i></button>-->
        <!--  </form>-->
        <!--</div>-->
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="suha-sidenav-wrapper" id="sidenavWrapper">
      <!-- Sidenav Profile-->
      <div class="sidenav-profile">
        <div class="user-profile"><img src="<?php echo base_url();?>img/logo.png" alt=""></div>
        <div class="user-info">
          <h6 class="user-name mb-0">Fathima</h6>
          <!--<p class="available-balance">Credit <span>$<span class="counter">461</span></span></p>-->
        </div>
      </div>
      <!-- Sidenav Nav-->
      <ul class="sidenav-nav ps-0">
        <!--<li><a href="profile.html"><i class="lni lni-user"></i>My Profile</a></li>-->
        <li><a href="<?php echo site_url('DeliveryController/orderslist')?>"><i class="lni lni-alarm lni-tada-effect"></i>My Orders</a></li>
        
        <li><a href="<?php echo site_url('DeliveryController/signout');?>"><i class="lni lni-power-switch"></i>Sign Out</a></li>
      </ul>
      <!-- Go Back Button-->
      <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
    </div>
    <!-- PWA Install Alert-->
    <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
      <div class="toast-body">
        <div class="content d-flex align-items-center mb-2"><img src="<?php echo base_url()?>img/icons/icon-72x72.png" alt="">
          <h6 class="mb-0">Add to Home Screen</h6>
          <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div><span class="mb-0 d-block">Add Fathima on your mobile home screen. Click the<strong class="mx-1">"Add to Home Screen"</strong>button &amp; enjoy it like a regular app.</span>
      </div>
    </div>