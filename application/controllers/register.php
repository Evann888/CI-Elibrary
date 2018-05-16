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
      $this->load->library('encrypt');
    }

    public function index()
    {
      // $data['data'] = $this->news_model->get_data();
      // echo 'test';
      date_default_timezone_set('Asia/Jakarta');
      $this->load->view('register', array('error' => ' ' ));
    }

	function input(){
    $namauser = $this->input->post('nama');
    $namafile = $namauser."_".time();
    $config['file_name']            = $namafile;
    $config['upload_path']          = './gambar/User';
    $config['allowed_types']        = 'jpg|png|jpeg';
    $config['max_size']             = 10000;
    $config['max_width']            = 2000;
    $config['max_height']           = 1500;

    $is_upload = 0; $ext =''; $defaultPath ="";
   if ($_FILES['gambar']['error'] != 4) { //supaya upload tidak required 4 => ‘No file was uploaded’,
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')){
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('error',$error['error']);
        redirect('register','refresh');
      }else{
        $z = $this->upload->data();
        $ext =strtolower(pathinfo($_FILES['gambar']["name"],PATHINFO_EXTENSION));;
        $is_upload = 1;
      }
    }  else{ //berarti gambar tidak diuploads
      $defaultPath = "defaultuser.png";
    }

    $encryptedpass = $this->encrypt->encode($this->input->post('password'));

    $data = array(
      'Email' => trim(htmlspecialchars($this->input->post('email'),ENT_QUOTES)),
      'Password' => trim(htmlspecialchars($encryptedpass),ENT_QUOTES),
      'Nama' => trim(htmlspecialchars(ucwords($this->input->post('nama')),ENT_QUOTES)),
      'Jenis_Kelamin' => trim(htmlspecialchars(ucwords($this->input->post('jk')),ENT_QUOTES)),
      'Alamat' => trim(htmlspecialchars(ucwords($this->input->post('alamat')),ENT_QUOTES)),
      'Tanggal_Lahir' => $this->input->post('tgl'),
      'NIK' => trim(htmlspecialchars($this->input->post('nik'),ENT_QUOTES)),
      'No_HP' => trim(htmlspecialchars($this->input->post('nohp'),ENT_QUOTES)),
      'Path' => $config['file_name'].'.'.$ext,
      'is_upload' => $is_upload,
      'date' => date("Y-m-d"),
      "DefaultPath" => $defaultPath
    );

    $this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[16]');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[anggota.Email]|valid_email');
    $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');
    $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|numeric');

    $this->form_validation->set_message('min_length[16]', '%s harus 16 angka');
    $this->form_validation->set_message('is_unique', '%s telah terdaftar');

    if($this->form_validation->run() == FALSE){
      $this->load->view('register');
    }else{
      $this->action->insert_record("anggota",$data);
       // echo "<script>alert('Email telah terdaftar')</script>";
       redirect('main');
     }
	 }

    public function back()
    {
      redirect('login');
    }
  }
?>
