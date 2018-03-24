<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class login extends CI_Controller {
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
        $this->load->view('login');
      }

      public function register()
      {
          $this->load->view('register');
      }


      public function logout(){
        $this->session->sess_destroy();
        redirect('login');
      }

      public function aksi_login(){
    		$email = $this->input->post('email');
    		$password = $this->input->post('password');
    		$where = array(
    			'Nama' => $email,
    			'password' => $password
    			);
    		$cek = $this->action->cek_login("anggota",$where)->num_rows();

    		if($cek > 0){
    			$data_session = array(
    				'nama' => $username,
    				'status' => "login"
    				);

    			$this->session->set_userdata($data_session);

    			redirect(base_url(""));

    		}else{
    			echo "Email dan password salah !";
    		}
    	}
    }
?>
