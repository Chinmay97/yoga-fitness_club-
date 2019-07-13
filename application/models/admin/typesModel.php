<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class typesModel extends CI_Model {

	public function addCat($data){
	 return $this->db->insert("tbl_types_ofyoga",$data);
	}

  public function displayCat(){
	 return $this->db->get("tbl_types_ofyoga");
	}
  public function delete($data){
	 return $this->db->delete("tbl_types_ofyoga",$data);
	}
  public function edit($data){
	 return $this->db->get_where("tbl_types_ofyoga",$data);
	}
  public function update_cat($data,$id){
	 $this->db->where('id', $id);
	 $res= $this->db->update("tbl_types_ofyoga",$data);
	 return $res;
	}

}
