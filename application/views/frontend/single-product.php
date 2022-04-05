
    <div class="page-content-wrapper">
      <!-- Product Slides-->
      <div class="product-slides">
            
        <!-- Single Hero Slide-->
        	<?php if($prod_detail->image_url){ ?>
        <div class="single-product-slide" style="background-image: url('<?php echo base_url().'uploads/product-images/'.$prod_detail->image_url?>')"></div>
        <?php  } else { ?>
        <div class="single-product-slide"  style="background-image:url('<?php echo base_url();?>images/dummy.png');"></div>  
        <?php } ?>
        
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3" style="padding-left: 10px; padding-right: 10px;">
              <!-- <div style="height:130px; overflow-x:scroll">-->
              <div>
          <div class="container d-flex justify-content-between" style="padding:0px 10px 0px 10px;">
           
            <div class="p-title-price">
              
              <h6 class="mb-1"><?php echo $prod_detail->name?></h6><span class="status_text text-danger"></span>
                
              <p><?php echo $prod_detail->description;?></p>
            
              <div class="price_detail">
              <p class="sale-price mb-0">
              <?php if($prod_detail->price== $prod_detail->mrp)
              {
                echo 'AED '.$prod_detail->price; 
              }
              else
              {?>  
              AED <?php echo $prod_detail->price?><span>  <?php echo $prod_detail->mrp?></span>
            <?php }?>
            </p>
              </div>
            </div>
            
           
        
          </div>
          <!-- Ratings-->
          <!-- <div class="product-ratings">
            <div class="container d-flex align-items-center justify-content-between">
              <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1">3 ratings</span></div>
              <div class="total-result-of-ratings"><span>5.0</span><span>Very Good                                </span></div>
            </div>
          </div>
        </div> -->
       
   
        <!-- Selection Panel-->
        <div class="selection-panel bg-white " style="padding-bottom:0px">
          <div class="container d-flex align-items-center justify-content-between">
            <!-- Choose Color-->
            <div class="choose-color-wrapper">
              <?php
               $var_count=count($variants);
            if($var_count >1)
                    {
                      ?>
              <p class="mb-1 font-weight-bold">Variants</p>
              <?php }?>
              <div class="choose-color-radio d-flex align-items-center p-1">
               
                  <!-- Single Radio Input-->
                  <?php 
                
                  $btn_disabled="";
                  $addon_style="block";
                  foreach($variants as $var)
                  {
                    $checked="";
                    if($var[0]==$prod_detail->variants)
                    {
                      $checked="checked";
                     if($var[2]<=0)
                     {
                       $prod_status="Out Of Stock";
                       $btn_disabled='disabled';
                       $addon_style="none";
                     }
                     else if($var[2]<10 && $var[2]>0)
                     {
                      $prod_status="Only".$var[2]." Left";
                     }
                     else
                     {
                      $prod_status="In Stock"; 
                     }
                    }
                    if($var_count >1)
                    {
                    if($var[2]<=0)
                  {?>
                  <div class="form-check mb-0 pr-1 pl-1" style="text-decoration: line-through;">
                    <input class="form-check-input yellow get_price" id="colorRadio1" type="radio" value="<?php echo $var[0]?>" name="variant" disabled <?php echo $checked;?>>
                    <label class="form-check-label " for="colorRadio1"><?php echo $var[1]?></label> &nbsp; &nbsp;
                  </div>
                  
                  <?php }
                else 
                {
                  ?>
                   <div class="form-check mb-0 pr-1 pl-1">
                    <input class="form-check-input yellow get_price" id="colorRadio1" type="radio" value="<?php echo $var[0]?>" name="variant" <?php echo $checked;?>>
                    <label class="form-check-label " for="colorRadio1"><?php echo $var[1]?></label>  &nbsp; &nbsp;
                  </div>

                  <?php
                }}} ?>
              </div>
            </div>
          </div>
         
          <?php if($prod_detail->status=='Out Of Stock')
          {
            $prod_status="Out Of Stock";
            $btn_disabled='disabled';
            $addon_style="none";
          }?>
        <div class="container addon_container" style="display: <?php echo $addon_style?>;">
          <?php if($addons)
          {
            ?>
          <p class="mb-1 font-weight-bold">Add Ons</p>
              <!-- Single Catagory Card-->
              <?php foreach($addons as $addon)
              {
                if($addon->max_sale >0)
                { ?>
               <div class="card ">
               <div class="card-body" style="background-color:#d8d8d4;">
              <div class="row g-3">
              
               
                 <div class="col-6"><div class="form-check">
  <input class="form-check-input chk_addon " type="checkbox"  name="addon" value="<?php echo $addon->id;?>" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   <?php echo $addon->name.'('?><!--<i class="lni lni-rupee"></i>--> AED <?php echo $addon->price.')';?>
  </label>
</div></div><div class="col-6">
<div class="order-plus-minus d-flex align-items-center p-1">
                <div class="quantity quantity-button-handler qty_minus_addon" id="ad_minus<?php echo $addon->id;?>"  style="width: 35px;
    height: 35px;
    background-color: #fef8ff;
    border: 1px solid #ebebeb;line-height: 33px;
    font-size: 1.25rem;
    text-align: center;
    border-radius: 0.25rem;
    cursor: pointer;
    ">-</div>
   
                <input class="form-control cart-quantity-input addon_qty" style="max-width: 50px;
    height: 35px;
    margin-right: 0.5rem;
    margin-left: 0.5rem;
    text-align: center;
    font-weight: 700;
    padding: 0.375rem 0.5rem; background:#fff" type="text" step="1" id="<?php echo $addon->id;?>" name="addon_quantity" value="1" readonly>
     
                <div class="quantity-button-handler qty_plus_addon" id="ad_plus<?php echo $addon->id;?>"  style="width: 35px;
    height: 35px;
    background-color: #fef8ff;
    border: 1px solid #ebebeb;line-height: 33px;
    font-size: 1.25rem;
    text-align: center;
    border-radius: 0.25rem;
    cursor: pointer;
   ">+</div>
              </div>
             
              <input type="hidden" name="addon_price" class="addon_price_<?php echo $addon->id;?>" value="<?php echo $addon->price ?>">
              <input type="hidden" name="addon_name" class="addon_name_<?php echo $addon->id;?>" value="<?php echo $addon->name ?>">
              <input type="hidden" name="addon_name" class="addon_max_<?php echo $addon->id;?>" value="<?php echo $addon->max_sale ?>">
                </div>
                <p class="addon_status_<?php echo $addon->id;?>" style="display: none; padding:0px; margin:0px"></p>
              </div>
                
                
              </div></div>
              <?php }}}?>
            
        <!-- <input type="hidden" id="chk_var" class="chk_var" value="<?php //echo $chk_var;?>"> -->
        </div>
    
          
        </div>
        </div>
        <!-- Add To Cart-->
        
        <div class="cart-form-wrapper bg-white mb-3 py-3">
          <div class="container">
                <div style="margin-bottom:10px">
                	<span class="prod_status" style="font-size: 18px;color: #d00000;font-weight: 600;">
                  <?php echo $prod_status;?>
                </span>
                </div>
          <form method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="add_to_cart cart-form">
                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod_detail->id; ?>">
                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $prod_detail->name; ?>">
                <input type="hidden" id="prod_category" name="prod_category" value="<?php echo $prod_detail->category; ?>">
                <input type="hidden" id="variants" name="variants" value="<?php echo $prod_detail->variants;?>">
                <input type="hidden" id="price" name="price" value="<?php echo $prod_detail->price;?>">
                <input type="hidden" id="mrp" name="mrp" value="<?php echo $prod_detail->mrp;?>">
                <input type="hidden" id="max_sale" name="max_sale" value="<?php echo $prod_detail->max_sale;?>">
                <input type="hidden" id="addon" name="addon" value="">
              
                <div style="clear:both"></div>
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler qty_minus">-</div>
                <input class="form-control cart-quantity-input prod_qty" type="text" step="1"  name="quantity" value="1">
                <div class="quantity-button-handler qty_plus">+</div>
			
              </div>
			 
			  
<button class="btn btn-warning ms-3 add-cart-sub btn-addtocart" type="submit" style="font-size: 18px;
    padding: .375rem .50rem !important;width: 100%;" <?php echo $btn_disabled;?>>Add To Cart</button>

			
			</form>
			<a class="btn btn-danger ms-3" href="<?php echo site_url('home')?>"  style="font-size: 18px;
    margin-top: 5%;
    /* padding: .375rem .70rem !important; */
    margin-left: 0px !important;
    width: 100%;
    position: fixed;
    z-index: 9999999;
    bottom:8%;
    left: 0%;
    display: block;
    margin-left: 0% !important;
    padding-left: 0px;">Continue Shopping</a>
          </div>
        </div>
        <!-- Product Specification-->


      </div>
    </div>
   