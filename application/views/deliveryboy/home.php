
    <div class="page-content-wrapper">
     
      <!-- Orders-->
     
        <div class="container orderlist">
        <div class="top-products-area py-3">
        <div class="container">
        
        <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Today's Orders</h6>
            <!-- Layout Options-->
          </div>
          <?php if($orders)
          {
            foreach($orders as $order)
            {
            ?>
        <div id="" name=""  class="card shadow border-success col-12 col-md-6 col-lg-4 col-sm-12 p-3 my-2">
  <h5 class="card-header bg-transparent border-success">Order No:<?php echo $order->id;?></h5>
  <div class="card-body text-success">
  <h6 class="card-title"><span class="text-primary"> Customer Name:</span> <?php echo $order->customer->name;?></h6>
    <h6 class="card-title" style="line-height: 32px;"><div class="text-primary"> Address:</div> <?php echo $order->customer->address?><span class="text-primary"> Ph:</span><?php echo $order->customer->mobile;?></h6>
    <h6 class="card-title"><span class="text-primary"> Mode Of Payment:</span> <?php echo $order->payment_type;?></h6>
    <h6 class="card-title"><span class="text-primary">Amount:</span><?php echo $order->order_total;?> AED</h6>
  </div>
  <div class="card-footer bg-transparent border-success col px-0  text-center">
    
  <a  href="tel: <?php echo $order->customer->mobile;?>" class="btn btn-primary">Call </a>
      <a href="https://www.google.com/maps?q=<?php echo $order->loc_latitude.','.$order->loc_longitude;?>" class="btn btn-primary">Location</a>
      <?php if($order->status==4)
      {
        ?>
        <i class="lni lni-checkmark-circle"></i>Delivered
        <?php
      }else
      {?>
      <input type="hidden" name="order_id" class="order_id" value="<?php echo $order->id;?>">
      <a  href="#" class="btn btn-primary deliver_order" name="deliver_order" >Delivered</a>
      <?php }?>
  </div>
</div>
<?php 
          }
}
else
{
  ?>
  <span>No Orders</span>
  <?php
}?>

        </div>
      </div>
        </div>
  
      
   

    </div>
   