
    <!-- Page Content Wrapper-->
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Section Heading-->
        <div class="section-heading d-flex align-items-center pt-3 justify-content-between">
          <h6>Order(s)</h6>
        </div>
        <!-- Notifications Area-->
        <div class="notification-area pb-2">
          <div class="list-group">
            <?php
            if($orderlist)
            {
            
            foreach($orderlist as $orders)
            {
              ?>
              <a class="list-group-item d-flex align-items-center" href="<?php echo site_url('DeliveryController/order_details/'.$orders->id)?>"></span>
                  <div class="noti-info">
                <h6 class="mb-0">Order: #<?php echo $orders->id; ?>-<?php echo $orders->status_name?></h6>
                <span>On <?php echo $orders->order_time;?></span>
              </div></a>
              <?php
            }
          }
          else
          {?>
          <span>No Orders</span>
          <?php }?>
          </div>
        </div>
      </div>
    </div>
  