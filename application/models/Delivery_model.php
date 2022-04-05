<?php
class Delivery_model extends CI_Model {

public function __construct()
{
        $this->load->database();
       
}
public function check_user_exist($username,$password)
{
$sucess=1;        
$query=$this->db->query("select id,username,mobile,name,role from user_details where mobile='$username' and password='$password'");
$result=$query->row();
if($result)
{
        $userdata=array(
                'user_id'=>$result->id,
                'username'=>$result->username,
                'name'=>$result->name,
                'mobile'=>$result->mobile,
                'role'=>$result->role
        );

        $this->session->set_userdata('userdata',$userdata);
        $this->session->set_userdata('user_id',$result->id);
      
        $sucess=1;
}
else
{
        $sucess=0;
}

return $sucess;
}
public function get_order_list($today="")
{
     
        $result=array();
        $user_id=$this->session->userdata('user_id');
        if($user_id)
        {        
        if($today != "")
        {
                $today="and order_time  like '".date("Y-m-d")."%'";
        }
        $query=$this->db->query("select id,customer_id,order_time,order_total,loc_latitude,loc_longitude,payment_type,status from order_details where delivery_boy_id = $user_id $today ORDER by order_time DESC");
        $result=$query->result();
        if($result)
        {
                foreach ($result as $index=>$value)
        {
                $que=$this->db->query("select name,address,addresstype,mobile from user_add_details where user_id=$value->customer_id");
                $value->customer=$que->row();
                $value->status_name=$this->get_status_name($value->status);
        }
        }
      
}
return $result;
}
public function get_single_order($order_id)
 {
     $query   = $this->db->query("SELECT id,customer_id,total_before_vat,delivery_boy_id,area,cart_total,discount,invoice_no,order_time,tax,delivery_charge,delivery_tax,tax_amount,order_total,payment_type,status from order_details where id=$order_id");
     $data['order_details'] = $query->row();

     $query=$this->db->query("SELECT id,name,address,addresstype,area,mobile,email_id from user_add_details where user_id=".$data['order_details']->customer_id);
     $data['customer_details']=$query->row();
    if($data['customer_details'])
    {
        $data['customer_details']->area_name=$this->get_area_name($data['customer_details']->area);
    }
            
    
     $data['status']=$this->get_status_name($data['order_details']->status);
    
     $query   = $this->db->query("SELECT id,product_id,product_name,product_count,product_price,product_total,type from carted_item_details where order_id=$order_id");
     $data['item_details'] = $query->result();
     return $data;
 }

 public function get_area_name($id="")
 {
     $query   = $this->db->query("SELECT name from area_master where id=$id");
     $results = $query->row();
     if($results)
     {
         return $results->name;
     }
     else
     {
         return null;
     }
 }

 public function get_status_name($id)
 {
     $query   = $this->db->query("SELECT name from status_master where id=$id");
     $results = $query->row();
     if($results)
     {
         return $results->name;
     }
     else
     {
         return null;
     }

 }

public function update_order_details($data=array())
{
        if($data)
        {
                $this->db->where(array('id'=> $data['id'],'delivery_boy_id'=>$data['delivery_boy_id']));
                $this->db->update('order_details', array('status'=>$data['status']));
        }
}

}


?>