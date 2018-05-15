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
       // var_dump($data['buku']["0"]); die;

        // if($this->session->userdata('status') != "admin"){
        //     redirect(base_url("login"));
        // } else{
        //   $this->load->view('index',$data);
        // }
      }

      public function tambah()
      {
        $judul = str_replace(' ', '_', $this->input->post('judul')); //soalnya kalo spasi jadi _ di file
        $namafile = $judul."_".time();
        $config['file_name']            = $namafile;
        $config['upload_path']          = './gambar/Buku';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1500;

        $is_upload = 0; $ext =''; $defaultPath ="";
        // echo $_FILES['gambar']['error']; die();
       if ($_FILES['gambar']['error'] != 4) { //supaya upload tidak required 4 => ‘No file was uploaded’,
           $this->load->library('upload', $config);
           if (!$this->upload->do_upload('gambar')){
             $error = array('error' => $this->upload->display_errors());
             $this->session->set_flashdata('error',$error['error']);
             redirect('table','refresh');
           }else{
             $z = $this->upload->data();
             // Resize

             $config['image_library'] = 'gd2';
             $config['source_image'] =  $z['full_path'];
             $config['maintain_ratio'] = false;
             $config['width']  = 1024;
             $config['height'] = 1024;

             $this->load->library('image_lib', $config);

             $this->image_lib->resize();


             $ext =strtolower(pathinfo($_FILES['gambar']["name"],PATHINFO_EXTENSION));;
             // $ext = $z['image_type'];
             // $ext = strtoupper($ext); //uppercase karena hostingan mengharuskan
             $is_upload = 1;
           }

         // $error = array('error' => $this->upload->display_errors());
         // $this->session->set_flashdata('error',$error['error']);
         // redirect('table','refresh');
        } else{ //berarti gambar tidak diuploads
          $defaultPath = "blankbook.PNG";
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

       $this->form_validation->set_rules($config);
       // $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

       $query = $this->db->get_where('buku', array(
                   'ISBN' => $this->input->post('isbn')
               ));
       $count = $query->num_rows();

       if($count){
            $this->session->set_flashdata('error', 'ISBN telah terdaftar');
            redirect('Table');
       }

       // $validator = array('success' => false , 'messages' => array());
       if($this->form_validation->run() === TRUE){
         $insert_Book = $this->action->insert_record("buku",$data);
         	$this->session->set_flashdata('class', 'danger');
         // var_dump($insert_Book); die();
         try{
           if($insert_Book == true){
              // $validator['success'] = true;
              // $validator['messages'] = "Data sukses ditambahkan";
              $this->session->set_flashdata('sukses', 'Data Sukses Ditambahkan');
              redirect('Table');
              // var_dump($validator);
           }  else{
          	 $this->session->set_flashdata('error', validation_errors());
             redirect('Table');
              // $validator['success'] = false;
              // $validator['messages'] = "Data gagal ditambahkan";
            }
         } catch(Exception $e){ //biar gak ke default primary key db_debug di conf database, tapi gabisa
               $this->session->set_flashdata('error', 'Such User exists. Please try again!');
               redirect('Table');
         }
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
        $judul = str_replace(' ', '_', $this->input->post('judul'));
        $namafile = $judul."_".time();
        $config['file_name']            = $namafile;
        $config['upload_path']          = './gambar/Buku';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1500;

        $is_upload = 0; $ext =''; $defaultPath ="";
       if ($_FILES['gambar2']['error'] != 4) { //supaya upload tidak required 4 => ‘No file was uploaded’,
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('gambar2')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            redirect('table','refresh');
          }else{
            $z = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] =  $z['full_path'];
            $config['maintain_ratio'] = false;
            $config['width']  = 1024;
            $config['height'] = 1024;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            
            $ext =strtolower(pathinfo($_FILES['gambar2']["name"],PATHINFO_EXTENSION));;
            $is_upload = 1;
          }
        }  else{ //berarti gambar tidak diuploads
          $defaultPath = "blankbook.PNG";
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
