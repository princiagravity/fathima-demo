
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <?php if($userdetails)
          {
           // print_r($userdetails); exit;
            ?>
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="<?php echo base_url();?>img/logo.png" alt=""></div>
              <div class="user-info">
                <p class="mb-0 text-white"><?php echo $userdetails['userdetails']->email_id;?></p>
                <h5 class="mb-0" style="color:#e29754"><?php echo $userdetails['userdetails']->name;?></h5>
                <p><h7><?php echo $userdetails['userdetails']->reward_point." Points";?></h7></p>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Username</span></div>
                <div class="data-content"><?php echo $userdetails['userdetails']->mobile;?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span></div>
                <div class="data-content"><?php echo $userdetails['userdetails']->name;?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span></div>
                <div class="data-content"><?php echo $userdetails['userdetails']->mobile;?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                <div class="data-content"><?php echo $userdetails['userdetails']->email_id;?>                                </div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>Shipping</span></div></div>
                <div class="data-content"><?php echo $userdetails['userdetails']->address;?>
              <div class="row">
                <?php foreach($userdetails['useraddress'] as $details){?>
                  <div class="row pb-2">
                <div class="col-12 pb-2">
                  <div class="card p-1">
                    <div class="card-header">
                    <p class="card-title"><?php echo ucwords($details->address_type);?></p>
                    </div>
                    <div class="card-body">
                      <p class="card-title"><?php echo $details->address;?></p>
                    </div>
                  </div>
                </div>
                  </div>
                
                
                <?php }?>
               
              </div>
              </div>
              
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-star"></i><span>My Order</span></div>
                <div class="data-content"><a class="btn btn-danger btn-sm" href="<?php echo site_url('my-orders')?>">View</a></div>
              </div>
              <!-- Edit Profile-->
              <!-- <div class="edit-profile-btn mt-3"><a class="btn btn-info w-100" href="edit-profile.html"><i class="lni lni-pencil me-2"></i>Edit Profile</a></div> -->
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  