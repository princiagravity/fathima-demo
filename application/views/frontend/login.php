
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
   <?php 
   $requrl="";
   if($request)
   {
       $requrl=$request;
   }
   
   ?>
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container login-cont">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="<?php echo base_url();?>img/logo.png" alt="" width="70%">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
            <form id="user-login" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
                <div class="form-group text-start mb-4"><span>Username</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="username" name="username" type="text" placeholder="Mobile No" required><!-- info@example.com -->
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                </div>
                <input type="hidden" name="requrl" value="<?php echo $requrl;?>">
                <button class="btn btn-warning btn-lg w-100" type="submit">Log In</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="<?php echo site_url('forgot-password');?>">Forgot Password?</a>
              <p class="mb-0">Didn't have an account?<a class="ms-1 signup" href="#">Register Now</a></p>
            </div>
            <!-- View As Guest-->
            <div class="view-as-guest mt-3"><a class="btn" href="<?php echo site_url('home')?>">View as Guest</a></div>
          </div>
        </div>
      </div>
      <div class="container signup-cont" style="display: none;">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="<?php echo base_url();?>img/logo.png" alt=""  width="70%">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form id="user-signup" action="" method="POST"><!--action="otp.html"-->
                <div class="form-group text-start mb-4"><span>Display Name</span>
                  <!--<label for="name"><i class="lni lni-user"></i></label>-->
                  <input class="form-control" style="background:#e8f0fe;color:#000"  id="name" name="name" type="text" placeholder="Designing World" required>
                </div>
                <div class="form-group text-start mb-4"><span>Mobile</span>
                  <!--<label for="mobile"><i class="lni lni-phone"></i></label>-->
                  <input class="form-control" style="background:#e8f0fe;color:#000" id="mobile" name="mobile" type="number" placeholder="Mobile No" required>
                </div>
                <div class="form-group text-start mb-4"><span>Email ID</span>
                 <!-- <label for="password"><i class="lni lni-lock"></i></label>-->
                  <input class="input-psswd form-control" style="background:#e8f0fe;color:#000" id="email_id" name="email_id" type="email" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                 <!-- <label for="password"><i class="lni lni-lock"></i></label>-->
                  <input class="input-psswd form-control" style="background:#e8f0fe;color:#000" id="registerPassword" name="password" type="password" placeholder="Password" required>
                </div>

                <input type="hidden" name="role" value="<?php echo $role;?>">
                <button class="btn btn-warning btn-lg w-100" type="submit">Sign Up</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="ms-1 login" href="#">Sign In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
   
   
      

   