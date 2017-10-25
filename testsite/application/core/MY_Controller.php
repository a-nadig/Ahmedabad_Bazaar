<?php
class MY_Controller extends CI_Controller {

public function display_storefrontheader($store_id){
		$this->load->model('storeadmin_model');
		$query=$this->storeadmin_model->showcategories($store_id);
		$data=array();
		$data['query']=$query;
		$data['basecategories']=$this->storeadmin_model->showcategoriestable($store_id);
		$data['store_id']= $store_id;
		//$data['userdetails']=$this->storeadmin_model->retrieve_user_details();
		
		$this->load->model('storefront_model');
		$data['store_name']=$this->storefront_model->getstorename($store_id);
		$this->load->view('storefront_header',$data);
		return;
	}


}
?>