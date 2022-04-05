
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
         <?php 
       $id=$name=$customer=$reward_point=$lbl_reward_point=$lbl_name=$image="";
       
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Name";
         $image_url=$update['data'][0]->reward_point;
         $lbl_image_url="Change Image";
         $title='Update Categories';
         $action='update_category';
         $button='Update';
        
       }
       else
       {
         $title='Add Reward';
         $action='add_reward';
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
                          
                           <form id="add_reward" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                  <div class="col">
                                  
                                  <label><?php echo $lbl_name;?></label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="customer_id" required>

                                    <?php if($customer =="")

                                    {?>

                                    <option selected="" value="" disabled="">Select Customer</option>
                                    <option  value="all" >All</option>

                                    <?php

                                    }



                                    ?>

                                        <?php foreach($customerlist as $detail)

                                    {

                                        if($customer == $detail->user_id)

                                        {

                                            ?>

                                            <option value="<?php echo $detail->user_id ?>" selected><?php echo $detail->name;?></option>

                                            <?php

                                        }

                                        else

                                        {

                                        ?>

                                        <option value="<?php echo $detail->user_id ?>"><?php echo $detail->name;?></option>

                                        <?php

                                        }

                                    }?>

                                    

                                    </select>
                                 </div>
								  <div class="col">
                                  <label><?php echo $lbl_reward_point;?></label>
                          <input type="text" class="form-control" placeholder="Reward Point" name="reward_point" value="<?php echo $reward_point;?>" required>
                                   
                                 </div>
                                  
								 
                              </div>
							
							  
							  	  <div class="form-row" style="padding-top:50px;">
                                 
                             
							
								  <div class="col">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          
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
                           <h4 class="card-title">Reward Points</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Customer</th>
                                 <th scope="col">Reward Points</th>
                                <!--  <th scope="col">Status</th>
								         <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 if($customerlist)
                                 {
                                 foreach($customerlist as $detail)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $detail->id;?>"></td>
                                 <td><?php echo $detail->name;?></td>
                                 <td><?php echo $detail->reward_point;?></td>
                           
								          <td>
                                 <!--   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/category/'.$detail->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-categories/'.$detail->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="category">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $detail->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span> -->
                                 </td> 
                                
                               </tr>
                               <?php $i++; }} else {
                                   ?>
                                   <tr>
                                   <td colspan="3">Reward Details Not Found</td>
                                   </tr>
                                   <?php }
                                   ?>
							   
						
                             </tbody>
                           </table>
                         </div>
                     </div>
                  </div>
               </div>
               
            </div>
            
         </div>
      </div>
  