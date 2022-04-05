
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
         <?php 
       $id=$area=$charge=$lbl_area=$lbl_charge=$lbl_min_order=$min_order=$lbl_extra_charge= $extra_charge="";
       
       if($update)
       { /* print_r($update); exit; */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $area=$update['data'][0]->area;
         $lbl_area="Area";
         $charge=$update['data'][0]->charge;
         $lbl_charge="Delivery Charge";
         $min_order=$update['data'][0]->min_order;
         $lbl_min_order="Minimum Order";
         $lbl_extra_charge="Delivery Extra Charges";
         $extra_charge=$update['data'][0]->extra_charge;
       
         $title='Update Delivery Charges';
         $action='update_delivery_charge';
         $button='Update';
       }
       else
       {
         $title='Add Delivery Charges';
         $action='add_delivery_charge';
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
                          
                           <form id="add_delivery_charge" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 
                                 <div class="col">
                                 <label><?php echo $lbl_area;?></label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="area" required>
                                 <?php if($category =="")
                                    {?>
                                    <option selected="" value="" disabled="">Select Area</option>
                                    <?php
                                    }

                                    ?>
                                 
                                    <?php foreach($arealist as $index=>$value)
                                    {
                                       if($area == $index)
                                       {
                                          ?>
                                           <option value="<?php echo $index ?>" selected><?php echo $value;?></option>
                                          <?php
                                       }
                                       else
                                       {
                                       ?>
                                       <option value="<?php echo $index ?>"><?php echo $value;?></option>
                                       <?php
                                    }}?>  
                                 </select>
                                 </div>
								 <div class="col">
                         <label><?php echo $lbl_charge;?></label>
                                    <input type="text" class="form-control" placeholder="Delivery Charges" name="charge" value="<?php echo $charge;?>" required>
                                 </div>
                                 <div class="col">
                         <label><?php echo $lbl_min_order;?></label>
                                    <input type="text" class="form-control" placeholder="Minimum Order Value" name="min_order" value="<?php echo $min_order;?>" required>
                                 </div>
                                 <div class="col">
                         <label><?php echo $lbl_extra_charge;?></label>
                                    <input type="text" class="form-control" placeholder="Delivery Extra charges" name="extra_charge" value="<?php echo $extra_charge;?>" required>
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
                           <h4 class="card-title">Delivery Charges</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Area</th>
								         <th scope="col">Amount</th>
                                 
                                <!--  <th scope="col">Status</th>
								
								         <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($chargelist as $charge)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $charge->id;?>"></td>
                                 <td><?php echo $charge->area;?></td>
                                 <td><?php echo $charge->charge;?>
                                 &nbsp;&nbsp;&nbsp;<?php if($charge->status=='new'){?><span class="badge badge-danger">New</span><?php }?></td>
                              <!--  <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><?php //echo $charge->status; ?></button></span>
                                 </td> -->
								         <td>
                                 <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/deliverycharge/'.$charge->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-delivery-charges/'.$charge->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="deliverycharge">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $charge->id;?>"><button type="button"
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
  