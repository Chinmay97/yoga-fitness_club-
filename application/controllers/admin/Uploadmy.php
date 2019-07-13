<?php

   class Uploadmy extends CI_Controller {

      public function __construct() {
         parent::__construct();
         $this->load->helper(array('form', 'url'));
      }

      public function index() {
         $this->load->view('admin/upload_form', array('error' => ' ' ));
      }

      public function do_upload() {
         $config['upload_path']   = './upload/';
         $config['allowed_types'] = 'gif|jpg|png|mp4';
         $config['max_size']      = 4000;
         $config['max_width']     = 1024;
         $config['max_height']    = 768;
         $this->upload->initialize($config);
         $this->load->library('upload', $config);


         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/upload_form', $error);
         }

         else {
            $data = array('upload_data' => $this->upload->data());
            echo "ok";
            //$this->load->view('admin/Uploadmy', $data);
         }
      }
   }
?>
