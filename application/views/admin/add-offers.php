
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
         <?php 
       $id= $lbl_id=$name=$lbl_name=$description=$lbl_description=$image_url=$lbl_image_url=$image="";
       $required='required';
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Promocode";
        
         $description=$update['data'][0]->description;
         $lbl_description="Value";
         $image_url=$update['data'][0]->image_url;
         $lbl_image_url="Change Image";
        
         $title='Update Offers';
         $action='update_offers';
         $button='Update';
         $image="<img src='".base_url().'uploads/offer-images/'.$image_url."' width='150px' height='150px'>";
         $required='';
       }
       else
       {
         $lbl_image_url="Choose Image";
         $title='Add Offers';
         $action='add_offers';
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
                           
                           <form id="add_offers" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col">
                                 <label><?php echo $lbl_name;?></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name;?>" required>
                                 </div>
                                 <div class="col">
                                 <label><?php echo $lbl_description;?></label>
                                    <input type="text" class="form-control" placeholder="Description" name="description" value="<?php echo $description;?>" required>
                                 </div>
                                 <div class="col">
                                     <label>Width:390px,height:330px</label>
                               
                                     <input type="file" class="custom-file-input" id="customFile" name="image_url" <?php echo $required;?>>
                                    <label class="custom-file-label" for="customFile"  style="margin-top:10%"><?php echo $lbl_image_url; ?></label>
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
                           <h4 class="card-title">Offers</h4>
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
                         <th scope="col">Image</th>
                                 
                                <!--  <th scope="col">Status</th>
								
								   <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($offerlist as $offer)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $offer->id;?>"></td>
                                 <td><?php echo $offer->name;?></td>
                                 <td><?php echo $offer->description;?></td>
                                 <td><img src="<?php echo $offer->image_url;?>" width="100px" height="50px"></td>
                              
								 <td>
                         <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/offers/'.$offer->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-offers/'.$offer->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="offers">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $offer->id;?>"><button type="button"
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
  