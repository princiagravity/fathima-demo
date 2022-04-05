<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeliveryController extends CI_Controller {

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
        $this->load->model('delivery_model');
    }
	public function index()
	{
		$this->load->view('deliveryboy/header-intro');
		$this->load->view('deliveryboy/login');
		$this->load->view('deliveryboy/footer-intro');
	}
	public function login()
	{
		$this->load->view('deliveryboy/header-intro');
		$this->load->view('deliveryboy/login');
		$this->load->view('deliveryboy/footer-intro');
	}
	public function user_login()
	{
		
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$sucess=$this->delivery_model->check_user_exist($username,$password);
		if($sucess==1)
		{

			$response=array('success'=>$sucess,'redirect_url'=>base_url().'index.php/DeliveryController/home');
		}
		else
		{
			$response=array('success'=>$sucess,'redirect_url'=>'');
		}
		echo json_encode($response);
		die();
	}
	public function home()
	{
		$data['orders']=$this->delivery_model->get_order_list('today');
		$this->load->view('deliveryboy/header');
		$this->load->view('deliveryboy/home',$data);
		$this->load->view('deliveryboy/footer');
	}

	public function update_order_details()
	{
		$data=array(
			'status'=>$this->input->post('status'),
			'delivery_boy_id'=>$this->session->userdata('user_id'),
			'id'=>$this->input->post('order_id')
		);
		$this->delivery_model-> update_order_details($data);

	}
	public function forget_password()
	{
		$this->load->view('deliveryboy/header-intro');
		$this->load->view('deliveryboy/forget-password');
		$this->load->view('deliveryboy/footer-intro');
	}
	public function orderslist()
	{
		$data['orderlist']=$this->delivery_model->get_order_list();
		$this->load->view('deliveryboy/header');
		$this->load->view('deliveryboy/orderslist',$data);	
		$this->load->view('deliveryboy/footer');
	}
	public function signout()
	{
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
                $this->session->unset_userdata($key);
		}
    $this->session->sess_destroy();
    redirect('DeliveryController');
		
	}

	public function order_details($order_id)
	{
		$data=array();
		$data=$this->delivery_model->get_single_order($order_id);
		$this->load->view('deliveryboy/header');
		$this->load->view('deliveryboy/order_details',$data);
		$this->load->view('deliveryboy/footer');
	}
}
