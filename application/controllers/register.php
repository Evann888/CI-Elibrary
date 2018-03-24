<?php
  // require 'function.php';
  // validate($_POST);
defined('BASEPATH') OR exit('No direct script access allowed');
  class register extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('action');
      $this->load->helper('url_helper');
      $this->load->library('form_validation');
    }

    public function index()
    {
      // $data['data'] = $this->news_model->get_data();
      // echo 'test';
      $this->load->view('register');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[anggota.Email]');
    }


	function input(){
    $data = array(
      'Email' => $this->input->post('email'),
      'Password' => $this->input->post('password'),
      'Nama' => $this->input->post('nama'),
      'Jenis_Kelamin' => $this->input->post('jk'),
      'Alamat' => $this->input->post('alamat'),
      'Tanggal_Lahir' => $this->input->post('tgl'),
      'NIK' => $this->input->post('nik'),
      'No_HP' => $this->input->post('nohp')
    );

   if($this->input->method() == "post") {
     if($this->form_validation->run() != false){
       $this->action->insert_record("anggota",$data);
       redirect('login');
     }else{
       echo "<script>alert('Email telah terdaftar')</script>";
     }
   }
	}

    public function back()
    {
      redirect('login');
    }
  }
?>
