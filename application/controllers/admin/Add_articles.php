
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_articles extends CI_Controller {

		public function index()
			{
				$this->load->model('admin/article_model');
					$this->load->view('admin/header.php');
					$data['art_edt_list'] =array(
							'id'=>'',
							'cat_id'=>'',
							'title'=>'',
							'brief'=>'',
							'description'=>'',

						);
					$res = $this->article_model->displayArtcat();
						$data['cat_list'] = $res->result_array();
				$res = $this->article_model->displayArt($_SESSION['user_id']);
				$data['art_list'] = $res->result_array();

				$this->load->view('admin/Add_article.php',$data);
				$this->load->view('admin/footer.php');
			}


		public function save()
			{
				$this->load->model('admin/article_model');
				$id=$this->input->post("id");
				$date= date("Y-m-d");
					$description=$this->input->post("description");
				$author=$_SESSION['user_id'];
				$data = array(
					//`cat_id`, `title`, `brief`, `description`, `author`, `date`SELECT * FROM `tbl_articles` WHERE 1
						'cat_id'=>$this->input->post('cat_id'),
						'title'=>$this->input->post('title'),
						'brief'=>$this->input->post('brief'),
					//		$description = htmlentities($_POST['description'], ENT_QUOTES);
						'description'=>htmlspecialchars ($description, ENT_QUOTES),
						'author'=>$author,
						'date'=>$date,
						);
				$res = $this->article_model->saveArt($data);
				$this->session->set_flashdata('my_msg',"Added successfully");
				if($res){
					redirect('admin/Add_articles');
					}
			}

			public function deleteArt()
				{
					$data = array(
						'id'=>$_GET['id']
					);
						$this->load->model('admin/article_model');
					$res = $this->article_model->deleteArt($data);

					$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Article has been Deleted!</span></h5></div>');
					if($res){
						redirect('admin/Add_articles');
						}
				}

				public function deleteArtcat()
					{
						$data = array(
							'id'=>$_GET['id']
						);
							$this->load->model('admin/article_model');
						$res = $this->article_model->deleteArtCat($data);

						$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Article Category has been Deleted!</span></h5></div>');
						if($res){
							redirect('admin/Add_articles');
						}
					}



					public function saveArtcat()
						{
							$this->load->model('admin/article_model');
							if(!empty($_POST['process'])){
								$process =  $_POST['process'];
							//	echo $process;
										switch($process){

											case 'ADD_CAT':
											$data = array(
													'category'=>$this->input->post('category'),

													);
												//	print_r($data);
												//	exit;
													$res = $this->article_model->save($data);
													$this->session->set_flashdata('my_msg',"Added successfully");
													if($res){
														echo "<option value='".$res."'>".$data['category']."</option>";
													}
													break;
										}
								}
							}

							public function delCat()
								{
									$data = array(
										'id'=>$_GET['id']
									);
										$this->load->model('admin/article_model');
									$res = $this->article_model->deleteArtCat($data);

									$this->session->set_flashdata('my_msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-check"></i> Done!<span style="float:right;">Article Category has been Deleted!</span></h5></div>');
									if($res){
										redirect('admin/Add_articles');
										}
								}


								public function edit()
									{
										$data = array(
											'id'=>$_GET['id']
										);
										$this->load->model('admin/article_model');
										$res = $this->article_model->edit($data)->result_array();
										$res = $res[0] ;
										$data['art_edt_list'] = $res;


										if($res){
											$this->load->view('admin/header.php');
											$res = $this->article_model->displayArtcat();
											$data['cat_list'] = $res->result_array();
											$res = $this->article_model->displayArt($_SESSION['user_id']);
											$data['art_list'] = $res->result_array();

											$this->load->view('admin/Add_article.php',$data);
											$this->load->view('admin/footer.php');
										}
									}


	}
