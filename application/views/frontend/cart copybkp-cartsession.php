
    <div class="page-content-wrapper">
    
      <?php print_r($cart_list); ?>
        <div class="container" style="height:700px;overflow-y: scroll;">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                <?php 
                $total=$offer_product_id=0;
                $offer_product="";
              
                if($cart_list)
                {
                foreach($cart_list as $cart)
                {                 
                  $total=$total+$cart->product_total;
                 
                 
                 ?>
                  <tr>
                    <th scope="row ">
                    <input type="hidden" name="cart_id" class="cart_id" value="<?php //echo $cart->cart_id; ?>" >
                    <input type="hidden" name="prod_id" class="prod_id" value="<?php echo $cart->product_id; ?>" >
                    <input type="hidden" name="prod_type" class="prod_type" value="<?php echo $cart->type; ?>" >
                    <input type="hidden" name="prod_total" class="prod_total" value="<?php echo $cart->product_total; ?>" >
                    <input type="hidden" name="prod_count" class="prod_count" value="<?php echo $cart->product_count; ?>" >
                    <input type="hidden" name="prod_variant" class="prod_variant" value="<?php echo $cart->product_variant; ?>" >
                    <a class="remove-product" href="#"><i class="lni lni-close"></i></a></th>
                    <td><a href="#"><?php echo $cart->product_name?><span><!--<i class="lni lni-rupee"></i>--> AED <?php echo $cart->product_price;?></span></a></td>
                     <td class="">
                      <?php if($cart->product_variant=="offer-product"){ 
                        $offer_product=$cart->product_name;
                        $offer_product_id=$cart->product_id;
                        echo "OFFER";} else {?>
                       <div class="row">
                        
                      <div id="quantity_div">
                    
  </div> 
                      
                     <span class="quantity quantity-button-handler qty_update" id="substraction" style="width: 25px;
    height: 25px;
    line-height: 25px;
    font-size: 1.25rem;
    text-align: center;
    border-radius: 0.25rem;
    cursor: pointer;
    ">-</span> 
   
   
   <input class=" prod_count form-control cart-quantity-input" style="max-width: 40px;
    height: 25px;
    text-align: center;
    font-weight: 700;
    padding: 0.375rem 0.5rem;" type="text" step="1" id="<?php echo $cart->cart_id;?>" name="prod_quantity" value="<?php echo $cart->product_count; ?>" data-type="<?php echo $cart->type; ?>" >
     
                <div class="quantity-button-handler qty_update" id="addition" style="width: 25px;
    height: 25px;
   
    line-height: 25px;
    font-size: 1.25rem;
    text-align: center;
    border-radius: 0.25rem;
    cursor: pointer;
   ">+</div>
   </div>
                      </div>
    <!-- <div class="quantity">
                        <input class="qty-text" type="text" value="<?php echo $cart->product_count; ?>">
                        </div> -->
                    
                     <?php }?>
                    </td>
                    <td>
                    <input type="hidden" name="upd_prod_id" class="upd_prod_id_<?php echo $cart->cart_id;?>" value="<?php echo $cart->product_id;?>">
                       <input type="hidden" name="upd_prod_var" class="upd_prod_var_<?php echo $cart->cart_id;?>" value="<?php echo $cart->product_variant;?>">
                      <div class="quantity">
                        <input class="qty-text" type="text" value="<?php echo $cart->product_total; ?>" disabled>
                      </div>
                    </td>
                  </tr>
                  
                
                  <?php 
                 
                  
                  
                }
               
                
               ?>
                
                </tbody>
              </table>
            </div>
          </div>
          <!--Remarks-->

        <div class="cart-wrapper-area">
          <div class="cart-table card" style="margin-bottom: 4%;">
            <div class="table-responsive card-body">
             <textarea name="remarks_txt" id="remarks_txt" class="form-control" style="height: 70px;" placeholder="Remarks......"><?php if($this->session->userdata('remarks')){echo $this->session->userdata('remarks');};?></textarea>
            </div>
          </div>
            <!-- Shipping Method Choose-->
            <div class="shipping-method-choose mb-3">
            <div class="card shipping-method-choose-title-card bg-success" style="background-color:#861121 !important">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Delivery Type Choose</h6>
              </div>
            </div>
             
                <?php 
                $delivery_type="take away";
                $hme_checked="";
                $tak_checked="checked";
              
              
                if($this->session->userdata('delivery_type')){
                  if($this->session->userdata('delivery_type')=='home delivery')
                  {
                    $hme_checked="checked";
                    $delivery_type="home delivery";
                  
                  }
                  else if($this->session->userdata('delivery_type')=='take away')
                  {
                    $tak_checked="checked";
                    $delivery_type="take away";
                  }
                }?>
                <div class="row">
                 
                <div class="col-6">
             <div class="card shipping-method-choose-card">
            <div class="card-body"  style="min-height:77px">
                <div class="shipping-method-choose">
                <ul class="ps-0">
                    <div class="row">
                 
                    <li>
					  <label for="takeaway" style="padding:10px 0px">
                      <input id="takeaway" style="visibility: visible; margin-top: 5px;" class="deli_type" type="radio" name="delivery_type" value="take away" required  <?php echo $tak_checked;?>>
                    <img src="<?php echo base_url();?>img/take-away.png" style="display: block;
    margin: 0px auto;"/> 	<span style="text-align: center;
    margin: 0px auto;
    display: block;
    font-size: 14px;
    padding-top: 7%;
    color: #000;">Take Away </span></label>
                      <div class="check"  style="opacity:0;"></div>
                    </li>
                    </div>
                  </ul>
                </div>
            </div>
             </div>
                </div>
               
   
                <div class="col-6"  style="padding-left: 2px;">
             <div class="card shipping-method-choose-card">
            <div class="card-body"  style="min-height:77px">
                <div class="shipping-method-choose">
                <ul class="ps-0">
                    <div class="row">
                 
                    <li>
					  <label for="takeaway" style="padding:10px 0px">
                      <input id="takeaway" style="visibility: visible; margin-top: 5px;" class="deli_type" type="radio" name="delivery_type" value="home delivery" <?php echo $hme_checked;?>>
                    <img src="<?php echo base_url();?>img/delivery.png" style="display: block;
    margin: 0px auto;"/> 	<span style="text-align: center;
    margin: 0px auto;
    display: block;
    font-size: 14px;
    padding-top: 7%;
    color: #000;">Home Delivery </span></label>
                      <div class="check"  style="opacity:0;"></div>
                    </li>
                    </div>
                  </ul>
            
                <!--   <input type="hidden" id="delivery_type" name="delivery_type" value="cash on delivery"> -->
                  <input type="hidden" id="status" name="status" value="9">
                </div>
                 </div>
              </div>
              </div>
              </div>
            
          </div>
          
         
         
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area" style="box-shadow:none; background:#f5f5f5; float:right">
          <form id="checkout" method="POST" action="<?php echo site_url('checkout')?>" data-form="ajaxform" enctype="multipart/form-data" class="cart-form">

          <input type="hidden" id="actual_total" name="actual_total" value="<?php echo $total;?>">
          <input type="hidden" id="remarks" name="remarks" value="<?php if($this->session->userdata('remarks')){echo $this->session->userdata('remarks');}?>">
          <input type="hidden" id="delivery_type" name="delivery_type" value="<?php echo $delivery_type;?>">
          <input type="hidden" id="offer_usage" name="offer_usage" value="<?php echo $offer_usage;?>">
          <input type="hidden" id="offer_product" name="offer_product" value="<?php echo $offer_product;?>">
          <input type="hidden" id="offer_product_id" name="offer_product_id" value="<?php echo $offer_product_id;?>">
          <input type="hidden" name="cart_total" id="cart_total" value="<?php if($this->session->userdata('cart_total')){echo $this->session->userdata('cart_total');}else{echo $total;} ?>">
            
            <div class="d-flex align-items-center justify-content-between" style="background:#f5f5f5">
              <h5 class="total-price mb-0"><!--<i class="lni lni-rupee"></i>--><!--  AED <span class=" total_amount"><?php if($this->session->userdata('cart_total')){echo $this->session->userdata('cart_total');}else{echo $total;} ?></span>
              <?php if($this->session->userdata('discount')){ ?><span class="h6">(discount:<?php echo $this->session->userdata('discount');?>)</span><?php }?> -->
              </h5><button type="submit" class="btn btn-warning checkout_btn" href="#">Checkout Now</button>
            
            </div>
          </form>
          </div>
          <?php
        }
                else
                {
                  $this->session->set_userdata('cart_total',0);
                  $this->session->set_userdata('promoid','');
                  $this->session->set_userdata('cart_value',0);
                  $this->session->set_userdata('discount',0);
                  ?>
                 <span> Nothing Added To Cart</span>
                 <?php
                }
                  ?>
        </div>
      </div>
    </div>
   