<?php
// session_start();

  class action extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    // -----------------------Global-------------------------
    public function get_data($table){
      return $this->db->get($table);
    }

    public function insert_record($table,$data){
      $sql = $this->db->insert($table, $data);
      if($sql === true){
        return true;
      } else{
        return false;
      }
    }
    // -----------------------Buku-------------------------// -----------------------Buku-------------------------
    public function delete_buku($table,$ID)
    {
      $query =$this->db->query('Delete FROM '.$table." Where ID = '$ID'");
    }

    public function update_buku($data,$where,$table){
      $this->db->where('ID= ', $where);
      $this->db->update($table,$data);
      return true;
    }

    // -----------------------Condition-------------------------
  	function cek_login($table,$where){
  		return $this->db->get_where($table,$where);
  	}

    // -----------------------USER-------------------------
    public function delete_user($table,$Nama)
    {
      $query =$this->db->query('Delete FROM '.$table." Where Nama = '$Nama'");
    }

    public function update_user($data,$where,$table){
      $this->db->where('Nomor= ', $where);
      $this->db->update($table,$data);
      return true;
    }

    public function update_pass($data,$where,$table){
      $this->db->where('Nomor= ', $where);
      $this->db->update($table,$data);
      return true;
    }

    function getNomorLogin($email)
    {
      $query = $this->db->query("SELECT Nomor FROM anggota WHERE Email = '$email'");
      return $query->row()->Nomor;
    }

    function getPathLogin($email)
    {
      $query = $this->db->query("SELECT Path FROM anggota WHERE Email = '$email'");
      return $query->row()->Path;
    }

    function getEmailLogin($email)
    {
      $query = $this->db->query("SELECT Email FROM anggota WHERE Email = '$email'");
      return $query->row()->Email;
    }

    function getStats($email)
    {
      $query = $this->db->query("SELECT is_upload FROM anggota WHERE Email = '$email'");
      return $query->row()->is_upload;
    }

    function getPassLogin($email)
    {
      $query = $this->db->query("SELECT Password FROM anggota WHERE Email = '$email'");
      return $query->row()->Password;
    }

    function getPassDbNow($nomor)
    {
      $query = $this->db->query("SELECT Password FROM anggota WHERE Nomor = '$nomor'");
      return $query->row()->Password;
    }
    // -----------------------Halaman-------------------------
    function getNamaLogin($email)
    {
      $query = $this->db->query("SELECT Nama FROM anggota WHERE Email = '$email'");
      return $query->row()->Nama;
    }

    function report(){
      // $this->load->database();
      $query = $this->db->query("SELECT MONTH(date) AS bulan, COUNT(*) AS nilai
      FROM anggota
      GROUP BY MONTH(date);");
      if($query->num_rows() > 0){
      foreach($query->result() as $data){
          $hasil[] = $data;
      }
      return $hasil;
      }
    }
  }
 ?>
