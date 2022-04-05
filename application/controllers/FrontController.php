<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
		$this->load->library('stripe_lib'); 
        $this->load->model('front_model');
		
    }
	public function index()
	{ 	
		if(! $this->session->userdata('cart_value'))
		{
		$this->session->set_userdata('cart_value',0);
		}
		$data=$this->front_model->get_lists();
		
		$this->load->view('frontend/header');
		$this->load->view('frontend/home',$data);
		$this->load->view('frontend/footer');
	}
	public function user_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$requrl=$this->input->post('requrl');
		if($requrl=="")
		{
			$requrl="home";
		}
		$sucess=$this->front_model->check_user_exist($username,$password);
		if($sucess==1)
		{

			$response=array('success'=>$sucess,'redirect_url'=>base_url().$requrl);
		}
		else
		{
			$response=array('success'=>$sucess,'redirect_url'=>'');
		}
		echo json_encode($response);
		die();
	}

	public function search_product()
	{
		$key=$this->input->post('key');
		$result=$this->front_model->get_search_productlist($key);
		echo json_encode($result);

	}
	public function login($request="")
	{
		$data['request']=$request;	
		$data['role']="customer";
		$this->load->view('frontend/header-intro');
		$this->load->view('frontend/login',$data);
		$this->load->view('frontend/footer-intro');
	}
	public function user_signup()
	{
		$data1['name']=$data['name']=$this->input->post('name');
		$data['username']=$this->input->post('mobile');
		$data1['mobile']=$data['mobile']=$this->input->post('mobile');
		$data['password']=$this->input->post('password');
		$data1['email_id']=$data['email_id']=$this->input->post('email_id');
		$data1['role']=$data['role']=$this->input->post('role');
		
		$sucess=$this->front_model->check_username_exist($data['username']);
		if($sucess==1)
		{
			$response=array('success'=>$sucess,'msg'=>'Already Registered..Please Login');
			
		}
		else
		{
			$res=$this->front_model->check_user_email_exist($data['email_id']);
			if($res)
			{
			 $response=array('success'=>1,'msg'=>'Already Registered..Please Login');
			}
			else
			{
			$userid=$this->front_model->insert_user($data);
			$data1['user_id']=$userid;
			$result=$this->front_model->insert_user_additional_data($data1);
			if($userid && $result)
			{
			$response=array('success'=>$sucess,'msg'=>'Registered Successfully!');
			}
			else
			{
				$response=array('success'=>$sucess,'msg'=>'Registration Failed');
			}
		}
		}
		echo json_encode($response);
		die();
	}

	public function category_list()
	{
		$data1['page_head']="Product Categories";
		$data['category_list']=$this->front_model->get_product_categorylist();
		$this->load->view('frontend/header1',$data1);
		$this->load->view('frontend/category-list',$data);
		$this->load->view('frontend/footer');	
	}
	public function category_page($cat_id="")
	{
		$data['product_list']=$this->front_model->get_product_list($cat_id);
		$data1['page_head']=$this->front_model->get_category_name($cat_id);
		$this->load->view('frontend/header1',$data1);
		$this->load->view('frontend/product-list',$data);
		$this->load->view('frontend/footer');
		
	}
	public function offer_product_list()
	{
		$data1['page_head']="Offers";
		$data['offer_product_list']=$this->front_model->get_offer_products();
		$this->load->view('frontend/header1',$data1);
		$this->load->view('frontend/offer-product-list',$data);
		$this->load->view('frontend/footer');	
	}
	public function offer_product_details($id)
	{

		$data['offer_product']=$this->front_model->get_single_offer_product($id);
		$data1['page_head']="";
		$this->load->view('frontend/header1',$data1);
		$this->load->view('frontend/offer-product-details',$data);
		$this->load->view('frontend/footer');
	}
	public function cart_page($user_id="")
	{
		/* print_r($this->session->userdata('cart_total')); exit; */
		$data=array();
		$data['cart_list']="";
		$data['offer_usage']="";
		if($this->session->userdata('cart')){
			$data['cart_list']=$this->session->userdata('cart');
		}
		
		$login=$this->front_model->is_user_loggedin();
		if($login)
		{
			if($this->session->userdata('delivery_loc'))
				{
					$this->front_model->update_user_location($this->session->userdata('user_id'),$this->session->userdata('delivery_loc'));
				}
			
			// $data['user_location']=$this->front_model->get_user_location($this->session->userdata('user_id'));
			// /* print_r($data['user_location']); exit; */
			// if($data['user_location'])
			// {
			// 	$delivery=$data['user_location']->charge;
			// 	$data['extra_delivery']=$data['user_location']->extra_charge;
			// 	$data['delivery']=$delivery+$data['extra_delivery'];
			// 	$data['min_order']=$data['user_location']->min_order;	
			// 	$data['area']=$data['user_location']->area;
				
			// }
			if($data['cart_list'])
			foreach($data['cart_list'] as $index=>$value)
			{
				   if($value['product_variant']=="offer-product")
				   {
					$data['offer_usage']=$this->front_model->check_offer_product($this->session->userdata('user_id'));
				   }
				   
			}
		}
		
		/* $data['min_order_delivery']=$this->front_model->get_minimum_order(); */
		$data1['page_head']='My Cart';
		$this->load->view('frontend/header1',$data1);
		$this->load->view('frontend/cart',$data);
		$this->load->view('frontend/footer');
		
	}
	public function checkout_page($user_id="")
	{
		$redirect="";
		$delivery_type=$this->input->post('delivery_type');
		$data['offer_product_id']=$this->input->post('offer_product_id');
		$remarks=$this->input->post('remarks');
		$this->session->set_userdata('delivery_type',$delivery_type);
		$this->session->set_userdata('remarks',$remarks);
	
		$login=$this->front_model->is_user_loggedin();
		if($login)
		{
		$data['delivery']=0;	
		$data['delivery_tax']=$data['discount']=$data['extra_charge']=$data['min_order']=$data['actual_delivery']=$data['area']=0;
		
		$actual_total=$this->input->post('actual_total');
		$delivery_type=$this->input->post('delivery_type');
		$data['items_total']=round($actual_total,2);
		if($delivery_type=='home delivery')
		{
		/* $data['delivery']=$this->input->post('delivery'); */
		$data['user_address']=$this->front_model->get_all_address($this->session->userdata('user_id'));	
		if($data['user_address'])
		{
			$data['delivery']=$data['user_address'][0]->extra_charge + $data['user_address'][0]->charge;
			$data['area']=$data['user_address'][0]->area_id;
			$data['extra_charge']=$data['user_address'][0]->extra_charge;
			$data['min_order']=$data['user_address'][0]->min_order;
			$data['actual_delivery']=$data['user_address'][0]->charge - $data['user_address'][0]->extra_charge;
		}	else
			{
				$redirect='choose_address';
			
			}
		}
			
			if($this->session->userdata('discount'))
			{
			$data['discount']=$this->session->userdata('discount');
			}
			$data['order_total']=round(($actual_total+$data['delivery']-$data['discount']),2);
		
			$data['total_before_vat']=round($data['order_total']/1.05,2);
			$data['tax_amount']=round(($data['order_total']-$data['total_before_vat']),2);
			$data['item_details']=$_SESSION['cart'];
			
			$data['delivery_type']=$delivery_type;
			$data['remarks']=$this->input->post('remarks');
			
			$data['promolist']=$this->front_model->get_promocodes();
			$user_id=$this->session->userdata('user_id');
			$data['customer']=$this->front_model->get_user_additional_data($user_id);
			$data['actual_total']=$actual_total;
			$data['reward_point']=$this->front_model->get_reward_point($this->session->userdata('user_id'));
			
			if($redirect=="")
			{
			$this->load->view('frontend/header');
			$this->load->view('frontend/checkout',$data);
			$this->load->view('frontend/footer');
			}
			else
			{
				$this->load->view('frontend/header');
				$this->load->view('frontend/choose-address',$data);
				$this->load->view('frontend/footer');
			}
	
	}
	else
	{
		$data['request']="cart";	
		$data['role']="customer";
		$this->load->view('frontend/header-intro');
		$this->load->view('frontend/login',$data);
		$this->load->view('frontend/footer-intro');
	}


		
	}
	public function choose_address()
	{
		$this->session->set_userdata('remarks',$this->input->post('remarks'));
		$this->session->set_userdata('delivery_type',$this->input->post('delivery_type'));
	
		$login=$this->front_model->is_user_loggedin();
		if($login)
		{
			$data['remarks']=$this->input->post('remarks');
			$data['delivery_type']=$this->input->post('delivery_type');
			$data['offer_product_id']=$this->input->post('offer_product_id');
			$data['actual_total']=$this->input->post('actual_total');

			$this->load->view('frontend/header');
			$this->load->view('frontend/choose-address',$data);
			$this->load->view('frontend/footer');	
		}
		else
		{
			$data['request']="cart";	
			$data['role']="customer";
			$this->load->view('frontend/header-intro');
			$this->load->view('frontend/login',$data);
			$this->load->view('frontend/footer-intro');
		}

	}
	public function add_new_address()
	{
		$user=$this->front_model->is_user_loggedin();
		if($user)
		{
		$data['user_id']=$this->session->userdata('user_id');
		$data['building_floor_no']=$this->input->post('building_floor_no');
		$data['address']=$this->input->post('address');
		$data['current_location']=$this->input->post('current_location');
		$data['address_type']=$this->input->post('address_type');
	
		$area =$this->input->post('area');
	
		if($area)
		{
			$data['area_id']=$this->front_model->add_area($area);
		/* 	print_r($data['area_id']); exit; */
			$exist=$this->front_model->check_address_exists($data['user_id'],$data['address_type']);
			if($exist)
			{
			echo $result=$this->front_model->update_address($data);
			}
			else
			{
			echo $result=$this->front_model->add_new_address($data);
			}

		}
		}
		else
		{
			redirect('login');
		}
	}
	public function offerslist()
	{
		$data['offerslist']=$this->front_model->get_offers();
		$this->load->view('frontend/header');
		$this->load->view('frontend/offers',$data);
		$this->load->view('frontend/footer');
	}
	public function orderslist()
	{
		$login=$this->front_model->is_user_loggedin();
		if($login)
		{
		$user_id=$this->session->userdata('user_id');	
		$data['orderslist']=$this->front_model->get_orders($user_id);
		foreach($data['orderslist'] as $index=>$value)
		{
			$value->status_name=$this->front_model->get_status_name($value->status);
		}
		$this->load->view('frontend/header');
		$this->load->view('frontend/orders',$data);
		$this->load->view('frontend/footer');
		}
		else
		{
		$data['request']="my-orders";	
		$data['role']="customer";
		$this->load->view('frontend/header-intro');
		$this->load->view('frontend/login',$data);
		$this->load->view('frontend/footer-intro');
		}

	}
	/* public function mobile_page()
	{
	 $data['items_total']=$this->input->post('actual_total');
	 $this->load->view('frontend/header');
	 $this->load->view('frontend/mobile',$data);
	 $this->load->view('frontend/footer');
	} */
	public function order_success()
	{
		$this->load->view('frontend/order-success');
	}
	public function single_product($prod_id="")
	{
		$data['addons']=array();
		$data['prod_detail']=$this->front_model->get_single_product($prod_id);
	
		if($data['prod_detail'])
		{
			if($data['prod_detail']->mrp >$data['prod_detail']->price)
				{
					$data['prod_detail']->discount= round(((($data['prod_detail']->mrp)-($data['prod_detail']->price))/($data['prod_detail']->mrp))*100);
				}
		if($data['prod_detail']->addons != 'null' && !empty($data['prod_detail']->addons))
		{
			$addonids=implode(',',json_decode($data['prod_detail']->addons));
			$data['addons']=$this->front_model->get_addons($addonids);
		}	
		$data['variants']=$this->front_model->get_secondary_product_det($prod_id);
	/* 	$data['addons']=$this->front_model->get_addons($data['prod_detail']->category); */
		$data1['page_head']='Product Details';
		$this->load->view('frontend/header1',$data1);
		$this->load->view('frontend/single-product',$data);
		$this->load->view('frontend/footer');
		}
		else
		{
			redirect('home');
		}
	}
	public function view_pages($page_name)
	{
		$this->load->view('frontend/header');
		$this->load->view($page_name);
		$this->load->view('frontend/footer');

	}

	public function add_to_cart()
	{
		$total=$success=0;
		$cart_count=0;
		$variants=$this->input->post('variants');
		$data['product_id']=$this->input->post('prod_id');
		$data['name']=$this->input->post('prod_name');
		$data['variants']=$variants;
		if($data['variants']=="offer-product")
		{
			$data['type']='offer-product';
		}
		else
		{
		$data['type']='product';
		}
		$addon_price=$this->input->post('addon_tot');
		$addon=$this->input->post('add_on');	
		
		if(!isset($_SESSION['cart']))
		{
			$_SESSION['cart']=array();
		}
		
		if(!isset($_SESSION['cart'][$data['variants'].'_'.$data['product_id']]))
		{
			$cart=array(
			'product_id'=>$data['product_id'],
			'product_name'=>$data['name'],
			'product_image'=>$this->front_model->get_product_image($data['product_id'],$data['variants']),
			'product_variant'=>$data['variants'],
			'product_price'=>$this->input->post('price'),
			'product_count'=>$this->input->post('quantity'),
			'product_total'=>($this->input->post('price'))*($this->input->post('quantity')),
			'type'=>$data['type']
			
			);
			$_SESSION['cart'][$data['variants'].'_'.$data['product_id']]=$cart;
		}
		else
		{
			if($data['type'] !='offer-product')
			{
			
				$product_count=$this->input->post('quantity');
				$product_total=$product_count*$this->input->post('price');
				//$total=$total+$value['product_total'];
				//$cart_count=$cart_count+$value['product_count'];
				$_SESSION['cart'][$data['variants'].'_'.$data['product_id']]['product_count']=$_SESSION['cart'][$data['variants'].'_'.$data['product_id']]['product_count']+$product_count;
				$_SESSION['cart'][$data['variants'].'_'.$data['product_id']]['product_total']=($product_count*$product_total)+$_SESSION['cart'][$data['variants'].'_'.$data['product_id']]['product_total'];
			}
			else
			{
				$success=1;
			}
				
		}
	
		if($addon_price !=0)
		{
			$data=array();
			$data1=array();
			$add_on=json_decode($addon,true);
			foreach($add_on as $index=>$value)
			{
			$data['product_id']=$value['addon_id'];
			$data['name']=$value['addon_name'];	
			// $flag=false;
			// $cart=$this->session->userdata('cart');
			if(!isset($_SESSION['cart']['ad_'.$value['addon_id']]))
			{
				$cart=array(
					'product_id'=>$value['addon_id'],
					'product_name'=>$value['addon_name'],
					'product_price'=>$value['addon_price'],
					'product_count'=>$value['addon_count'],
					'product_total'=>$value['addon_count']*$value['addon_price'],
					'product_image'=>"",
					'product_variant'=>"",
					//$total=$total+$newtocart['product_total'];
					//$cart_count=$cart_count+$newtocart['product_count'];
					'type'=>'addon'
				);
				$_SESSION['cart']['ad_'.$value['addon_id']]=$cart;
			}
			else
			{
				//$total=$total+$val['product_total'];
				//$cart_count=$cart_count+$val['product_count'];
				$_SESSION['cart']['ad_'.$value['addon_id']]['product_count']=$_SESSION['cart']['ad_'.$value['addon_id']]['product_count']+$value['addon_count'];
				$_SESSION['cart']['ad_'.$value['addon_id']]['product_total']=($value['addon_count']*$value['addon_price'])+$_SESSION['cart']['ad_'.$value['addon_id']]['product_total'];
			}
			
		}
	}
		$cart_count=$cart_total=0;
		/* print_r($_SESSION['cart']);  */
		foreach($_SESSION['cart'] as $index=>$value)
		{
			$cart_total=$cart_total+$value['product_total'];
			$cart_count=$cart_count+$value['product_count'];
		}
			$this->session->set_userdata('cart_total',$cart_total);
			$this->session->set_userdata('cart_value',$cart_count);	
		echo json_encode(array('result'=>$success,'cart_value'=>$this->session->userdata('cart_value')));
	
	
	}

	public function get_product_sec_details()
	{
		$data['variant_id']=$this->input->post('variant_id');
		$data['prod_id']=$this->input->post('prod_id');
		$result=$this->front_model->get_product_sec_details($data);
		echo json_encode($result);
	}
	public function order_details($order_id)
	{
		$data=array();
		$data=$this->front_model->get_single_order($order_id);
		$this->load->view('frontend/header');
		$this->load->view('frontend/order_details',$data);
		$this->load->view('frontend/footer');
	}

	public function get_delivery_charge($area="")
	{
		$area=$this->input->post('area');
		$charge_det=$this->front_model->get_delivery_charge($area);
		echo json_encode($charge_det);
	}

	

	public function apply_coupon()
	{
		$promo=array();
	/* 	$this->session->set_userdata('discount',0);
		$this->session->set_userdata('promoid',''); */
		$amount=$discount=$del_charge=$selpromo=0;
		$data['promocode']=$this->input->post('promocode');
		$data['phone_no']=$this->input->post('phone_no');
		$del_charge=$this->input->post('del_charge');
		$subtot=$this->input->post('subtot');
		$amount=$del_charge+$subtot;

		
		$result=$this->front_model->check_promocode($data['promocode'],$data['phone_no']);
		$status="null";
		$disc=0;
		
		if( count($result) > 0)
    	{
		
       if($amount>=$result[0]['min_order'])
       {
       if($result[0]['user_usage'] != 'null')
       {
		   if($result[0]['user_usage'] <= $result[0]['no_of_usage'] && $result[0]['user_usage'] !=0)
		   {
        if($result[0]['promo_category']=='tcv')
        {		
				$discount=$result[0]['value'];
                $amount=$amount-$result[0]['value'];
		
        }
        else if($result[0]['promo_category']=='perc')
        {
				$discount=$amount*($result[0]['value']/100);
				if($discount >$result[0]['max_discount'] )
				{
					$discount=$result[0]['max_discount'];
				}
                $amount=$amount-($amount*($result[0]['value']/100));
	
        }
		else if($result[0]['promo_category']=='items')
		{
			$name="";
			$carted_products=$_SESSION['cart'];
			$products=json_decode($result[0]['products']);
		
			$total="";
			$no=true;
			$yes=false;
			
			if($_SESSION['cart'])
			{
			foreach($_SESSION['cart'] as $index=>$cart)
			{
			
			  if(in_array($cart['product_id'],$products))
					{
						$yes=true;
					if($cart['product_total']  >= $result[0]['min_order'])	
					{
						$val=$amount*($result[0]['value']/100);
						if($val >$result[0]['max_discount'])
						{
							$val=$result[0]['max_discount'];
						}
						$discount=$discount+$val;
					}
					else
					{
						$name=$name.'-'.$cart->product_name;
						$status="You should purchase $name for AED ".$result[0]['min_order']." minimum to use this promocode";
					}
					
					}
					else
					{
						
						$no=false;
					}
			
			}
		}
			if($yes==false and $no==false)
			{
				$status="You should purchase ( ".implode(' OR ',$result[0]['product_names'])." )to use this promocode";
			}
			
		
		
		$amount=$amount-$discount;
		/* $this->front_model->update_promocode_usage($result[0]['id'],$data['phone_no']); */
	
	}
	
		
       }
	   else
	   {
			$status="No. Of Usage Exceeded";  
	   }
	}
       else
       {
        $status="You are not allowed to use this promocode";       
       }}
       else
       {
        $status= "You should purchase for AED ".$result[0]['min_order']." minimum to use this promocode";
       }
    }
    else
    {
		$status= "Invalid Promocode";    
    }
	$this->session->set_userdata('discount',round($discount,2));
	$this->session->set_userdata('promoid',$data['promocode']);
	$disc=$this->session->userdata('discount');
	$this->session->set_userdata('cart_total',$amount-$del_charge);
	echo json_encode(array('status'=>$status,'discount'=>$disc,'total'=>$amount));
	}

	

	public function confirm_payment()
	{
		/* $login=$this->front_model->is_user_loggedin();
		if($login)
		{ */
		$this->db->trans_start();
		$data=array();
		$data1=array();
		$customer_id=$this->input->post('id');
		
		$data['user_id']=$this->session->userdata('user_id');
		$data['email_id']=$this->input->post('email_id');
		$data['area']=$this->input->post('area');
		$data['address']=$this->input->post('address');
		$data['addresstype']=$this->input->post('addresstype');
		$data['loc_latitude']=$this->input->post('latitude');
		$data['loc_longitude']=$this->input->post('longitude');
		$data['reward_point']=$this->input->post('reward_point');
		if($customer_id !="")
		{
			$data['id']=$customer_id;
			$this->front_model->update_user_additional_data($data);
		}
		else
		{
			$customer_id=$this->front_model->insert_user_additional_data($data);
		}
	
		$data1['delivery_type']=$this->input->post('delivery_type');
		$data1['payment_type']=$this->input->post('payment_type');
		$data1['customer_id']= $this->session->userdata('user_id');
		$data1['area']=$this->input->post('area');
		$data1['loc_latitude']=$this->input->post('latitude');
		$data1['loc_longitude']=$this->input->post('longitude');
		$data1['status']=$this->input->post('status');
		$data1['items']="";
		foreach($_SESSION['cart'] as $index=>$value)
		{
			$data1['items'].=$value['product_name'].",";
		}
		$data1['items']=rtrim($data1['items'],',');
		$data1['cart_total']=$this->input->post('cart_total');
		$data1['discount']=$this->input->post('discount');
		$data1['order_total']=$this->input->post('order_total');
		$data1['delivery_charge']=$this->input->post('delivery_charge');
		$data1['total_before_vat']=$this->input->post('total_before_vat');
		$data1['invoice_no']="INV-".rand(1,100);
		$data1['remarks']=$this->input->post('remarks');
		$data1['tax']=$this->input->post('tax');
		$data1['tax_amount']=$this->input->post('tax_amount');
		$data1['promo_code']=$this->input->post('promo_code');
		$data1['reward_redeemed']=$this->input->post('reward_redeemed');
		if($data1['reward_redeemed']=="yes")
		{
			$data1['redeemed_points']=$this->input->post('redeemed_points');
		}
		$offer_product_id=$this->input->post('offer_product_id');
		$flag=1;
		if($this->input->post('stripeToken')){
			$data['email_id']="";
			$token  = $this->input->post('stripeToken');
			// $name = $postData['name'];
			$email = $data['email_id'];
			
			// Add customer to stripe
			$customer = $this->stripe_lib->addCustomer($email, $token);
			if($customer){
				// Charge a credit or a debit card
				$charge = $this->stripe_lib->createCharge($customer->id, $data1['items'], $data1['order_total']);
				if($charge){
					// Check whether the charge is successful
					if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){
						// Transaction details 
						$transactionID = $charge['balance_transaction'];
						$paidAmount = $charge['amount'];
						$paidAmount = ($paidAmount/100);
						$paidCurrency = $charge['currency'];
						$payment_status = $charge['status'];
						
						$data1['taxation_id']= $transactionID;
						$data1['payment_status']=$payment_status;
						
						// If the order is successful
						if($payment_status == 'succeeded'){
							$flag=1;
						}
						else
						{
							$flag=0;
							$apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
							$res['status'] = 'Transaction has been failed!'.$apiError;
						}
					}
				}

			}
		}
		if($flag==1)
		{
		$order_id=$this->front_model->insert_order_details($data1);
	
		$promo_upd=$this->front_model->update_promocode_usage($data1['promo_code'],$_SESSION['userdata']['mobile']);
		if($offer_product_id)
		{
			$offer_usage=$this->front_model->update_offer_product_usage($offer_product_id,$this->session->userdata('user_id'));	
		}
	
		
		if($order_id !="")
		{
			foreach($_SESSION['cart'] as $index=>$value)
			{
				$value['order_id']=$order_id;
				$this->front_model->insert_ordered_items($value);
			}	
		$this->front_model->update_product_stock();
	
		$maildata['name']=$_SESSION['userdata']['name'];
		$maildata['email_id']=$data['email_id'];
		$maildata['discount']=$data1['discount'];
		$maildata['cart_total']=$data1['cart_total'];
		$maildata['tax_amount']=$data1['tax_amount'];
		$maildata['total_before_vat']=$data1['total_before_vat'];
		$maildata['delivery_charge']=$data1['delivery_charge'];
		$maildata['order_total']=$data1['order_total'];
		$maildata['items']=$data1['items'];
		$maildata['order_id']=$order_id;

		//$success=$this->send_success_mail($maildata);

	
		}
		if($order_id >0 && $customer_id)
		{
			$this->session->set_userdata('cart_value',0);
			unset($_SESSION['cart']);
			$res['status']='success';
			$res['redirect_url']=base_url().'orderlist';
		}
		else
		{
			$res['status']='failed';
		}
	
	
		$this->session->set_userdata('cart_total',0);
		$this->session->set_userdata('discount',0);
		$this->session->set_userdata('promoid','');
		$this->db->trans_complete();
		}
		echo json_encode($res);
	/* }
	else
	{
		$data['request']="cart_page";	
		$data['role']="customer";
		$this->load->view('frontend/header-intro');
		$this->load->view('frontend/login',$data);
		$this->load->view('frontend/footer-intro');
	} */
	}

	public function send_success_mail($data)
	{
		$this->load->library('email');
		$config=array(
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
		);

		$this->email->initialize($config);
		$this->email->from('fathimarestaurant@gravity.com', 'Order Success Mail');
		$this->email->to($data['email_id']);
		$this->email->subject('Order Success Mail');
		$emaildescription=$this->load->view('frontend/email/order_confirm_mail',$data,TRUE);
		$this->email->message($emaildescription);
		$result=$this->email->send();   
		$this->email->from('orderreceived@gravity.com', 'New Order Received Mail');
		$this->email->to('princiaks@gmail.com');
		$this->email->subject('Order Success Mail');
		$emaildescription=$this->load->view('frontend/email/order_received_mail',$data,TRUE);
		$this->email->message($emaildescription);
		$result=$this->email->send();   
		return $result;
	}

	public function deleteproduct_from_cart()
	{
		$cart_id=$this->input->post('cart_id');
		unset($_SESSION['cart'][$cart_id]);
		$cart_count=$cart_total=0;
		foreach($_SESSION['cart'] as $index=>$value)
		{
			$cart_total=$cart_total+$value['product_total'];
			$cart_count=$cart_count+$value['product_count'];
		}
			$this->session->set_userdata('cart_total',$cart_total);
			$this->session->set_userdata('cart_value',$cart_count);	
	}

	public function update_carted_product_count()
	{
		$msg=$val="";
		$product_total=0;
		$data['product_id']=$this->input->post('product_id');
		$data['product_variant']=$this->input->post('variant');
		$data['type']=$this->input->post('type');
	/* 	$result=$this->front_model->update_carted_product_count($data);
		echo json_encode($result); */
		$result=$this->front_model->get_maxsaleand_status($data);
		$data['quantity']=$this->input->post('quantity');
		$data['cart_id']=$this->input->post('cart_id');
		if($result->max_sale <= 0 || $result->status =="Out Of Stock")
		{
				$msg="Out Of Stock";
				$val=0;
		} 
		else if($data['quantity'] > $result->max_sale)
		{
				$msg="Only $result->max_sale Available";
				$val=$result->max_sale;
		}
		else
		{
			$product_total=$_SESSION['cart'][$data['cart_id']]['product_total']=$_SESSION['cart'][$data['cart_id']]['product_price']*$data['quantity'];
			$_SESSION['cart'][$data['cart_id']]['product_count']=$data['quantity'];
		}
		$cart_count=$cart_total=0;
		/* print_r($_SESSION['cart']);  */
		foreach($_SESSION['cart'] as $index=>$value)
		{
			$cart_total=$cart_total+$value['product_total'];
			$cart_count=$cart_count+$value['product_count'];
		}
			$this->session->set_userdata('cart_total',$cart_total);
			$this->session->set_userdata('cart_value',$cart_count);	
		echo json_encode(array('msg'=>$msg,'val'=>$val,'cart_value'=>$cart_count,'product_total'=>$product_total));
	}
	public function signout()
	{
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
                $this->session->unset_userdata($key);
		}
    $this->session->sess_destroy();
    redirect('home');
		
	}

	public function download_receipt()
	{
		$data=array();
		$params=array('invoice_no','order_id','order_date','customer_name','customer_ph','customer_address','total_count','tax','tax_amount','order_total','delivery_boy','subtotal','discount','del_charge','del_tax');
	
		foreach($params as $param)
		{
			$data[$param]=$this->input->post($param);
		}
		$items=$this->front_model->get_ordered_product_list($data['order_id']);
	
		$this->fpdf->Image(base_url().'/logo/fathimalogo.jpg',10,2,15);
		$this->fpdf->SetFont('Times','B',10);
		$this->fpdf->Cell(65,2,'FATHIMA',0,1,'C');
		$this->fpdf->Cell(65,1,'',0,1);
		$this->fpdf->SetFont('Times','B',6);
		$this->fpdf->Cell(65,2,'RESTAURANT',0,1,'C');
		$this->fpdf->SetFont('Times','',5);
		$this->fpdf->Cell(65,2,'Near Port and Customs, Ajman, UAE',0,1,'C');
		$this->fpdf->Cell(65,2,'Tel:06-7474550, Mob:052 520 3040',0,1,'C');
		$this->fpdf->Cell(65,2,'fathimarose900@gmail.com',0,1,'C');
		$this->fpdf->Cell(65,2,'TRN : 100492247000003',0,1,'C');
		$this->fpdf->Cell(65,2,'TAX INVOICE',0,1,'C');
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);
		$this->fpdf->Cell(20,1,'',0,1);
		$this->fpdf->Cell(15,2,'Invoice No:',0,0);
		$this->fpdf->Cell(20,2,$data['invoice_no'],0,0);
		$this->fpdf->Cell(5,2,'Date:',0,0);
		$this->fpdf->Cell(20,2,$data['order_date'],0,1);
		$this->fpdf->Cell(15,2,'Customer Name:',0,0);
		$this->fpdf->Cell(25,2,$data['customer_name'],0,1);
		$this->fpdf->Cell(15,2,'Address:',0,0);
		$this->fpdf->Cell(45,2,$data['customer_address'],0,1);
		$this->fpdf->Cell(15,2,'Customer Mob:',0,0);
		$this->fpdf->Cell(25,2,$data['customer_ph'],0,1);

		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);

		$this->fpdf->Cell(30,2,'Item',0,0);
		$this->fpdf->Cell(10,2,'Price',0,0);
		$this->fpdf->Cell(10,2,'Qty',0,0);
		$this->fpdf->Cell(10,2,'Value',0,1);
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);
		if($items)
		{
			foreach($items as $index=>$value)
			{
				$this->fpdf->Cell(35,2,$value->product_name,0,0);
				$this->fpdf->Cell(10,2,$value->product_price,0,0);
				$this->fpdf->Cell(5,2,'X '.$value->product_count,0,0);
				$this->fpdf->Cell(10,2,$value->product_total,0,1,'R');

			}
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1);
		$this->fpdf->Cell(10,1,'',0,1);
		$this->fpdf->Cell(50,2,'Subtotal:',0,0);
		$this->fpdf->Cell(10,2,$data['subtotal'],0,1,'R');
		$this->fpdf->Cell(50,2,'Promo Disc:',0,0);
		$this->fpdf->Cell(10,2,$data['discount'],0,1,'R');
		$this->fpdf->Cell(50,2,'Taxes:',0,0);
		$this->fpdf->Cell(10,2,$data['tax_amount'],0,1,'R');
		$this->fpdf->Cell(50,2,'Delivery Charge:',0,0);
		$this->fpdf->Cell(10,2,$data['del_charge'],0,1,'R');
		$this->fpdf->Cell(50,2,'Tax For Delivery:',0,0);
		$this->fpdf->Cell(10,2,$data['del_tax'],0,1,'R');
		
		$this->fpdf->Cell(65,1,'----------------------------------------------------------------------------------------------------',0,1); 
		$this->fpdf->SetFont('Times','B',6);
		$this->fpdf->Cell(15,2,'',0,0);
		$this->fpdf->Cell(40,2,'Total',0,0);
		$this->fpdf->Cell(5,2,$data['order_total'],0,1,'R');
		$this->fpdf->Cell(60,1,'--------------------------------------------------------------------------------------',0,1);
		$this->fpdf->SetFont('Times','I',4);
		$this->fpdf->Cell(10,2,'Delivery Boy:',0,0);
		$this->fpdf->Cell(30,2,$data['delivery_boy'],0,0);
		}




		


$filename = $data['invoice_no'].'.pdf';

if (!is_dir( 'pdfs/tax_invoice')) {
mkdir('pdfs/tax_invoice', 0777, TRUE);		   
}
$this->fpdf->Output( 'pdfs/tax_invoice/'. $filename, 'F'); 
echo json_encode(array(
'path' => 'pdfs/tax_invoice/'. $filename,
'url'  => base_url( 'pdfs/tax_invoice/' . $filename )
));

	}

	public function forget_password_view()
	{
		$this->load->view('frontend/header-intro');
		$this->load->view('frontend/forgot-password');
		$this->load->view('frontend/footer-intro');

	}

	public function forgot_password()
	{
		$this->load->library('email');
		$message="";
		$email=$this->input->post('email');
		$result=$this->front_model->check_user_email_exist($email);
		if($result)
		{
			$data['otp']=rand(1000,9999);
			$data['name']=$result->name;
		
			$data['email']=$email;


			
		$config=array(
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
		);

		$this->email->initialize($config);
		$this->email->from('forgotpassword@fathima.com', 'Forgot Password');
		$this->email->to($email);
		$this->email->subject('Forgot Password Mail');
		$emaildescription=$this->load->view('frontend/email/forgot_password',$data,TRUE);
		$this->email->message($emaildescription);
		$result1=$this->email->send(); 
	/* 	$result1=1; */   
		if($result1)
		{
			$message="";
			$this->session->set_userdata('fp_otp',$data['otp']);
			$this->session->set_userdata('fp_email',$email);
		
		}
		}
		else
		{
			$message="Email Id Not Fround";
		}

		echo json_encode(array('message'=>$message,'otp'=>$this->session->userdata('fp_otp')));

	}

	public function otp_check()
	{
		$redirect="";
		$message="";
		$otp=$this->input->post('otp');
		if($this->session->userdata('fp_otp'))
		{
			if($this->session->userdata('fp_otp')==$otp)
			{
				$redirect=base_url().'change-password';
				$message="success";
			}
			else
			{
				$message="OTP entered is incorrect";
			}
		}


		echo json_encode(array('redirect'=>$redirect,'message'=>$message));

	}

	public function change_password_view()
	{
	$this->load->view('frontend/header-intro');	
	$this->load->view('frontend/change-password');	
	$this->load->view('frontend/footer-intro');	

	}
	public function change_password()
	{
		if($this->session->userdata('fp_otp'))
		{
		$data['email']=$this->session->userdata('fp_email');
		$data['password']=$this->input->post('password');
		$result=$this->front_model->update_password($data);
		echo $result;
		}

	}
	public function otp_view()
	{
	$this->load->view('frontend/header-intro');	
	$this->load->view('frontend/otp-check');	
	$this->load->view('frontend/footer-intro');
	}

	public function my_profile()
	{
		$user=$this->front_model->is_user_loggedin();
		if($user)
		{
			$userid=$this->session->userdata('user_id');
			$data['userdetails']=$this->front_model->get_user_details($userid);
			$this->load->view('frontend/header');
			$this->load->view('frontend/user-profile',$data);	
			$this->load->view('frontend/footer');
		}
		else
		{
			redirect('login');
		}
			
	}

	public function set_current_location()
	{
		$current_location=array();
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');
		
		$geolocation = $latitude.','.$longitude;
		$request = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=true_or_false&key=AIzaSyCPwDMY49ouRqerBD7AcV50apNHdKjYcSU'; 
		$file_contents = file_get_contents($request);
		$json_decode = json_decode($file_contents);
		if(isset($json_decode->results[0])) {
    	$response = array();
		foreach($json_decode->results[0]->address_components as $addressComponet) {
			if(in_array('political', $addressComponet->types)) {
					$response[] = $addressComponet->long_name; 
			}
		}

		if(isset($response)){

		/* 	foreach($response as $resp)
			{ */
				echo json_encode($response);
			/* } */
		}
		else
			{
				echo "";
			}
  	}

	}

	public function remove_user_address()
	{
		$user=$this->front_model->is_user_loggedin();
		if($user)
		{
			$userid=$this->session->userdata('user_id');
			$address_id=$this->input->post('address_id');
			$address_count=$this->front_model->remove_user_address($address_id,$userid);
			echo $address_count;
		}
		else
		{
			redirect('login');
		}
	}

}
