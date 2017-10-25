<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Login extends CI_Controller{
	
	public function index(){
		
	}
	public function signin(){
		
		$this->load->view('login_view');
		
	}
		 
	public function dologin(){
		$this->load->library('session');
		$this->load->model('storeadmin_model');
		$data=$this->storeadmin_model->dologin();
		if($data){
			$this->session->set_userdata($data);
			$p=$this->session->all_userdata();
			header('Location: '.base_url('storeadmin/gotodashboard'));
			print_r($p);
		}
		else{
			$data['error']= "TRUE";
			
			$this->load->view('login_view',$data);
		}
	}
	
	public function register(){
		$this->load->view('signup_view');
	}
	public function doregister()
	{	$this->load->library('session');
		if($this->input->post('submit'))
		{
			$this->load->model('signup_model');
			$data=$this->signup_model->adduser(); //Returns $data array containing all fields of store_admin table
				$this->load->view('registrationsuccess_view',$data);
		}
		else
			{echo "looks like $_POST submit is false!";}
	}

	
	
	
	
}
	?>