
$('#user-login').submit(function(e){
  e.preventDefault();
  var data=new FormData(this);
  ajaxcall(data,'user_login',function(data)
  {
    //console.log(data);
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
      /* location.reload(true); */
      /*  alert(data); */
  });
  
  
  });
  
  $('#forgot-password').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    ajaxcall(data,'forgot_password',function(data)
    {
      console.log(data);
      var data=JSON.parse(data);
      //alert(data.otp);
      if(data.message=="")
      {
        window.location.href=base_url+'otp';
      /*   $('.otp-cont').html(`<p>OTP has been sent to your Email Id </p> <form id="otp-check"  method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <label for="otp">Enter OTP</label>
                    <input  id="otp" name="otp" type="text" required>
                    <button class="btn btn-warning btn-lg btn_otp_check" type="button">Submit</button>
                    </form>`) */
      }
      else
      {
        swal('Message',data.message,'info');
      }
     
    });
    
    
    });

    $('#otp-check').submit(function(e){
      e.preventDefault();
      var data=new FormData(this);
      ajaxcall(data,'otp_check',function(data)
      {
        var data=JSON.parse(data);
        console.log(data);
        if(data.redirect !="" && data.message=='success')
        {
          window.location.href=data.redirect;
        }
        else if(data.message !="")
        {
          swal('Message',data.message,'info');
        }
      });

    });

    $('#change-password').submit(function(e){
      e.preventDefault();
      var data=new FormData(this);
      ajaxcall(data,'change_password',function(data)
      {
        
        console.log(data);
        if(data > 0)
        {
         swal('Success','Changing Password successfull','success');
         window.location.href=base_url+'login';
        }
        else
        {
          swal('Failed!','Changing Password Failed','error');
        }
       
      });

    });

  $("#user-signup").submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    ajaxcall(data,'user_signup',function(data)
    {
      console.log(data);
      var data=JSON.parse(data)
        if(data.success !=1)
        {
            swal("Welcome!", data.msg, "success");
           /*  window.location.href = data.redirect_url; */
           location.reload(true);
        }
        else
        {
            swal("Registration Failed!",data.msg, "error");
        }
        /* location.reload(true); */
        /*  alert(data); */
    });
  });
  $('.signup').click(function(e){
$('.login-cont').fadeOut(50);
$('.signup-cont').fadeIn(1000);
  });
  $('.login').click(function(e){
    $('.signup-cont').fadeOut(50);
    $('.login-cont').fadeIn(1000);
      });
$('.addonval').click(function(e){
  $('#addon').val($(this).val());
});

  $('.get_price').click(function(e){
    $('.chk_var').val(1);
    var data={variant_id:$(this).val(),prod_id:$('#prod_id').val()}
    $('#variants').val($(this).val());
    var target=$(this);
    var html="";
    ajaxcall1(data,'get_product_sec_details',function(data)
    {
        var data=JSON.parse(data);
        $.each(data,function(index,value){
          html+=`<p class="sale-price mb-0">AED `+value.price+`<span>AED `+value.mrp+`</span></p>`;
          $('#price').val(value.price);
          $('#mrp').val(value.mrp);
          $('#max_sale').val(value.max_sale);
          $('.prod_qty').val(1);
          $('.btn-addtocart').prop('disabled',false)
          $('.addon_container').css("display", "block");
          if(value.max_sale <= 10 && value.max_sale > 0)
          {
            $('.prod_status').html(`Only `+value.max_sale+` Left!`);
          }
          else if(value.max_sale >10)
          {
            $('.prod_status').html(`In Stock`);
          }
        });
        $('.price_detail').html(html);
    }); 
    });

$('.qty_plus,.qty_minus').click(function(e){

  var max_sale=$('#max_sale').val();
  var txtval=$('.prod_qty').val();
  if(txtval == max_sale)
  {
    $(".qty_plus").css("pointer-events","none");
  }
  else
  {
    $(".qty_plus").css("pointer-events","auto");
  }

});

$('.prod_qty').blur(function(e){
  if($(this).val() > $('#max_sale').val())
  {
    $(this).val(1);
    $('.add-cart-sub').prop('disabled',true);
  }
  else if($(this).val() <= $('#max_sale').val())
  {
    $('.add-cart-sub').prop('disabled',false);
  }
});


$('.chk_addon').change(function(e){
if(this.checked)
{
  $('#'+$(this).val()).val(1);
  $('.addon_status_'+$(this).val()).show();
  var max_val=$('.addon_max_'+$(this).val()).val()
  if(max_val <= 10 && max_val > 0)
  {
  $('.addon_status_'+$(this).val()).html(`Only `+max_val+` Left!`);
  }
  else if(max_val > 10)
  {
  $('.addon_status_'+$(this).val()).html('In Stock')
  }
  
}
else
{
  $('.addon_status_'+$(this).val()).hide();
}

});

$('.qty_plus_addon,.qty_minus_addon').click(function(e){
 
   var txtval=$(this).siblings('.addon_qty').val();
   var max_val=$('.addon_max_'+$(this).siblings('.addon_qty').attr('id')).val();
   if(txtval == max_val)
   {
    $('#ad_plus'+$(this).siblings('.addon_qty').attr('id')).css("pointer-events","none");
  }
  else
  {
    $('#ad_plus'+$(this).siblings('.addon_qty').attr('id')).css("pointer-events","auto");
  }
});

/* $('.addon_qty').blur(function(e){
  
  var id=$(this).attr('id');
  alert(id);
  var max=$('.addon_max_'+id).val();
  var txt=$(this).val();
  alert(txt);
  alert(max);
  
  if(txt > max)
  {
    $('#'+id).val(1);
  }
});
 */
$('#phone_no').keypress(function(e){
  $('.phone').hide(500);
});

/* $('.promocode').change(function(e){
  var selected = $(this).find('option:selected');
  var extra = selected.data('products'); 
  alert(extra);
});
 */

$('.cart-apply').click(function(e){
e.preventDefault();
var promocode=$('.promocode').val();
var phone_no=$('#mobile').val();
var del_charge=$('#delivery_charge').val();
var subtot=$('#items').val();
//var del_tax=$('#delivery_tax').val();
if(!promocode)
{
$('.cart-status').html('Please Choose Promocode First');
}
else if(phone_no=="")
{
 swal("Please Login First");
 window.location.href=base_url+"login";
}
else
{
  var data={promocode:promocode,phone_no:phone_no,del_charge:del_charge,subtot:subtot};
  ajaxcall1(data,'apply_coupon',function(data){
   /*  console.log(data); */
    var data=JSON.parse(data);
    if(data.status=="null" || data.discount !=0)
    {
      $('#discount').val(data.discount);
      $('.discount').html(`AED `+data.discount);
      var order_total=(parseFloat(subtot)+parseFloat(del_charge)-parseFloat(data.discount)).toFixed(2);
      var beforetax=((parseFloat(order_total))/1.05).toFixed(2);
      var tax_amount=(parseFloat(order_total)-parseFloat(beforetax)).toFixed(2);
      $('#beforetax_amount').val(beforetax);
      $('.beforetax').html(`AED `+beforetax);
      $('#tax_amount').val(tax_amount);
      $('.tax').html(`AED `+tax_amount);
     

      $('#order_total').val(order_total);
      $('.ot').html(`<b>AED <span class="counter">`+ order_total+`</span></b>`);
     
      if(data.status == "null")
      {
      $('.cart-status').removeClass('text-danger');
      $('.cart-status').addClass('text-success');
      $('.cart-status').html("Successfully Applied");
    
      }
      else
      {
       
          $('.cart-status').removeClass('text-success');
          $('.cart-status').addClass('text-danger');
          $('.cart-status').html(data.status);
    
      }
      swal("Coupon applied!","You get a discount of AED "+data.discount,"info")
    
    }
    else
    {
      $('.cart-status').removeClass('text-success');
      $('.cart-status').addClass('text-danger');
      $('.cart-status').html(data.status);
    }
   
  });
 
}
});

$('.pay_type').click(function(e){

  $('#payment_type').val($(this).val());

});



$('.add_to_cart').submit(function(e){
  e.preventDefault();
  var i=0,ad_price=0,ad_count=0,tot_price=0,ad_name='';
  var var_count=$('#variants_count').val();
  var addon=new Array();

  if(var_count !=1)
  {
  $('input[name="addon"]:checked').each(function(e){
    ad_count=$('#'+$(this).val()).val();
    ad_price=$('.addon_price_'+$(this).val()).val();
    ad_name=$('.addon_name_'+$(this).val()).val();
    addon[i]={'addon_id':$(this).val(),'addon_count':ad_count,'addon_price':ad_price,'addon_name':ad_name};
   
    tot_price=tot_price+(parseInt(ad_count)*parseInt(ad_price));
    i++;
  });
  }
  var data=new FormData(this);
  data.append('addon_tot',tot_price);
  data.append('add_on',JSON.stringify(addon));
  /* console.log(data); */
 ajaxcall(data,'add_to_cart',function(data)
  {
    var data=JSON.parse(data);
    //console.log(data)
    if(data.result==0)
   {
    swal({
      text: "Item added to Cart",
      icon: "success",
      timer: 1000
   });
  $('.cart_value').html(data.cart_value);
   }
   else if(data.result == 1)
   {
     swal('Information','Sorry You can choose only one offer..','error');
   }
  }); 
});
$('.confirmbtn').click(function(e){
  e.preventDefault();
  var result="";
  checkcarttotal();
});

function checkcarttotal()
{
  var cart_tot=$('#items').val();
  var min_order=$('.minord').val();
  var delivery_type=$('#delivery_type').val();
  var act_delivery=$('.actdel').val();
  if(parseFloat(cart_tot) < parseFloat(min_order) && delivery_type=="home delivery")
    {

      var diff=parseFloat(min_order)-parseFloat(cart_tot);
      if(act_delivery == 0)
      {
        swaltxt='Total Cart Value is Less Than '+min_order+' AED .Add Items worth '+diff+' AED to get free delivery';
      }
      else
      {
        swaltxt='Total Cart Value is Less Than '+min_order+' AED .Add Items worth '+diff+' AED to get discounts in delivery charge';
      }
    
        swal({  
          title: "Message",   
          text: swaltxt,   
          icon: "info", 
          buttons: {
            cancel: "Continue Shopping",
            confirm: "Confirm Payment",
          
          },
        })
      .then(function(input){

        if(input===true)
        {
          if($('#payment_type').val()=='card on delivery' && $('#stripeToken').val()=="")
          {
           getStripeToken();
          }
          else
          {
          $('#confirm_payment').submit();
          }
        }
        else
        {
          window.location.href=base_url+'FrontController';
        
        }  
      });
      
    }
    else
    {
      $('#delivery').val(act_delivery);
      if($('#payment_type').val()=='card on delivery' && $('#stripeToken').val()=="")
          {
           getStripeToken();
          }
          else
          {
          $('#confirm_payment').submit();
          }
    }
  
}
function getStripeToken()
{
  var flag="";
  $('#popupstripe').show();
  var elements = stripe.elements();

  var style = {
      base: {
      fontWeight: 400,
      fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
      fontSize: '16px',
      lineHeight: '1.4',
      color: '#555',
      backgroundColor: '#fff',
      '::placeholder': {
        color: '#888',
      },
    },
    invalid: {
      color: '#eb1c26',
    }
  };
  
  var cardElement = elements.create('cardNumber', {
    style: style
  });
  cardElement.mount('#card_number');
  
  var exp = elements.create('cardExpiry', {
    'style': style
  });
  exp.mount('#card_expiry');
  
  var cvc = elements.create('cardCvc', {
    'style': style
  });
  cvc.mount('#card_cvc');
  
  // Validate input of the card elements
  var resultContainer = document.getElementById('paymentResponse');
  cardElement.addEventListener('change', function(event) {
    if (event.error) {
      resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
      resultContainer.innerHTML = '';
    }
  });
  
  // Get payment form element
  var form = document.getElementById('paymentFrm');
  
  // Create a token when the form is submitted.
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
  });
  
  // Create single-use token to charge the user
  function createToken() {
    stripe.createToken(cardElement).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error
        resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
      } else {
     
        $('#stripeToken').val(result.token.id);
        $('#confirm_payment').submit();
      }
    });
  }
}



$('#confirm_payment').submit(function(e){
  e.preventDefault();
  $('#stripestatus').show();
  var data=new FormData(this);

  const successCallback=(position)=>{
  
    localStorage.setItem('latitude',position.coords.latitude);
    localStorage.setItem('longitude',position.coords.longitude);
    data.append('latitude',position.coords.latitude);
    data.append('longitude',position.coords.longitude);
    ajaxcall(data,'confirm_payment',function(data)
    {
      var data=JSON.parse(data);
      //console.log(data.status); 
      $('#popupstripe').hide();
      if(data.status=='success')
      {
        swal("Your Order has been placed");
        window.location.href = data.redirect_url;
      }
      else if(data.status=="failed")
      {
        swal("Sorry...Order Not Placed");
      }
     
    }); 

  };
  const errorCallback=(error)=>{
   swal("Information","Turn On Your Device Location To Continue",'info');
   $('#confirm_payment').submit();
  
  };
  navigator.geolocation.getCurrentPosition(successCallback,errorCallback,{
  enableHighAccuracy:true,
  timeout:5000
  });

 


});


$('.redeemreward').click(function(e){
var rewdiff=0;
var red_status=$('#reward_redeemed').val();
if(red_status=="no")
{
var reward=$('#reward_point').val();
var order_total=$('#order_total').val();
if(reward > order_total)
{
  rewdiff=parseFloat(reward)-parseFloat(order_total);
  order_total=0;
  $('#redeemed_points').val(order_total);
}
else
{
  order_total=parseFloat(order_total)-parseFloat(reward);
  $('#redeemed_points').val(reward);
}
swal("Redeemed Successfully.. Your Order Total is now AED "+order_total);
$('#reward_redeemed').val('yes');
$('#reward_point').val(rewdiff);
$('#order_total').val(order_total);
$('.ot').html(`<span style="font-size:18px; font-weight:600;color:#000">
 AED <span class="">`+order_total+`</span>
</span>`)
}
else
{
  swal("Already Redeemed");
}

});
$('.get_offers').click(function(e){
  $('.modal').show();
});

$('.use_code').click(function(e){
  var promo_id=$(this).attr('id');
  $(".promocode option[value='"+promo_id+"']").prop('selected', true);
  $('.modal').hide();
});

$('.remove-product').click(function(e){
  var data={cart_id:$(this).siblings('.cart_id').val()};
  //console.log(data);
  ajaxcall1(data,'deleteproduct_from_cart',function(data)
  {
    /* console.log(data); */
    location.reload(true);
  }); 


});

$('.qty_update').click(function(e){

  var cart_id=$(this).siblings('.prod_count').attr('id');
  var data={quantity:$(this).siblings('.prod_count').val(),cart_id:$(this).siblings('.prod_count').attr('id'),type:$(this).siblings('.prod_count').data('type'),variant:$(this).siblings('.prod_count').data('variant'),product_id:$(this).siblings('.prod_count').data('prod')};
  ajaxcall1(data,'update_carted_product_count',function(data){
  var data=JSON.parse(data);
  if(data.msg=="")
  {
    $('.cart_value').html(data.cart_value);
    $('#'+cart_id+'total').val(data.product_total);
  }
  else
  {
    swal("message!",data.msg,'info');
    $('.prod_count').val(data.val);
  }
  });


});

$('.prod_count').blur(function(e){

  var data={quantity:$(this).val(),cart_id:$(this).attr('id'),type:$(this).data('type')};
  ajaxcall1(data,'update_carted_product_count',function(data){
    var data=JSON.parse(data);
    if(data.msg=="")
    {
    location.reload(true);
    }
    else
    {
      swal("message!",data.msg,'info');
      location.reload(true);
    }
    });

});


function ajaxcall(formElem,ajaxurl,handle)
{
  $.ajax({
    url: base_url+"FrontController/"+ajaxurl,
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
    url: base_url+"FrontController/"+ajaxurl,
    type: 'POST',
    data:data,
    datatype:'json',
    success: function(data) {
      handle(data);
    }
});
}
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

  $('.deli_type').click(function(e){
    if(this.checked)
    {
      if($(this).val()=='home delivery')
      {
        $('#delivery_type').val('home delivery');
        $('.current_loc').fadeIn(500);
      }
      else
      {
        $('.current_loc').fadeOut(500);
        $('#delivery_type').val('take away');
      }
    }
  });

$('#search_product').on('keyup',function(e){
  if($(this).val() !="")
  {
    var data={'key':$(this).val()};
    ajaxcall1(data,'search_product',function(data)
    {
      var data=JSON.parse(data);
      $("#searchResult").empty();
      if(data.length > 0)
      {
      $.each(data,function(index,value){
      
      $("#searchResult").append("<li value='"+value.id+"'  class='list-group-item'>"+value.name+"</li>");
      });
  
      $("#searchResult li").bind("click",function(){
        setText(this);
        window.location.href= base_url+"single-product/"+$(this).val();
    
    });
  }
  else
  {
    $("#searchResult").append("<li value=''  class='list-group-item' disabled>This product not found</li>");
  }
  
    })
  }
  else
  {
    $("#searchResult").empty();
  }
})

function setText(elem)
{
  var value = $(elem).text();
  var prod_id = $(elem).val();

  $("#search_product").val(value);
  $("#searchResult").empty();

}

 $('.checkout_btn').click(function(e){
  
    e.preventDefault();
    e.preventDefault();
    $('#remarks').val($('#remarks_txt').val());
   
    var offer_usage=$('#offer_usage').val();
    var offer_product=$('#offer_product').val();
   
    
  if(offer_usage!="" && offer_usage <= 0)
  {
    swal("Offer Usage Limit Exceeded","Please Remove "+offer_product+" From Your Cart.. ","info");
  }
  else
  {
    $('#checkout').submit();
  }

  //   $('#remarks').val($('#remarks_txt').val());
  //   var cart_tot=$('#cart_total').val();
  //  /*  var min_order=$('#min_order').val();
  //   var extra_delivery=$('#extra_delivery').val();
  //   var delivery=$('#delivery').val();
  //   var act_delivery=parseFloat(delivery)-parseFloat(extra_delivery); */
  //   var del_type=$('#delivery_type').val();
  //   var swaltxt="";
  //   var offer_usage=$('#offer_usage').val();
  //   var offer_product=$('#offer_product').val();
   
    
  // if(offer_usage!="" && offer_usage <= 0)
  // {
  //   swal("Offer Usage Limit Exceeded","Please Remove "+offer_product+" From Your Cart.. ","info");
  // }
  // else
  // {
  //   if(parseFloat(cart_tot) < parseFloat(min_order) && del_type=="home delivery")
  //   {

  //     var diff=parseFloat(min_order)-parseFloat(cart_tot);
  //     if(act_delivery == 0)
  //     {
  //       swaltxt='Total Cart Value is Less Than '+min_order+' AED .Add Items worth '+diff+' AED to get free delivery';
  //     }
  //     else
  //     {
  //       swaltxt='Total Cart Value is Less Than '+min_order+' AED .Add Items worth '+diff+' AED to get discounts in delivery charge';
  //     }
    
  //       swal({  
  //         title: "Message",   
  //         text: swaltxt,   
  //         icon: "info", 
  //         buttons: {
  //           cancel: "Continue Shopping",
  //           confirm: "Proceed to Checkout",
          
  //         },
  //       })
  //     .then(function(input){

  //       if(input===true)
  //       {
         
  //         $('#checkout').submit();
  //       }
  //       else
  //       {
  //         window.location.href=base_url+'FrontController';
        
  //       }  
  //     });
      
  //   }
  //   else
  //   {
   
  //     $('#delivery').val(act_delivery);
  //     $('#checkout').submit();
   
      
  //   }
  // }
 
  });
  $('#add_new_address').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    var targetelem=$('#targetelem').val();
    var html="";
    ajaxcall(data,'add_new_address',function(data)
    {
       console.log(data);
       if(data==0)
        {
          swal('Error','Some Error Occured.. Try Again','error');
        }
        else
        {
          if(targetelem=="popup")
          {
            $('#popupcontainer').hide();
            location.reload(true);
          }
          else
          {
          $('#do_checkout').submit();
          }
        }
     
      
    });

  });
  $('.address_type').change(function(e){
    if(this.checked)
    {
     
      $('.minord').val($(this).siblings('.min_order').val());
      $('.extra_charge').val($(this).siblings('.extra_delivery').val());
      $('#delivery').val($(this).siblings('.delivery').val());
     /*  var delivery=$(".address_type:checked").siblings('.delivery').val(); */
      $('.actdel').val(parseFloat(delivery)-parseFloat($('.extra_charge').val())); 
      var discount=$('#discount').val();
      var subtot=$('#items').val();
      var delivery=$('#delivery').val();
    
      
      var order_total=(parseFloat(subtot)+parseFloat(delivery)-parseFloat(discount)).toFixed(2);
      var beforetax=((parseFloat(order_total))/1.05).toFixed(2);
      var tax_amount=(parseFloat(order_total)-parseFloat(beforetax)).toFixed(2);
    
      $('#delivery_charge').val(delivery);
      $('.delivery_charge').html(`AED `+delivery);
      $('#beforetax_amount').val(beforetax);
      $('.beforetax').html(`AED `+beforetax);
      $('#tax_amount').val(tax_amount);
      $('.tax').html(`AED `+tax_amount);
     

      $('#order_total').val(order_total);
      $('.ot').html(`<b>AED <span class="counter">`+ order_total+`</span></b>`);
    
    }
  });
  $('.remove_address').click(function(e){
    var data={address_id:$(this).siblings('.del_addresstype').val()};
    ajaxcall1(data,'remove_user_address',function(data){
      if(data==0)
      {
        $('#popupcontainer').show();
        $('.confirmbtn').prop('disabled', true);
      }
      else
      {
        $('.confirmbtn').prop('disabled', false);
      }
    })
    $(this).closest( ".user_address" ).hide();
  });


   