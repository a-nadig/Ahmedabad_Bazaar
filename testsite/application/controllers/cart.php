<?php 		//ini_set('display_errors','off');
				//error_reporting(0);
			//	@ini_set('display_errors', 0); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Cart extends CI_Controller{
	
	
	
	
	
	public function __construct(){
		parent::__construct();
					
	}
	public function addtocart(){
		
		//echo $_POST['id']." and ".$_POST['qty'];
		$this->load->library('session');
		$productid=$_POST["id"];
		$store_id=$_POST["store_id"];
		$sql="SELECT * FROM testsite_products WHERE `product_id` = ".$this->db->escape($productid)." AND `quantity` >=".$this->db->escape($_POST["qty"])." AND store_id=".$this->db->escape($store_id);
		$query_productdetails=$this->db->query($sql);
		if(!$query_productdetails){ echo "Required quantity not available";}
		
		$row_productdetails=$query_productdetails->row();
		
		// If product already exists in cart
		if(isset($this->session->userdata["$productid"]['quantity'])){
			
			
			$productdetails=array('product_id' =>	$row_productdetails->product_id,
							  'product_name' =>	$row_productdetails->product_name,
							  'quantity' =>$this->session->userdata["$productid"]['quantity']+$_POST['qty'],
							 'price' =>$row_productdetails->price,
							 'totalprice'=>($this->session->userdata["$productid"][ 'quantity']+$_POST['qty'])*$this->session->userdata["$productid"][ 'price'],
							 'image'=> $row_productdetails->image,
							 'store_id'=>$row_productdetails->store_id,
							);
		}
		
		
		
		
		
		else{
		$productdetails=array('product_id' =>	$row_productdetails->product_id,
							  'product_name' =>	$row_productdetails->product_name,
							  'quantity' =>$_POST['qty'],
							 'price' =>$row_productdetails->price,
							 'totalprice'=> $_POST['qty']*$row_productdetails->price,
							 'image'=> $row_productdetails->image,
							 'store_id'=>$row_productdetails->store_id,
							);
		}
		
		
		
		
		
		$this->session->set_userdata($productid,$productdetails);
		
		/*print_r($this->session->userdata["$productid"][ 'product_name']);
		print_r($this->session->userdata["$productid"][ 'product_id']);
		print_r($this->session->userdata["$productid"][ 'quantity']);
		*/
		
		
		$count=0;
		$total=0;
		$data = $this->session->all_userdata();
		$value=array();
		$i=0;
		  
		   foreach($data as $key=>$value)
		   { //print_r($key);
		  
		   
		    if(isset($value['product_id']) && $key == $value['product_id'])
				{	//print_r($count);
					$count+=$value['quantity'];
					
					$total+=$value['totalprice'];
				}
		   }
		   $this->session->set_userdata('count',$count);
		   $this->session->set_userdata('total',$total);
			
			
		
		
		$str1 = "Items- ". $count ." and Total Cost Rs ". $total;
		//print_r($this->session->all_userdata());
		echo $str1;
		return;
		
	}	
	
	public function displaycart(){
		
		$this->load->library('session');
		//$array=$this->session->all_userdata();
		
		$this->load->view('cart_view');
	}
	
	
	public function checkout(){
		$this->load->view('checkout_view');
	}
	public function submitdetails(){
		$data=array(
				'name'=> $this->input->post('name'),
				'email'=>$this->input->post('email'),
				'mobileno'=>$this->input->post('mobileno'),
				'shippingaddress'=>$this->input->post('shippingaddress'),
				
		);
		
		$this->load->model('checkout_model');
		
		$data['order_id']=$this->checkout_model->adddetails($data);
		
		$this->load->view('orderconfirmation_view',$data);
	}
}
