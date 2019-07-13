<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mbr_model extends CI_Model {


  public function displayMbr(){
	 return $this->db->get("tbl_members");
	}





}
