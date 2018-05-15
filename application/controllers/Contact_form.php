<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Contact_form extends CI_Controller {
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
        $this->load->view('contact_form');
      }

      function postEmail()
      {
          $config = array(
            'useragent' => 'CodeIgniter',
                          'protocol'  => 'smtp',
                          'mailpath'  => '/usr/sbin/sendmail',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => 'glhf3033@gmail.com',
                          'smtp_pass' => 'qwer1212',
                          'smtp_port' => 465,
                          'smtp_keepalive' => TRUE,
                          'smtp_crypto' => 'SSL',
                          'wordwrap'  => TRUE,
                          'wrapchars' => 80,
                          'mailtype'  => 'html',
                          'charset'   => 'utf-8',
                          'validate'  => TRUE,
                          'crlf'      => "\r\n",
                          'newline'   => "\r\n",
          );

          $emailuser = $this->input->post("emailuser");
          var_dump($emailuser); die();

          $this->load->library('email',$config);
          $this->email->set_newline("\r\n");
          $this->email->from($emailuser,'Pengguna Website GRII Kertajaya');
          $this->email->to('evann888@gmail.com');
          $this->email->subject('Test');
          $this->email->message('Ini adalah contoh email yang dikirim melalui localhost pada CodeIgniter menggunakan SMTP email Google (Gmail).');

          if ($this->email->send())
         {
             echo 'Sukses! email berhasil dikirim.';
         }
         else
         {
           show_error($this->email->print_debugger());
          $msg = $this->email->print_debugger();
          show_error($msg);
          return false;
         }
      }
  }
?>
