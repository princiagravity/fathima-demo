
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
		 <?php 
      /* print_r($orders['orderlists']); exit; */
       ?>
            <div class="row">
               
               <div class="col-lg-12">
                   <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><?php echo "title";?></h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                          
                           <form id="view_report" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col">
                                  
                                    <input type="text" class="form-control datepicker" placeholder="From:" name="fromdate"  readonly>
                                 </div>
                                 <div class="col">
                                  
                                  <input type="text" class="form-control datepicker" placeholder="To:" name="todate"  readonly>
                               </div>
                                 <div class="col">
                               
                                 <select class="form-control" id="exampleFormControlSelect1" name="delivery_boy">
                                   
                                    <option selected="" value="" >Select Delivery Boy</option>
                                   
                                    ?>
                                    <?php
                                    foreach($boyslist as $boy)
                                    {
                                      ?>
                                       <option value="<?php echo $boy->user_id; ?>"><?php echo $boy->name;?></option>
                                       <?php
                                     
                                    }?>
                                  
                                 </select>
                                 </div>
                                 <div class="col">
                               
                               <select class="form-control" id="exampleFormControlSelect1" name="payment_type">
                                 
                                  <option selected="" value="" >Select Payment Type</option>
                                  <option value="cash on delivery">Cash On Delivery</option>
                                  <option value="card on delivery">Card On Delivery</option>
                                  <option value="take away">Take Away</option>
                               </select>
                               </div>
							<!-- 	 <div class="col">
                         <label><?php //echo $lbl_description;?></label>
                                    <input type="text" class="form-control" placeholder="Description" name="description"  value="<?php //echo $description;?>">
                                 </div> -->
								 
								
								
								 
                              </div>
				
							  
							  	  <div class="form-row" style="padding-top:50px;">
                                 
                             
							
								  <div class="col">
                         
                              <button type="submit" class="btn btn-primary">Search</button>
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
                           <h4 class="card-title">Orders</h4>
                        </div>
                      
                     </div>
                     <div class="reporttable">
                     <div class="iq-card-body">
                     <div class="table-responsive">
                     <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">customer</th>
								 <th scope="col">items</th>
                         <th scope="col">date</th>
                         <th scope="col">subtotal</th>
                         <th scope="col">Delivery charge</th>
                         <th scope="col">discount</th>
                         <th scope="col">Order Total</th>
                                 
                               <!--   <th scope="col">Status</th>
								
								   <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                             if($orders['orderlists'])
                             {
                                 $i=1;
                                 foreach($orders['orderlists'] as $index=>$value)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value=""></td>
                                 <td><?php echo $value->customer_name->name;?></td>
                                 <td><span class="badge badge-danger text-wrap">
                                    <?php foreach($value->items as $item)
                                    {
                                       echo $item.",";
                                    }?></span></td>
                                 <td><?php echo $value->order_time;?></td>
                                 <td><?php echo $value->cart_total;?></td>
                                 <td><?php echo $value->delivery_charge;?></td>
                                 <td><?php echo $value->discount;?></td>
                                 <td><?php echo $value->order_total;?></td>
                             
								 <td>
                         <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('AdminController/order_details/'.$value->id))?>">View</a></button></span>
                                 </td> 
                               </tr>
                              <?php $i++; } 
                              }
                              else{?>
                              <tr>
                                 <td colspan="3">No Delivered Orders Found</td>
                              </tr>
                                   <?php }?>
                             </tbody>
                           </table>
                         </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <td><th scope="col">Total Orders:</th></td>
                                 <td><?php echo $orders['ordertotals'][0]->count;?></td>
                               </tr>
                               <tr>
                                 <td><th scope="col">Subtotal:</th></td>
                                 <td><?php echo $orders['ordertotals'][0]->subtotal;?></td>
                               </tr>
                               <tr>
                                 <td><th scope="col">Total Delivery Charge:</th></td>
                                 <td><?php echo $orders['ordertotals'][0]->delivery_charge;?></td>
                               </tr>
                              
                               <tr>
                                 <td><th scope="col">Total Discount:</th></td>
                                 <td><?php echo $orders['ordertotals'][0]->discount;?></td>
                               </tr>
                               <tr>
                                 <td><th scope="col">Total:</th></td>
                                 <td><?php echo $orders['ordertotals'][0]->total;?></td>
                               </tr>
							
                             </thead>
                            
                           </table>
                         </div>
                     </div>
                     </div>
                  </div>
               </div>
               
            </div>
            
         </div>
      </div>
  