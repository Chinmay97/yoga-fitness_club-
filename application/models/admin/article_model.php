
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article_model extends CI_Model {

	public function save($data){
		$this->db->insert("tbl_artcat",$data);
	  return  $this->db->insert_id();


	}

  public function displayArtcat(){
	 return $this->db->get("tbl_artcat");
	}

	public function saveArt($data){
	  return $this->db->insert("tbl_articles",$data);

	}
	public function displayArt($uid){

		$this->db->select('art.*,cat.category');
		$this->db->from('tbl_articles art');
		$this->db->join('tbl_artcat cat', 'art.cat_id =cat.id');
		$this->db->where('art.author', $uid);
		 return $this->db->get();
		//$str = $this->db->last_query();


	}
	public function edit($data){
	 return $this->db->get_where("tbl_articles",$data);
	}

  public function deleteArt($data){
	 return $this->db->delete("tbl_articles",$data);
	}
	public function deleteArtCat($data){
	 return $this->db->delete("tbl_artcat",$data);
	}
}
