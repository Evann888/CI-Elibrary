<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class User extends CI_Controller {
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

        $data['user'] = $this->action->get_data('anggota')->result();
        $this->load->view('user',$data);
        // $this->load->view('table',$data);

        // if($this->session->userdata('status') != "admin"){
        //     redirect(base_url("login"));
        // } else{
        //   $this->load->view('index',$data);
        // }
      }

      public function tambah()
      {
        $data = array(
          'Email' => $this->input->post('email'),
          'Password' => $this->input->post('password'),
          'Nama' => ucwords($this->input->post('nama')),
          'Jenis_Kelamin' => $this->input->post('jk'),
          'Alamat' => $this->input->post('alamat'),
          'Tanggal_Lahir' => $this->input->post('tgl'),
          'NIK' => $this->input->post('nik'),
          'No_HP' => $this->input->post('nohp'),
          'date' => date("Y-m-d")
        );

        // valid_email
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[anggota.Email]');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|numeric');

        $this->form_validation->set_message('min_length', '%s harus 16 angka');
        $this->form_validation->set_message('is_unique', '%s telah terdaftar');

       // $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
       //
       // $validator = array('success' => false , 'messages' => array());
       if($this->form_validation->run() === TRUE){
         $insert_User = $this->action->insert_record("anggota",$data);
         	$this->session->set_flashdata('class', 'danger');
         // var_dump($insert_Book); die();
         if($insert_User == true){
            $validator['success'] = true;
            $validator['messages'] = "Data sukses ditambahkan";
           	$this->session->set_flashdata('sukses', 'Data Sukses Ditambahkan');
            redirect('User');
            // var_dump($validator);
         } else{
           $validator['success'] = false;
           $validator['messages'] = "Data gagal ditambahkan";
         }
         // $this->load->view('register');
       }else{
       	 $this->session->set_flashdata('error', validation_errors());
         redirect('User');
         // $this->index()
         $validator['success'] = false;
         foreach ($_POST as $key => $value) {
          $validator['messages'][$key] = form_error($key);
         }
          // echo "<script>alert('Email telah terdaftar')</script>";
       }
       // $this->session->set_flashdata('mydata',$data);
       // echo json_encode($validator);
       // redirect('Table');
       // if($this->input->method() == "post") {
       //    // $this->action->update_comment($data,$name,'data');
       // }
      }

      function edit()
      {
        $data = array(
          'Email' => $this->input->post('email'),
          'Password' => $this->input->post('password'),
          'Nama' => ucwords($this->input->post('nama')),
          'Jenis_Kelamin' => $this->input->post('jk'),
          'Alamat' => $this->input->post('alamat'),
          'Tanggal_Lahir' => $this->input->post('tgl'),
          'NIK' => $this->input->post('nik'),
          'No_HP' => $this->input->post('nohp'),
        );

        // valid_email
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|numeric');

        $this->form_validation->set_message('min_length', '%s harus 16 angka');
        $this->form_validation->set_message('is_unique', '%s telah terdaftar');

       $nomor = $this->input->post('nomor');

       if($this->form_validation->run() === TRUE){
          $update_User = $this->action->update_user($data,$nomor,"anggota");
         	$this->session->set_flashdata('class', 'danger');
         // var_dump($insert_Book); die();
         if($update_User == true){
           	$this->session->set_flashdata('sukses', 'Data Sukses Diedit');
            redirect('User');
         }
       }else{
       	 $this->session->set_flashdata('error', validation_errors());
         redirect('User');
       }
      }

      function delete($nomor)
      {
        // echo $id;
        $nama = $this->uri->segment(3);
        $this->action->delete_user('anggota',$nomor);
        $this->session->set_flashdata('hapus', 'Data Sukses dihapus');
        redirect('User');
      }
    }
?>
