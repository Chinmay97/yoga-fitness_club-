<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//echo 'hello';
		$this->load->view('web/header.php');
		$this->load->view('web/index.php');
		$this->load->view('web/footer.php');
	}
	public function logmeout()
	 {
			 if(isset($_SESSION['user_name']))
					 unset($_SESSION['user_name']);
				 if(isset($_SESSION['user_type']))
					 unset($_SESSION['user_type']);
				 if(isset($_SESSION['user_id']))
				 unset($_SESSION['user_id']);
				 if(isset($_SESSION['id']))
				 unset($_SESSION['id']);
				 $this->session->set_flashdata('my_msg',"LogOut Successfull..");
				 redirect('web/Dboard');
	 }
}
