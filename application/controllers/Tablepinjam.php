<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Tablepinjam extends CI_Controller {
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

        $data['pinjam'] = $this->action->get_data('pinjaman')->result();
        $this->load->view('tablepinjam',$data);
       // var_dump($data['buku']["0"]); die;

        // if($this->session->userdata('status') != "admin"){
        //     redirect(base_url("login"));
        // } else{
        //   $this->load->view('index',$data);
        // }
      }

      function approve()
      {
        $hari = $this->input->post("hari");
        $data = array(
          "Tanggal_Pinjaman" => date('Y-m-d'),
          "Tanggal_Kembali" => date('Y-m-d', strtotime("+".$hari." days")),
          "Jumlah" => 1,
          "Status" => "Telah Disetujui"
        );

        $isbn = $this->input->post("isbn");
        $nama = $this->input->post("nama");

        if($this->action->update_datapinjam($data,$isbn,$nama,"pinjaman") == TRUE){
           $this->session->set_flashdata('sukses', 'Pinjaman buku oleh'. $nama. 'telah disetujui');
           redirect('tablepinjam');
        }else{
          redirect('tablepinjam');
        }
      }

      function Cancel($id)
      {
        // echo $id;
        $id = $this->uri->segment(3);
        $this->action->delete_pinjaman('pinjaman',$id);
        $this->session->set_flashdata('hapus', 'Data Pinjaman Sukses dihapus');
        redirect('tablepinjam');
        // if($id){
        //
        // }
      }

      function autoMail()
      {

      }
    }
?>
