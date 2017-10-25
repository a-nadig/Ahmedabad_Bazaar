<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(0);
class Checkout_model extends CI_Model{
	
	public function construct(){
		
		parent::__construct();
		
	}
	
	public function adddetails($data){
		$this->load->library('session');
		$store_id=$this->session->userdata('store_id');
		$this->db->insert('testsite_customers',$data);
		 
		//--Retrieve cusomter_id to insert into irders table
		$sql="SELECT customer_id FROM testsite_customers WHERE `email`=".$this->db->escape($data['email']);
		$query=$this->db->query($sql);
		foreach($query->result() as $row){
			$data['customer_id']=$row->customer_id;
		}
		
		$sql= "INSERT INTO testsite_orders (email, cust_name, shippingaddress,customer_id,order_totalcost,no_of_items,orderdate, store_id)
                  VALUES (".$this->db->escape($data['email']).", ".$this->db->escape($data['name']).",".$this->db->escape($data['shippingaddress']).",".$this->db->escape($data['customer_id']).",".$this->session->userdata('total').",".$this->session->userdata('count').", now() ,".$this->db->escape($store_id).")";
		$this->db->query($sql);
		
		 $id=$this->db->insert_id();
		 
			$sql1="SELECT * FROM testsite_orders WHERE `order_id`=".$this->db->escape($id);
			$query1=$this->db->query($sql1);
			$row1=$query1->row();
		 
		 $data['order_id']=$row1->order_id;
		 
		 
		
		
		
		$array=$this->session->all_userdata();
		$i=0;
		//print_r($array);
		foreach($array as $key=>$value){
			if($i<5){
						$i++;}
			else if($key==$value['product_id']){
				
				
				$product_id=$value['product_id'];
				$quantity=$value['quantity'];
				$data1=array(
								'order_id'=> $data['order_id'],
								'product_id'=> $product_id,
								'quantity_ordered'=> $quantity,
				
							);
							$this->db->insert('testsite_orderdetails',$data1);
				}
		
		
		
		
		
		
		}
		return $data['order_id'];
	}
	
	
	
	
	}

	
	?>