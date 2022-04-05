
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">   
            <div class="row">
               <div class="col-md-12">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Customers</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Customer Name</th>
								 <th scope="col">Contact Number</th>
                                 <!-- <th scope="col">Address</th> -->
                                 <th scope="col">Email ID</th>
								 <th scope="col">Area</th>
								<!--  <th scope="col">View</th> -->
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 foreach($customers_list as $customer)
                                 {?>
                               <tr>
                                 <td><?php echo $i;?></td>
                                 <td><?php echo $customer->name;?> </td>
                                 <td><?php echo $customer->mobile;?></td>
                                 <!-- <td><?php echo $customer->address;?></td> -->
                                 <td><?php echo $customer->email_id;?></td>
                                 <td><?php echo $customer->area_name;?></td>
								<!--  <td>
                                   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0">View</button></span>
                                 </td> -->
                               </tr>
                               <?php $i++;
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
   