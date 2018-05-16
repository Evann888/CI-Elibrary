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
        $this->load->library('encrypt');
    }

      public function index()
      {
        $this->load->view('t_header');
        $this->load->view('t_sidebar');
        $this->load->view('profile');
      }

      public function ubahPass()
      {
        //ambil passs db lalu decrypt
        $email= $this->session->userdata('email');
        $passlogin = $this->action->getPassLogin($email);


        $passlama = trim(htmlspecialchars($this->input->post('plama'),ENT_QUOTES));
        $passkonfirmasi = trim(htmlspecialchars($this->input->post('pkonf'),ENT_QUOTES));
        $passbaru = trim(htmlspecialchars($this->input->post('pbaru'),ENT_QUOTES));

        $nomor = $this->session->userdata("nomor");
        $passdb = $this->action->getPassDbNow($nomor);
        $decodepassdb = $this->encrypt->decode($passlogin);

        $data = array(
          'Password' =>  $this->encrypt->encode($passbaru)
        );

        if($passlama == $decodepassdb){
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
