<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Storefront extends MY_Controller{
	
	
	
	
	
		public function __construct(){
		parent::__construct();
					$this->load->library('session');
		$temp=$this->session->userdata('count');
		
			if(!isset($temp) || empty($temp)){ 
				}
			else{
				$cart=1;
				$this->session->set_userdata('cart',$cart);
			}
			
	}
	public function index(){
		$this->load->view('homepage');
	}
	
	public function getproducts($store_id , $i){
		$cat_id=$i;
		/*$this->load->model('storeadmin_model');
		$query=$this->storeadmin_model->showcategories($store_id);
		
		$data['query']=$query;
		$data['basecategories']=$this->storeadmin_model->showcategoriestable($store_id);
		//$data['userdetails']=$this->storeadmin_model->retrieve_user_details();
		
		
		
		
		
		
		
		
		
		*/
		$this->load->model('storefront_model');
		$gotproducts= $this->storefront_model->getproducts($store_id,$i);
		$data['gotproducts']=$gotproducts;
		$data['store_id']= $store_id; 
		
		$data['store_name']=$this->storefront_model->getstorename($store_id);
		
		//$this->load->view('storefront_header',$data);
		$this->display_storefrontheader($store_id);
		$this->display_sidebar($store_id,$cat_id);
		$this->load->view('storefront_productsdisplay',$data);
		$this->load->view('storefront_footer');
		
	}
	
	public function productdesc($store_id,$productid){
		$data['store_id']= $store_id;
		$this->load->model('storeadmin_model');
		//$query=$this->storeadmin_model->showcategories($store_id);
		
		//$data['query']=$query;
		//$data['basecategories']=$this->storeadmin_model->showcategoriestable($store_id);
		//$data['userdetails']=$this->storeadmin_model->retrieve_user_details();
		
		$sql="SELECT * FROM testsite_products WHERE `product_id` = ".$this->db->escape($productid)." AND `store_id`=".$this->db->escape($store_id);
		$querycontainingproduct=$this->db->query($sql);
		$row=$querycontainingproduct->row();
		$data['querycontainingproduct']=$querycontainingproduct;
		$data['row']=$row;
		$this->load->model('storefront_model');
		//$data['store_name']=$this->storefront_model->getstorename($store_id);
		
		
		
		
				 
		
		//$this->load->view('storefront_header',$data);
		$this->display_storefrontheader($store_id);
	//	$this->display_sidebar($store_id,$cat_id);
		$this->load->view('storefront_productdesc',$data);
		$this->load->view('storefront_footer');
	}
	
	public function display_sidebar($store_id,$cat_id){
		$sql="SELECT * from testsite_category WHERE cat_id=".$this->db->escape($cat_id)." AND store_id=".$this->db->escape($store_id);
		$query=$this->db->query($sql);
		$row=$query->row();
		$rootcat=$row->category;
		
		//level equivalent of men's footwear
		$sql="SELECT * from testsite_category WHERE parent_id=".$this->db->escape($cat_id)." AND store_id=".$this->db->escape($store_id);
		$query=$this->db->query($sql);
		$arr=array();
		$idarray=array();
		$i=0;
		foreach($query->result() as $row){
			 $arr[$i]=$row;
			 $idarray[$i]=$row->cat_id;
			 $i++;
		}
		if(!empty($idarray))
		{
		$catids=join(',',$idarray);}
		else{$catids=$cat_id;}
		// Sending only immediate children categories to view to display in sidebar view
		$data['arr']=$arr;
		//var_dump($catids);
		
		// level equivalent of men shoes
		$sql="SELECT * FROM testsite_products WHERE parent_id IN (".$this->db->escape($catids).") AND store_id=".$this->db->escape($store_id);
		$query=$this->db->query($sql);
		$i=0;
		foreach($query->result() as $row){
			 $arr1[$i]=$row;
			 $idarray1[$i]=$row->cat_id;
			 $i++;
		}
		if(!empty($idarray1))
		{	$idarray1= array_unique($idarray1);
			$idstring1=join(',',$idarray1);
		    $catids=$catids.",".$idstring1;}
			
		//var_dump($catids);
		
		
		
		
		
		//Display Brands for filter 
		$sql1="SELECT DISTINCT Manufacturer_name FROM testsite_products WHERE (cat_id=".$this->db->escape($cat_id)." OR FIND_IN_SET(cat_id,".$this->db->escape($catids).")) AND store_id=".$this->db->escape($store_id);
		
		//echo $sql1;
		$query1=$this->db->query($sql1);
		
		$brands=array();
		$i=0;
		$result=$query1->result();
		//var_dump($result);
		foreach($result as $row){
			 $brands[$i]=$row;
			 $i++;
			// echo $row->Manufacturer_name;
		}
		$data['brands']=$brands;
		$this->load->view('storefront_sidebar',$data);
		
	}
	
}