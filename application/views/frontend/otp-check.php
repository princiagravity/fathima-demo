
    

 

    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <div class="container">
 
       
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-9 col-lg-6 col-xl-7">
            <div class="text-start px-4">
              <h5 class="mb-1 text-white">Verify Email ID</h5>
              <p class="mb-4 text-white">Enter the OTP code sent to your mail id<strong class="ms-1"><?php echo $this->session->userdata('fp_email');?></strong></p>
            </div>
            <!-- OTP Verify Form-->
            <div class="otp-verify-form mt-5 px-4">
            <form id="otp-check"  method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
                <div class="d-flex justify-content-between mb-5">
                <input class="form-control" type="text" value="" id="otp" name="otp" style="max-width: 200px; width:200px;">
                 <!--  <input class="form-control" type="text" value="" placeholder="-" maxlength="1">
                  <input class="form-control" type="text" value="" placeholder="-" maxlength="1">
                  <input class="form-control" type="text" value="" placeholder="-" maxlength="1">
                  <input class="form-control" type="text" value="" placeholder="-" maxlength="1"> -->
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit">Verify &amp; Proceed</button>
              </form>
            </div>
            <!-- Term & Privacy Info-->
            <div class="login-meta-data px-4">
             <!--  <p class="mt-3 mb-0">Don't received the OTP?<span class="otp-sec ms-1 text-white" id="resendOTP"></span></p> -->
            </div>
          </div>
        </div>
      </div>
    </div>