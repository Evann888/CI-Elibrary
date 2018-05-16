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


          $subject = trim(htmlspecialchars($this->input->post('subjek'),ENT_QUOTES));
          $emailuser = trim(htmlspecialchars($this->input->post('emailuser'),ENT_QUOTES));
          $message = trim(htmlspecialchars($this->input->post('msg'),ENT_QUOTES));

          $this->load->library('email',$config);
          $this->email->set_newline("\r\n");
          $this->email->from($emailuser,'Admin Website GRII Kertajaya');
          $this->email->to($emailuser);
          $this->email->subject($subject);
          $this->email->message($message);

          if ($this->email->send())
         {
             $this->session->set_flashdata('berhasil', 'Email berhasil terkirim');
             redirect('Contact_form');
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
