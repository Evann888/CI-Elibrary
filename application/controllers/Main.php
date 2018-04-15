<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Main extends CI_Controller {
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
        $this->load->view('main');
        $this->load->view('t_footer');
      }

      public function toCalendar()
      {
        redirect(base_url("calendar"));
      }

      public function toGallery()
      {
        redirect(base_url("gallery"));
      }

      public function toRegister()
      {
        redirect(base_url("register"));
      }

      public function toLogin()
      {
        redirect(base_url("login"));
      }

      public function toTable()
      {
        redirect(base_url("table"));
      }

      public function toContact()
      {
        redirect(base_url("contact_form"));
      }


    }
?>
