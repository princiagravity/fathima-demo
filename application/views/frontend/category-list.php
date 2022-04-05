
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
            foreach($category_list as $cat)
            {?>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body" style="padding:0px"> <a class="product-thumbnail d-block" href="<?php echo site_url('category/'.$cat->id) ?>"><img class="mb-2" src="<?php echo base_url().'uploads/category-images/'.$cat->image_url;?>" alt=""></a>
				<a class="product-title d-block" style="text-align:center" href="<?php echo site_url('category'.$cat->id) ?>"><?php echo $cat->name;?></a>
           
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  