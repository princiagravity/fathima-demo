
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
         <?php 
       $id=$name=$lbl_name="";
       
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Name";
         
         $title='Update Variants';
         $action='update_variants';
         $button='Update';
       
       }
       else
       {
         $title='Add Variants';
         $action='add_variants';
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
                          
                           <form  id="add_variants" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                  <div class="col">
                                  <label><?php echo $lbl_name;?></label>
                                    <input type="text" class="form-control" placeholder="Add Variants" name="name" value="<?php echo $name;?>" required>
                                 </div>
                                
								
								 
								
								
								 
                              </div>
							
							  
							  	  <div class="form-row" style="padding-top:50px;">
                                 
                             
							
								  <div class="col">
                          <input type="hidden" name="status" value="Active">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                           <h4 class="card-title">Variants</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Variants</th>
								
                                 
                                <!--  <th scope="col">Status</th>
								
								   <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($variantlist as $variant)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $variant->id;?>"></td>
                                 <td><?php echo $variant->name;?></td>
                               
                              <!--  <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><?php //echo $variant->status;?></button></span>
                                 </td>-->
								 <td>
                         <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/variants/'.$variant->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-variants/'.$variant->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="variants">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $variant->id;?>"><button type="button"
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
  