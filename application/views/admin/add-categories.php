
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
         <?php 
       $id=$name=$image_url=$lbl_image_url=$lbl_name=$image="";
       $required="required";
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Name";
         $image_url=$update['data'][0]->image_url;
         $lbl_image_url="Change Image";
         $title='Update Categories';
         $action='update_category';
         $button='Update';
         $image="<img src='".base_url().'uploads/category-images/'.$image_url."' width='150px' height='150px'>";
         $required="";
       }
       else
       {
         $title='Add Categories';
         $action='add_category';
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
                          
                           <form id="add_category" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                  <div class="col">
                                  <label><?php echo $lbl_name;?></label>
                                    <input type="text" class="form-control" placeholder="Add Categories" name="name" value="<?php echo $name;?>" required>
                                 </div>
								  <div class="col">
								      <label>Width:125px;Height:110px</label>
                        
                                     <input type="file" class="custom-file-input" id="customFile" name="image_url" <?php echo $required?>>
                                    <label class="custom-file-label" for="customFile"  style="margin-top:7%"><?php echo $lbl_image_url; ?></label>
                                      <?php echo $image;?>
                                 </div>
                                  
								 
                              </div>
							
							  
							  	  <div class="form-row" style="padding-top:50px;">
                                 
                             
							
								  <div class="col">
                          <input type="hidden" name="status" value="Active">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="old_image" value="<?php echo $image_url;?>">
                                      <button type="submit" class="btn btn-primary"><?php echo $button;?></button>
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
                           <h4 class="card-title">Categories</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Categories</th>
                                <!--  <th scope="col">Status</th>
								         <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($categorylist as $cat)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $cat->id;?>"></td>
                                 <td><?php echo $cat->name;?></td>
                           
								          <td>
                                   <!-- <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/category/'.$cat->id))?>">View</a></button></span> -->
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-category/'.$cat->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="category">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $cat->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>
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
  