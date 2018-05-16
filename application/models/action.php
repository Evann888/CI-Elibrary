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

    public function get_9_data($table)
    {
      $this->db->order_by('ID', 'DESC');
      $this->db->limit(9);
      return $this->db->get($table);
    }

    public function get_5_data($table)
    {
      $this->db->order_by('Nomor', 'DESC');
      $this->db->limit(5);
      return $this->db->get($table);
    }

    public function get_top_buku($table)
    {
      $this->db->order_by('Hits', 'DESC');
      $this->db->limit(5);
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
    public function delete_user($table,$Nomor)
    {
      $query =$this->db->query('Delete FROM '.$table." Where Nomor = '$Nomor'");
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

    function getPassLogin($email)
    {
      $query = $this->db->query("SELECT Password FROM anggota WHERE Email = '$email'");
      return $query->row()->Password;
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

    function getDefPathLogin($email)
    {
      $query = $this->db->query("SELECT DefaultPath FROM anggota WHERE Email = '$email'");
      return $query->row()->DefaultPath;
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

    function getPassDbNow($nomor)
    {
      $query = $this->db->query("SELECT Password FROM anggota WHERE Nomor = '$nomor'");
      return $query->row()->Password;
    }

    function getAdminStats($email)
    {
      $query = $this->db->query("SELECT is_admin FROM anggota WHERE Email = '$email'");
      return $query->row()->is_admin;
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

    // -----------------------Pinjam-------------------------
    public function get_data_where($table,$email){
      return $this->db->get_where($table,array("Email" => $email));
    }

    public function update_datapinjam($data,$isbn,$nama,$table){
      $sql = $this->db->where('ISBN= ', $isbn);
      $sql = $this->db->where('Nama= ', $nama);
      $sql = $this->db->update($table,$data);
    // echo $this->db->last_query(); die;
      return true;
    }

    public function delete_pinjaman($table,$ID)
    {
      $query =$this->db->query('DELETE FROM '.$table." Where ID = '$ID'");
      return true;
    }

    public function join_2_tabel($table,$join_table,$nama,$judul)
    {
      $query =$this->db->query("SELECT * FROM $table JOIN $join_table
      ON buku.ISBN = pinjaman.ISBN Where Nama = '$nama' and pinjaman.Judul_Buku = '$judul' and is_upload = 1");

      if($query->num_rows() >= 1)
       {
           return FALSE;
       }
       else
       {
           return TRUE;
       }
    }

//finish
    public function update_stok_hits($isbn,$table){
      $this->db->set('Stok', 'Stok+1', FALSE); //agar tidak dipetik karena int
      $this->db->set('Hits', 'Hits+1', FALSE); //agar tidak dipetik karena int
      $this->db->where('ISBN= ', $isbn);
      $this->db->update($table);
      return true;
    }

    public function update_status_log($isbn,$nama,$table){
      $this->db->set('Status', 'Telah dikembalikan');
      $this->db->where('ISBN= ', $isbn);
      $this->db->where('Nama= ', $nama);
      $this->db->update($table);
      return true;
    }

    public function delete_finish($isbn,$table)
    {
      $sql = $this->db->where('ISBN= ', $isbn);
      $this->db->delete($table);
      return true;
    }

    public function get_logpinjaman()
    {
      $query =$this->db->query('SELECT * FROM logpinjaman');
      return $query->result();
    }

    public function get_tgl()
    {
      $query =$this->db->query('SELECT * FROM pinjaman');
      return $query->result();
    }
  }
 ?>
