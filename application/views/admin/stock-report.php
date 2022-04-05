<div id="content-page" class="content-page">
    
         <div class="container-fluid">
        <div class="row">
               <div class="col-md-12">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title pt-3">
                           <h4 class="card-title">All Product Report</h4>
                           <div class="input-group">
  <div class="form-outline">
    <input id="search-input" type="search" placeholder="Search Product..." class="form-control search_product" />
  </div>
</div>
                        </div>
                       
                        <div class="iq-header-title">
                           <h4 class="card-title"> <input type="button" class="btn btn-success exportoexcel"  id="busrepbtn"  value="Export to Excel"></h4>
                        </div>
                       
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                       
                           <table class="table mb-0 table-borderless tbltoexcel" id="product_report">
                             <thead>
                               <tr>
                                 <th scope="col">SL.No</th>
                                 <th scope="col">Name</th>
                                        <th scope="col">Category</th>
								         
                                         <th scope="col">Variants</th>
                                         <th scope="col">MRP</th>
                                       <th scope="col">SRP</th>
								         <th scope="col">Available Stock</th>
                               </tr> 
                             </thead>
                             <tbody id="stockrepostbdy">
                             <?php 
                                 $i=1;
                                 foreach($productlist as $details)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $details->id;?>"></td>
                                 <td><?php echo $details->product_name;?></td>
                                 <td><?php echo $details->category;?></td>
                                 <td><?php echo $details->variant_name;?></td>
                                 <td><?php echo $details->mrp;?></td>
                                 <td><?php echo $details->price;?></td>
                                 <td><?php echo $details->max_sale;?></td>
                               
                               </tr>
                               <?php
                               $i++; 
                                 }?>
							   
                             </tbody>
                           </table>
                           <input type="hidden" id="exlfilename" value="Stock-Report">
                         </div>
                     </div>
                  </div>
               </div>
               
            </div>
        
         </div>
      </div>
  