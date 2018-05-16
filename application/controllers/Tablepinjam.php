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
        date_default_timezone_set('Asia/Jakarta');
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
           $this->session->set_flashdata('sukses', 'Pinjaman buku oleh '. $nama. ' telah disetujui');
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

      function Finish()
      {
        $isbn = $this->input->post("isbn");
        $nama = $this->input->post("nama");

        if($this->action->delete_finish($isbn,"pinjaman") == TRUE){
          if($this->action->update_stok_hits($isbn,"buku") == TRUE){
            if($this->action->update_status_log($isbn,$nama,"logpinjaman") == TRUE){
               $this->session->set_flashdata('sukses', 'Pinjaman buku oleh '. $nama. ' telah diselesaikan');
               redirect('tablepinjam');
             }
          }else{
            $this->session->set_flashdata('error', 'pinjaman buku gagal diselesaikan');
            redirect('tablepinjam');
          }
        }else{
          $this->session->set_flashdata('error', 'pinjaman buku gagal diselesaikan');
          redirect('tablepinjam');
        }
      }

      public function report()
      {
      $data['pinjaman'] = $this->action->get_logpinjaman();
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Evan")
  							 ->setTitle("Office 2007 XLSX Test Document")
  							 ->setSubject("Office 2007 XLSX Test Document")
  							 ->setDescription("Komentar report");

         // $barisan_data = $obj -> show_record("data");
         $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'ISBN')
        ->setCellValue('B1', 'Judul Buku')
        ->setCellValue('C1', 'Nama Peminjam')
        ->setCellValue('D1', 'Tanggal Dipinjam')
        ->setCellValue('E1', 'Tanggal Kembali')
        ->setCellValue('F1', 'Status');

        $row =2; //set data in A2 to nama,B2 to Komentar di database
         foreach ($data['pinjaman'] as $data) {
         $objPHPExcel->setActiveSheetIndex(0)
          ->setCellValue('A'.$row, $data->ISBN)
          ->setCellValue('B'.$row, $data->Judul_Buku)
          ->setCellValue('C'.$row, $data->Nama)
          ->setCellValue('D'.$row, $data->Tanggal_Pinjaman)
          ->setCellValue('E'.$row, $data->Tanggal_Kembali)
          ->setCellValue('F'.$row, $data->Status);
          $row++;
         }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Riwayat Booking.xls"');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

        // $data = array("user"=> $this->action->get_data());
        //     $filename = "comment.xls";
        //     // Set headers
        //     $this->output->set_content_type('application/ms-excel')
        //                  ->set_header('Content-Disposition: attachment; filename='.$filename);
        //     // $this->load->view("Komentar", $data); // Send data to the browser
      }

      function autoMail()
      {

      }
    }
?>
