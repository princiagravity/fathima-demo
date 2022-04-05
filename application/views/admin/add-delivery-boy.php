
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
         <?php 
       $id=$name=$mobile=$user_id=$lbl_name=$lbl_mobile="";
       
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Name";
         $mobile=$update['data'][0]->mobile;
         $lbl_mobile="Mob No.";
         $user_id=$update['data'][0]->user_id;
        

         $title='Update Delivery Boys';
         $action='update_delivery_boy';
         $button='Update';
        
       }
       else
       {
         $title='Add Delivery Boys';
         $action='add_delivery_boy';
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
         
                           <form id="add_delivery_boy" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 
                                
                                 <div class="col">
                                 <label><?php echo $lbl_name;?></label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $name;?>" required>
                                 </div>
                                 <div class="col">
                                 <label><?php echo $lbl_mobile;?></label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile no" name="mobile" value="<?php echo $mobile;?>" required>
                                 </div>
								
								 
								
								
								 
                              </div>
							
							  
							  	  <div class="form-row" style="padding-top:50px;">
                                 
                             
							
								  <div class="col">
                                  <input type="hidden" name="status" value="Active">
                                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
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
                           <h4 class="card-title">Delivery Boys</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
								         <th scope="col">Name</th>
                                         <th scope="col">Mobile</th>
                                       <!--  <th scope="col">Status</th>
								         <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($del_boyslist as $boys)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $boys->id;?>"></td>
                                 <td><?php echo $boys->name;?></td>
                                 <td><?php echo $boys->mobile;?></td>
                               <!-- <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><?php //echo $boys->status; ?></button></span>
                                 </td> -->
								         <td>
                                 
                                 <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/deliveryboy/'.$boys->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-delivery-boy/'.$boys->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="deliveryboy">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $boys->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>
                                 </td> 
                              
                               </tr>
                               <?php
                               $i++; 
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
  