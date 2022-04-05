<div class="page-content-wrapper">
  <?php /* print_r($user_address); exit; */?>
      <div class="container">
        <?php
        $phone_no=$name=$email_id=$address=$customer_id=$street=$landmark=$addresstype="";
        $name=$_SESSION['userdata']['name'];
        $phone_no=$_SESSION['userdata']['mobile'];
        if($customer)
        {

          $customer_id=$customer->id;
          $email_id=$customer->email_id;
        }
        ?>
		
		<style>
      .popupcontainer {
    width: 100%;
    height: 100%;
    top: 0;
    right:0;
    bottom:0;
    left:0;
    position: fixed;
    z-index:1000;
    display: none;
    /* visibility: hidden; */
    background-color: rgba(22,22,22,0.5); /* complimenting your modal colors */
}
#popupcontainer:target {
    visibility: visible;
    display: block;
}

		.data-content
		{
			display:block;
			width:100% !important;
			max-width:100% !important;
		}
		</style>
          <form id="confirm_payment" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" >
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Billing Address-->
          <div class="billing-information-card mb-3">
            <div class="card billing-information-title-card bg-danger">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Billing Information</h6>
              </div>
            </div>
            <div class="card user-data-card">
              <div class="card-body">                                   
                <div class="single-profile-data align-items-center justify-content-between">
                  <div class="title align-items-center"><span>Full Name</span></div>
                  <div class="data-content">
				  <input class="form-control" style="background:#e8f0fe;color:#000" type="text" name="name" value="<?php echo $name;?>" required readonly><!-- SUHA JANNAT --></div>
                </div>
                <div class="single-profile-data align-items-center justify-content-between">
                  <div class="title align-items-center"><span>Email Address</span></div>
                  <div class="data-content">
				  <input class="form-control" style="background:#e8f0fe;color:#000" type="email" name="email_id" value="<?php echo $email_id;?>" required readonly></div>
                </div>
                <div class="single-profile-data align-items-center justify-content-between">
                  <div class="title align-items-center"><span>Phone</span></div>
                  <div class="data-content">
				  <input class="form-control" style="background:#e8f0fe;color:#000" type="text" name="mobile" value="<?php echo $phone_no;?>" id="mobile" required readonly>
                  <p class="phone" style="display: none;"></p>
                </div>
                </div>
           
                <div class="single-profile-data align-items-center justify-content-between">
                  <!--<h4>Shipping Address</h4>-->
                  <div class="data-content"><span></span>
                </div>
                </div>
                
                <?php if(isset($user_address)){?>
            <div class="card p-2">
                
                <!--start-->
                
                <div class="accordian-area-wrapper mt-3">
            <!-- Accordian Card-->
            <div class="card accordian-card seller-card clearfix">
              <div class="card-body" style="padding:20px 0px">
               
                <div class="accordion" id="accordion2">
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingThree">
                    <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span><h5 class="accordian-title">Choose Address</h5></span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordion2">
                   <?php 
                 $checked="checked";
                foreach($user_address as $detail){
                 
                ?>
                <div class="user_address">
                <h6 class="card-title"><div class="row"><div class="col"><div class="form-check form-check-inline">
  <input class="form-check-input address_type" type="radio" name="address_type" id="inlineRadio1" value="<?php echo $detail->address_type;?>" required <?php echo $checked; ?>>
  <?php $checked=""; ?>
  <label class="form-check-label" for="inlineRadio1" ><?php echo $detail->address_type;?></label>
  <input type="hidden" class="charge" value="<?php echo $detail->charge;?>">
  <input type="hidden" class="extra_delivery" value="<?php echo $detail->extra_charge;?>">
  <input type="hidden" class="delivery" value="<?php echo $detail->charge+$detail->extra_charge;?>">
  <input type="hidden" class="min_order" value="<?php echo $detail->min_order;?>">
  <input type="hidden" class="area" value="<?php echo $detail->area_id?>">
  <input type="hidden" class="address" value="<?php echo $detail->address;?>">
 
</div></div><div class="col d-flex justify-content-centre"><input type="hidden" class="del_addresstype" value="<?php  echo $detail->address_id;?>">
<i class="lni lni-trash remove_address" style="right: 15px; position: absolute; font-size:20px"></i></div></div></h6>
<p class="card-title"><?php echo $detail->building_floor_no." ,".$detail->address."<br/>".$detail->current_location;?></p>
                </div>
                <?php  
                }
                  ?>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          
          <!--end-->
                
                
                
                
                    
             <!-- <div class="card-header">Choose Address</div>
              <div class="card-body">
                <?php 
                 $checked="checked";
                foreach($user_address as $detail){
                 
                ?>
                <div class="user_address">
                <h6 class="card-title"><div class="row"><div class="col"><div class="form-check form-check-inline">
  <input class="form-check-input address_type" type="radio" name="address_type" id="inlineRadio1" value="<?php echo $detail->address_type;?>" required <?php echo $checked; ?>>
  <?php $checked=""; ?>
  <label class="form-check-label" for="inlineRadio1" ><?php echo $detail->address_type;?></label>
  <input type="hidden" class="charge" value="<?php echo $detail->charge;?>">
  <input type="hidden" class="extra_delivery" value="<?php echo $detail->extra_charge;?>">
  <input type="hidden" class="delivery" value="<?php echo $detail->charge+$detail->extra_charge;?>">
  <input type="hidden" class="min_order" value="<?php echo $detail->min_order;?>">
  <input type="hidden" class="area" value="<?php echo $detail->area_id?>">
  <input type="hidden" class="address" value="<?php echo $detail->address;?>">
 
</div></div><div class="col d-flex justify-content-centre"><input type="hidden" class="del_addresstype" value="<?php  echo $detail->address_id;?>">
<i class="lni lni-trash remove_address" style="right: 15px; position: absolute; font-size:20px"></i></div></div></h6>
<p class="card-title"><?php echo $detail->building_floor_no." ,".$detail->address."<br/>".$detail->current_location;?></p>
                </div>
                <?php  
                }
                  ?>
              </div>-->
                
            
              <div class="card-footer text-center" style="padding:0px">
                  <button class="btn btn-danger" id="new_address_popup" type="button" onclick="$('#popupcontainer').show()" style="display: block;
    width: 100%;">Add New</button>
            <!-- <input type="hidden" name="actual_total" id="actual_total" value="<?php echo $actual_total?>"> -->
          
         
            </div>
            </form>
            </div>
            <?php }?>
              <!-- 
                <div class="single-profile-data align-items-center justify-content-between">
                  <div class="title align-items-center"><span>Landmark</span></div>
                  <div class="data-content">
				  <input  class="form-control" style="background:#e8f0fe;color:#000" type="text" name="landmark" value="<?php echo $landmark;?>" id="landmark" required>
                </div>
                </div> -->
                <!-- Edit Address--><!-- <a class="btn btn-danger w-100" href="edit-profile.html">Edit Billing Information</a> -->
              </div>
            </div>
          </div>
  
           <!-- Coupon Area-->
           <div class="card coupon-card mb-3">
            <div class="card-body">
              <div class="apply-coupon">
                <h6 class="mb-0">Have a coupon?<span> <button class="btn btn-primary get_offers" type="button" style="background-color: #049444;
    border-color: #026930;">View Offers</button></span></h6> 
                <p class="mb-2 cart-status text-success"><?php  if($this->session->userdata('promoid')){?> Successfully Applied <?php } else{?>Select coupon code here &amp; get awesome discounts!<?php }?></p>
               
                <div class="coupon-form">
                  <form action="#">
                    <input type="hidden" id="actual_total" value="<?php $items_total;?>">
                  <!--   <input class="form-control promocode" type="text" placeholder="SUHA30"> -->
                
                    <select class="form-control promocode" class="promocode" name="promo_code">
                    <option value="" selected disabled >Choose</option>
                      <?php if($promolist){foreach($promolist as $promo)
                      {
                      if(($this->session->userdata('promoid')) && $this->session->userdata('promoid') == $promo->promo_id)
                      {?>
                      <option selected value="<?php echo $promo->promo_id;?>">#<?php echo $promo->promo_code;?></option>
                        <?php
                      }else{ ?>
                      <option value="<?php echo $promo->promo_id;?>">#<?php echo $promo->promo_code;?></option>
                      <?php } }
                      }?>
                     
                    </select>
               
                    <!-- <input type="hidden" id="total_amount" name="total_amount" value="<?php //echo $this->session->userdata('cart_total');?>"> -->
                  
                    <button class="btn btn-primary cart-apply" type="button" style="background-color: #049444;
    border-color: #026930;">Apply</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
  
          <div id="popupcontainer" class="popupcontainer" style="display:none;">

<!-- Modal content -->
<form id="add_new_address" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
  <div class="container pt-3 mt-5">
    <div class="card">
      <div class="card-header">
        <div class="row">
        <div class="col-11" >Add New Address</div>
        <div class="col-1"><i class="lni lni-close" onclick="$('#popupcontainer').hide();" style="color:gray"></i></div>
        </div>
      </div>
      <div class="card-body">
      <div class="row p-2">
<div class="col">
<label>Building/Room No:</label>
<input type="text" name="building_floor_no" class="form-control" required>

</div>
      </div>
      <div class="row p-2">
<div class="col">
<label>Address:</label>
<input type="text" name="address" class="form-control" required>

</div>
      </div>
      <div class="row p-2">
<div class="col">
<label>Current Location</label>
<textarea name="current_location" class="form-control cur_loc" width="250px" required></textarea>
</div>
      </div>
      <div class="row p-2">
<div class="col">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio1" value="home" required checked>
  <label class="form-check-label" for="inlineRadio1" >Home</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio2" value="office">
  <label class="form-check-label" for="inlineRadio2">Office</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio3" value="appartments">
  <label class="form-check-label" for="inlineRadio3">Appartments</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio3" value="other">
  <label class="form-check-label" for="inlineRadio3">Other</label>
</div>
</div>
      </div>
      <div class="row p-2">
<div class="col text-right pt-2">
<button class="btn btn-primary" type="submit" style="display: block;
    width: 100%;">Add</button>
<input type="hidden" id="areanew" name="area" value="">
<input type="hidden" id="targetelem" value="popup">
</div>
      </div>
          </div>
    </div>
  </div>
  

</form>
</div>
<!-- my modal-->
<div id="myModal" class="modal" style="z-index:99999999">

<!-- Modal content -->
<div class="modal-content" style="height: 50%;overflow:scroll;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-right">
      <span class="close" onclick="$('.modal').hide()">&times;</span>
      </div>
    </div>
    <div class="row">
      <?php if($promolist){foreach($promolist as $promo){
      ?>
   <div class="card">
     <div class="card-body">
     <h6 class="card-header"><?php echo $promo->name;?></h6>
<h7 class="card-title">Code: #<?php echo $promo->promo_code;?></h7>
<p class="card-text"><?php echo $promo->description;?></p>
<div class="card text-right"><a href="#" class="btn btn-primary use_code" style="background-color: #049444;
    border-color: #026930;" id="<?php echo $promo->promo_id;?>">Use</a></div>
   </div>
  
   </div>
   <?php   }}
   else
   {
     ?>
    <div class="card">
    <div class="card-body">
      <h7 class="card-text">Offers Not Available</h7>
    </div>
    </div>
    <?php
   }?>
    </div>
  </div>
  
</div>

</div>
<?php if($reward_point >0)
{?>
<div class="card coupon-card mb-3">
            <div class="card-body">
              <div class="redeem-point">
               
                <div class="coupon-form">
                <p><h5>You have <?php echo $reward_point?> Points. That's AED. <?php echo $reward_point;?></h5></p>
                <p><h7><a class="redeemreward"> Click Here To Redeem</a></h7></p>
                </div>
              </div>
            </div>
          </div>
          <?php }?>

          <!-- Shipping Method Choose-->
          <div class="shipping-method-choose mb-3">
            <div class="card shipping-method-choose-title-card bg-success">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Payment Type Choose</h6>
              </div>
            </div>
           
                <div class="row">
                   <div class="col-6" style="padding-right:7px">
                        <div class="card shipping-method-choose-card">
              <div class="card-body" style="min-height:135px">
                <div class="shipping-method-choose">
                  <ul class="ps-0">
                    <div class="row">
                 
                    <li>
					  <label for="fastShipping" style="padding:10px 0px">
                      <input id="fastShipping" style="visibility: visible; margin-top: 5px;" class="pay_type" type="radio" name="payment_type" value="cash on delivery" checked>
                    <img src="<?php echo base_url();?>img/cash-on-delivery.png" style="display: block;
    margin: 0px auto;"/> 	<span style="text-align: center;
    margin: 0px auto;
    display: block;
    font-size: 14px;
    padding-top: 7%;
    color: #000;">Cash On Delivery </span></label>
                      <div class="check"  style="opacity:0;"></div>
                    </li>
                    </div>
                  </ul>
                </div>
              </div>
                        </div>
                   </div>

                    <div class="col-6"  style="padding-left:7px">
                        <div class="card shipping-method-choose-card">
              <div class="card-body" style="min-height:135px">
                <div class="shipping-method-choose">
                  <ul class="ps-0">
                    <div class="row">
                    
                    <li>
					 <label for="normalShipping"  style="padding:10px 0px">
                      <input id="normalShipping" style="visibility: visible; margin-top: 5px;"  class="pay_type" type="radio" name="payment_type" value="card on delivery">
                     <img src="<?php echo base_url();?>img/debit-card.png" style="display: block;
    margin: 0px auto;"/><span style="text-align: center;
    margin: 0px auto;
    display: block;
    font-size: 14px;
    padding-top: 7%;
    color: #000;">	 Card Payment </span></label>
                      <div class="check" style="opacity:0;"></div>
                    </li>
                    </div>
                 
                   
                  </ul>
                  <input type="hidden" id="payment_type" name="payment_type" value="cash on delivery">
                  <input type="hidden" id="area" name="area" value="<?php echo $area;?>">
                  <input type="hidden" id="delivery_type" name="delivery_type" value="<?php echo $delivery_type;?>">
                  <input type="hidden" id="status" name="status" value="1">
                </div>
                 </div>
              </div>
              </div>
              

              </div>
           
          </div>
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <div class="container p-1">
<div class="row p-1">

<div class="col-8">
<b>Subtotal</b>
</div>
<div class="col-4">
<!--<i class="lni lni-rupee"></i>--> AED <?php echo $items_total; ?>
</div>
<input type="hidden" name="cart_total" value="<?php echo $items_total;?>" id="items">
</div>


            
			
       <div class="row p-1">
                <div class="col-8">
<b>Delivery Fee</b>
</div>
<div class="col-4 del_charge">
<!--<i class="lni lni-rupee"></i>--> AED <?php echo $delivery;?>
</div>
<input type="hidden" name="delivery_charge" id="delivery_charge" value="<?php echo $delivery;?>">

              </div>

              <div class="row p-1">
<div class="col-8">
<b>Discount</b>
</div>
<div class="col-4 discount">
<!--<i class="lni lni-rupee"></i>--> AED <?php echo $discount;?>
</div>
<input type="hidden" name="discount" id="discount" value="<?php echo $discount;?>">
</div>

              <div class="row p-1">
                <div class="col-8">
<b>Total before VAT</b>
</div>
<div class="col-4 beforetax">
<!--<i class="lni lni-rupee"></i>--> AED <?php echo $total_before_vat;?>

</div>
<input type="hidden" name="total_before_vat" id="beforetax_amount" value="<?php echo $total_before_vat;?>">
              </div>
              <div class="row p-1">
                <div class="col-8">
<b>VAT incl.</b>
</div>
<div class="col-4 tax">
<!--<i class="lni lni-rupee"></i>--> AED <?php echo $tax_amount;?>
</div>
<input type="hidden" name="tax_amount" id="tax_amount" value="<?php echo $tax_amount;?>">
<input type="hidden" name="tax" id="tax" value="5">
              </div>
             
			 
    
            
             
        
             
             
              


 
            
             
                  <div class="row p-1">
<div class="col-8">
<span style="font-size:18px; font-weight:600; color:#000">Payable Amount</span>
</div>
<div class="col-4 ot">
<span style="font-size:18px; font-weight:600;color:#000">
<!--<i class="lni lni-rupee"></i>--> AED <span class=""><?php echo $order_total;?></span>
</span>
</div>
<input type="hidden" name="order_total" id="order_total" value="<?php echo $order_total;?>">
              </div>
              
              <div class="row p-1">
<div class="col-md-12" style="text-align: right;">
<input type="hidden" name="id" id="id" value="<?php echo $customer_id;?>">
<input type="hidden" name="offer_product_id" id="offer_product_id" value="<?php echo $offer_product_id;?>">
<input type="hidden" name="remarks" id="remarks" value="<?php echo $remarks?>">
<input type="hidden" name="reward_point" id="reward_point" value="<?php echo $reward_point?>">
<input type="hidden" name="reward_redeemed" id="reward_redeemed" value="no">
<input type="hidden" name="redeemed_points" id="redeemed_points" value="">
<input type="hidden" name="delivery" id="delivery" value="<?php echo $delivery;?>">
<input type="hidden" class="minord" value="<?php echo $min_order?>">
<input type="hidden" class="extra_charge" value="<?php echo $extra_charge;?>">
<input type="hidden" class="actdel" value="<?php echo $actual_delivery;?>">
<input type="hidden" class="" value="" id="stripeToken" name="stripeToken">
<button type="button" class="btn btn-danger confirmbtn" href="#" style="display: block;
    width: 100%;">Confirm Order</button>

</div>

            </div>
             
              </div>
              
           
             
             <!--  <h5 class="total-price mb-0"><i class="lni lni-rupee"></i><span class="counter"><?php //echo $this->session->userdata('cart_total');?></span></h5><button type="submit" class="btn btn-warning" href="checkout-payment.html">Confirm Order</button> -->
            </div>
          </div>
        </div>
          </form>
    
                        <!-- /////////////////For STRIPE/////////////// -->
<div id="popupstripe" class="popupcontainer" style="display:none;">

<!-- Modal content -->
  <div class="container pt-3 mt-5">
    <div class="card">
      <div class="card-header">
        <div class="row">
        <div class="col-11" >Enter Card Details</div>
        <div class="col-1"><i class="lni lni-close" onclick="$('#popupstripe').hide();" style="color:gray"></i></div>
        </div>
      </div>
      <div class="card-body">
        <div class="" id="paymentResponse"></div>
    
        <form action="" method="POST" id="paymentFrm">
            <div class="form-group pt-2">
                <label>CARD NUMBER</label>
                <div id="card_number" class="field">
               
                </div>
            </div>
            <div class="row pt-2">
                <div class="left">
                    <div class="form-group">
                        <label>EXPIRY DATE</label>
                        <div id="card_expiry" class="field">
                       
                        </div>
                    </div>
                </div>
                <div class="right pt-2">
                    <div class="form-group">
                        <label>CVC CODE</label>
                        <div id="card_cvc" class="field">
                       
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger mt-3" id="payBtn">Submit Payment</button>
        </form>
          </div>
    </div>
  </div>
</div>
<!-- ////////////////For STRIPE/////////////// -->
      </div>
    </div>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
      $('document').ready(function(e){
            if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
      localStorage.setItem('latitude',position.coords.latitude);
      localStorage.setItem('longitude',position.coords.longitude);
   /*  lat= position.coords.latitude,
    long=position.coords.longitude */
  }); 
}
  if(localStorage.getItem('latitude'))
  {
    var data={latitude:localStorage.getItem('latitude'),longitude:localStorage.getItem('longitude')}
    var html="";
    ajaxcall1(data,'set_current_location',function(data){
      if(data !="")
      {
        var data=JSON.parse(data);
        $('#areanew').val(data[0]);
        $.each(data,function(index,value){
          html+=value+" , ";
        })
      }  
      $('.cur_loc').html(html); 
    })
  }
  else{
    swal("Please turn on your device location");
    setTimeout(function(){location.reload(true);}, 10000);
  }
      })
</script>
