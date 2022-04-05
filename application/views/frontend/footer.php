
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="<?php echo site_url('home')?>"><i class="lni lni-home"></i>Home</a></li>
            <li><a href="https://wa.me/+971525203040"><i class="lni lni-whatsapp"></i>Support</a></li>
            <li><a href="<?php echo site_url('cart')?>"><span class="cart-count cart_value" style="min-width: 1.5rem;height: 1rem;border-radius: 50%;font-size: 1rem;margin-left: .2rem;color: #fff;
    background-color: #ea4c62; position: absolute;
" id="cart_val"><?php echo $this->session->userdata('cart_value');  ?></span><i class="lni lni-shopping-basket"></i>Cart</a></li>
           <!--  <li><a href="<?php echo site_url('settings')?>"><i class="lni lni-cog"></i>Settings</a></li> -->
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()?>">
    <script src="<?php echo base_url();?>js/bootstrap.bundle.min.js"></script>
   
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url();?>js/default/jquery.passwordstrength.js"></script>
    <script src="<?php echo base_url();?>js/default/dark-mode-switch.js"></script>
    <script src="<?php echo base_url();?>js/default/no-internet.js"></script>
    <script src="<?php echo base_url();?>js/default/active.js"></script>
    <script src="<?php echo base_url();?>js/pwa.js"></script>
    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url();?>js/custom_functions.js"></script>
    <script type = 'text/javascript'> var base_url=$('#base_url').val();</script>
    <script type = 'text/javascript'>
    // Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');
	</script>
	
	
  </body>
</html>