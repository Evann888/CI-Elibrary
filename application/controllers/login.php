<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Login extends CI_Controller {
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
        // var_dump($gbrpath);
        // die();
        // $captcha_response = $this->input->post('g-recaptcha-response');
        // $url = 'https://www.google.com/recaptcha/api/siteverify';
        // $secretkey = '6LcvOVgUAAAAANYRD1SRiDxCc9MHnG7qQdS-C5Gc';
        // $response = file_get_contents($url."?secret=".$secretkey."&response=".$captcha_response);
        // $data = json_decode($response);

    		$where = array(
    			'Email' => $email,
    			'Password' => $password
    			);
    		$cek = $this->action->cek_login("anggota",$where)->num_rows();

        // if(isset($data->success) && $data->success =="true"){
          if($cek > 0 ){
            $nomor = $this->action->getNomorLogin($email);
            $username = $this->action->getNamaLogin($email);
            $gbrpath = $this->action->getPathLogin($email);
            $gbrdefpath = $this->action->getDefPathLogin($email);
            $emaillogin = $this->action->getEmailLogin($email);
            $upload_stats = $this->action->getStats($email);
            $is_admin = $this->action->getAdminStats($email);

            $data_session = array(
              'nomor' => $nomor,
              'nama' => $username,
              'path' => $gbrpath,
              'DefaultPath' => $gbrdefpath,
              'email' => $emaillogin,
              'status_upload' => $upload_stats,
              "admin" => $is_admin,
              'status' => "login"
              );
          $this->session->set_userdata($data_session);
          redirect(base_url("main"));
          }else{
            $this->session->set_flashdata('gagal', 'Email atau Password Salah');
            redirect('Login');
          }
        // } else{
        //   $this->session->set_flashdata('gagal', 'Silahkan mengisi Data dan CAPTCHA dengan tepat');
        //   redirect('Login');
        // }

    	}
    }
?>
