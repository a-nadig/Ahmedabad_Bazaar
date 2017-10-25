<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Logout extends CI_Controller{
	
	public function index(){
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->view('logout_view');
	}
}
?>
