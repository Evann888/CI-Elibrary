<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Statistik extends CI_Controller {
      public function __construct()
      {
        parent::__construct();
        // $this->load->library('session'); sudah di autoload
        $this->load->model('action');
        $this->load->helper('url_helper');
      }

      public function index()
      {
        $this->load->view('t_header');
        $this->load->view('t_sidebar');

        // $data['buku'] = $this->action->get_data('buku')->result();
        $data['report'] = $this->action->report();
        $this->load->view('statistik',$data);
        // $this->load->view('table',$data);

        // if($this->session->userdata('status') != "admin"){
        //     redirect(base_url("login"));
        // } else{
        //   $this->load->view('index',$data);
        // }
      }
    }
?>
