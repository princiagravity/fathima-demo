
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
         <?php 
       $id=$promo_code=$promo_category=$value=$no_of_usage=$min_order=$max_discount=$lbl_promo_category=$lbl_promo_code=$lbl_value=$lbl_no_of_usage=$lbl_min_order=$lbl_max_discount=$lbl_products=$products= $lbl_offer_id= $offer_id="";
       
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $promo_code=$update['data'][0]->promo_code;
         $lbl_promo_code="Promocode";
         $promo_category=$update['data'][0]->promo_category;
         $lbl_promo_category="Category";
         $value=$update['data'][0]->value;
         $lbl_value="Value";
         $no_of_usage=$update['data'][0]->no_of_usage;
         $lbl_no_of_usage="Number of usage";
         $min_order=$update['data'][0]->min_order;
         $lbl_min_order="Minimum Order";
         $max_discount=$update['data'][0]->max_discount;
         $lbl_max_discount="Maximum Discount";
         $lbl_products="Choose Products";
         $products=json_decode($update['data'][0]->products);
         $lbl_offer_id="Choose Offer";
         $offer_id=$update['data'][0]->offer_id;
       
       
         $title='Update Promocodes';
         $action='update_promocode';
         $button='Update';
       }
       else
       {
         $title='Add Promocodes';
         $action='add_promocode';
         $button='Submit';
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
                           
                           <form id="add_promocode" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col">
                                 <label><?php echo $lbl_promo_code;?></label>
                                    <input type="text" class="form-control" placeholder="Promocode" name="promo_code" value="<?php echo $promo_code;?>" required>
                                 </div>
                                 <div class="col">
                                 <label><?php echo $lbl_promo_category;?></label>
                                 <select class="form-control promo_category" id="exampleFormControlSelect1" name="promo_category" required>
                                 <?php if($promo_category =="")
                                    {?>
                                    <option selected="" value="" disabled="">Select Category</option>
                                    <?php
                                    }
                                    else if($promo_category=='perc')
                                    {
                                       ?>
                                       <option selected="" value="<?php echo $promo_category?>">Percentage</option> 
                                       <?php
                                    }
                                    else if($promo_category=='tcv')
                                    {
                                       ?>
                                       <option selected="" value="<?php echo $promo_category?>">Total Cart Value</option> 
                                    <?php
                                    }
                                    else if($promo_category=='items')
                                    {
                                       ?>
                                       <option selected="" value="<?php echo $promo_category?>">Items</option> 
                                    <?php
                                    }


                                    ?>
                                     <option value="perc">Percentage</option>
                                     <option value="tcv">Total Cart Value</option>
                                     <option value="items">Items</option>
                                 </select>
                                 </div>


                    
  
                               


                                
                                 <div class="col">
                                 <label><?php echo $lbl_value;?></label>
                                    <input type="text" class="form-control" placeholder="Value" name="value" value="<?php echo $value;?>" required>
                                 </div>
								 <div class="col">
                         <label><?php echo $lbl_no_of_usage;?></label>
                                    <input type="text" class="form-control" placeholder="Number of usage" name="no_of_usage" value="<?php echo $no_of_usage;?>" required>
                                 </div>
		
                              </div>
							  <div class="form-row" style="padding-top:50px;">                 
								 
								 <div class="col">
                         <label><?php echo $lbl_min_order;?></label>
                                    <input type="text" class="form-control" placeholder="Minimum Order" name="min_order" value="<?php echo $min_order;?>" required>
                                 </div>
								 <div class="col">
                         <label><?php echo $lbl_max_discount;?></label>
                                    <input type="text" class="form-control" placeholder="Maximum Discount" name="max_discount" value="<?php echo $max_discount;?>" required>
                                 </div>
                                 <div class="col">
                                 <label><?php echo $lbl_products;?></label>
                                 <select name="products[]" id="products" class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Products" >
                                    
                                 <?php 
                                 
                                 foreach($productlist as $product){ 
                                    
                                    if(in_array($product->id,$products))
                                    {
                                       ?>
                                       <option value="<?php echo $product->id; ?>" selected><?php  echo $product->name; ?></option>
                                       <?php
                                    }?> 
                                 <option value="<?php echo $product->id; ?>"><?php  echo $product->name; ?></option> 
                                 <?php } ?> 
                                 </select>
                                 </div>
                              </div>
							  
                              <div class="form-row" style="padding-top:50px;">
								
                                 <div class="col">
                                 <label><?php echo $lbl_offer_id;?></label>
                                 <select name="offer_id" id="" class="m-b-10 form-control" style="width: 250px" data-placeholder="Offers" required>
                                    <option selected value="">Choose Offer</option>
                                 <?php 
                                 
                                 foreach($offerlist as $offer){ 
                                    
                                    if($offer->id==$offer_id)
                                    {
                                       ?>
                                       <option value="<?php echo $offer->id; ?>" selected><?php  echo $offer->name; ?></option>
                                       <?php
                                    }else{?> 
                                 <option value="<?php echo $offer->id; ?>"><?php  echo $offer->name; ?></option> 
                                 <?php }} ?> 
                                 </select>
                                 </div>
                                 </div>
								
								 
							  
							  	  <div class="form-row" style="padding-top:50px;">
								  <div class="col">
                          <input type="hidden" name="status" value="Visible">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                                      <button type="submit" class="btn btn-primary"><?php echo $button;?></button>
                              <button type="submit" class="btn iq-bg-danger">cancel</button>
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
                           <h4 class="card-title">PromoCode</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Promocode</th>
								 <th scope="col">No of Usage</th>
                                 
                                <!--  <th scope="col">Status</th>
								
								   <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($promocodelist as $promo)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $promo->id;?>"></td>
                                 <td><?php echo $promo->promo_code;?></td>
                                 <td><?php echo $promo->no_of_usage;?></td>
                              <!--  <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><?php //echo $promo->status;?></button></span>
                                 </td> -->
								 <td>
                         <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/promocode/'.$promo->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-promocodes/'.$promo->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="promocode">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $promo->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>
                                       <span class="table-remove">
                                       <input type="hidden" name="promo_id" class="promo_id" value="<?php echo $promo->id;?>"> <input type="hidden" name="promo_status" class="promo_status" value="<?php echo $promo->status;?>"><button type="button"
                                       class="btn iq-bg-primary btn-rounded btn-sm my-0 promo_hideshow"><a><?php if($promo->status=='Hidden'){ echo "Show";} else if($promo->status=='Visible'){echo "Hide";}?></a></button></span>
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
  