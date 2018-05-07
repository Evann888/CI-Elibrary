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

        $data['buku'] = $this->action->get_data('buku')->result();
        $this->load->view('table',$data);
        // $this->load->view('table',$data);

        // if($this->session->userdata('status') != "admin"){
        //     redirect(base_url("login"));
        // } else{
        //   $this->load->view('index',$data);
        // }
      }

      public function tambah()
      {
        $judul = $this->input->post('judul');
        $namafile = $judul."_".time();
        $config['file_name']            = $namafile;
        $config['upload_path']          = './gambar/Buku';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1500;

        $is_upload = 0; $ext =''; $defaultPath ="";
       if ($_FILES['gambar']['error'] <> 4) { //supaya upload tidak required 4 => ‘No file was uploaded’,
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            $defaultPath = "blankbook.PNG";
            redirect('table','refresh');
          }else{
            $z = $this->upload->data();
            $ext = $z['image_type'];
            $ext = strtoupper($ext); //uppercase karena hostingan mengharuskan
            $is_upload = 1;
          }
        }

        $data = array(
          'ISBN' => $this->input->post('isbn'),
          'Judul_Buku' => ucwords($this->input->post('judul')),
          'Pengarang' => ucwords($this->input->post('pengarang')),
          'Penerbit' => ucwords($this->input->post('penerbit')),
          'Stok' => $this->input->post('stok'),
          'Path' => $config['file_name'].'.'.$ext,
          'DefaultPath' => $defaultPath,
          'is_upload' => $is_upload
        );

        $config = array(
          array(
            'field' => 'isbn',
            'label' => 'ISBN',
            'rules' => 'trim|required|max_length[13]|min_length[13]|numeric'
          ),
          array(
            'field' => 'judul',
            'label' => 'Judul buku',
            'rules' => 'trim|required|is_unique[buku.Judul_Buku]|max_length[30]'
          ),
          array(
            'field' => 'pengarang',
            'label' => 'Pengarang',
            'rules' => 'trim|required|max_length[30]'
          ),
          array(
            'field' => 'penerbit',
            'label' => 'Penerbit',
            'rules' => 'trim|required|max_length[30]'
          ),
          array(
            'field' => 'stok',
            'label' => 'Stok',
            'rules' => 'trim|required|max_length[30]|numeric'
          )
        );
       // redirect(base_url("login/index_cont"));
       $this->form_validation->set_rules($config);
       $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

       $validator = array('success' => false , 'messages' => array());
       if($this->form_validation->run() === TRUE){
         $insert_Book = $this->action->insert_record("buku",$data);
         	$this->session->set_flashdata('class', 'danger');
         // var_dump($insert_Book); die();
         if($insert_Book == true){
            // $validator['success'] = true;
            // $validator['messages'] = "Data sukses ditambahkan";
           	$this->session->set_flashdata('sukses', 'Data Sukses Ditambahkan');
            redirect('Table');
            // var_dump($validator);
         }
         //  else{
         //   $validator['success'] = false;
         //   $validator['messages'] = "Data gagal ditambahkan";
         // }
         // $this->load->view('register');
       }else{
       	 $this->session->set_flashdata('error', validation_errors());
         redirect('Table');
         // $this->index()
         // $validator['success'] = false;
         // foreach ($_POST as $key => $value) {
         //  $validator['messages'][$key] = form_error($key);
         // }
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
        $judul = $this->input->post('judul');
        $namafile = $judul."_".time();
        $config['file_name']            = $namafile;
        $config['upload_path']          = './gambar/Buku';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1500;

        $is_upload = 0; $ext =''; $defaultPath ="";
       if ($_FILES['gambar2']['error'] <> 4) { //supaya upload tidak required 4 => ‘No file was uploaded’,
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('gambar2')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            $defaultPath = "blankbook.PNG";
            // redirect('table','refresh');
          }else{
            $z = $this->upload->data();
            $ext = $z['image_type'];
            $ext = strtoupper($ext); //uppercase karena hostingan mengharuskan
            $is_upload = 1;
          }
        }

        $data = array(
          'ISBN' => $this->input->post('isbn'),
          'Judul_Buku' => ucwords($this->input->post('judul')),
          'Pengarang' => $this->input->post('pengarang'),
          'Penerbit' => $this->input->post('penerbit'),
          'Stok' => $this->input->post('stok'),
          'Path' => $config['file_name'].'.'.$ext,
          'DefaultPath' => $defaultPath,
          'is_upload' => $is_upload
        );

        $config = array(
          array(
            'field' => 'isbn',
            'label' => 'ISBN',
            'rules' => 'trim|required|max_length[13]|min_length[13]|numeric'
          ),
          array(
            'field' => 'judul',
            'label' => 'Judul buku',
            'rules' => 'trim|required|max_length[30]'
          ),
          array(
            'field' => 'pengarang',
            'label' => 'Pengarang',
            'rules' => 'trim|required|max_length[30]'
          ),
          array(
            'field' => 'penerbit',
            'label' => 'Penerbit',
            'rules' => 'trim|required|max_length[30]'
          ),
          array(
            'field' => 'stok',
            'label' => 'Stok',
            'rules' => 'trim|required|max_length[30]|numeric'
          )
        );
       $this->form_validation->set_rules($config);

       $id = $this->input->post('id');

       if($this->form_validation->run() === TRUE){
         $update_buku = $this->action->update_buku($data,$id,"buku");
         // var_dump($insert_Book); die();
         if($update_buku == true){
            $this->session->set_flashdata('sukses', 'Data Sukses diupdate');
            redirect('Table');
            // var_dump($validator);
         }
       }else{
         $this->session->set_flashdata('error', validation_errors());
         redirect('Table');
         // $this->index()
       }
      }

      function delete($id)
      {
        // echo $id;
        $id = $this->uri->segment(3);
        $this->action->delete_buku('buku',$id);
        $this->session->set_flashdata('hapus', 'Data Sukses dihapus');
        redirect('Table');
        // if($id){
        //
        // }
      }
    }
?>
