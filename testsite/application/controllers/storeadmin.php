
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storeadmin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$temp=$this->session->userdata('store_id');
		//echo "<pre>"; print_r($temp); echo "</pre>";
			if(!isset($temp) || empty($temp)){ //&& $this->session->userdata('store_name') && $this->session->userdata('username') && $this->session->userdata('role')){
				header('Location: '.base_url('login/signin'));
				die;
				//header('Location: '.base_url('storeadmin/gotodashboard'));				
			}
			
	}
	public function index()
	{
		
	}
	
	public function calender(){
		$data['store_name']=$this->session->userdata('store_name');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('calender_view');
	}	
	
	public function gotodashboard(){
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard_view');
		//$this->load->view('templates/footer');
	}
	
	public function manageproducts(){
		
		$this->load->model('storeadmin_model');
		$data['result']=$this->storeadmin_model->showproducts();
		$data['noofcols']=$this->storeadmin_model->noofcols();
		$data['fields']=$this->storeadmin_model->column_names();
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('manageproducts_view',$data);
	}
	
	public function addproducts(){
		$store_id=$this->session->userdata('store_id');
		$this->load->model('storeadmin_model');
		$data['noofcols']=$this->storeadmin_model->noofcols();
		$data['fields']=$this->storeadmin_model->column_names();
		$data['fieldinfo']=$this->storeadmin_model->fieldmetadata();
		$data['error']="";
		$data['query']=$this->db->get('testsite_colors');
		$data['categoriesquery']=$this->storeadmin_model->showcategories($store_id);
		
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('addproducts_view',$data);
	}
	
	public function doaddproducts(){
		
		$data = array(	
				'product_id' => $this->input->post('product_id'),
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'Manufacturer_name'=>$this->input->post('manufacturer_name'),
				'color'=>$this->input->post('color'),
				'quantity'=>$this->input->post('quantity'),
				'cat_id'=>$this->input->post('category'),
				'date_of_creation'=> date('Y-m-d H:i:s'),
				'store_id'=>$this->session->userdata('store_id'),
						);
				$store_id=$this->session->userdata('store_id');
			$sql="SELECT parent_id FROM testsite_category WHERE cat_id=". $this->input->post('category') ." AND `store_id`=".$this->db->escape($store_id);
			$query=$this->db->query($sql);
			foreach($query->result() as $row){ $data['parent_id']=$row->parent_id;}
					
			$config= array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "22048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "3000",
			'max_width' => "3000"
			);
		
			$this->load->library('upload',$config);
			$field_name = "image";
			
			if($this->upload->do_upload($field_name)){
				
				$img=$this->upload->data();
				$data['image']="uploads/". $img['file_name'];
				$this->load->model('storeadmin_model');
				$this->storeadmin_model->addproducts($data);
				$this->manageproducts();
			}
			else{
				$data['error']=$this->upload->display_errors();
				
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('addproducts_view',$data);
				//$this->load->model('storeadmin_model');
				//$this->storeadmin_model->addproducts($data);
				}
		
		
		
	}
	
	public function editproducts($index){
		$store_id=$this->session->userdata('store_id');
		$data['index']= $index;
		$this->load->model('storeadmin_model');
		$data['noofcols']=$this->storeadmin_model->noofcols();
		$data['fields']=$this->storeadmin_model->column_names();
		$data['fieldinfo']=$this->storeadmin_model->fieldmetadata();
		$data['error']="";
		$data['query']=$this->db->get('testsite_colors');
		$data['categoriesquery']=$this->storeadmin_model->showcategories($store_id);


		
		$sql="SELECT * FROM testsite_products WHERE `index`=".$this->db->escape($index);
		$query=$this->db->query($sql);
		$data['row']=$query->row();
						
						
						$this->load->view('templates/header');
			
						$this->load->view('templates/sidebar');
			
						$this->load->view('editproducts_view',$data);
			return;
	}
	
	public function doeditproducts($index){
		
		
		$data = array(	
				'product_id' => $this->input->post('product_id'),
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'Manufacturer_name'=>$this->input->post('manufacturer_name'),
				'color'=>$this->input->post('color'),
				'quantity'=>$this->input->post('quantity'),
				'cat_id'=>$this->input->post('category'),
				'index'=> $index,
						);
			$store_id=$this->session->userdata('store_id');	
			$sql="SELECT parent_id FROM testsite_category WHERE cat_id=".$this->input->post('category')." AND store_id=".$this->db->escape($store_id);
			$query=$this->db->query($sql);
			foreach($query->result() as $row){ $data['parent_id']=$row->parent_id;}
					
			$config= array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "22048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "3000",
			'max_width' => "3000"
			);
			
			
			
		
			$this->load->library('upload',$config);
			$field_name = "image";
			
			if($this->upload->do_upload($field_name)){
				
				$img=$this->upload->data();
				$data['image']="uploads/". $img['file_name'];
				$this->load->model('storeadmin_model');
				$this->storeadmin_model->editproducts($data);
				$this->manageproducts();
			}
			else{
				$data['error']=$this->upload->display_errors();
				
				$this->load->model('storeadmin_model');
				$this->storeadmin_model->editproducts($data);
				$this->manageproducts();
				}
		
		
		
	}
	
	public function showcategory($addedcategory=NULL){
		$this->load->model('storeadmin_model');
		$store_id=$this->session->userdata('store_id');
		$query=$this->storeadmin_model->showcategories($store_id);
		$data['query']=$query;
		$data['addedcategory']=$addedcategory;
		$data['basecategories']=$this->storeadmin_model->showcategoriestable($store_id);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('showcategory_view',$data);
	}
	
	public function doaddcategory(){
		$store_id=$this->session->userdata('store_id');
		if($this->input->post('submit'))
		 {	$q=$this->input->post('dropdown1');
			$data=array(
			'category'=>$this->input->post('category'),
			'parent_id'=>$q,
			'store_id'=>$store_id,
			);
			$addedcategory=$this->input->post('category');
			$this->load->model('storeadmin_model');
			$this->storeadmin_model->addcategory($data);
			$this->showcategory($addedcategory);
		}
		//else if($this->input->post('go')){
			
			
		//}
		
		
		
	}


	/*public function storefrontheader(){
		
		$this->load->model('storeadmin_model');
		$query=$this->storeadmin_model->showcategories();
		$data['query']=$query;
		$data['basecategories']=$this->storeadmin_model->showcategoriestable();
		$data['userdetails']=$this->storeadmin_model->retrieve_user_details();
		$this->load->view('storefront_header',$data);
	}*/
	
	public function vieworders(){
				
				
				
				$this->load->model('storeadmin_model');
				$data['query']=$this->storeadmin_model->retrieve_orders();
				
				
				
				
				
				
				
				
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('orders_adminview',$data);
	}
	public function show_products_ordered($orderid){
		$this->load->model('storeadmin_model');
		$data['products_query']=$this->storeadmin_model->showproductsordered($orderid);
		$data['orderinfo_row']=$this->storeadmin_model->getorderinfo($orderid);
					$this->load->view('templates/header');
					$this->load->view('templates/sidebar');
					$this->load->view('products_in_orders_view',$data);
	}
		
		
	
}
?>



