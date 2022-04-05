
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
		 <?php 
       $id=$name=$category=$description=$mrp=$offer_price=$image_url=$label=$lbl_category=$lbl_description=$lbl_id=$lbl_image_url=$lbl_mrp=$lbl_name=$lbl_price=$image=$no_of_usage=$lbl_no_of_usage=$stock=$lbl_stock="";
      $required='required';
       
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Name";
         $description=$update['data'][0]->description;
         $lbl_description="Description";
         $mrp=$update['data'][0]->mrp;
         $lbl_mrp="MRP";
         $offer_price=$update['data'][0]->offer_price;
         $lbl_price="Price";
         $no_of_usage=$update['data'][0]->no_of_usage;
         $lbl_no_of_usage="No Of Usage";
         $lbl_stock="Stock";
         $stock=$update['data'][0]->stock;
         
         $image_url=$update['data'][0]->image_url;
         $lbl_image_url="Change Image";
         $title='Update Offer Products';
         $action='update_offer_products';
         $button='Update';
         $image="<img src='".base_url().'uploads/offer-product-images/'.$image_url."' width='150px' height='150px' style='margin-top: 25%;'>";
         $required='';
       }
       else
       {
         $title='Add Offer Products';
         $action='add_offer_products';
         $button='Submit';
         $lbl_image_url="Choose Image";
       }
       ?>
            <div class="row">
               
               <div class="col-lg-12">
                   <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><?php echo $title;?></h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           
                           <form id="add_offer_products" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col">
                                   <label><?php echo $lbl_name;?></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name;?>" required>
                                 </div>
                               
                                
								 <div class="col">
                         <label><?php echo $lbl_description;?></label>
                                    <input type="text" class="form-control" placeholder="Description" name="description"  value="<?php echo $description;?>" required>
                                 </div>
								 
								
								
								 
                              </div>
							  <div class="form-row" style="padding-top:50px;">
                                 
                             
								 
								 <div class="col">
                         <label><?php echo $lbl_mrp;?></label>
                                    <input type="text" class="form-control" placeholder="MRP" name="mrp" value="<?php echo $mrp;?>" required>
                                 </div>
								 <div class="col">
                         <label><?php echo $lbl_price;?></label>
                                    <input type="text" class="form-control" placeholder="Price" name="offer_price" value="<?php echo $offer_price;?>" required>
                                 </div>
                                 <div class="col">
                          <label><?php echo $lbl_stock;?></label>
                                    <input type="text" class="form-control" placeholder="Stock" name="stock" value="<?php echo $stock;?>" required>
                                 </div>
                                 <div class="col">
                          <label><?php echo $lbl_no_of_usage;?></label>
                                    <input type="text" class="form-control" placeholder="No Of Usage" name="no_of_usage" value="<?php echo $no_of_usage;?>" required>
                                 </div>
								  <div class="col">
								      <label>Width:390px,height:330px</label>
                       <?php echo $image;?>
                                     <input type="file" class="custom-file-input" id="customFile" name="image_url" <?php echo $required?>>
                                    <label class="custom-file-label" for="customFile" style="margin-top: 15%;"><?php echo $lbl_image_url; ?></label>
                                  
                                 </div>
                               
								 
                              </div>
							  
							  	  <div class="form-row" style="padding-top:50px;">
                                 
                             
							
								  <div class="col">
                          <input type="hidden" name="status" value="In Stock">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="old_image" value="<?php echo $image_url;?>">
                                      <button type="submit" class="btn btn-primary"><?php echo $button;?></button>
                             <!--  <button type="submit" class="btn iq-bg-danger">cancel</button> -->
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
                           <h4 class="card-title">Offer Products</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
								         <th scope="col">Description</th>
                                 <th scope="col">MRP</th>
                                 <th scope="col">Offer Price</th>
                                 <th scope="col">No Of Usage</th>
                                 <th scope="col">Stock</th>
                               <!--   <th scope="col">Status</th>
								
								   <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 if($offer_products)
                                 {
                                 foreach($offer_products as $detail)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $detail->id;?>"></td>
                                 <td><?php echo $detail->name;?></td>
                                 <td><?php echo $detail->description;?></td>
                                 <td><?php echo $detail->mrp;?></td>
                                 <td><?php echo $detail->offer_price;?></td>
                                 <td><?php echo $detail->no_of_usage;?></td>
                                 <td><?php echo $detail->stock;?></td>
                              <!--  <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><?php //echo $addon->status;?> Out of Stock </button></span>
                                 </td> -->
								 <td>
                         <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/offer-product/'.$detail->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-offer-products/'.$detail->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="offer-product">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $detail->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>
                                 </td> 
                               </tr>
                              <?php $i++; } }else{
                                 ?>
                                 <tr>
                                    <td colspan="6">Offer Products Not Available</td>
                                 </tr>
                                 <?php
                                 }?>
                                                         
                             </tbody>
                           </table>
                         </div>
                     </div>
                  </div>
               </div>
               
            </div>
            
         </div>
      </div>
  