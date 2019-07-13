<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_programs extends CI_Controller {

		public function index()
			{
				$this->load->model('admin/programs_model');
					$this->load->view('admin/header.php');
				$res = $this->programs_model->displayProgram();
				$data['prgm_list'] = $res->result_array();


				$this->load->view('admin/add_programs.php',$data);
				$this->load->view('admin/footer.php');
			}


		public function save()
			{
				$this->load->model('admin/programs_model');

				$data = array(
						'prgm_title'=>$this->input->post('prgm_title'),
						'prgm_fee'=>$this->input->post('prgm_fee'),
						'prgm_brief'=>$this->input->post('prgm_brief'),

						);


				$res=$this->programs_model->add_program($data);

				$this->session->set_flashdata('my_msg',"Added successfully");
				if($res){
					redirect('admin/Add_programs');
					}
			}

			public function delete()
				{
					$data = array(
						'id'=>$_GET['id']
					);
						$this->load->model('admin/programs_model');
					$res = $this->programs_model->deleteProgram($data);

					$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Category has been Deleted!</span></h5></div>');
					if($res){
						redirect('admin/Add_programs');
					}
				}

	}
