

<!-- Page Content  -->

<div class="page-content-wrapper" style="padding-top:10px">
      <div class="container">
   
        <!-- Cart Wrapper-->
        <div class="card shipping-method-choose-title-card bg-success" style="background-color:#861121 !important; margin-top:2%">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white"> Order Details</h6>
              </div>
            </div>
        <div class="cart-wrapper-area py-3" style="padding-top:0px !important">
            
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
            <div class="row p-3">
                <div class="col-md-12 h6">
                 
                <div class="h7">Ordered On: <?php echo $order_details->order_time;?> Order#<?php echo $order_details->id;?></div>
                </div>
            </div>
       <div class="container" class="border">
         <div class="row">
           <div class="col-md-4">
            <h5 class="text-primary"><u>Shipping Address</u></h5>
            <p style="line-height: 27px;font-size: 16px;color: #000;"><?php echo $customer_details->name;?><br/>
           <?php echo $customer_details->address;?><br/>
            Address Type:<?php echo $customer_details->addresstype;?><br/>
            Area:<?php echo $customer_details->area_name;?><br/>
           <a href="tel:<?php echo $customer_details->mobile;?>"> <i class="lni lni-phone"></i> Call</a></p>
           </div>
           <div class="col-md-4">
           <h5 class="text-primary"><u>Payment Method</u></h5>
           <p style="line-height: 27px;font-size: 16px;color: #000;"><?php echo $order_details->payment_type;?></p>
             </div>
             <div class="col-md-4">
             <h5 class="text-primary"><u>Order Summary</u></h5>
              <p style="line-height: 27px;font-size: 16px;color: #000;">Item(s) Subtotal: <?php echo $order_details->cart_total;?><br/>
              Delivery Fee: <?php echo $order_details->delivery_charge;?><br/>
              Discount: (-)<?php echo $order_details->discount;?><br/>
              VAT Incl.: <?php echo $order_details->tax_amount;?><br/>
             Total Before VAT: <?php echo $order_details->total_before_vat;?><br/>
              <b>Grand Total: <?php echo $order_details->order_total;?></b></p>
             </div>
         </div>
       </div>
            </div>
          </div>
     
        </div>
      </div>
    </div>





