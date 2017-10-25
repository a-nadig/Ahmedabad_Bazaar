<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model {

public function __construct()
{
parent::__construct();
}

public function adduser(){
	
	$data = array(
	'store_name'=>$this->input->post('store_name'),
	'username'=>$this->input->post('username'),
	'email'=>$this->input->post('email'),
	'password'=>$this->input->post('password'),
	);
	
	if($this->db->insert('store_admin',$data))
	{return $data;}
	else
	{		
		echo "Insert into database unsuccessful";
		return false;
	}
}}
?>