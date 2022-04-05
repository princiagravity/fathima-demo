
    <div class="page-content-wrapper">
      <!-- Catagory Single Image-->
    
      <div class="pt-3">
        <div class="container">
       <!--   <div class="catagory-single-img" style="background-image: url('<?php echo base_url();?>img/bg-img/5.jpg')"></div>-->
        </div>
      </div>
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6><?php echo $page_head;?></h6>
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card-->
            <?php 
              $btn_disabled='';
            foreach($product_list as $prod)
            {?>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body" style="min-height:80px"> <?php if($prod->variants_count !=1)
                  {
                    ?>
                    <span class="badge badge-success">Customizable</span>
                    <?php
                  }if($prod->stock == 0 || $prod->status=='Out Of Stock' )
                  {
                    $btn_disabled='disabled';
                   ?>
                   <span class="badge badge-danger mt-4">Out Of Stock</span>
                  
                   <?php
                  }
                  if(isset($prod->discount))

                  {

                    ?>

                      <span class="badge badge-primary mt-5" style="bottom: 9rem !important;"><?php echo "&nbsp".$prod->discount."% Off";?></span>

                    <?php

                  }
                  
                  ?>
         
                  <!--<a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>-->
                  <a class="product-thumbnail d-block" href="<?php echo site_url('single-product/'.$prod->id);?>">
            	<?php if($prod->image_url){ ?>
                      <img class="mb-2" src="<?php echo base_url().'uploads/product-images/'.$prod->image_url;?>" alt="">
                     	<?php  } else { ?>
						
					 <img class="mb-2" src="<?php echo base_url();?>images/dummy.png" alt="" style="border-top-left-radius: 7px;border-top-right-radius: 7px;">
						 
						<?php  } ?>
                      
                      
                      </a>
                     
                  
                      
                      <a class="product-title d-block" style="min-height:42px" href="<?php echo site_url('single-product/'.$prod->id);?>">
                          <?php echo $prod->name;?></a>
                  <p class="sale-price">
                  <?php if($prod->price==$prod->mrp)
                  {
                    echo 'AED '.$prod->price;
                  }
                  else
                  {
                  ?> AED<?php echo $prod->price; ?><span style="font-size:12px">AED <?php echo $prod->mrp; ?></span>
                  <?php }?></p>
                  
                  <!--<div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i>-->
                  <!--<i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
                  <?php if($prod->variants_count==1)
                  {
                    ?>
               <form class="add_to_cart" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="cart-form" style="margin-top: 5%;
    position: absolute;
    right: 5%;">
                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod->id; ?>">
                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $prod->name; ?>">
                <input type="hidden" id="prod_category" name="prod_category" value="<?php echo $prod->category; ?>">
                <input type="hidden" id="variants" name="variants" value="<?php echo $prod->variants;?>">
                <input type="hidden" id="price" name="price" value="<?php echo $prod->price;?>">
                <input type="hidden" id="mrp" name="mrp" value="<?php echo $prod->mrp;?>">
                <input type="hidden" id="max_sale" name="max_sale" value="<?php echo $prod->max_sale;?>">
                <input type="hidden" id="addon" name="addon" value="">
                <input type="hidden" id="variants_count" name="variants_count" value="<?php echo $prod->variants_count;?>">
             <input type="hidden" id="quantity" name="quantity" value="1">
              <button type="submit" class="btn btn-success btn-sm"  <?php echo $btn_disabled?>><i class="lni lni-plus"></i></button>
            </form>
                    
                    <?php
                  }
                  else
                  {?>
                  <a class="btn btn-success btn-sm" href="<?php echo site_url('single-product/'.$prod->id);?>"><i class="lni lni-plus"></i></a>
                  <?php }?>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  