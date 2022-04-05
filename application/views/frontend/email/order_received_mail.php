<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="page-content-wrapper">
    <div class="container-fluid" style="width: 350px;">
        <div class="pt-3">
        
        <div class="row">
        <div class="col">
               <h4>Hello Admin,</h4>

               <h4>New Order Received!!</h4>
               <h6><a href="<?php echo base_url()?>single-order/".$order_id>View Order</a></h6>
            
            </div>
        </div>

        <div class="row">
        <h4>Order Summary</h4>
       <table>
           <thead>
           <th></th>
          
           </thead>
           <tbody>
           <td>Items:</td>
               <td>
               <?php 
               echo $items;
              ?>
               </td>
             
           </tbody>
       </table>
             <h6>Sub Total: <?php echo $cart_total?></h6>
             <h6>Discount: <?php echo $discount?></h6>
             <h6>Tax(5%): <?php echo $tax_amount?></h6>
             <h6>Delivery Charge: <?php echo $delivery_charge?></h6>
             <h6>Tax Collected For Delivery(5%): <?php echo $delivery_tax?></h6>
             <h4>Order Total: <?php echo $order_total?></h4>
        </div>


    </div>
    </div>
</div>
</body>
</html>