<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Storeadmin_model extends CI_Model{
	
	public function construct(){
		
		parent::__construct();
		
	}
	
	
	public function dologin(){
		$sql="SELECT * FROM store_admin WHERE `username`=".$this->db->escape($this->input->post('username'))."AND `password`=".$this->db->escape($this->input->post('password'));
		$query=$this->db->query($sql);
		if($query->num_rows()==0){
			
			return false;
		}
		else{
			$row=$query->row();
			$data=array(
			'store_id'=>$row->store_id,
			'store_name'=>$row->store_name,
			'username'=>$row->username,
			'role'=>$row->role,
			);
			return $data;
		}
		}
	public function showproducts(){
		$store_id=$this->session->userdata('store_id');
		$sql="SELECT * FROM testsite_products WHERE store_id=".$this->db->escape($store_id);
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function noofcols(){
		$query=$this->db->get('testsite_products');
		$noofcols=$query->num_fields();
		if($noofcols)
		{return $noofcols;}
		else
		{ echo "FINDING NO OF COLS DIDNT QUITE WORK OUT";}
	}
	
	
	public function column_names(){
	$fields = $this->db->list_fields('testsite_products');
	return $fields;
	}
	
	public function fieldmetadata(){
		$fieldinfo=$this->db->field_data('testsite_products');
		return $fieldinfo;
	}
	
	public function addproducts($data){
		
		//if($_POST['submit']){
			//foreach($_POST AS $key=>$value){
			//$data[$key] = $this->input->post('$value');}
				
		//}
	    unset($data['error']);
		$this->db->insert('testsite_products',$data);
		
		}
		
		
	public function editproducts($data){
		
	    unset($data['error']);
		$index=$data['index'];
		$this->db->where('index',$index );
		$this->db->update('testsite_products',$data);
		return;
		}

	public function showcategories($store_id){
		
		$query=$this->db->query('SELECT * FROM testsite_category WHERE store_id='.$this->db->escape($store_id));
		return $query;
	}
	
	public function addcategory($data){
		$this->db->insert('testsite_category',$data);
	}
	
	public function showcategoriestable($store_id){
		
		$basecategories=$this->db->query("SELECT * FROM testsite_category WHERE (parent_id=1 OR parent_id=0) AND (store_id=".$this->db->escape($store_id)." OR store_id=0)");
		
		return $basecategories;
	}
	
	public function retrieve_user_details(){
		$query=$this->db->get('store_admin');
		return $query;
	}
	
	public function retrieve_orders(){
		$store_id=$this->session->userdata('store_id');
		$sql="SELECT * FROM testsite_orders WHERE store_id=".$this->db->escape($store_id);
		$query=$this->db->query($sql);
		return $query;
		
		
	}
	
	public function showproductsordered($orderid){
		
		
		$sql="SELECT * FROM testsite_products a,testsite_orderdetails b WHERE a.product_id=b.product_id AND b.order_id=".$this->db->escape($orderid);
		$query=$this->db->query($sql);
		
		return $query;
		
	}
	
	public function getorderinfo($order_id){
		$sql="SELECT * FROM testsite_orders WHERE order_id=".$this->db->escape($order_id);
		$query=$this->db->query($sql);
		$row=$query->row();
		return $row;
	}
	
}	
 