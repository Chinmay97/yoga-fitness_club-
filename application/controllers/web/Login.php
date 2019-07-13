<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		public function index()
			{
				$this->load->model('web/loginModel');
				//$this->load->model('web/login_m');
				$this->load->view('web/header.php');
				$this->load->view('web/login.php');
				$this->load->view('web/footer.php');
			}

		public function mbr_register()
			{
				$this->load->model('web/loginModel');
				$join_date=date("Y/m/d");
				$data = array(
						'member_name'=>$this->input->post('member_name'),
						'member_dob'=>$this->input->post('member_dob'),
						'member_email'=>$this->input->post('member_email'),
						'member_phone'=>$this->input->post('member_phone'),
						'member_city'=>$this->input->post('member_city'),
						'join_date'=>$join_date,
						);


				$user_id=$this->loginModel->add_member($data);

				$data1 = array(
						'user_id'=>$user_id,
						'user_type'=> 2 ,
						'user_name'=>$this->input->post('member_email'),
						'passwd'=>$this->input->post('passwd'),
						'status'=>1,
						);
							//`id`, `user_id`, `user_type`, `user_name`, `passwd`SELECT * FROM `tbl_users` WHERE 1

				$res=$this->loginModel->add_user($data1);

				$this->session->set_flashdata('my_msg',"Register successfully");
				if($res){
					redirect('web/Login');
					}
	    }

	public function check_login()
		{
					$this->load->model('web/loginModel');

					$data = array(
							'user_name'=>$this->input->post('member_email'),
							'passwd'=>$this->input->post('passwd'),
							);


					$res=$this->loginModel->get_user($data);
					$this->session->set_flashdata('my_msg',"Register successfully");
						$num = $res->num_rows();
							$res=$res->result_array();
						if($num==1){
							$this->session->set_userdata('user_name', $res[0]['user_name']);
							$this->session->set_userdata('user_type', $res[0]['user_type']);
							$this->session->set_userdata('user_id', $res[0]['user_id']);
							$this->session->set_userdata('id', $res[0]['id']);

							if($res[0]['user_type']==1){
								/*	$data= array(
													'user_id'=>$res[0]['user_id']
												);
									$res1 = $this->header_modal->getCustomer($data);
									$data['login_name']=$res1;
									$this->session->set_userdata('webUser', $res1[0]['customer_name']);
									$data['login_details']=$res;

							*/

							header('location:'.base_url() .'index.php/admin/DboardAdmin');



						}else if($res[0]['user_type']==2){
							//$web_username ='Hello';
							header('location:../Dboard');
						}else if($res[0]['user_type']==3){
							//$web_username ='Hello';
							header('location:'.base_url() .'index.php/admin/DboardAdmin');
						}else {
							echo "invalid username/password!";
						}

					}
				}



			}
