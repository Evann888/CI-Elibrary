<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Gallery extends CI_Controller {
      public function __construct()
      {
        parent::__construct();
        // $this->load->library('session'); sudah di autoload
        $this->load->model('action');
      }

      public function index()
      {
        $this->load->view('t_header');
        $this->load->view('t_sidebar');
        $this->load->view('gallery');
        $this->load->view('t_footer');
      }
    }
?>
