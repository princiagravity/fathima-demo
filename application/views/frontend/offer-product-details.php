
    <div class="page-content-wrapper">
      <!-- Product Slides-->
      <?php //print_r($offer_product); exit;?>
      <div class="product-slides">
       
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('<?php echo base_url().'uploads/offer-product-images/'.$offer_product->image_url?>')"></div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3" style="padding-left: 10px; padding-right: 10px;">
          <div class="container d-flex justify-content-between" style="padding:0px 10px 0px 10px;">
            <div class="p-title-price">
              <h6 class="mb-1"><?php echo $offer_product->name?></h6><span class="status_text text-danger"></span>
              <p><?php echo $offer_product->description;?></p>
              <div class="price_detail">
              <p class="sale-price mb-0">
              <?php if($offer_product->offer_price== $offer_product->mrp || $offer_product->offer_price > $offer_product->mrp)
              {
                echo 'AED'.$offer_product->offer_price; 
              }
              else
              {?>  
              AED <?php echo $offer_product->offer_price?><span>  <?php echo $offer_product->mrp?></span>
            <?php }
            
            if(isset($offer_product->discount))

            {

              ?>

                <span class="mt-5" style="bottom: 8rem !important;text-decoration:none;"><?php echo "&nbsp".$offer_product->discount."% Off";?></span>

              <?php

            }
            $prod_status=$btn_disabled="";
            if($offer_product->stock <10 && $offer_product->stock != 0)
            {
                $prod_status="Only ".$offer_product->stock." Left!";
            }
            else if($offer_product->stock >=10)
            {
                $prod_status="In Stock";
            }
            else if($offer_product->stock <=0)
            {
                $prod_status="Out Of Stock";
                $btn_disabled="disabled";
            }
            

            ?>
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
       
   
        
        
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
          <div class="container">
                <div style="margin-bottom:10px">
                	<span class="prod_status" style="font-size: 18px;color: #d00000;font-weight: 600;">
                  <?php echo $prod_status;?>
                </span>
                </div>
          <form method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="add_to_cart cart-form">
                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $offer_product->id; ?>">
                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $offer_product->name; ?>">
                <input type="hidden" id="variants" name="variants" value="<?php echo $offer_product->variants;?>">
                <input type="hidden" id="price" name="price" value="<?php echo $offer_product->offer_price;?>">
                <input type="hidden" id="mrp" name="mrp" value="<?php echo $offer_product->mrp;?>">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" id="addon" name="addon" value="">
                <input type="hidden" id="variants_count" name="variants_count" value="1">
                
              
 		  
<button class="btn btn-warning add-cart-sub btn-addtocart" type="submit" style="font-size: 18px;
    padding: .375rem .50rem !important;width: 100%;" <?php echo $btn_disabled;?>>Add To Cart</button>

			
			</form>
			<a class="btn btn-danger ms-3" href="<?php echo site_url('home')?>"  style="font-size: 18px;
    margin-top: 5%;
    padding: .375rem .70rem !important;
    margin-left: 0px !important;
    width: 100%;">Continue Shopping</a>
          </div>
        </div>
        <!-- Product Specification-->


      </div>
    </div>
   