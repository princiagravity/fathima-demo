
<!-- Page Content  -->

<div class="page-content-wrapper">
      <div class="container">
      <style>
				  p {
					  margin-bottom:0px;
				  }
					
.cart-table .table td, .cart-table .table th {
   
    padding: .5rem .5rem;
   
}					
				  </style>
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
            
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
            <div class="row p-3">
                <div class="col-md-12 text-center h6">
                Your Order
                <div class="h7 p-2">Ordered On: <?php echo date('d M Y H:i: A',strtotime($order_details->order_time));?> &nbsp;&nbsp;Order#<?php echo $order_details->id;?></div>
                </div>
            </div>
              <table class="table mb-0">
                <tbody>
                   
                    <?php if($item_details)
                        {
                        foreach($item_details as $index=>$value)
                            {
                     ?> 
                  <tr>
                    <td><img src="<?php echo base_url().'uploads/product-images/'.$value->product_image?>" alt=""></td>
                    <td><a href="<?php echo site_url("single-product/".$value->product_id)?>"><?php echo $value->product_name;?><span><?php if($value->variant_name =="Default"){echo "Qty - ";} else { echo $value->variant_name." x ";}?><?php echo $value->product_count; ?></span></a></td>
                   <td>
                      <div class="quantity">
                          <span><?php echo 'AED '.$value->product_total;?></span>
                       <!--  <input class="qty-text" readonly type="text" value="1"> -->
                      </div>
                    </td>
                  </tr>
                  <?php }}?>
                  <tr style="padding-top: 5px;">
                      <td></td>
                      <td><p>Sub Total</p></td>
                      <td><p><?php echo 'AED '.$order_details->cart_total;?></p></td>
                  </tr>
                  <tr class="">
                      <td></td>
                      <td><p>Delivery Fee</p></td>
                      <td><p><?php echo  'AED '.$order_details->delivery_charge;?></p></td>
                  </tr>
                  
                   <tr class="">
                      <td></td>
                      <td><p>Discount</p></td>
                      <td><p><?php echo 'AED '. $order_details->discount;?></p></td>
                  </tr>
                  
                  <tr class="">
                      <td></td>
                      <td><p>Total before VAT</p></td>
                      <td><p><?php echo 'AED '.$order_details->total_before_vat;?></p></td>
                  </tr>
                  <tr class="">
                      <td></td>
                      <td><p>VAT incl.</p></td>
                      <td><p><?php echo 'AED '.$order_details->tax_amount; ?></p></td>
                  </tr>
                 
                  <tr class="">
                      <td></td>
                      <td><p>Order Total</p></td>
                      <td><p><?php echo 'AED '.$order_details->order_total;?></p></td>
                  </tr>                
                </tbody>
              </table>
             
            </div>
          </div>
     
        </div>
      </div>
      <div class="container">
        <?php if($order_details->delivery_boy_id != "")
{
?>
 <div class="shipping-method-choose mb-3">
            <div class="card shipping-method-choose-title-card bg-success">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Delivery Boy Details</h6>
              </div>
            </div>
           
                <div class="row">
                
                <div class="col-12">
             <div class="card shipping-method-choose-card">
            <div class="card-body"  style="min-height:75px">
                <div class="shipping-method-choose">
                 <div class="row">
                   <div class="col-md-12">
                   <span> Call  <a class="btn btn-success" href="tel:<?php echo $delivery_boy_mobile;?>" style="float:right"><i class="lni lni-phone"></i></a> </span>
                   </div>
                   <!--<div class="col-md-8">
                   <span> <?php echo $delivery_boy_name;?></span>
                   </div>-->
                 </div>
                 <!--<div class="row text-left">
                   <div class="col-md-4">
                   <span >Mobile </span>
                   </div>
                   <div class="col-md-8">
                   <span> </span>
                   </div>
                 </div>-->
             
                </div>
                 </div>
              </div>
              </div>
              </div>
            
          </div>

<?php } ?>
      </div>
    </div>





