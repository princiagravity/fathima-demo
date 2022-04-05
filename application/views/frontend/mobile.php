<div class="page-content-wrapper">
      <div class="container">
          <form id="mobile_search" method="POST" action="<?php echo site_url('checkout');?>" data-form="ajaxform" enctype="multipart/form-data" >
        <!-- mobile Wrapper-->
        <div class="checkout-wrapper-area py-3">
           <!-- Coupon Area-->
           <div class="card coupon-card mb-3">
            <div class="card-body">
              <div class="apply-coupon">
               
                <div class="coupon-form">
                
                    <input type="hidden" id="actual_total" name="actual_total" value="<?php echo $items_total;?>">
                    <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile No." required>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
          </form>
      </div>
    </div>
  