$(document).ready(function(e){
 
  ajaxalarm();
  function ajaxalarm()
{
  $.ajax({
    url: base_url+"get_order_count",
    type: 'POST',
    datatype:'json',
    success: function(data) {
      if(data==1)
      {
        var audio = new Audio(base_url+"alarm/neworder.wav");
        audio.play();
        swal("New Order Received");
        /* location.reload(true); */
      }
    },
    complete:function(){
      setTimeout(function(){ajaxalarm();}, 10000);
    }
});
}
function onWindowClosing() {
  if (window.event.clientX < 0 || window.event.clientY < 0) {
     ajaxcall1('','admin/logout');
  }
};
window.onbeforeunload = onWindowClosing;
 
 /*  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
  }); 
  $('#productlist').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'excel'
    ]
});*/
  $(".select2").select2();
  $(".ajax").select2({
    ajax: {
        url: "https://api.github.com/search/repositories",
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                q: params.term, // search term
                page: params.page
            };
        },
        processResults: function(data, params) {
            // parse the results into the format expected by select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;
            return {
                results: data.items,
                pagination: {
                    more: (params.page * 30) < data.total_count
                }
            };
        },
        cache: true
    },
    escapeMarkup: function(markup) {
        return markup;
    }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: formatRepo, // omitted for brevity, see the source of this page
    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
});


});
$('#user-login').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  ajaxcall(data,'user_login',function(data)
  {
    console.log(data);
    var data=JSON.parse(data)
      if(data.success==1)
      {
          swal("Welcome!", "Logged In Successfully!", "success");
          window.location.href = data.redirect_url;
      }
      else
      {
          swal("Login Failed!", "Invalid Username Or Password!", "error");
      }
    
  });
  
  
  });
$('#add_slider').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    var action=$(this).attr('action');
    ajaxcall(data,action,function(data)
    {
      if(data)
      window.location.href=base_url+'add-slider';
    });
  
});

$('#add_offers').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-offers';
  });

});

$('#view_report').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  ajaxcall(data,'get_report_result',function(data)
    {
      console.log(data);
      var data=JSON.parse(data);
      console.log(data.result.orderlists);
      var html="";
      var i=1;
      if(data.result.orderlists==="" || data.result.orderlists.length==0)
      {
        html +=`<span>
        No Orders
        </span>`;
      }
      else
      {
        
          html +=`<div class="iq-card-body">
          <div class="table-responsive">
          <table class="table mb-0 table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">customer</th>
      <th scope="col">items</th>
              <th scope="col">date</th>
              <th scope="col">subtotal</th>
              <th scope="col">Tax</th>
              <th scope="col">Delivery charge</th>
              <th scope="col">discount</th>
              <th scope="col">Order Total</th>
                      
                    </tr>
                  </thead>
                  <tbody>`;
                  $.each(data.result.orderlists,function(index,value){
                  html+=`
                    <tr>
                      <td>`+i+`</td>
                      <td>`+value.customer_name.name+`</td>
                      <td><span class="badge badge-danger text-wrap">
                         `;
                         $.each(value.items,function(index,value){
                           html+=value+`,`;
                         });
                       html +=`</span></td>
                      <td>`+value.order_time+`</td>
                      <td>`+value.cart_total+`</td>
                      <td>`+value.tax_amount+`</td>
                      <td>`+value.delivery_charge+`</td>
                      <td>`+value.discount+`</td>
                      <td>`+value.order_total+`</td>
                  
      <td>
              <span class="table-remove"><button type="button"
                            class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="`+base_url+`single-order/`+value.id+`">View</a></button></span>
                      </td> 
                    </tr>`;
                    i++;
        });
                                              
                  html+=`</tbody>
                </table>
              </div>
          </div>`;
      

html+=`<div class="iq-card-body">
<div class="table-responsive">
   <table class="table mb-0 table-borderless">`;


        $.each(data.result.ordertotals,function(index,value){
        html +=` <thead>
        <tr>
          <td><th scope="col">Total Orders:</th></td>
          <td>`+value.count+`</td>
        </tr>
        <tr>
          <td><th scope="col">Subtotal:</th></td>
          <td>`+value.subtotal+`</td>
        </tr>
        <tr>
          <td><th scope="col">Total Delivery Charge:</th></td>
          <td>`+value.delivery_charge+`</td>
        </tr>
        <tr>
          <td><th scope="col">Total Tax:</th></td>
          <td>`+value.tax_amount+`</td>
        </tr>
        <tr>
          <td><th scope="col">Total Discount:</th></td>
          <td>`+value.discount+`</td>
        </tr>
        <tr>
          <td><th scope="col">Total:</th></td>
          <td>`+value.total+`</td>
        </tr>
  
      </thead>
     `;
    });


html+=` </table>
</div>
</div>`;




      }
   $('.reporttable').html(html);
     /*  location.reload(true); */
     /*  alert(data); */
    });
});

$('.new_stock').change(function(e){
var html="";
var prod_id=$(this).siblings('.up_prodid').val();
  if(this.checked)
  {
    var data={prod_id:prod_id};
    ajaxcall1(data,'get_product_variants',function(data){
      var data=JSON.parse(data);
     console.log(data.variantslist.length);
    
     html+=`<div class="form-row">`;
     if(data.variantslist.length != 0 || data.variantslist !="")
     {
     $.each(data.variantslist,function(index,value){
      html+=`<div class="form-row"><div class="col"><label>`+value.name+`</label>
      <input type="hidden" name="variants[]" value="`+value.variants+`">
      <input type="text" class="form-control" name="newstock[]" required></div></div>`
     });
    }
    else
    {
      html+=`<div class="col">No Data Found</div>`;
    }
     html+=`</div>`;
     $('.modal_container').html(html);
     $('#new_prod_id').val(prod_id);
     $('#newstock_modal').modal('show');
    });
  }
});



$('#update_newstock').submit(function(e){
  e.preventDefault();
 
  var data=new FormData(this);
  ajaxcall(data,'update_product_newstock',function(data)
  {
   /*  console.log(data); */
    location.reload(true);
   /*  alert(data); */
  });

});


$('.prod_status_update').change(function(e){
  if(this.checked)
  {
    var stock="";
    var status=$(this).val();
    var data={prod_id:$(this).siblings('.up_prodid').val(),status:status};
    ajaxcall1(data,'update_product_status',function(data){
      location.reload(true);
    });
  }
});

$('#add_products').submit(function(e){
  e.preventDefault();
  var variants_count=parseInt($('#variants_count').val());
  if(variants_count <= 0)
  {
    swal("Add Atleast One Variant");
    $('#add_more').click();
  }
  else
  {
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-product';
  });
}
  
});

$('#search_product').submit(function(e){
  e.preventDefault();
  var html=""; var i=1;
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    var data=JSON.parse(data);
    $.each(data.productlist,function(index,value){
      html+=`<tr>

      <td>`+i+`<input type="hidden" id="id" name="id" value="`+value.id+`"></td>

      <td>`+value.name+`</td>

      <td>`+value.category+`</td>

      <td><span>

            <input type="hidden" name="prod_id" class="prod_id" value="`+value.id+`">`;

            if(value.visibility=='1')

            {

            

            html+=`<input class="prod_visibility" type="checkbox" value="`+value.visibility+`" id="flexCheckDefault" checked>`;

          
            }

            else

            {

          

              html+=`<input class="prod_visibility" type="checkbox" value="`+value.visibility+`" id="flexCheckDefault">`;

           
            }

          html+=`</span></td>



      <td>

<span class="table-remove"><button type="button"

            class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="`+base_url+'single/products/'+value.id+`">View</a></button></span>

            <span class="table-remove"><button type="button"

            class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="`+base_url+'update-product/'+value.id+`">Update</a></button></span>

            <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="products">

            <input type="hidden" name="delid" class="delid" value="`+value.id+`"><button type="button"

            class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>

            

            <span class="table-remove"><input type="hidden" name="prodid" class="up_prodid" value="`+value.id+`">`;
            if(value.status=="Out Of Stock")
            {
            html+=`<input class="prod_status_update" type="checkbox" value="In Stock" id="flexCheckDefault">

               <label class="" for="flexCheckDefault">

                Mark As In Stock

               </label>`;

            } else
            {

               html+=`<input class="prod_status_update" type="checkbox" value="Out Of Stock" id="flexCheckDefault">

               <label class="" for="flexCheckDefault">

                Mark As Out Of Stock

               </label>`;

            }
            html+=`</span>

      </td> 

    </tr>`;
      });
    console.log(data);
    $('.search_result').html(html);
    //location.reload(true);
   /*  alert(data); */
  });
});

$('#add_category').submit(function(e){
  e.preventDefault();
 
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-categories';
  });

});
$('.product_cat').change(function(e){
var data={category:$(this).val()};
ajaxcall1(data,'get_categorywise_product',function(data){
  var data=JSON.parse(data);
console.log(data.productlist);
var html=`<option selected value="">Select Product</option>`;
$.each(data.productlist,function(index,value){
html+=`<option value="`+value.id+`">`+value.name+`</option>`
});
$('.product_list').html(html);
});
});
$('#add_variants').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-variants';
  });
});
$('#add_addon').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    console.log(data);
    /* if(data)
    window.location.href=base_url+'add-variants'; */
  });
});

$('#add_offer_products').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
 ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-offer-products';
 });
});

$('.product_display_update').change(function(e){
  if(this.checked)
  {
	  //alert($(this).siblings('.up_prodid').val());
    var data={prod_id:$(this).siblings('.displayprod_id').val(),product_display:$(this).val()};
    ajaxcall1(data,'update_product_show_hide',function(data){
	console.log(data);
     location.reload(true);
    });
  }
});


$('#add_reward').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
 ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-reward-points';
 });
});

$('#add_promocode').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data=='existing')
    {
      alert("Promocode is Already existing");
    }
    else if(data=='1')
    {
      if(data)
      window.location.href=base_url+'add-promocodes';
    }
    else
    {
      alert("Error");
    }
  });
});

$('.del_status').click(function(e){
  e.preventDefault();
  var data={'boy_id':$('.delivery_boy').val(),'status':$('.order_status').val(),'id':$('#order_id').val()}
  ajaxcall1(data,'update_order_details',function(data){
    location.reload(true);
  });
});


$('#add_area').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-delivery-area';
    
  });
});

$('#add_delivery_charge').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-delivery-charges';
  });
});


$('#add_delivery_boy').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  var action=$(this).attr('action');
  ajaxcall(data,action,function(data)
  {
    if(data)
    window.location.href=base_url+'add-delivery-boy';
  });
});


$("#add_more").click(function (e) {

  e.preventDefault;
  var html="";
  var variants=$('.select_variant').html();
  html += `<div class="form-row" style="padding-top:50px;">
                                 
  <div class="col">
    
  <select class="form-control" id="exampleFormControlSelect1" name="prod_det[variants][]">
     `+variants+`
  </select>
  </div>

<div class="col">
     <input type="text" class="form-control" placeholder="MRP" name="prod_det[mrp][]">
  </div>
<div class="col">
     <input type="text" class="form-control" placeholder="Price" name="prod_det[price][]">
  </div>
<div class="col">
     <input type="text" class="form-control" placeholder="Maximum Sale" name="prod_det[max_sale][]">
  </div>

<div class="col">
<input
type="button"
id="remove"
name="add"
value="-"
class="btn btn-danger"
/>

  </div>


</div>`;
$('#variants_count').val(parseInt($('#variants_count').val())+1);
$(".repeat_field").append(html);

});

$(".repeat_field").on('click', '#remove', function (e) {
  e.preventDefault;
  $('#variants_count').val(parseInt($('#variants_count').val())-1);
    $(this).closest('.form-row').remove();
  }); 

 
$('#download_recipt').submit(function(e){
e.preventDefault();
var data=new FormData(this);
  ajaxcall(data,'download_receipt',function(data)
  {
    /* console.log(data); */
    var data=JSON.parse(data);
    if( data.url ){
      window.location = data.url;
  }
  });

});
$('#order_minimum').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
    ajaxcall(data,'set_minimum_order',function(data)
    {
      console.log(data);
      if(data==1)
      {
        swal('Success','Minimum order value and extra delivery charge updated successfully!!','success');
        location.reload(true);
      }
      else
      {
        swal('Failed','Minimum order value and extra delivery charge updation failed!!','error');
      }
    /*   var data=JSON.parse(data);
      if( data.url ){
        window.location = data.url; 
    }*/
  });
});

/* $(".down_receipt").click(function(e){
  alert("fdgfdg");

  var data={test:'test'};
  ajaxcall1(data,'download_receipt',function(data){
    console.log(data);
    var data=JSON.parse(data);
    if( data.url ){
      window.location = data.url;
  }

  });
}); */
/////////////////////////
$('.delete_item').click(function(e){
  e.preventDefault; 
  var id=$(this).siblings('.delid').val();
  var type=$(this).siblings('.deltype').val();
  var sweet_data = {
      title : "Delete "+type,
      text : "are you sure want to delete?",
      icon :"warning",
  };
  sweetalertConfirm(sweet_data,function(data){
      if(data==true)
      {
        $.ajax({
          url: base_url+"delete_item",
          type: 'POST',
          data: {
              id:id,
              type:type
          },
          dataType: 'json',
          success: function(data) {
            if(data.success==1)
            {
              window.location.href = data.redirect_url;
           /*  location.reload(true); */
            }
            else
            {
              alert("Deletion Failed");
            }
          }
      });
      }
   
  });
  
      
 
 

});
function sweetalertConfirm(sweet_data,handle)
{
  swal({
      title: sweet_data.title,
      text: sweet_data.text,
      icon: sweet_data.icon,
      buttons:true,
      dangerMode:true,
    
    }).then((willDelete)=>{
        if(willDelete)
        {
          handle(true);
        }
        else
        {
          handle(false)
        }
      });
  

}
////////////////////////



function ajaxcall(formElem,ajaxurl,handle)
{
  $.ajax({
    url: base_url+"AdminController/"+ajaxurl,
    type: 'POST',
    data:formElem,
    processData:false,
    contentType:false,
    cache:false,
    async:false,
    success: function(data) {
      handle(data);
    }
});
}
function ajaxcall1(data,ajaxurl,handle)
{
  $.ajax({
    url: base_url+"AdminController/"+ajaxurl,
    type: 'POST',
    data:data,
    datatype:'json',
    success: function(data) {
      handle(data);
    }
});
}

$('.promo_category').change(function(e){

  if ($(this).val()=='items')
  {
    $('#products').prop('disabled', false);
  }
  else
  {
    $('#products').prop('disabled', true);
  }
});
$('.promo_hideshow').click(function(e){
var data={status:$(this).siblings('.promo_status').val(),promo_id:$(this).siblings('.promo_id').val()};
ajaxcall1(data,'update_promocode_status',function(e){
location.reload(true);
});
});

$('.prod_visibility').click(function(e){  
var visibility;
  if(this.checked)
{
  visibility=1;
}
else
{
  visibility=0;
}
var data={visibility:visibility,product_id:$(this).siblings('.prod_id').val()};
ajaxcall1(data,'update_product_visibility',function(e){
  location.reload(true);
  });
});

$('.exportoexcel').click(function(e){
  e.preventDefault();
  var filename=$('#exlfilename').val();
  $('.tbltoexcel').table2excel({
    exclude: ".noExl",
    name: filename,
    filename:filename
});
})

$('.search_product').on('keyup',function(e){
  e.preventDefault();
  var html="";
  var i=1;
  if($(this).val() !="")
  {
    var data={'key':$(this).val()};
    ajaxcall1(data,'search_product_stock',function(data)
    {
      var i=1;
      var data=JSON.parse(data);
      if(data==="" || data.length==0)
      {
        html+=`
        <tr><td colspan=3>No Product Found</td></tr>`; 
      }
      else
      {

      $.each(data,function(index,value){
      html+=` 
    <tr>
      <td>`+i+`</td>
      <td>`+value.product_name+`</td>
      <td>`+value.category+`</td>
      <td>`+value.variant_name+`</td>
      <td>`+value.mrp+`</td>
      <td>`+value.price+`</td>
      <td>`+value.max_sale+`</td>
    </tr>
    `;
        i++;       });
                        }
        $("#stockrepostbdy").html(html);  
    })
  }
  else
  {
  /*   $(".search_result").empty(); */
  }
})