<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Stores extends MY_Controller{
	
	
	public function __construct(){
		parent::__construct();
		//	parse_str($_SERVER['QUERY_STRING'], $_GET);
	}
	public function index(){
		$this->load->view('homepage');
	}
	
	public function display($store_id){
		
		$data['store_id']=$store_id;
		$this->display_storefrontheader($store_id);
		
		$this->load->view('storefronthome_view',$data);
		$this->load->view('storefront_footer');
		
	}
	public function liststores(){
		$this->load->view('storelist');
	}
}
?>