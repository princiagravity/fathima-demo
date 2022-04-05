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
    /* location.reload(true); */
    /*  alert(data); */
});


});


$('.deliver_order').click(function(e){
var data={order_id:$(this).siblings('.order_id').val(),status:4};
ajaxcall1(data,'update_order_details',function(data){
/* console.log(data); */
location.reload(true);

});
});


function ajaxcall(formElem,ajaxurl,handle)
{
  $.ajax({
    url: base_url+"DeliveryController/"+ajaxurl,
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
    url: base_url+"DeliveryController/"+ajaxurl,
    type: 'POST',
    data:data,
    datatype:'json',
    success: function(data) {
      handle(data);
    }
});
}