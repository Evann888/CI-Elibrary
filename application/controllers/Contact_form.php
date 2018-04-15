<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Contact_form extends CI_Controller {
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
        $this->load->view('contact_form');
      }
  }
?>
