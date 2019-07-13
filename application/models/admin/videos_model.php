<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class videos_model extends CI_Model {

	public function addVid($data){
	  $this->db->insert("tbl_videos",$data);
		$qry="update tbl_tutor set number_of_videos = number_of_videos + 1
		where id IN (SELECT user_id
	                    FROM tbl_users
	                   WHERE id=".$_SESSION['user_id'].")";
		//echo $qry;
		//exit;
		return $this->db->query($qry);
		//return $this->db->last_query();
		//exit;
	}


  public function displayVid($uid){

		$this->db->select('vid.*,cat.cat_name');
		$this->db->from('tbl_videos vid');
		$this->db->join('tbl_types_ofyoga cat', 'vid.cat_id =cat.id');
		$this->db->where('vid.tutor_id', $uid);
		$this->db->order_by("date", "asc");
		return $this->db->get();
		//$str = $this->db->last_query();

	}
  public function delete($data){
	  $this->db->delete("tbl_videos",$data);
		$qry="update tbl_tutor set number_of_videos = number_of_videos - 1
		where id IN (SELECT user_id
	                    FROM tbl_users
	                   WHERE id=".$_SESSION['user_id'].")";
		//echo $qry;
		//exit;
		return $this->db->query($qry);
	}

}
