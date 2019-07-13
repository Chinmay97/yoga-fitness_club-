
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class programs_model extends CI_Model {

	public function add_program($data){
		return $this->db->insert("tbl_programs",$data);
	}

  public function displayProgram(){
	 return $this->db->get("tbl_programs");
	}
  public function deleteProgram($data){
	 return $this->db->delete("tbl_programs",$data);
	}

	public function uploadFile($file_field,$upload_directory ='',$current_file_name='')
	{
		if(!is_dir('../uploads/'.$upload_directory.'/')){
			mkdir('../uploads/'.$upload_directory.'/');
		}
		$upload_directory = '../uploads/'.$upload_directory.'/';
		$file_name = $current_file_name;
		if(isset($_FILES[$file_field]['name']) &&  $_FILES[$file_field]['name']!=''){
			$ext=pathinfo($_FILES[$file_field]["name"],PATHINFO_EXTENSION);
			$file_path = $upload_directory.'file_'.time().'.'.$ext;
			if(move_uploaded_file( $_FILES[$file_field]['tmp_name'],$file_path)){
				$file_name = $file_path;
			}
		}
		return $file_name;
	}
}
