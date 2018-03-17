<?php
session_start();
  require 'class/action.php';

if(isset($_POST['login'])) {

  $username = $_POST["username"];
  var_dump($_POST['username']); exit();
  $_SESSION['username'] = $username;
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM data WHERE Nama = '$username'");
    // var_dump($result); exit();
  if(mysqli_num_rows($result) === 1){
    // $row =  mysqli_fetch_assoc($result); //jadi ke arr assoc
      $_SESSION["Login"] = true; //1 terus masuk ke atas
      if($_SESSION["Login"] = true){
        header("Location: index.php");
        exit;
      }
    } else{
      echo "<script>
              alert('Password atau Username Salah');
            </script>";
    }
  }
  if(isset($_POST["register"])){
      header("Location: register.php");
  }

// if(isset($_SESSION["Login"])){
//   header("Location:index.php");
//   exit;
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Halaman Login</title>
</head>

<body>
  <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			<div class="search-box">
				<div class="caption">
					<h3>Menu Login Website</h3>
					<p>Silahkan Login di bawah ini</p>
				</div>
        <?php if(isset($err)) : ?>
           <p style="color : red; font-style : italic;"> Username atau password salah</p>
        <?php endif; ?>
				<form action="" class="loginForm" method="POST">
					<div class="input-group">
						<input type="text" id="name" class="form-control" placeholder="Email" name="email" >
						<input type="password" id="paw" class="form-control" placeholder="Password" name="password">
            <!-- <input type="checkbox" name="remember">
            <label>Remember Me</label> -->
						<input type="submit" id="submit" class="form-control" value="Login" name="login">
            <!-- <input type="submit" id="submit" class="form-control" value="Buat Akun" name="register" > -->
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-4">
			<!-- <div id="pswd_info">
				<h4>Password must be requirements</h4>
				 <ul>
					<li id="letter" class="invalid">At least <strong>one letter</strong></li>
					<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
					<li id="number" class="invalid">At least <strong>one number</strong></li>
					<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
					<li id="space" class="invalid">be<strong> use [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
				</ul>
			</div> -->
		</div>
	</div>
</div>
</body>
</html>

<style type="text/css">
/* Base CSS */
.alignleft {
    float: left;
    margin-right: 15px;
}
.alignright {
    float: right;
    margin-left: 15px;
}
.aligncenter {
    display: block;
    margin: 0 auto 15px;
}

a:focus { outline: 0 solid }

img {
    max-width: 100%;
    height: auto;
}

.fix { overflow: hidden }

h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0 0 15px;
    font-weight: 700;
}

html,
body { height: 100% }

a {
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    color: #333;
}
a:hover { text-decoration: none }



.search-box{margin:80px auto;position:absolute;}
.caption{margin-bottom:50px;}
.loginForm input[type=text], .loginForm input[type=password]{
	margin-bottom:10px;
}
.loginForm input[type=submit]{
	background:#fb044a;
	color:#fff;
	font-weight:700;

}

#pswd_info {
	background: #dfdfdf none repeat scroll 0 0;
	color: #fff;
	left: 20px;
	position: absolute;
	top: 115px;
}
#pswd_info h4{
    background: black none repeat scroll 0 0;
    display: block;
    font-size: 14px;
    letter-spacing: 0;
    padding: 17px 0;
    text-align: center;
    text-transform: uppercase;
}
#pswd_info ul {
    list-style: outside none none;
}
#pswd_info ul li {
   padding: 10px 45px;
}

.valid {
	background: rgba(0, 0, 0, 0) url("https://s19.postimg.org/vq43s2wib/valid.png") no-repeat scroll 2px 6px;
	color: green;
	line-height: 21px;
	padding-left: 22px;
}

.invalid {
	background: rgba(0, 0, 0, 0) url("https://s19.postimg.org/olmaj1p8z/invalid.png") no-repeat scroll 2px 6px;
	color: red;
	line-height: 21px;
	padding-left: 22px;
}


#pswd_info::before {
    background: #dfdfdf none repeat scroll 0 0;
    content: "";
    height: 25px;
    left: -13px;
    margin-top: -12.5px;
    position: absolute;
    top: 50%;
    transform: rotate(45deg);
    width: 25px;
}
#pswd_info {
    display:none;
}
</style>

<script type="text/javascript">
$(document).ready(function(){

	$('input[type=password]').keyup(function() {
		var pswd = $(this).val();

		//validate the length
		if ( pswd.length < 8 ) {
			$('#length').removeClass('valid').addClass('invalid');
		} else {
			$('#length').removeClass('invalid').addClass('valid');
		}

		//validate letter
		if ( pswd.match(/[A-z]/) ) {
			$('#letter').removeClass('invalid').addClass('valid');
		} else {
			$('#letter').removeClass('valid').addClass('invalid');
		}

		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) {
			$('#capital').removeClass('invalid').addClass('valid');
		} else {
			$('#capital').removeClass('valid').addClass('invalid');
		}

		//validate number
		if ( pswd.match(/\d/) ) {
			$('#number').removeClass('invalid').addClass('valid');
		} else {
			$('#number').removeClass('valid').addClass('invalid');
		}

		//validate space
		if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
			$('#space').removeClass('invalid').addClass('valid');
		} else {
			$('#space').removeClass('valid').addClass('invalid');
		}

	}).focus(function() {
		$('#pswd_info').show();
	}).blur(function() {
		$('#pswd_info').hide();
	});

});
</script>
