<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_videos extends CI_Controller {

	public function __construct() {
			 parent::__construct();
			 $this->load->helper(array('form', 'url'));
		}

		public function index()
			{
				$this->load->model('admin/videos_model');
				$data['vid_edt_list'] =array(
						'id'=>'',
						'cat_id'=>'',
						'title'=>'',
						'description'=>'',
						'video' =>'',
						'prefered' =>'',
						'v_length'=>'',
					);
					$uid=$_SESSION['id'];
				$this->load->model('admin/videos_model');
				$res = $this->videos_model->displayVid($uid);
				$data['vid_list'] = $res->result_array();
				$this->load->view('admin/header.php');
				$this->load->model('admin/typesModel');
				$res = $this->typesModel->displayCat();
				$data['cat_list'] = $res->result_array() ;
				//print_r($data);
				//exit;
				$this->load->view('admin/add_videos.php',$data);
				$this->load->view('admin/footer.php');
			}

		public function addVid()
			{
				$this->load->model('admin/videos_model');
				$id=$this->input->post("id");
				$date= date("Y-m-d");
				$tutor_id=$_SESSION['user_id'];


				$data = array(
					'cat_id'=>$this->input->post('cat_id'),
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description'),
					'video'=>$this->input->post('video'),
					'prefered'=>$this->input->post('prefered'),
					'v_length'=>$this->input->post('v_length'),
					'tutor_id'=>$tutor_id,
					'date'=>$date,
				);




				 $config['upload_path']   = './upload/';
				 $config['allowed_types'] = 'gif|jpg|png|mp4';
				 $config['max_size']      = 4000;
				 $config['max_width']     = 1024;
				 $config['max_height']    = 768;
				 $this->upload->initialize($config);
				 $this->load->library('upload', $config);


				 if( ! $this->upload->do_upload('userfile'))
				 			{
				 					$error = array('error' => $this->upload->display_errors());
				 					print_r($error);
				 					//exit;
				 			}
				 				else
				 			{
				 				$uplod_data=$this->upload->data();
				 				$video=$uplod_data['file_name'];
				 				$data['video']=$video;
				 				//print_r($video);
				 				//exit;
				 			}





				if($id>0){
						$res = $this->videos_model->update_vid($data,$id);
						$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Video Info has been Updated!</span></h5></div>');
					}else{
						$res=$this->videos_model->addVid($data);
						$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Video has been Added!</span></h5></div>');
					}
					if($res){
						redirect('admin/Add_videos');
					}
			}

		public function delete()
			{
				$data = array(
					'id'=>$_GET['id']
				);
				$this->load->model('admin/videos_model');
				$res = $this->videos_model->delete($data);

				$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Video has been Deleted!</span></h5></div>');
				if($res){
					redirect('admin/Add_videos');
				}
			}

		public function edit()
			{
				$data = array(
					'id'=>$_GET['id']
				);
				$uid=$_SESSION['user_id'];

				$this->load->model('admin/videos_model');
				$res = $this->videos_model->edit($data)->result_array();
				$res = $res[0] ;
				$data['vid_edt_list'] = $res;
				$res = $this->videos_model->displayVid($uid);
				$data['vid_list'] = $res->result_array();
				$this->load->model('admin/typesModel');
				$res = $this->typesModel->displayCat();
				$data['cat_list'] = $res->result_array() ;
			//	print_r($data);
				//exit;

				if($res){
					$this->load->view('admin/header.php');
					$this->load->view('admin/Add_videos.php',$data);
					$this->load->view('admin/footer.php');
				}
			}

}
