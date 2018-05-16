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
        $data['buku'] = $this->action->get_9_data('buku')->result();
        $data['anggota'] = $this->action->get_5_data('anggota')->result();
        $data['topbuku'] = $this->action->get_top_buku('buku')->result();

        $this->load->view('main',$data);
        $this->load->view('t_footer');
        date_default_timezone_set('Asia/Jakarta');
      }

      public function booking()
      {
        $nama = $this->input->post('nama'); $judul= $this->input->post('judul');//dari session

        $data = array(
          'ISBN' => $this->input->post('isbn'),
          'Judul_Buku' => $judul,
          'is_booking' => 1,
          'Nama' => $nama,
          'Email' => $this->input->post('email'),
          "Tanggal_Booking" => date('Y-m-d'),
          "Hari" => $this->input->post('hari'),
          "Status" => "Menunggu Konfirmasi"
        );

        if($this->session->userdata("status") == 'login'){
          if($this->action->join_2_tabel("buku","pinjaman",$nama,$judul) == TRUE){
             if($this->action->insert_record("pinjaman",$data) == TRUE){
               redirect('Pinjam');
             }else{
               $this->session->set_flashdata('error', validation_errors());
               redirect('Main');
               // $this->index()
             }
           } else{
             $this->session->set_flashdata('error', 'Booking buku sedang menunggu status admin');
             redirect('Main');
           }
         }else{
           $this->session->set_flashdata('gagal', 'Anda perlu login dahulu untuk meminjam buku');
           redirect('Login');
         }
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

      public function toTablePinjam()
      {
        redirect(base_url("tablepinjam"));
      }

      public function toTableBukuUser()
      {
        redirect(base_url("table_buku_user"));
      }

      public function toUser()
      {
        redirect(base_url("user"));
      }

      public function toNotif()
      {
        redirect(base_url("table"));
      }

      public function toContact()
      {
        redirect(base_url("contact_form"));
      }

      public function toStatistik()
      {
        redirect(base_url("statistik"));
      }

      public function toProfile()
      {
        redirect(base_url("profile"));
      }

      public function toPinjam()
      {
        redirect(base_url("pinjam"));
      }


    }
?>
