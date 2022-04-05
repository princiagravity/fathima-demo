
    <div class="page-content-wrapper">
      <!-- Catagory Single Image-->
    
      <!--<div class="pt-3">
        <div class="container">
          <div class="catagory-single-img" style="background-image: url('<?php echo base_url();?>img/bg-img/5.jpg')"></div>
        </div>
      </div>-->
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6><?php echo $page_head;?></h6>
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card-->
            <?php  
            foreach($offer_product_list as $detail)
            {?>
            <div class="col-6 col-md-4 col-lg-3">
                
               
              <div class="card top-product-card">
                <div class="card-body"> <a class="product-thumbnail d-block" href="<?php echo site_url('offer-product/'.$detail->id) ?>">
                    <?php if($detail->image_url){ ?>
                     <img class="mb-2" src="<?php echo base_url().'uploads/offer-product-images/'.$detail->image_url;?>" alt="">
                   	<?php  } else { ?>
                     <img class="mb-2" src="<?php echo base_url();?>images/dummy.png" alt="">
                	<?php  } ?>
                    
                    </a>
				<a class="product-title d-block" href="<?php echo site_url('offer-product/'.$detail->id) ?>"><?php echo $detail->name;?></a>
				
				<p class="sale-price">
                  <?php if($detail->offer_price==$detail->mrp)
                  {
                    echo 'AED '.$detail->offer_price;
                  }
                  else
                  {
                  ?> AED<?php echo $detail->offer_price; ?><span style="font-size:12px">AED <?php echo $detail->mrp; ?></span>
                  <?php }?></p>
            <a class="btn btn-success btn-sm" href="<?php echo site_url('offer-product/'.$detail->id);?>"><i class="lni lni-plus"></i></a>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  