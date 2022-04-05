
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
     
         <div class="container-fluid">
         <?php 
       $id=$name=$link=$lbl_link=$image_url=$lbl_image_url=$lbl_name=$image="";
       $required='required';
       if($update)
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Name";
         $link=$update['data'][0]->link;
         $lbl_link="Link";
         $image_url=$update['data'][0]->image_url;
         $lbl_image_url="Change Image";
         $title='Update Slider';
         $action='update_slider';
         $button='Update';
         $image="<img src='".base_url().'uploads/slider-images/'.$image_url."' width='500px' height='300px'>";
         $required='';
       }
       else
       {
         $title='Add Slider';
         $action='add_slider';
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
                          
                           <form id="add_slider" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col">
                                 <label><?php echo $lbl_name;?></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="slider_name" value="<?php echo $name;?>" required>
                                 </div>
                                 <div class="col">
                                 <label><?php echo $lbl_link;?></label>
                                    <input type="text" class="form-control" placeholder="Link" name="link" id="slider_link" value="<?php echo $link;?>" required>
                                 </div>
								  <div class="col">
								      <label>Width:700px,Height:500px</label>
                         
                                     <input type="file" class="custom-file-input" id="customFile" name="image_url" <?php echo $required?>>
                                    <label class="custom-file-label" for="customFile" style="margin-top:12%"><?php echo $lbl_image_url;?></label>
                                     <?php echo $image;?>
                                 </div>
								 <div class="col">
                         <input type="hidden" name="status" value="Active">
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="old_image" value="<?php echo $image_url;?>">
                                      <button type="submit" class="btn btn-primary"  style="margin-top:12%"><?php echo $button;?></button>
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
                           <h4 class="card-title">Sliders</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
								         <th scope="col">Link</th>
                                 <!-- <th scope="col">Hide</th>
								         <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                                 <?php 
                                 $i=1;
                                 foreach($sliderlist as $slider)
                                 {
                                ?>
                                 <tr>
                                 <td><?php echo $i;?></td>
                                 <td><?php echo $slider->name?>
                                 <input type="hidden" name="id" id="id" value="<?php echo $slider->id;?>"></td>
                                 <td><?php echo $slider->link?></td>
                               
								         <td>
                                 <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('single/slider/'.$slider->id))?>">View</a></button></span>
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('update-slider/'.$slider->id))?>">Update</a></button></span>
                                     
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="slider">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $slider->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>
                                      
                                 </td> 
                                <!--  <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0">Hide</button></span>
                                 </td> -->
                                 </tr>

                                 <?php
                                 $i++;
                                 }
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
  