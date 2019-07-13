
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class timetable_model extends CI_Model {

	public function save($data){
		$this->db->insert("tbl_timetable",$data);
	  return  $this->db->insert_id();


	}

  public function displayTimes(){
	// return $this->db->get("tbl_timetable");
	 $this->db->select('time.*,t.tutor_name');
	 $this->db->from('tbl_timetable time');
	 $this->db->join('tbl_tutor t', 'time.t_id =t.id');
		return $this->db->get();
	}


	public function edit($data){
	 return $this->db->get_where("tbl_timetable",$data);
	}

  public function deleteArt($data){
	 return $this->db->delete("tbl_timetable",$data);
	}

	public function update_timetable($data,$id){
	 $this->db->where('id', $id);
	 $res= $this->db->update("tbl_timetable",$data);
	 return $res;
	}

}
