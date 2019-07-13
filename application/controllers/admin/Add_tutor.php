<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_tutor extends CI_Controller {

		public function index()
			{
				$this->load->model('admin/tutor_model');
					$this->load->view('admin/header.php');
				$res = $this->tutor_model->displayTutors();
				$data['tutors_list'] = $res->result_array();

				$this->load->view('admin/add_tutor.php',$data);
				$this->load->view('admin/footer.php');
			}


		public function tutor_register()
			{
				$this->load->model('admin/tutor_model');

				$data = array(
						'tutor_name'=>$this->input->post('tutor_name'),
						'email'=>$this->input->post('email'),
						'phone'=>$this->input->post('phone'),
						'city'=>$this->input->post('city'),
						);


				$user_id=$this->tutor_model->add_tutor($data);

				$data1 = array(
						'user_id'=>$user_id,
						'user_type'=> 3 ,
						'user_name'=>$this->input->post('email'),
						'passwd'=>$this->input->post('passwd'),
						'status'=>1,
						);
							//`id`, `user_id`, `user_type`, `user_name`, `passwd`SELECT * FROM `tbl_users` WHERE 1

				$res=$this->tutor_model->add_user($data1);

				$this->session->set_flashdata('my_msg',"Register successfully");
				if($res){
					redirect('admin/Add_tutor');
					}
			}

			public function delete()
				{
					$data = array(
						'id'=>$_GET['id']
					);
						$this->load->model('admin/tutor_model');
					$res = $this->tutor_model->delete($data);

					$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Category has been Deleted!</span></h5></div>');
					if($res){
						redirect('admin/Add_tutor');
					}
				}

	}
