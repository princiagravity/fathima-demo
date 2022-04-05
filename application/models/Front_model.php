<?php
class Front_model extends CI_Model {

public function __construct()
{
        $this->load->database();
}
public function check_user_exist($username,$password)
{
$sucess=0;        
$query=$this->db->query("select id,username,mobile,name,email_id,role from user_details where mobile='$username' and password='$password' and role='customer'");
$result=$query->row();
if($result)
{
        $userdata=array(
                'user_id'=>$result->id,
                'username'=>$result->username,
                'name'=>$result->name,
                'email_id'=>$result->email_id,
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
public function check_username_exist($username)
{
$sucess=1;        
$query=$this->db->query("select username from user_details where username='$username'");
$result=$query->row();
if($result)
{
      
        $sucess=1;
}
else
{
        $sucess=0;
}

return $sucess;

}
public function is_user_loggedin()
 {
         if($this->session->userdata('user_id') && $this->session->userdata('user_id')!=1)
         {

                return 1;
         }
         else
         {
                 return 0;
         }
 }
 public function insert_user($data)
 {
        $result= $this->db->insert('user_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
 }

 public function get_lists()
 {
         $data=array();
         $data['slider_list']=$this->get_sliders();
         $data['category_list']=$this->get_product_categorylist();
         $data['product_list']=$this->get_product_list();
         $data['offers']=$this->get_offers();
         $data['offer_products']=$this->get_offer_products();
        return $data;
 }
 public function get_search_productlist($key)
 {
        $query   = $this->db->query("SELECT id,name from product_details where name like '%$key%' and status = 'In Stock' and p_display=1 order by name");
        $results = $query->result();
        return $results;
 }




 public function get_sliders()
 {
     $query   = $this->db->query("SELECT id,name,link,image_url FROM slider_details where status !='Deleted'");
     $results = $query->result();
     return $results;
 }
public function delete_cart($id="")
{
        $where="";
        if($id != "")
        {
                $where="where id=$id";
        }
        $result=$this->db->query("delete from cart_details $where");
        return $result;

}
 public function get_product_categorylist()
 {
        $query   = $this->db->query("SELECT id,name,image_url FROM category_master where status !='Deleted'");
        $results = $query->result();
        return $results;
 }
 public function get_product_list($cat_id="")
 {
        $where="product_details.status !='Deleted' and product_details.visibility=1 and product_details.p_display=1";
        if($cat_id!="")
        {
                $where="product_details.status !='Deleted' and product_details.category='$cat_id' and product_details.p_display=1";
        }
        $query   = $this->db->query("SELECT product_details.*,variants_master.name as variant_name FROM product_details join variants_master on variants_master.id=product_details.variants where $where");
        $results = $query->result();
        foreach ($results as $index=>$value)
        {
            $value->stock=$this->get_stock_status($value->id);
            if($value->mrp > $value->price)
            {
                $value->discount= round(((($value->mrp)-($value->price))/($value->mrp))*100);
            }
        }
        return $results;
 }
 public function get_stock_status($product_id)
 {
     if($product_id != "")
     {
     $query=$this->db->query("SELECT max_sale FROM `product_secondary_details` where product_id=$product_id and max_sale <=0 and status !='Deleted'");
     if($query->num_rows()>0)
     {
         return 0;
     }
     else
     {
         return 1;
     }
 }
 else
 {
     return 0;
 }
 }

public function get_offer_products()
{
        $query   = $this->db->query("SELECT id,name,image_url,mrp,offer_price FROM offer_product_details where status !='Deleted'");
        $results = $query->result();
        return $results;   
}

public function get_category_name($id)
{
        $query   = $this->db->query("SELECT name from category_master where id=$id");
        $results = $query->row();
        return $results->name;
}

public function get_variant_name($id="")
{
        if($id !="")
        {
        $query   = $this->db->query("SELECT name from variants_master where id=$id");
        $results = $query->row();
        return $results->name;
        }
        else
        {
         return null;        
        }
}

public function check_product_in_cart($product_id,$variants="")
{
        if($variants!="")
        {
                $where=" variants='$variants'";
        }
        else
        {
                $where=" product_id=$product_id";   
        }
        $query   = $this->db->query("SELECT id from cart_details where $where ");
        if($query->row())
        {
                return ($query->row())->id;
        }
        else
        {
                return 0;
        }
      
}

public function update_carted_item_details($data=array())
{
        $query   = $this->db->query("update carted_item_details set product_total = product_total + ".$data['product_total'].", product_count = product_count + ".$data['product_count']." where product_id=".$data['product_id']." and cart_id =".$data['cart_id']);
        if($this->db->affected_rows() >= 0)
        {
                return 1;
        }
        else
        {
                return 0;
        }

}



/* public function get_cart_list($param="")
{
        $data=array();
        $total=0;
        $count=0;
        $where="";
      /*   if($user_id !="")
        {
                $where= "where user_id=$user_id";
        }  */ /*
        $query   = $this->db->query("SELECT id FROM `cart_details` $where");
        $results = $query->result();
        
        $i=0;
        foreach($results as $id)
        {
               
                if($param=="carttotal")
                {
                $tot=$this->get_cart_sum($id->id);
                $total=$total+$tot['total'];
                $count=$count+$tot['count'];
                $data[0]['total']=$total;
                $data[0]['count']=$count;
                }
                else
                {
                        //SELECT sum(product_count) as product_count,sum(product_total) as product_total,sum(product_price) as product_price,product_variant,product_id,product_name,product_image,type FROM `carted_item_details` where cart_id in ('291','292','293') GROUP BY product_id,product_variant
                 $data[$i]=$this->get_carted_product_list($id->id);
                 
                }

                $i++;  
               
        }
        return $data;
} */

public function get_cart_list($param="")
{
        $result=array();
        $query   = $this->db->query("SELECT id FROM `cart_details`");
        $results = $query->result();
        foreach($results as $index=>$value)
        {
               $results[$index]=$value->id; 
        }
        $cart_ids=implode(',',$results);
       if($param=='carttotal')
       {
        if($cart_ids)
        {
        $query1=$this->db->query("select sum(product_total) as total, sum(product_count) as count from carted_item_details where cart_id in ($cart_ids)");
        $result=$query1->result();
        }
       

       }
       else
       {
        if($cart_ids)
        {
        $query1   = $this->db->query("SELECT id,cart_id,product_image,product_id,product_name,product_count,product_price,product_total,type,product_variant from carted_item_details where cart_id in ($cart_ids)");
         $result=$query1->result();
       
        }
     
       }
       
    
       
        return $result;

}

public function get_cart_sum($cart_id)
{
        $query   = $this->db->query("select sum(product_total) as total, sum(product_count) as count from carted_item_details where cart_id=$cart_id");

        //select sum(product_total) as total, sum(product_count) as count from carted_item_details where cart_id in('291','292','293')

        $res = $query->row();
        $data['total']=$res->total;
        $data['count']=$res->count;
        return $data;   
}



public function  get_carted_product_list($cart_id)
{
$query   = $this->db->query("SELECT id,cart_id,product_image,product_id,product_name,product_count,product_price,product_total,type from carted_item_details where cart_id=$cart_id");

$data = $query->result();
return $data;
}
public function  get_ordered_product_list($order_id)
{
        $query   = $this->db->query("SELECT id,cart_id,product_image,product_id,product_name,product_count,product_price,product_total,type from carted_item_details where order_id=$order_id");

        $data = $query->result();
        return $data;
}




/* public function get_cart_list($user_id)
{
        $where="";
        if($user_id !="")
        {
                $where= "where user_id=$user_id";
        }
        $query   = $this->db->query("SELECT id,product_id,name,variants,addon,addon_price,price,sum(quantity) as qty,sum(price) as tot_price,sum(total_amount) as total FROM `cart_details` $where GROUP BY variants,category,quantity,price ");

    
        $results = $query->result();
        foreach($results as $index=>$value)
        {
                $value->variants=$this->get_variant_name($value->variants);
                $value->addon=json_decode($value->addon);
                /* print_r($addonarray);  */
                /*foreach($value->addon as $index1=>$value1)
                {
                       $value1->addon_name=$this->get_addon_name($value1->addon_id);
                }
                $value->image_url=$this->get_product_image($value->product_id);
        }
        return $results;
}
 */

public function get_product_image($prod_id,$variant="")
{
        $table="product_details";
        if($variant != "" && $variant=="offer-product")
        {
                $table="offer_product_details";
        }
        $query   = $this->db->query("SELECT image_url from $table where id=$prod_id");
        $results = $query->row();
        return $results->image_url;

}

public function get_addon_name($adid)
{
        $query   = $this->db->query("SELECT name from addon_details where id=$adid");
        $results = $query->row();
        return $results->name;
}
public function get_single_product($prod_id)
{
      
        $query   = $this->db->query("SELECT * from product_details where id=$prod_id and status !='Deleted' ");
        $result = $query->row();
        return $result;   
}
public function get_single_offer_product($id)
{
        $query   = $this->db->query("SELECT * from offer_product_details where id=$id and status !='Deleted'");
        $result = $query->row();
        return $result;  
}
public function get_secondary_product_det($prod_id)
{       
        $query   = $this->db->query("SELECT variants,max_sale from product_secondary_details where product_id=$prod_id and status !='Deleted'");
        $result = $query->result();
        foreach($result as $index=>$value)
        {
                $result[$index]=array($value->variants,$this->get_variant_name($value->variants),$value->max_sale);
        }
      
        return $result;  
}

public function get_product_sec_details($data=array())
{
        $query   = $this->db->query("SELECT mrp,price,max_sale from product_secondary_details where product_id=$data[prod_id] and variants=$data[variant_id] and status !='Deleted'");
        $result = $query->result();
        return $result;  

}

public function get_user_details($user_id="")
{
        $result=array();
        $result['userdetails']=$this->db->select('*')->from('user_add_details')->where('user_id='.$user_id)->where('status !=','Deleted')->get()->row();
        $result['useraddress']=$this->db->select('*')->from('user_address_details')->where('user_id='.$user_id)->where('status !=','Deleted')->get()->result();
       
        return $result;  

}


public function get_addons($addonids)
{
   
    $data=array();
    if($addonids=='')
    {
    $query   = $this->db->query("SELECT id,name,price,mrp,image_url,max_sale FROM addon_details where status !='Deleted'" );
    }
    else
    {
    $query   = $this->db->query("SELECT id,name,price,mrp,image_url,max_sale FROM addon_details where id in ($addonids) and status !='Deleted'");
    }
    $results = $query->result();
   
   return $results; 
}
public function insert_cart($data=array())
{
        $result= $this->db->insert('cart_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
}

public function insert_carted_item_details($data=array())
{
        $result= $this->db->insert('carted_item_details',$data);
        return $result; 
}

public function check_promocode($id,$phoneno,$amount=100)
{
        $result   = $this->db->where(array('id'=>$id,'status !='=>'Deleted','status !='=>'Hidden'))->get('promocode_details')->result_array();
        if($result)
        {
                if(!empty($prod_ids=json_decode($result[0]['products'])))
                {
                        $name=array();
                        $i=0;
                        foreach($prod_ids as $ids)
                        {
                                $name[$i]=$this->get_product_name($ids);
                        }
                        $result[0]['product_names']=$name;
                }
            
               $qry=$this->db->query("select no_of_usage from promocode_user_details where promo_id=".$result[0]['id']." and allowed_users=".$phoneno);
               $row=$qry->row();
               if($row)
               {
                       /* print_r($qry->row()); exit; */
                       $result[0]['user_usage']=$row->no_of_usage;
               }
               else
               {

                        $tbldata=array(
                                'promo_id'=>$result[0]['id'],
                                'allowed_users'=>$phoneno,
                                'no_of_usage'=>$result[0]['no_of_usage']

                        );
                        $this->db->insert('promocode_user_details',$tbldata);
                   
                       if($this->db->affected_rows())
                       {
                       $result[0]['user_usage']=$result[0]['no_of_usage'];  
                       }
                       else
                       {
                        $result[0]['user_usage'] ="";   
                       }
               }
        }
        return $result;
    
}
public function get_promocodes()
{
        $query   = $this->db->query("SELECT promocode_details.id as promo_id,promocode_details.promo_code,offer_details.* from promocode_details join offer_details on promocode_details.offer_id=offer_details.id WHERE promocode_details.status !='Deleted' and promocode_details.status !='Hidden' and offer_details.status !='Deleted'");
        return $query->result();    
}
public function get_product_name($product_id)
{
        $qry=$this->db->query("select name from product_details where id=".$product_id);
        $res=$qry->row()->name;     
        return $res;
}
public function insert_user_additional_data($data=array())
{
        $result= $this->db->insert('user_add_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
}
public function update_user_additional_data($data=array())
{
        $this->db->where('id', $data['id']);
        $result= $this->db->update('user_add_details',$data);
}
public function insert_order_details($data=array())
{
        $result= $this->db->insert('order_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
}

// public function update_carted_items($cart_id,$order_id)
// {
//         $this->db->query("update carted_item_details set order_id=$order_id where cart_id in ($cart_id)");
//        /*  $this->db->where('cart_id in', $cart_id);
//         $this->db->update('carted_item_details', array('order_id' => $order_id));*/
//         $this->update_product_stock($cart_id); 
// }

public function update_product_stock()
{
      
                foreach ($_SESSION['cart'] as $index=>$value)
                {
                if($value['type']=='product')
                {

                $qry1=$this->db->query("update product_secondary_details set max_sale=max_sale -".$value['product_count']." where product_id=".$value['product_id']." and variants=".$value['product_variant']);
                }
                else if($value['type']=='offer-product')
                {
                $qry1=$this->db->query("update offer_product_details set stock=stock -".$value['product_count']." where id=".$value['product_id']." and variants='".$value['product_variant']."'");        
                }
                else if($value['type']=='addon')
                {
                $qry1=$this->db->query("update addon_details set max_sale = max_sale - ".$value['product_count']." where id = ".$value['product_id']);   
                }
      
        }
}
public function insert_ordered_items($data=array())
{
        $this->db->insert('carted_item_details',$data);
}
public function get_arealist()
{
        $query   = $this->db->query("SELECT id,name FROM area_master where status !='Deleted'");
        $results = $query->result();
        foreach ($results as $row)
        {
        $data[$row->id]=$row->name;
        }
        return $data;

 }

 public function get_delivery_charge($area)
 {
        $query   = $this->db->query("SELECT * from delivery_charge_master where area=$area and status !='Deleted'");
        $results = $query->row();
        if($results)
        {
        return $results;
        }
        else
        {
        return 0;
        }
 }
 public function get_cart_items()
 {
        $query   = $this->db->query("SELECT name from cart_details");
        $result = $query->result();
        return json_encode($result);  
        
 }
 public function check_offer_product($user_id)
{
       /*  $query=$this->db->query("select no_of_usage from offer_product_user_details where product_id=".$product_id." and user_id=".$user_id." and no_of_usage <=0")->row(); */

       $return=0;
        if($user_id)
        {
        $query   = $this->db->query("SELECT cart_details.product_id,offer_product_details.no_of_usage from cart_details,offer_product_details where cart_details.variants='offer-product' and offer_product_details.id=cart_details.product_id ");
        $result = $query->row(); 
        if($result)  
        {
                $res1 =$this->db->query("SELECT no_of_usage from offer_product_user_details where  product_id=".$result->product_id." and user_id=".$user_id)->row();
                
                if($res1)
                {     
                $return=$res1->no_of_usage;
                }  
                else
                {
                        $insert=array(
                                'product_id'=>$result->product_id,
                                'user_id'=>$user_id,
                                'no_of_usage'=>$result->no_of_usage
                        );
                        $ins=$this->db->insert('offer_product_user_details',$insert);  
                        if($ins){$return=$result->no_of_usage;
                                print_r('ins'.$return); exit;} 
                }

        }
        }
       
       return $return;  
}
 

 public function get_cart_id()
 {
        $query   = $this->db->query("SELECT id from cart_details");
        $result = $query->result();
        return $result;
 }

 public function update_promocode_usage($promo_id,$phoneno)
 {
        $this->db->query("update promocode_user_details set no_of_usage=no_of_usage-1 where promo_id='$promo_id' and allowed_users='$phoneno' ");
        return $this->db->affected_rows();
 }

 public function update_offer_product_usage($product_id,$user_id)
 {
        $this->db->query("update offer_product_user_details set no_of_usage=no_of_usage-1 where product_id=".$product_id." and user_id=".$user_id);
        return $this->db->affected_rows();
 }

//  public function deleteproduct_from_cart($data)
//  {
//          $actual_tot=$data['actual_tot'];
//          $promo=array();
      
//                 $this->db->delete('cart_details',array('product_id'=>$data['product_id'],'variants'=>$data['product_variant']));
//                 $this->db->delete('carted_item_details',array('product_id'=>$data['product_id'],'product_variant'=>$data['product_variant']));
         
//          if($this->session->userdata('promocode'))
//          {
//                 $act_tot=$actual_tot-$data['product_total'];
//                 $promo=$this->session->userdata('promocode');
               
//                 foreach($promo as $index=>$value)
//                 {
//                         if($value['promo_category']=='tcv')
//                         {
//                                 $act_tot=$act_tot-$value['value'];
//                         }
//                         else if($value['promo_category']=='perc')
//                         {
//                                 $act_tot=$act_tot-($act_tot*($value['value']/100));
//                         }
                               
//                 } 
//                 if($this->session->userdata('cart_total'))
//                 {
//                         $this->session->set_userdata('cart_total',$act_tot);
//                 }
               

//          }
//          else
//          {
//          if($this->session->userdata('cart_total'))
//          {
//                  $this->session->set_userdata('cart_total',$this->session->userdata('cart_total')-$data['product_total']);
//          }
         
//         }
//         if($this->session->userdata('cart_value'))
//          {
//          $this->session->set_userdata('cart_value',$this->session->userdata('cart_value')-$data['product_count']);
//          }  
//          else
//          {
//           $this->session->set_userdata('cart_value',0); 
//          }
        
//  }

        //  public function update_carted_product_count($data=array())
        //  {
        //          $return['msg']="";
        //          $return['val']=0;
        
        //         if($data)
        //         {
        //                 if($data['type']=='product')
        //                 {
        //                 $tot=$this->db->query("select carted_item_details.product_total,carted_item_details.product_count,carted_item_details.product_price,product_secondary_details.max_sale,product_details.status from carted_item_details INNER JOIN product_secondary_details on product_secondary_details.product_id=carted_item_details.product_id and product_secondary_details.variants=carted_item_details.product_variant LEFT JOIN product_details on product_details.id=product_secondary_details.product_id where cart_id=".$data['cart_id']);
        //                 }
        //                 else if($data['type']=='addon')
        //                 {
        //                 $tot=$this->db->query("select carted_item_details.product_total,carted_item_details.product_count,carted_item_details.product_price,addon_details.max_sale,addon_details.status from carted_item_details INNER JOIN addon_details on addon_details.id=carted_item_details.product_id where cart_id=".$data['cart_id']);      
        //                 }
        //                 $res=$tot->row();
        //                 if($res->max_sale <= 0 || $res->status =="Out Of Stock")
        //                 {
        //                         $return['msg']="Out Of Stock";
        //                         $return['val']=0;
        //                 } 
        //                 else if($data['quantity'] > $res->max_sale)
        //                 {
        //                         $return['msg']="Only $res->max_sale Available";
        //                         $return['val']=$res->max_sale;
        //                 }
        //                 else
        //                 {
                
        //                $this->db->query("UPDATE carted_item_details set product_total=(product_price *". $data['quantity']."), product_count=".$data['quantity']." WHERE cart_id=".$data['cart_id']);
        //                if($this->db->affected_rows())
        //                {
        //                       /*  $qry=$this->db->query("select product_total,product_count from carted_item_details where cart_id=".$data['cart_id']);
        //                        $res1=$qry->row(); */
        //                        if($this->session->userdata('cart_total'))
        //                        {
                                
        //                        $this->session->set_userdata('cart_total',($this->session->userdata('cart_total')-$res->product_total)+($res->product_price * $data['quantity']));
        //                        }
        //                        if($this->session->userdata('cart_value'))
        //                        {
                                
        //                        $this->session->set_userdata('cart_value',($this->session->userdata('cart_value')-$res->product_count)+$data['quantity']);
        //                        }

        //                }
        //         }
        //               /*  $this->db->where('cart_id', $data['cart_id']);
        //                $this->db->update('carted_item_details', array('product_count' => $data['quantity']));  */
        //         }
        //         return $return;
        //  }

 public function get_maxsaleand_status($data=array()){
         if($data['type']=='product')
         {
                 $this->db->select('max_sale,status')->from('product_secondary_details')->where('product_id',$data['product_id'])->where('variants',$data['product_variant'])->where('status !=','Deleted');
         }
         else  if($data['type']=='addon')
         {
                $this->db->select('max_sale,status')->from('addon_details')->where('id',$data['product_id'])->where('status !=','Deleted');
         }
         return $this->db->get()->row();
 }
 /* public function get_ordereditem_details($order_id)
 {
        $query   = $this->db->query("SELECT product_name,product_count,product_total from carted_item_details where order_id=$order_id");
        $data = $query->result();
        return $data;
 } */

 public function get_user_additional_data($user_id)
 {
        $query   = $this->db->query("SELECT id,email_id,address,addresstype,street,landmark,area from user_add_details where user_id='$user_id' and role='customer'");
        if($query->row())
        {
        $data = $query->row();
        }
        else
        {
        $data="";
        }
        return $data;

 }

 public function get_offers()
 {
        $query   = $this->db->query("SELECT id,name,description,image_url from offer_details where status !='Deleted'");
        $data = $query->result();
        return $data;

 }
 public function get_orders($user_id)
 {
        $query   = $this->db->query("SELECT id,order_total,items,order_time,status from order_details where customer_id=".$user_id." order by created_on desc limit 20");
        //.$user_id
        $data = $query->result();
        return $data; 
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

 public function get_reward_point($user_id)
 {
        
     $query   = $this->db->query("SELECT reward_point from user_add_details where user_id=$user_id and role='customer'");
     $results = $query->row();
     if($results)
     {
         return $results->reward_point;
     }
     else
     {
         return 0;
     } 
 }
 public function get_single_order($order_id)
 {
     $query   = $this->db->query("SELECT id,customer_id,delivery_boy_id,total_before_vat,area,cart_total,discount,invoice_no,order_time,tax,delivery_charge,delivery_tax,tax_amount,order_total,payment_type,status from order_details where id=$order_id");
     $data['order_details'] = $query->row();

     $query=$this->db->query("SELECT id,name,address,mobile,email_id from user_add_details where user_id=".$data['order_details']->customer_id);
     $data['customer_details']=$query->row();

     $query=$this->db->query("SELECT user_id,name,mobile from delivery_boy_details");
     $data['deliveryboy_details']=$query->result();

     $data['status']=$this->get_status_name($data['order_details']->status);
     if($data['order_details']->delivery_boy_id !="")
     {
     $del_boy=$this->get_deliveryboy_name($data['order_details']->delivery_boy_id);
     $data['delivery_boy_name']=$del_boy->name;
     $data['delivery_boy_mobile']=$del_boy->mobile;
     }
    
     


     $query   = $this->db->query("SELECT id,product_id,product_image,product_variant,product_name,product_count,product_price,product_total,type from carted_item_details where order_id=$order_id");
     $data['item_details'] = $query->result();
    
     foreach($data['item_details'] as $index=>$value)
     {
             if($value->product_variant=="offer-product")
             {
                $value->variant_name="OFFER";
             }
             else
             {
             $value->variant_name=$this->get_variant_name($value->product_variant);
             }
     }
     return $data;
 }


 public function get_deliveryboy_name($id)
 {   
     $query   = $this->db->query("SELECT name,mobile from delivery_boy_details where user_id=$id");
     $results = $query->row();
     if($results)
     {
         return $results;
     }
     else
     {
         return null;
     }
    
 }

 public function check_user_email_exist($email="")
 {
        $query=$this->db->query("select id,email_id,name from user_details where email_id='".$email."'");
        $results=$query->row();
        if($results)
        {
                return $results;
        }
        else
        {
                return 0;
        }
 }

 public function update_password($data="")
 {
         $result="";
        if($data)
        {
                $this->db->where(array('email_id'=> $data['email']));
                $result= $this->db->update('user_details',array('password'=>$data['password']));

        }
        echo $this->db->affected_rows();
 }

 public function get_minimum_order()
 {
     $query   = $this->db->query("SELECT min_order,delivery_extra_charge FROM minimum_order_extra_delivery where status !='Deleted'");
     $results = $query->result();
     return $results;
 }
 public function get_user_location($user_id)
 {
      $query    =   $this->db->query("SELECT user_add_details.area,area_master.name,delivery_charge_master.* FROM `user_add_details`,area_master,delivery_charge_master WHERE area_master.id=user_add_details.area and user_add_details.user_id=$user_id and delivery_charge_master.area=user_add_details.area");
      if($query->row())
      {
              return $query->row();
      }
      else
      {
              return 0;
      }
 }
 public function update_user_location($user_id,$location)
 {
         $query=$this->db->query("update user_add_details set area=$location where user_id=$user_id");
 }
 public function add_new_address($data=array())
 {
         
        $result= $this->db->insert('user_address_details',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
 }
 public function update_address($data=array())
 {
        $this->db->where(array('user_id'=>$data['user_id'],'address_type'=>$data['address_type']));
        $result= $this->db->update('user_address_details',$data);
        if($this->db->affected_rows() >= 0)
        {
                return 1;
        }
        else
        {
                return 0;
        }
 }
 public function get_all_address($user_id)
 {
        $result    =   $this->db->query("SELECT user_address_details.id as address_id,user_address_details.*,delivery_charge_master.* FROM `user_address_details` join delivery_charge_master on delivery_charge_master.area=user_address_details.area_id  WHERE user_address_details.user_id=$user_id and delivery_charge_master.status !='Deleted' and user_address_details.status !='Deleted'")->result();
        return $result;
 }
 public function check_address_exists($user_id,$address_type)
 {
        $result    =   $this->db->query("SELECT user_id FROM `user_address_details`  WHERE user_id=$user_id and address_type='$address_type'")->row();
        if($result)
        {
                return 1;
        }    
        else
        {
                return 0;
        }
 }
 public function add_area($area)
 {
         $result1=$this->db->query("select id from area_master where name like '%$area%' and status !='Deleted'")->row();
      
         if($result1)
         {
                 return $result1->id;
         }
         else
         {
                $result= $this->db->insert('area_master',array('name'=>$area,'status'=>'Active'));
                $insert_id = $this->db->insert_id();
                $result1=$this->db->insert('delivery_charge_master',array('area'=>"$insert_id",'charge'=>0, 'min_order'=>0, 'extra_charge'=>0, 'status'=>'new'));
                return $insert_id;   
         }
 }

 public function remove_user_address($id,$userid)
 {
        $this->db->where('id', $id);
        $this->db->delete('user_address_details');
        $result=$this->db->query("select count(*) as address_count from user_address_details where user_id=$userid")->row();
        return $result->address_count;
 }

}

?>