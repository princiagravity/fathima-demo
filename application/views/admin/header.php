<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Gravity-Admin</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo base_url()?>images/admin/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/admin/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/admin/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/admin/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>css/admin/responsive.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="<?php echo base_url()?>css/admin/select2.min.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
      <!-- Sidebar  -->
      <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="<?php echo site_url('admin')?>">
            <img src="<?php echo base_url()?>images/admin/logo.gif" class="img-fluid" alt="">
            <span>PWA</span>
            </a>
            <div class="iq-menu-bt align-self-center">
               <div class="wrapper-menu">
                  <div class="line-menu half start"></div>
                  <div class="line-menu"></div>
                  <div class="line-menu half end"></div>
               </div>
            </div>
         </div>
         <div id="sidebar-scrollbar">
                              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
					 <li><a href="<?php echo site_url('admin')?>" class="iq-waves-effect"><i class="las la-check-square"></i><span>Dashboard</span></a></li>
					  <li><a href="<?php echo site_url('admin')?>" class="iq-waves-effect"><i class="las la-check-square"></i><span>Orders</span><?php if($this->session->userdata('neworder')){ ?><span class="cart-count" style="min-width: 3.5rem;height: 1.5rem;border-radius: 50%;font-size: 1rem;margin-left: 5.2rem;color: #fff;
    background-color: #ea4c62; position: absolute;text-align: center;
" id="cart_val"><h7>New</h7></span><?php }?></a></li>
					  <li><a href="<?php echo site_url('customers-list')?>" class="iq-waves-effect"><i class="las la-check-square"></i><span>Customers</span></a></li>
                     <li class="active">
                        <a href="#dashboard" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="true"><i class="las la-home"></i><span>Settings</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>                   
                        <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo site_url('add-product')?>">Add Products</a></li>
                           <li><a href="<?php echo site_url('our-products')?>">Our Products</a></li>
                           <li><a href="<?php echo site_url('add-offer-products')?>">Add Offer Products</a></li>
						     <li><a href="<?php echo site_url('add-slider')?>">Add Slider</a></li>
                       <li><a href="<?php echo site_url('add-categories')?>">Add Categories</a></li>
                        <li><a href="<?php echo site_url('add-addon')?>">Add Addons</a></li>
							     <li><a href="<?php echo site_url('add-offers')?>">Add Offers</a></li>
                          <li><a href="<?php echo site_url('add-promocodes')?>">Add Promocode</a></li>
                          <li><a href="<?php echo site_url('add-reward-points')?>">Add Reward Points</a></li>
								   <li><a href="<?php echo site_url('add-variants')?>">Add Variants</a></li>
								     <li><a href="<?php echo site_url('add-delivery-charges')?>">Add Delivery Charges</a></li>
									 <li><a href="<?php echo site_url('add-delivery-area')?>">Add Delivery Area</a></li>
                           <li class="active"><a href="<?php echo site_url('add-delivery-boy')?>">Add Delivery Boy</a></li>
                           <li class="active"><a href="<?php echo site_url('reports')?>">Reports</a></li>
                           
                        </ul>
                     </li>
                     <li>
                        <a href="#reports" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-file-chart-fill"></i><span>Reports</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo site_url('order-reports')?>">Order Reports</a></li>
						         <li><a href="<?php echo site_url('stock-reports')?>">Stock Reports</a></li>
						 
                        </ul>
                     </li>
                     <li class="active"><a href="<?php echo site_url('admin/logout')?>">LogOut</a></li>
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
      </div>
      <!-- TOP Nav Bar -->
      <div class="iq-top-navbar">
         <div class="iq-navbar-custom">
            <div class="iq-sidebar-logo">
               <div class="top-logo">
                  <a href="<?php echo site_url('admin')?>" class="logo">
                  <img src="<?php echo base_url()?>images/admin/logo.gif" class="img-fluid" alt="">
                  <span>PWA</span>
                  </a>
               </div>
            </div>
            <div class="navbar-breadcrumb">
               <h5 class="mb-0">Dashboard 2</h5>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('admin')?>">Dashboard </a></li>
                  </ol>
               </nav>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                     </div>
                  </div>
                
                  
               </nav>
         </div>
      </div>
      <!-- TOP Nav Bar END -->