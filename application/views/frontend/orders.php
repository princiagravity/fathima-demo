
    <div class="page-content-wrapper">
      <!-- Catagory Single Image-->
    <?php /* print_r($orderslist); exit; */?>
      <div class="pt-3">
        
      </div>
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Orders</h6>
          </div>
         <style>
		 p
		 {
			 margin-bottom:4px;
		 }
		 </style>
            <!-- Single Top Product Card-->
            <?php if($orderslist)
            { foreach($orderslist as $order)
            {?>
             <div class="container-fluid">
            <div class="row">
            <div class="col">
              <div class="card shadow p-3 mb-5 rounded" style="border-radius:.35rem!important; margin-bottom: 20px !important;">
                <div class="card-body">
                    <a href="<?php echo site_url('order-details/'.$order->id)?>"><p class="card-title text-primary"><b>Order No:#<?php echo $order->id;?></b></p>
                    <p class="card-text text-secondary">Created On:<?php echo $order->order_time;?></p> 
                    <p class="card-text text-success">Status:<?php echo $order->status_name;?></p>
                    <p class="card-text text-primary" style="margin-bottom:0px; font-weight:600;color:#ec0000 !important;
    font-size":16px;">AED <?php echo $order->order_total;?> 
    <a href="<?php echo site_url('order-details/'.$order->id)?>" class="btn btn-success" style="float: right;">View</a></p>
                <input type="hidden" name="product_id" value="<?php echo $order->id; ?>"></a>
                </div>
              </div>
            </div>
            </div>
             </div>
            <?php }}else{ echo "No Orders";}?>
          
        </div>
      </div>
    </div>
  