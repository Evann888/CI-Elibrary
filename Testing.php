<?php
  class Testing extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->library("unit_test");
    }

    private function sum($date,$days)
    {
      $test = date('Y-m-d', strtotime("+".$days." days"));
      return $test;
      // date('Y-m-d', strtotime("+".$hari." days"))
    }

    public function index()
    {
      // date('Y-m-d', strtotime("+ 2days"));
      $test = $this->sum(date('Y-m-d'),2);
      $expected_result = "2018-05-17";
      $test_name = "Testing Tanggal Pinjam";
      echo $this->unit->run($test, $expected_result, $test_name);
    }
  }

?>
