<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Pinjam extends CI_Controller {
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
        $email = $this->session->userdata("email");
        $data['pinjam'] = $this->action->get_data_where('pinjaman',$email)->result();
        $this->load->view('pinjam',$data);
        $this->load->view('t_footer');
      }

      function Cancel($id)
      {
        // echo $id;
        $id = $this->uri->segment(3);
        $this->action->delete_pinjaman('pinjaman',$id);
        $this->session->set_flashdata('hapus', 'Data Sukses dihapus');
        redirect('Pinjam');
        // if($id){
        //
        // }
      }

    }
?>
