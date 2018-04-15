<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Calendar extends CI_Controller {
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
        $this->load->view('calendar');
        $this->load->view('t_footer');
      }
  }
?>
