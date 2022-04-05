<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51KDp9dGKNJBwVcbna6UEVBY2O66Q7dn1wUdyDcH9XGna43ows029vmRh9DhecChxUgFQGICuoHR8otUDIU2fAdLl00gKcRNw35'; 
$config['stripe_publishable_key'] = 'pk_test_51KDp9dGKNJBwVcbn2CwDI7RM1zz0MwxQlBXfVzg6V2IDgw1PF9s2676DnHHpy4SHzNNC5mNzHWUawjUS7EFYmE9V002LARzbhY'; 
$config['stripe_currency']        = 'aed';
?>