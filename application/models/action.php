<?php
// session_start();

  class action extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_data($table){
      return $this->db->get($table);
    }

    public function insert_record($table,$data){
      $sql = $this->db->insert($table, $data);
      if($sql == true){
        return true;
      } else{
        return false;
      }
    }

    public function update_comment($data,$where,$table){
      $this->db->where('Nama= ', $where);
      $this->db->update($table,$data);
    }

    public function delete_akun($table,$Nama)
    {
      $query =$this->db->query('Delete FROM '.$table." Where Nama = '$Nama'");
    }

  	function cek_login($table,$where){
  		return $this->db->get_where($table,$where);
  	}

    function getNamaLogin($email)
    {
      $query = $this->db->query("SELECT Nama FROM anggota WHERE Email = '$email'");
      return $query->row()->Nama;
    }
  }
 ?>
