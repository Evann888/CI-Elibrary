<?php
// session_start();

  class action extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_data(){
      return $this->db->get('data');
    }

    public function insert_record($table,$data = array()){
        return $this->db->insert($table, $data);
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
  }
 ?>
