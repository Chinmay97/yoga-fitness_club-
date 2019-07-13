<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginModel extends CI_Model {

	public function add_member($data){
	  $this->db->insert("tbl_members",$data);
	  return  $this->db->insert_id();
	}
	public function add_user($data1){
	 return $this->db->insert("tbl_users",$data1);
	}

	public function get_user($data){

			$this->db->where('user_name', $data['user_name']);
			$this->db->where('passwd', $data['passwd']);
			$res = $this->db->get('tbl_users');
			//$str = $this->db->last_query();
			//echo $str;
			return $res;

	}

}
