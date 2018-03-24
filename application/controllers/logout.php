<?php
  session_start();
  // session_unset(); untuk beberapa bagian
  session_destroy();
  // setcookie('key', '', time()-1);
  header("Location: login.php");
  exit;
?>
