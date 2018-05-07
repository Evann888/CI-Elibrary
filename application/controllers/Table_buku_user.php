<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class table_buku_user extends CI_Controller {
      public function __construct()
      {
        parent::__construct();
        // $this->load->library('session'); sudah di autoload
        $this->load->model('action');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
      }

      public function index()
      {
        $this->load->view('t_header');
        $this->load->view('t_sidebar');

        $data['buku'] = $this->action->get_data('buku')->result();
        $this->load->view('table_user',$data);
        // $this->load->view('table',$data);

        // if($this->session->userdata('status') != "admin"){
        //     redirect(base_url("login"));
        // } else{
        //   $this->load->view('index',$data);
        // }
      }
  }
?>
