<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'FrontController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Frontend */

$route['login']                                                 =   'FrontController/login';
$route['home']                                                  =   'FrontController/index';
$route['orderlist']                                             =   'FrontController/orderslist';
$route['change-password']                                       =   'FrontController/change_password_view';
$route['checkout']                                              =   'FrontController/checkout_page';
$route['category/(:any)']                                       =   'FrontController/category_page/$1';
$route['cart']                                                  =   'FrontController/cart_page';
$route['settings']                                              =   'FrontController/view_pages/settings';
$route['my-profile']                                            =   'FrontController/my_profile';
$route['categories']                                            =   'FrontController/category_list';
$route['my-offers']                                             =   'FrontController/offerslist';
$route['my-orders']                                             =   'FrontController/orderslist';
$route['signout']                                               =   'FrontController/signout';
$route['offer-products']                                        =   'FrontController/offer_product_list';
$route['offer-product/(:any)']                                  =   'FrontController/offer_product_details/$1';
$route['single-product/(:any)']                                 =   'FrontController/single_product/$1';
$route['offers']                                                =   'FrontController/offerslist';
$route['forgot-password']                                       =   'FrontController/forget_password_view';
$route['order-details/(:any)']                                  =   'FrontController/order_details/$1';
$route['otp']                                                   =   'FrontController/otp_view';


/* Admin */
$route['admin']                                                 =   'AdminController/index';
$route['admin/dashboard']                                       =   'AdminController/dashboard';
$route['admin/login']                                           =   'AdminController/login';
$route['add-addon']                                             =   'AdminController/view_pages/add-addon';
$route['add-offer-products']                                    =   'AdminController/view_pages/add-offer-products';
$route['add-categories']                                        =   'AdminController/view_pages/add-categories';
$route['add-delivery-boy']                                      =   'AdminController/view_pages/add-delivery-boy';
$route['add-variants']                                          =   'AdminController/view_pages/add-variants';
$route['add-delivery-area']                                     =   'AdminController/view_pages/delivery-area';
$route['add-slider']                                            =   'AdminController/view_pages/add-slider';
$route['add-delivery-charges']                                  =   'AdminController/view_pages/delivery-charges';
$route['add-promocodes']                                        =   'AdminController/view_pages/promocodes';
$route['add-product']                                           =   'AdminController/view_pages/add-product';
$route['add-offers']                                            =   'AdminController/view_pages/add-offers';
$route['update-category/(:any)']                                =   'AdminController/view_pages/add-categories/$1';
$route['single/(:any)/(:any)']                                  =   'AdminController/single_view/$1/$2';
$route['update-addon/(:any)']                                   =   'AdminController/view_pages/add-addon/$1';
$route['update-delivery-boy/(:any)']                            =   'AdminController/view_pages/add-delivery-boy/$1';
$route['update-offer-products/(:any)']                          =   'AdminController/view_pages/add-offer-products/$1';
$route['update-offers/(:any)']                                  =   'AdminController/view_pages/add-offers/$1';
$route['update-product/(:any)']                                 =   'AdminController/view_pages/add-product/$1';
$route['update-slider/(:any)']                                  =   'AdminController/view_pages/add-slider/$1';
$route['update-variants/(:any)']                                =   'AdminController/view_pages/add-variants/$1';
$route['single-order/(:any)']                                   =   'AdminController/order_details/$1';
$route['update-delivery-area/(:any)']                           =   'AdminController/view_pages/delivery-area/$1';
$route['update-delivery-charges/(:any)']                        =   'AdminController/view_pages/delivery-charges/$1';
$route['customers-list']                                        =   'AdminController/view_pages/customer';
$route['our-products']                                          =   'AdminController/view_pages/our-products';
$route['add-reward-points']                                     =   'AdminController/view_pages/add-reward-points';
$route['order-reports']                                         =   'AdminController/reports';
$route['stock-reports']                                         =   'AdminController/stock_reports';
$route['admin/logout']                                          =   'AdminController/user_logout';
$route['update-promocodes/(:any)']                              =   'AdminController/view_pages/promocodes/$1';
$route['get_order_count']                                       =   'AdminController/get_order_count';
$route['delete_item']                                           =   'AdminController/delete_item';
/* Deliveryboy */

$route['delivery']                                              =    'DeliveryController/index';

