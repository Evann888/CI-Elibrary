<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Profile extends CI_Controller {
      public function __construct()
      {
        parent::__construct();
        // $this->load->library('session'); sudah di autoload
        $this->load->model('action');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
      $this->load->library('session');}

      public function index()
      {
        $this->load->view('t_header');
        $this->load->view('t_sidebar');
        $this->load->view('profile');
      }

      function ubahPass()
      {
        $passlama = $this->input->post('plama');
        $passkonfirmasi = $this->input->post('pkonf');
        $passbaru = $this->input->post('pbaru');

        $emaillogin = $this->session->userdata("email");
        $nomor = $this->session->userdata("nomor");
        $passdb = $this->action->getPassDbNow($nomor);

        $data = array(
          'Password' => $passbaru
        );

        if($passlama == $passdb){
            if($passlama == $passkonfirmasi){
              $update_pass = $this->action->update_pass($data,$nomor,"anggota");
              if($update_pass == true){
                 $this->session->set_flashdata('ubahpass', 'Password berhasil diubah');
                 redirect('Profile');
              }
            } else{
                $this->session->set_flashdata('konfgagal', 'Konfirmasi Password tidak sesuai');
                redirect('Profile');
              }
       }else{
          $this->session->set_flashdata('dbgagal', 'Password tidak sesuai');
          redirect('Profile');
        }
      }
  }
?>
