
      

       <div id="content-page" class="content-page">

<div class="container-fluid">
<div class="row">
               
               <div class="col-lg-12">
                   <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><?php echo "Search Product"?></h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                          
                           <form id="search_product" method="POST" action="get_categorywise_product" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                  
                                 <div class="col">

                                 <label>Category</label>

                                 <select class="form-control product_cat" id="exampleFormControlSelect1" name="category">

                             
                                 <option selected="" value="" disabled="">Select Category</option>

                                    <?php foreach($categories as $index=>$value)

                                 {

                                  ?>

                                    <option value="<?php echo $index ?>"><?php echo $value;?></option>

                                    <?php

                                    }

                                 ?>

                                 </select>

                                 </div>
                                 <div class="col">

                              <label>Product</label>

                              <select class="form-control product_list" id="exampleFormControlSelect1" name="product_id">


                              <option selected="" value="" disabled="">Select Product</option>

                                 <?php foreach($productlist as $index=>$value)

                              {

                              ?>

                                 <option value="<?php echo $value->id ?>"><?php echo $value->name;?></option>

                                 <?php

                                 }

                              ?>

                              </select>

                              </div>
                                  
								 
                              </div>
							
							  
							  	  <div class="form-row" style="padding-top:50px;">
                                 
                             
							
								  <div class="col">
                          <input type="hidden" name="status" value="Active">
                         
                     
                                      <button type="submit" class="btn btn-primary">Search</button>
                              <!-- <button type="submit" class="btn iq-bg-danger">cancel</button> -->
                                 </div>
								
								 
                              </div>
							  
							  
							  
							   
                          
                              
                           </form>
                        </div>
                     </div></div>
            </div>
<div class="row">

<div class="col-md-12">

   <div class="iq-card iq-card-block iq-card-stretch iq-card-height">

      <div class="iq-card-header d-flex justify-content-between">

         <div class="iq-header-title">

            <h4 class="card-title">Products</h4>

         </div>

       

      </div>

      <div class="iq-card-body">

         <div class="table-responsive">

            <table class="table mb-0 table-borderless">

              <thead>

                <tr>

                  <th scope="col">#</th>

                  <th scope="col">Name</th>

                  <th scope="col">Category</th>

          <th scope="col">Add to Menu</th>

                  

                 <!--  <th scope="col">Status</th>

                 

                    <th scope="col">View</th> -->

                </tr>

              </thead>

              

              <tbody class="search_result">

              <?php 

                  $i=1;

                  foreach($productlist as $prod)

                  {

                 ?>

                <tr>

                  <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $prod->id;?>"></td>

                  <td><?php echo $prod->name;?></td>

                  <td><?php echo $prod->category;?></td>

                  <td><span>

                        <input type="hidden" name="prod_id" class="prod_id" value="<?php echo $prod->id;?>">

                        <?php if($prod->visibility=='1')

                        {

                           ?>

                        <input class="prod_visibility" type="checkbox" value="<?php echo $prod->visibility;?>" id="flexCheckDefault" checked>

                        <?php

                        }

                        else

                        {

                           ?>

                           <input class="prod_visibility" type="checkbox" value="<?php echo $prod->visibility;?>" id="flexCheckDefault">

                           <?php

                        }

                        ?>

                      </span></td>



                  <td>

          <span class="table-remove"><button type="button"

                        class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/products/'.$prod->id))?>">View</a></button></span>

                        <span class="table-remove"><button type="button"

                        class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-product/'.$prod->id))?>">Update</a></button></span>

                        <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="products">

                        <input type="hidden" name="delid" class="delid" value="<?php echo $prod->id;?>"><button type="button"

                        class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>

                        

                        <br/>
                                       <span class="table-remove"><input type="hidden" name="prodid" class="up_prodid" value="<?php echo $prod->id;?>"> <?php if($prod->status=="Out Of Stock")

                                       

                                       {?>

                                       <input class="new_stock" type="checkbox" value="In Stock" id="flexCheckDefault" data-toggle="modal">
                                       
                                          <label class="" for="flexCheckDefault">

                                           Mark As In Stock

                                          </label>

                                       <?php } else

                                       {?>

                                          <input class="prod_status_update" type="checkbox" value="Out Of Stock" id="flexCheckDefault">

                                          <label class="" for="flexCheckDefault">

                                           Mark As Out Of Stock

                                          </label>

                                       <?php }?></span>
                                       <span class="table-remove">
								 <input type="hidden" name="prod_id" class="displayprod_id" value="<?php echo $prod->id;?>">	 
								<?php if($prod->p_display=="0")
                                       
                                       {?>
                                       <input class="product_display_update" type="checkbox" value="1" id="flexCheckDefault">
                                          <label class="" for="flexCheckDefault">
                                         Show
                                          </label>
                                       <?php } else
                                       {?>
                                          <input class="product_display_update" type="checkbox" value="0" id="flexCheckDefault">
                                          <label class="" for="flexCheckDefault">
                                          Hide
                                          </label>
                                       <?php }?>
									  
								</span>


                  </td> 

                </tr>

                <?php $i++; }?>

                

              

              </tbody>

            </table>

          </div>

      </div>

   </div>

</div>



</div>
</div>
       </div>