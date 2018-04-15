<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class table extends CI_Controller {
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
        // $this->load->view('table');

        $data['buku'] = $this->action->get_data('buku')->result();
        $this->load->view('table',$data);
        // if($this->session->userdata('status') != "admin"){
        //     redirect(base_url("login"));
        // } else{
        //   $this->load->view('index',$data);
        // }
      }

      public function tambah()
      {
        $data = array(
          'ISBN' => $this->input->post('isbn'),
          'Judul_Buku' => $this->input->post('judul'),
          'Pengarang' => $this->input->post('pengarang'),
          'Penerbit' => $this->input->post('penerbit'),
          'Stok' => $this->input->post('stok'),
        );

        $config = array(
          array(
            'field' => 'isbn',
            'label' => 'ISBN',
            'rules' => 'trim|required'
          ),
          array(
            'field' => 'judul',
            'label' => 'Judul buku',
            'rules' => 'trim|required|is_unique[buku.Judul_Buku]'
          ),
          array(
            'field' => 'pengarang',
            'label' => 'Pengarang',
            'rules' => 'trim|required'
          ),
          array(
            'field' => 'penerbit',
            'label' => 'Penerbit',
            'rules' => 'trim|required'
          ),
          array(
            'field' => 'stok',
            'label' => 'Stok',
            'rules' => 'trim|required'
          )
        );
       // redirect(base_url("login/index_cont"));
       $this->form_validation->set_rules($config);
       $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

       $validator = array('success' => false , 'messages' => array());
       if($this->form_validation->run() === TRUE){
         $insert_Book = $this->action->insert_record("buku",$data);

         if($insert_Book == true){
            $validator['success'] = true;
            $validator['messages'] = "Data sukses ditambahkan";
         } else{
           $validator['success'] = false;
           $validator['messages'] = "Data gagal ditambahkan";
         }
         // $this->load->view('register');
       }else{
         $validator['success'] = false;
         foreach ($_POST as $key => $value) {
          $validator['messages'][$key] = form_error($key);
         }
          // echo "<script>alert('Email telah terdaftar')</script>";
       }
       // $this->session->set_flashdata('mydata',$data);
       echo json_encode($validator);
       // redirect('Table');

       // if($this->input->method() == "post") {
       //    // $this->action->update_comment($data,$name,'data');
       // }

      }
    }
?>
