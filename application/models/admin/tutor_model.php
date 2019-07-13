<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tutor_model extends CI_Model {

	public function add_tutor($data){
	  $this->db->insert("tbl_tutor",$data);
	  return  $this->db->insert_id();
	}
	public function add_user($data1){
	 return $this->db->insert("tbl_users",$data1);
	}
  public function displayTutors(){
	 return $this->db->get("tbl_tutor");
	}







  public function delete($data){
	 return $this->db->delete("tbl_tutor",$data);
	}

}
