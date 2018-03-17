<?php
// session_start();
  spl_autoload_register(function($class_name){
    include $class_name . '.php';
  });

  class dataOperation extends Database{

    public function insert_record($table,$fields){
      //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
       // print_r(array_keys  ($fields));
      $sql = "INSERT INTO ".$table;
      $sql .= "(".implode(",", array_keys($fields)).") VALUES "; //implode = change array to string ditambahi ","
      $sql .= "('".implode("','", array_values($fields))."')";
      // echo $sql;
      $query = mysqli_query($this->conn,$sql);
      if($query){
        return true;
        // header("Location: ../index.php");
        // exit;
      }
    }

    public function update_comment($table,$comment){
      var_dump($comment);
      //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
      // print_r(array_keys  ($fields));
      $username = $_SESSION["username"];
      var_dump($username);
      $sql = "UPDATE ".$table;
      $sql .= " SET Komentar = '$comment'";
      $sql .= " WHERE Nama = '$username'";
       echo $sql;
      $query = mysqli_query($this->conn,$sql);
      if($query){
        return true;
      }
    }

    public function show_record($table){
      $sql = "SELECT * FROM " .$table;
      $array = array();
      $query = mysqli_query($this->conn,$sql);
      while ($row = mysqli_fetch_assoc($query)) {
         $array[] = $row;
      }
      return $array;

    }
  }
  $obj = new dataOperation;

  if(isset($_POST["submit"])){
    // echo $_POST["jk"];
     // var_dump($_POST);
    // SEBENARNYA TELAH JADI ARRAY TETAPI UNTUK MENAMBAHKAN htmlspecialchars
    $myArray = array( //Pakai cara ini biar bisa rename array_keys
      "Email" => htmlspecialchars($_POST["email"]),
      "Password" => htmlspecialchars($_POST["password"]),
      "Nama" => htmlspecialchars($_POST["nama"]), //nama yg mau di implode => name di form
      "Jenis_Kelamin" => htmlspecialchars($_POST["jk"]),
      "Alamat" => htmlspecialchars($_POST["alamat"]),
      "Tanggal_Lahir" => htmlspecialchars($_POST["tgl"]),
      "NIK" => htmlspecialchars($_POST["nik"]),
      "No_HP" => htmlspecialchars($_POST["nohp"])
    );
    $email = $_POST["email"];
    $sql = "SELECT Email FROM anggota where Email='$email'";
    if($sql->mysqli_num_rows>0)

     // print_r($myArray);
    if($obj->insert_record("anggota",$myArray)){
      header("Location: ../index.html");
      exit;
    };

  }

  class validateLogin extends Database{
    function test_input($data) {
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      // $data = myqli_real_escape_string($data);
      return $data;
    }

    function register($data){
      $username = test_input($data["username"]);
      $password = mysqli_real_escape_string($this->conn, $data["password"]);

      // Enkripsi Password
      // $password = password_hash($password, PASSWORD_DEFAULT);

      //cek duplikat user
      $result = mysqli_query($this->conn, "SELECT Nama FROM data WHERE Nama = '$username'");

      if(mysqli_affected_rows($result) >=1){
         echo "<script> alert('Username telah dipakai') </script>";
         return false;
      }
      $query = "INSERT INTO data VALUES ('','$username','$password')";
      mysqli_query($this->conn, $query);
      return mysqli_affected_rows($this->conn);
      // notification();
      //echo notification('Success!','akun akan didaftarkan','success','index.php');
    }

    function validate($data){ //memvalidasi char agar tidak diinputkan special char
      $err = "Only letters,numbers and white space allowed";
      $username = test_input($data["username"]);
      $password = test_input($data["password"]);

      if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
       echo "<script> alert('$err') </script>";
       return true;
     }
    }
  }
?>
