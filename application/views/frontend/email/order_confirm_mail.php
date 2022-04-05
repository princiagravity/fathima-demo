<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="page-content-wrapper">
    <div class="container-fluid" style="width: 350px;">
        <div class="pt-3">
        <div class="row">
            
            <div class="col-sm-6">
            <img src="<?php echo base_url() ?>logo/fathimalogo.jpg" width="150px" height="150px">
              
            </div>
         
        </div>
        <div class="row">
        <div class="col">
               <h4>Hello <?php echo $name;?>,</h4>

               <p>Thanks For Your Order(order ID:). Your item(s) will be deliverd soon.Start preparing your tables and tastebuds!</p>
            
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
             <h6>Delivery Fee: <?php echo $delivery_charge?></h6>
             <h6>Total before Vat: <?php echo $total_before_vat?></h6>
             <h6>VAT Incl.: <?php echo $tax_amount?></h6>
             <h6>Discount: <?php echo $discount?></h6>
             
             <h4>Order Total: <?php echo $order_total?></h4>
        </div>


    </div>
    </div>
</div>
</body>
</html>