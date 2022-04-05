
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
		 <?php 
       $id=$name=$category=$description=$mrp=$price=$max_sale=$image_url=$label=$lbl_category=$lbl_description=$lbl_id=$lbl_image_url=$lbl_max_sale=$lbl_mrp=$lbl_name=$lbl_price=$image="";
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
         $price=$update['data'][0]->price;
         $lbl_price="Price";
         $max_sale=$update['data'][0]->max_sale;
         $lbl_max_sale="Maximum Sale";
         $image_url=$update['data'][0]->image_url;
         $lbl_image_url="Change Image";
         $title='Update Addon';
         $action='update_addon';
         $button='Update';
         $image="<img src='".base_url().'uploads/addon-images/'.$image_url."' width='390px' height='330px'>";
         $required='';
       }
       else
       {
         $title='Add Addons';
         $action='add_addon';
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
                           
                           <form id="add_addon" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col">
                                   <label><?php echo $lbl_name;?></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name;?>" required>
                                 </div>
                               
                                
								 <div class="col">
                         <label><?php echo $lbl_description;?></label>
                                    <input type="text" class="form-control" placeholder="Description" name="description"  value="<?php echo $description;?>" >
                                 </div>
								 
								
								
								 
                              </div>
							  <div class="form-row" style="padding-top:50px;">
                                 
                             
								 
								 <div class="col">
                         <label><?php echo $lbl_mrp;?></label>
                                    <input type="text" class="form-control" placeholder="MRP" name="mrp" value="<?php echo $mrp;?>" required>
                                 </div>
								 <div class="col">
                         <label><?php echo $lbl_price;?></label>
                                    <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $price;?>" required>
                                 </div>
								  <div class="col">
                          <label><?php echo $lbl_max_sale;?></label>
                                    <input type="text" class="form-control" placeholder="Maximum Sale" name="max_sale" value="<?php echo $max_sale;?>" required>
                                 </div>
								  <div class="col">
								      <label>Width:390px,height:330px</label>
                      
                                     <input type="file" class="custom-file-input" id="customFile" name="image_url" <?php echo $required?>>
                                    <label class="custom-file-label" for="customFile" style="margin-top:12%"><?php echo $lbl_image_url; ?></label>
                                   <?php echo $image;?>
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
                           <h4 class="card-title">Add on</h4>
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
                                 
                               <!--   <th scope="col">Status</th>
								
								   <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($addonlist as $addon)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $addon->id;?>"></td>
                                 <td><?php echo $addon->name;?></td>
                                 <td><?php echo $addon->description;?></td>
                              <!--  <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><?php //echo $addon->status;?> Out of Stock </button></span>
                                 </td> -->
								 <td>
                         <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/addon/'.$addon->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-addon/'.$addon->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="addon">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $addon->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0" delete_item>Delete</button></span>
                                 </td> 
                               </tr>
                              <?php $i++; } ?>
                                                         
                             </tbody>
                           </table>
                         </div>
                     </div>
                  </div>
               </div>
               
            </div>
            
         </div>
      </div>
  