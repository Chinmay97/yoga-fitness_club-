
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_timetable extends CI_Controller {

		public function index()
			{
				$this->load->model('admin/timetable_model');
					$this->load->view('admin/header.php');
					$data['time_edt_list'] =array(
							'id'=>'',
							'event_title'=>'',
							'duration'=>'',
							's_time'=>'',
							't_id'=>'',

						);
				$this->load->model('admin/tutor_model');
				$res = $this->tutor_model->displayTutors();
				$data['t_list'] = $res->result_array();
				$res = $this->timetable_model->displayTimes();
				$data['time_list'] = $res->result_array();
				$this->load->view('admin/Add_timetable.php',$data);
				$this->load->view('admin/footer.php');
			}


		public function save()
			{
				$this->load->model('admin/timetable_model');
				$id=$this->input->post("id");
				$data = array(
						'event_title'=>$this->input->post('event_title'),
						's_time'=>$this->input->post('s_time'),
						'duration'=>$this->input->post('duration'),
						't_id'=>$this->input->post('t_id'),

						);


					if($id>0){
							$res = $this->timetable_model->update_timetable($data,$id);
							$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Schedule has been Updated!</span></h5></div>');
						}else{
						
							$res=$this->timetable_model->save($data);
							$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Schedule has been Added!</span></h5></div>');
						}
						if($res){
							redirect('admin/Add_timetable');
						}
			}

			public function delete()
				{
					$data = array(
						'id'=>$_GET['id']
					);
						$this->load->model('admin/timetable_model');
					$res = $this->timetable_model->deleteArt($data);

					$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Schedule has been Removed!</span></h5></div>');
					if($res){
						redirect('admin/Add_timetable');
						}
				}

				public function edit()
					{
						$data = array(
							'id'=>$_GET['id']
						);
						$this->load->model('admin/timetable_model');
						$res = $this->timetable_model->edit($data)->result_array();
						$res = $res[0] ;
						$data['time_edt_list'] = $res;
						$res = $this->timetable_model->displayTimes();
						$data['time_list'] = $res->result_array();
							$this->load->model('admin/tutor_model');
						$res = $this->tutor_model->displayTutors();
						$data['t_list'] = $res->result_array();

						if($res){
							$this->load->view('admin/header.php');
							$this->load->view('admin/Add_timetable.php',$data);
							$this->load->view('admin/footer.php');
						}
					}



	}
