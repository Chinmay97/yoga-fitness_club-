
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typesof_yoga extends CI_Controller {

		public function index()
			{
				$this->load->model('admin/typesModel');
				$this->load->view('admin/header.php');
				$res = $this->typesModel->displayCat();
				$data['cat_list'] = $res->result_array() ;
				$data['cat_edt_list'] =array(
						'id'=>'',
						'cat_name'=>'',
						'cat_desc'=>'',
						'benifits' =>''
					);
				$this->load->view('admin/typesof_yoga.php',$data);
				$this->load->view('admin/footer.php');
			}

		public function addCat()
			{
				$this->load->model('admin/typesModel');
				$id=$this->input->post("id");
				$data = array(
					'cat_name'=>$this->input->post('cat_name'),
					'cat_desc'=>$this->input->post('cat_desc'),
					'benifits'=>$this->input->post('benifits'),
				);

				if($id>0){
						$res = $this->typesModel->update_cat($data,$id);
						$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Category has been Updated!</span></h5></div>');
					}else{
						$res=$this->typesModel->addCat($data);
						$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Category has been Added!</span></h5></div>');
					}
					if($res){
						redirect('admin/Typesof_yoga');
					}
			}

		public function delete()
			{
				$data = array(
					'id'=>$_GET['id']
				);
				$this->load->model('admin/typesModel');
				$res = $this->typesModel->delete($data);

				$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Category has been Deleted!</span></h5></div>');
				if($res){
					redirect('admin/Typesof_yoga');
				}
			}

			public function edit()
				{
					$data = array(
						'id'=>$_GET['id']
					);
					$this->load->model('admin/typesModel');
					$res = $this->typesModel->edit($data)->result_array();
					$res = $res[0] ;
					$data['cat_edt_list'] = $res;
					$res = $this->typesModel->displayCat();
					$data['cat_list'] = $res->result_array() ;

					if($res){
						$this->load->view('admin/header.php');
						$this->load->view('admin/Typesof_yoga.php',$data);
						$this->load->view('admin/footer.php');
					}
				}

}
