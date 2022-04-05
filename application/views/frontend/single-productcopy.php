
    <div class="page-content-wrapper">
      <!-- Product Slides-->
      <?php //print_r($addons);?>
      <div class="product-slides ">
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('<?php echo $prod_detail->image_url?>')"></div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container d-flex justify-content-between">
            <div class="p-title-price">
              <h6 class="mb-1"><?php echo $prod_detail->name?></h6>
              <div class="price_detail">
              <p class="sale-price mb-0"><i class="lni lni-rupee"></i><?php echo $prod_detail->price?><span><i class="lni lni-rupee"></i><?php echo $prod_detail->mrp?></span></p>
              </div>
            </div>
            <div class="p-wishlist-share"><a href="wishlist-grid.html"><i class="lni lni-heart"></i></a></div>
          </div>
          <!-- Ratings-->
          <div class="product-ratings">
            <div class="container d-flex align-items-center justify-content-between">
              <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1">3 ratings</span></div>
              <div class="total-result-of-ratings"><span>5.0</span><span>Very Good                                </span></div>
            </div>
          </div>
        </div>
       
   
        <!-- Selection Panel-->
        <div class="selection-panel bg-white mb-3 py-3">
          <div class="container d-flex align-items-center justify-content-between">
            <!-- Choose Color-->
            <div class="choose-color-wrapper">
              <p class="mb-1 font-weight-bold">Variants</p>
              <div class="choose-color-radio d-flex align-items-center p-1">
               
                  <!-- Single Radio Input-->
                  <?php foreach($variants as $var)
                  {?>
                  <div class="form-check mb-0 pr-1 pl-1">
                    <input class="form-check-input yellow get_price" id="colorRadio1" type="radio" value="<?php echo $var[0]?>" name="variant">
                    <label class="form-check-label " for="colorRadio1"><?php echo $var[1]?></label>
                  </div>
                  <?php } ?>
              </div>
            </div>
          </div>
          
        </div>
        <div class="selection-panel bg-white mb-3 py-3">
          <div class="container d-flex align-items-center justify-content-between">
            <!-- Choose Color-->
            <div class="choose-color-wrapper">
              <p class="mb-1 font-weight-bold">Add Ons</p>
              <div class="choose-color-radio d-flex align-items-center p-1">
              <?php foreach($addons as $index=>$value)
                  {?>
                  <!-- Single Radio Input-->
                  <div class="form-check mb-0 pr-1 pl-1">
                    <input class="form-check-input yellow addonval" id="colorRadio1" type="radio" value="<?php echo $index; ?>" name="addon">
                    <label class="form-check-label " for="colorRadio1"><?php echo $value; ?></label>
                  </div>
                  <?php }?>
       
              </div>
            </div>
            
         
           
          </div>
          
        </div>
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
          <div class="container">
          <form id="add_to_cart" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="cart-form">
                <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod_detail->id; ?>">
                <input type="hidden" id="prod_name" name="prod_name" value="<?php echo $prod_detail->name; ?>">
                <input type="hidden" id="prod_category" name="prod_category" value="<?php echo $prod_detail->category; ?>">
                <input type="hidden" id="variants" name="variants" value="">
                <input type="hidden" id="price" name="price" value="">
                <input type="hidden" id="mrp" name="mrp" value="">
                <input type="hidden" id="max_sale" name="max_sale" value="">
                <input type="hidden" id="addon" name="addon" value="">
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler">-</div>
                <input class="form-control cart-quantity-input" type="text" step="1" name="quantity" value="1">
                <div class="quantity-button-handler">+</div>
              </div>
              <button class="btn btn-danger ms-3" type="submit">Add To Cart</button>
            </form>
          </div>
        </div>
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
          <div class="container">
            <h6>Specifications</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, eum? Id, culpa? At officia quisquam laudantium nisi mollitia nesciunt, qui porro asperiores cum voluptates placeat similique recusandae in facere quos vitae?</p>
            <ul class="mb-3 ps-3">
              <li><i class="lni lni-checkmark-circle"> </i> 100% Good Reviews</li>
              <li><i class="lni lni-checkmark-circle"> </i> 7 Days Returns</li>
              <li> <i class="lni lni-checkmark-circle"> </i> Warranty not Aplicable</li>
              <li> <i class="lni lni-checkmark-circle"> </i> 100% Brand New Product</li>
            </ul>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, eum? Id, culpa? At officia quisquam laudantium nisi mollitia nesciunt, qui porro asperiores cum voluptates placeat similique recusandae in facere quos vitae?</p>
          </div>
        </div>
        <!-- Rating & Review Wrapper-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
          <div class="container">
            <h6>Ratings &amp; Reviews</h6>
            <div class="rating-review-content">
              <ul class="ps-0">
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail"><img src="img/bg-img/7.jpg" alt=""></div>
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">Very good product. It's just amazing!</p><span class="name-date">Designing World 12 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail"><img src="img/bg-img/8.jpg" alt=""></div>
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">Very excellent product. Love it.</p><span class="name-date">Designing World 8 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail"><img src="img/bg-img/9.jpg" alt=""></div>
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">What a nice product it is. I am looking it's.</p><span class="name-date">Designing World 28 Nov 2021</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Ratings Submit Form-->
        <div class="ratings-submit-form bg-white py-3">
          <div class="container">
            <h6>Submit A Review</h6>
            <form action="#" method="">
              <div class="stars mb-3">
                <input class="star-1" type="radio" name="star" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="star" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="star" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="star" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="star" id="star5">
                <label class="star-5" for="star5"></label><span></span>
              </div>
              <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10" data-max-length="200" placeholder="Write your review..."></textarea>
              <button class="btn btn-sm btn-primary" type="submit">Save Review</button>
            </form>
          </div>
        </div>
      </div>
    </div>
   