<div class="page-content-wrapper">
      <div class="container">

		
		<style>
		.data-content
		{
			display:block;
			width:100% !important;
			max-width:100% !important;
		}
		</style>
         
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Billing Address-->
          <div class="billing-information-card mb-3">
            <div class="card billing-information-title-card bg-danger">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Shipping Address</h6>
              </div>
            </div>
           
            <div class="card user-data-card p-2 mt-3">
            <form id="add_new_address" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" >
            <div class="row">
      <div class="container p-2">
      <div class="card-header">Add New</div>
      <div class="row p-2">
        
<div class="col">
<label>Building/Room No:</label>
<input type="text" name="building_floor_no" class="form-control" required>

</div>
      </div>
      <div class="row p-2">
<div class="col">
<label>Address:</label>
<input type="text" name="address" class="form-control" required>

</div>
      </div>
      <div class="row p-2">
<div class="col">
<label>Current Location</label>
<textarea name="current_location" class="form-control cur_loc" width="250px" required readonly></textarea>
</div>
      </div>
      <div class="row p-2">
<div class="col">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio1" value="home" checked required>
  <label class="form-check-label" for="inlineRadio1" >Home</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio2" value="office">
  <label class="form-check-label" for="inlineRadio2">Office</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio3" value="appartments">
  <label class="form-check-label" for="inlineRadio3">Appartments</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="address_type" id="inlineRadio3" value="other">
  <label class="form-check-label" for="inlineRadio3">Other</label>
</div>
</div>
      </div>
      <div class="row p-2">
<div class="col text-right pt-2">
<button class="btn btn-primary" type="submit">Add</button>
<input type="hidden" name="area" id="area" value="">
<input type="hidden" id="targetelem" value="nopopup">
</div>
      </div>
          </div>
         
           
             
             <!--  <h5 class="total-price mb-0"><i class="lni lni-rupee"></i><span class="counter"><?php //echo $this->session->userdata('cart_total');?></span></h5><button type="submit" class="btn btn-warning" href="checkout-payment.html">Confirm Order</button> -->
            </div>
            </form>
            <form id="do_checkout" method="POST" action="<?php echo site_url('checkout')?>" data-form="ajaxform" enctype="multipart/form-data">
            <input type="hidden" name="remarks" value="<?php echo $remarks; ?>">
            <input type="hidden" name="delivery_type" value="<?php echo $delivery_type; ?>">
            <input type="hidden" name="offer_product_id" value="<?php echo $offer_product_id; ?>">
            <input type="hidden" name="actual_total" value="<?php echo $actual_total; ?>">
            </form>
          </div>
          
      </div>
    </div>
  
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(e){
  
 getCurrentLocation();
 
});
function getCurrentLocation()
{
  const successCallback=(position)=>{
    // console.log(position.coords.latitude);
    // console.log(position.coords.longitude);
    localStorage.setItem('latitude',position.coords.latitude);
    localStorage.setItem('longitude',position.coords.longitude);
    //localStorage.getItem('latitude')
    var data={latitude:localStorage.getItem('latitude'),longitude:localStorage.getItem('longitude')}
    var html="";
    ajaxcall1(data,'set_current_location',function(data){
      if(data !="")
      {
        var data=JSON.parse(data);
        $('#area').val(data[0]);
        // $.each(data,function(index,value){
        //   html+=value+" , ";
        // })
        $('.cur_loc').html(data[0]); 
      }  
     
    })
  };
  const errorCallback=(error)=>{
   swal("Information","Turn On Your Device Location To Continue",'info');
   getCurrentLocation();
  };
  navigator.geolocation.getCurrentPosition(successCallback,errorCallback,{
  enableHighAccuracy:true,
  timeout:5000
  });
   
}
//       $('document').ready(function(e){
//             if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(function(position){
//       localStorage.setItem('latitude',position.coords.latitude);
//       localStorage.setItem('longitude',position.coords.longitude);
//    /*  lat= position.coords.latitude,
//     long=position.coords.longitude */
//   }); 
// }
//   if(localStorage.getItem('latitude'))
//   {
//     var data={latitude:localStorage.getItem('latitude'),longitude:localStorage.getItem('longitude')}
//     var html="";
//     ajaxcall1(data,'set_current_location',function(data){
//       if(data !="")
//       {
//         var data=JSON.parse(data);
//         $('#area').val(data[0]);
//         $.each(data,function(index,value){
//           html+=value+" , ";
//         })
//       }  
//       $('.cur_loc').html(html); 
//     })
//   }
//   else{
//     swal("Please turn on your device location");
//     setTimeout(function(){location.reload(true);}, 10000);
//   }
//       })
// </script>

