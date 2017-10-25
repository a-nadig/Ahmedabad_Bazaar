<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storefront_model extends CI_Model {
	
	public function construct(){
		
		parent::__construct();
		
	}
	
	public function getproducts($store_id,$i){
		
			
		//GETTING A LIST OF CATEGORIES WE NEED TO DISPLAY PRODUCTS OF
		$sql1="SELECT * FROM testsite_category WHERE store_id=".$this->db->escape($store_id);
		$query1=$this->db->query($sql1);
		
		$sql="SELECT * FROM testsite_category WHERE cat_id= ".$this->db->escape($i)."OR parent_id=". $this->db->escape($i);
		$query=$this->db->query($sql);
		
		
		
		$catstodisplay[0]=$i;
		$j=1;
			
			
				
				foreach($query1->result() as $row1){
					if($row1->parent_id==$i)
					{
						
						$catstodisplay[$j]=$row1->cat_id;
						$temp=$catstodisplay[$j];
						$j++;
								foreach($query1->result() as $row2){
									if($row2->parent_id==$temp)
									{
						
										$catstodisplay[$j]=$row2->cat_id;
										$temp1=$catstodisplay[$j];
										$j++;
												foreach($query1->result() as $row3){
													if($row3->parent_id==$temp1)
													{
						
														$catstodisplay[$j]=$row3->cat_id;
														$j++;
													 }
						
												}
									}
						
								}
					}
				}
			//	print_r($catstodisplay);
		
		$sql="SELECT * FROM testsite_products WHERE ";
		$sql .= "`store_id`=".$this->db->escape($store_id)." AND (";
		for($x=0;$x<count($catstodisplay);$x++){
		
		 if($x!==0){$sql .=" OR ";}
		 $sql .= "cat_id=".$this->db->escape($catstodisplay[$x]);
		
		
		}
		$sql .= ")";
		//print_r($sql);
		$query1=$this->db->query($sql);
		//print_r($sql);
		return $query1;
	}
	
	public function getstorename($store_id){
		$sql="SELECT store_name FROM store_admin WHERE store_id=".$this->db->escape($store_id);
		$query=$this->db->query($sql);
		$row = $query->row();
		$store_name=$row->store_name;
		return $store_name;
	}
	
	
	
	}
