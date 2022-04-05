<div class="page-content-wrapper">

  <?php //print_r($offers); exit;?>

 <div class="container">

        <div class="pt-3">



          <!-- Hero Slides-->

          <div class="hero-slides owl-carousel">

          <?php

          foreach($slider_list as $slider)

          {
            ?>

            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('<?php  if(!$slider->image_url)
            {echo base_url().'images/dummy.png';} else {echo base_url().'uploads/slider-images/'.$slider->image_url;}?>')">

              <div class="slide-content h-100 d-flex align-items-center">

                <div class="slide-text">

                  <h4 class=" mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms" style="color:#f7f7f7;">Welcome to </h4>

                  <p class="" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms" style="color:#f7f7f7;">Fathima </p><a class="btn btn-primary btn-sm" href="<?php echo $slider->link;?>" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>

                </div>

              </div>

            </div>

            <?php } ?>

         

          </div>

        </div>

      </div>

      <!-- Product Catagories-->

     <!-- <div class="product-catagories-wrapper py-3">

        <div class="container">

          <div class="section-heading">

            <h6>Product Categories</h6>

          </div>

          <div class="product-catagory-wrap">

            <div class="row g-3">

             <?php foreach($category_list as $category)

              { ?>

              <div class="col-6">

                <div class="card catagory-card">

                  <div class="card-body"><a href="<?php echo site_url('category/'.$category->id) ?>">

				  <img src="<?php echo base_url().'uploads/category-images/'.$category->image_url;?>" fill="currentColor" class="bi bi-cup mb-2" viewBox="0 0 16 16">

<path fill-rule="evenodd" d="M1 2a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v1h.5A1.5 1.5 0 0 1 16 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-.55a2.5 2.5 0 0 1-2.45 2h-8A2.5 2.5 0 0 1 1 12.5V2zm13 10h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5H14v8zM13 2H2v10.5A1.5 1.5 0 0 0 3.5 14h8a1.5 1.5 0 0 0 1.5-1.5V2z"/>

</svg><span><?php echo $category->name;?></span></a></div>

                </div>

              </div>

              <?php } ?>

            </div>

          </div>

        </div>

      </div>-->

	  

	  <style>

	   /*.flash-sale-slide .owl-carousel .owl-item {

            min-height: 1px;

            float: left;

            -webkit-backface-visibility: hidden;

            -webkit-touch-callout: none;

            width:130px !important;

            margin-right:1px !important;

        }*/

	  </style>

	  

	   <!-- Flash Sale Slide-->

      <div class="flash-sale-wrapper" style="margin-top:5%">

       <!-- <div class="container">-->

		 <div>

          <div class="section-heading d-flex align-items-center justify-content-between">

            <h6 class="me-1 d-flex align-items-center" style="padding-left:12px">

              Categories

            </h6><a class="btn btn-danger btn-sm" style="margin-right:5px;"href="<?php echo site_url('categories')?>">View All</a>

          

          </div>

          <!-- Flash Sale Slide-->

          <div class="flash-sale-slide owl-carousel" style="width:400px !important;">

            <!-- Single Flash Sale Card-->

			   <?php foreach($category_list as $category)

              { ?>

            <div class="card flash-sale-card" style="width:125px !important">

              <div class="card-body" style="padding:0px !important;"><a href="<?php echo site_url('category/'.$category->id) ?>">

			  <div style="border-top-left-radius: 9px;border-top-right-radius: 9px;height:110px;overflow: hidden;background-color:#fff4b9d6; padding:0px;">

			  <img src="<?php echo base_url().'uploads/category-images/'.$category->image_url;?>" alt="" style="width:100%;">

			  

              </div>

			  <span class="product-title" style="text-align:center; padding-top:10px; padding-bottom:10px"><?php echo $category->name;?></span>

			  </a></div>

            </div>

			  <?php } ?>

          

          </div>

        </div>

        <div class="container">

          <!--.text-center.mt-3-->

          <!--a.btn.btn-warning.btn-sm(href="flash-sale.html") View All-->

        </div>

      </div>

        <!-- Flash Sale Slide-->

        <div class="flash-sale-wrapper" style="margin-top:5%">

<!-- <div class="container">-->

<div>

   <div class="section-heading d-flex align-items-center justify-content-between">

     <h6 class="me-1 d-flex align-items-center" style="padding-left:12px">

       Offers

     </h6><a class="btn btn-danger btn-sm" style="margin-right:5px;"href="<?php echo site_url('offer-products')?>">View All</a>

   

   </div>

   <!-- Flash Sale Slide-->

   <div class="flash-sale-slide owl-carousel" style="width:400px !important;">

     <!-- Single Flash Sale Card-->

  <?php foreach($offer_products as $detail)

       { ?>

     <div class="card flash-sale-card" style="width:125px !important">
          

       <div class="card-body" style="padding:0px !important;"><a href="<?php echo site_url('offer-product/'.$detail->id) ?>">

 <div style="border-top-left-radius: 9px;border-top-right-radius: 9px;height:110px;overflow: hidden;background-color:#fff4b9d6; padding:0px;">
 <?php if($detail->image_url){ ?>
 <img src="<?php echo base_url().'uploads/offer-product-images/'.$detail->image_url;?>" alt="" style="width:100%;">
 <?php  } else { ?>
 <img class="mb-2" src="<?php echo base_url();?>images/dummy.png" alt="">
 <?php  } ?>
                    

 

       </div>
<div style="padding:0px 5px">
 <span class="product-title" style="text-align:center; padding-top:10px; padding-bottom:10px; float:left">
 <?php //echo $detail->name;?>
 <?php //if($product->price==$product->mrp && $product->price > $product->mrp)
 if($detail->offer_price==$detail->mrp)

    {

        echo 'AED '.$detail->offer_price;

    }

        else

    {

    ?> AED <?php echo $detail->offer_price; ?><span style="text-decoration:line-through; color:#787878; margin-left:10px;"> <?php echo $detail->mrp; ?></span>

    <?php }?>
</span>
<button type="submit" class="btn btn-success btn-sm" style="margin-top: 5%;float: right;padding: 2px 7px;"><i class="lni lni-plus"></i></button>
</div>
</a>
</div>

     </div>

 <?php } ?>

   

   </div>

 </div>

 <div class="container">

   <!--.text-center.mt-3-->

   <!--a.btn.btn-warning.btn-sm(href="flash-sale.html") View All-->

 </div>

</div>

  

      <!-- Our Menu-->

      <div class="top-products-area clearfix py-3">

        <div class="container">

          <div class="section-heading d-flex align-items-center justify-content-between">

            <h6>Recommended</h6>

          </div>

          <div class="row g-3">

            <!-- Single Top Product Card-->

            <?php 

          

            foreach($product_list as $product)

            {

              $btn_disabled='';

           ?>

            <div class="col-6 col-md-4 col-lg-3">

              <div class="card top-product-card">

                <div class="card-body" style="padding:0px">

              
                  

                       <!-- <a class="product-thumbnail d-block" href="<?php echo site_url('single-product/'.$product->id);?>">

                       <img class="mb-2" src="<?php echo $product->image_url;?>" alt="" style="border-top-left-radius: 7px;border-top-right-radius: 7px;"></a>-->

                       

                        <a class="product-thumbnail d-block" href="<?php echo site_url('single-product/'.$product->id);?>">

						

						<?php if($product->image_url){ ?>

						

                       <img class="mb-2" src="<?php echo base_url().'uploads/product-images/'.$product->image_url;?>" alt="" style="border-top-left-radius: 7px;border-top-right-radius: 7px;">

					   

						<?php  } else { ?>

						

					 <img class="mb-2" src="<?php echo base_url();?>images/dummy.png" alt="" style="border-top-left-radius: 7px;border-top-right-radius: 7px;">

						 

						<?php  } ?>

						</a>

						

					   

					    <?php if($product->variants_count !=1)

                  {

                    ?>

                    <span class="badge badge-success">Customizable</span>

                    <?php

                  }

                  if($product->stock == 0 || $product->status=='Out Of Stock' )

                  {

                    $btn_disabled='disabled';

                   ?>

                   <span class="badge badge-danger mt-4">Out Of Stock</span>

                  

                   <?php

                  }

                  if(isset($product->discount))

                  {

                    ?>

                      <span class="badge badge-primary mt-5" style="bottom: 9rem !important;"><?php echo "&nbsp".$product->discount."% Off";?></span>

                    <?php

                  }

                  

                  ?>

				<div style="padding:0rem 1rem; min-height:86px">	   

					   

                        <a class="product-title d-block" style="min-height:42px" href="<?php echo site_url('single-product/'.$product->id);?>"><?php echo $product->name;?></a>

                  <p class="sale-price">

                  <?php //if($product->price==$product->mrp && $product->price > $product->mrp)
                    $variant_name="";
                    if($product->variant_name !='Default')
                    {
                      $variant_name='/'.$product->variant_name;
                    }
                   if($product->price==$product->mrp)

                  {

                    echo 'AED '.$product->price.$variant_name;

                  }

                  else

                  {

                  ?> AED <?php echo $product->price.$variant_name; ?><span> <?php echo $product->mrp; ?></span>

                

                  <?php }?></p>

                  <?php if($product->variants_count==1 )

                  {

                    ?>

                    <form class="add_to_cart" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="cart-form" style="margin-top: 5%;

    position: absolute;

    right: 5%;">

                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $product->id; ?>">

                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $product->name; ?>">

                <input type="hidden" id="prod_category" name="prod_category" value="<?php echo $product->category; ?>">

                <input type="hidden" id="variants" name="variants" value="<?php echo $product->variants;?>">

                <input type="hidden" id="price" name="price" value="<?php echo $product->price;?>">

                <input type="hidden" id="mrp" name="mrp" value="<?php echo $product->mrp;?>">

                <input type="hidden" id="max_sale" name="max_sale" value="<?php echo $product->max_sale;?>">

                <input type="hidden" id="addon" name="addon" value="">

                <input type="hidden" id="variants_count" name="variants_count" value="<?php echo $product->variants_count;?>">

             <input type="hidden" id="quantity" name="quantity" value="1">

              <button type="submit" class="btn btn-success btn-sm" <?php echo $btn_disabled;?>><i class="lni lni-plus"></i></button>

            </form>

                    

                    <?php

                  }

                  else

                  {?>

                 <a class="btn btn-success btn-sm" href="<?php echo site_url('single-product/'.$product->id);?>"><i class="lni lni-plus"></i></a>

                 <?php }

                 ?>

                 </div>

                </div>

              </div>

            </div>

            <?php  } ?>

        

      

          </div>

        </div>

      </div>

      

      <!-- Cool Facts Area-->

       <div class="container">

        <div class="pt-3">

      <div class="cta-area">

      <div class="hero-slides owl-carousel">

          <?php

          foreach($offers as $offer)

          {?>

            <!-- Single Hero Slide-->

            <div class="single-hero-slide" style="background:url('<?php echo base_url().'uploads/offer-images/'.$offer->image_url;?>'); background-size:cover;">

              <div class="slide-content h-100 d-flex align-items-center" style="background:linear-gradient(to left, #61000feb, #ad1f00ed);border-radius: 10px;">

                <div class="slide-text">

                    <h5 style="color: #ff9623;"><?php echo $offer->name;?></h5>

                  <h4 class=" mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms" style="color:#f7f7f7;"> </h4>

                  <p class="" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms" style="color:#f7f7f7;"><?php echo $offer->description;?> </p><a class="btn btn-primary btn-sm" href="<?php echo site_url('offers')?>" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>

                </div>

              </div>

            </div>

            <?php } ?>

         

          </div>

      </div>

      </div>

      </div>

      <br/>

      </div>

      

   



   