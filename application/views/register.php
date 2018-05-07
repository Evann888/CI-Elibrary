<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Form Input Anggota</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/material-kit.css" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />

	<!-- sweetalert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
      <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
				<div class="navbar-header">
					<a class="navbar-brand" href="#">GRII Kertajaya</a>
				</div>
	    	<!-- <a href="http://www.creative-tim.com"> -->
	        	<!-- <div class="logo-container">
	                <div class="logo">
	                    <img src="assets/img/logo.png" alt="Creative Tim Logo" rel="tooltip" title="<b>Material Kit</b> was Designed & Coded with care by the staff from <b>Creative Tim</b>" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">
	                    Creative Tim
	                </div>
						</div> -->
      	</a>
  		</div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<!-- <li>
					<a href="components-documentation.html" target="_blank">
						<i class="material-icons">dashboard</i> Components
					</a>
				</li>
				<li>
					<a href="http://demos.creative-tim.com/material-kit-pro/presentation.html?ref=utp-freebie" target="_blank">
						<i class="material-icons">unarchive</i> Upgrade to PRO
					</a>
				</li> -->
				<li>
					<a rel="tooltip" data-placement="bottom" href="" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" data-placement="bottom" href="https://www.facebook.com/griikertajaya/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" data-placement="bottom" href="" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-instagram"></i>
					</a>
				</li>
	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('<?php echo base_url();?>assets/img/bg2.jpeg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Silahkan Input Data Anda dibawah :</h1>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
          <div class="title">
              <h2>Pendaftaran Anggota Perpustakaan</h2>
								<span class="text-danger"><?php echo validation_errors(); ?> </span>
							<?php if($this->session->flashdata('error')){echo $this->session->flashdata('error');}?>
          </div>


				<?php echo form_open_multipart('Register/input');?>
					<div class="col-sm-3">
						<div class="form-group label-floating">
				      <label class="control-label">Nama </label>
				      <input type="text" class="form-control pgbar" name="nama" required>
  				  </div>
					</div>

					<div class="col-sm-offset-1 col-sm-3">
						<div class="form-group label-floating pgbar">
							<label class="control-label">Alamat </label>
							<input type="text" class="form-control pgbar" name="alamat" required>
						</div>
					</div>

					<div class="col-sm-offset-2 col-sm-3">
						<div class="form-group label-floating pgbar">
							<label class="control-label">NIK </label>
							<input type="text" class="form-control pgbar" name="nik" required>
						</div>
					</div>

					<div class="col-sm-offset-2 col-sm-3">
						<div class="form-group label-floating pgbar">
							<label class="control-label">Nomor Handphone </label>
							<input type="text" class="form-control pgbar" name="nohp" required>
						</div>
					</div>

					<div class="col-sm-offset-2 col-sm-3">
						<div class="form-group label-floating pgbar">
							<label class="control-label">Email</label>
							<input type="email" class="form-control pgbar" name="email" >
						</div>
					</div>

					<div class="col-sm-offset-4 col-sm-3">
						<div class="form-group label-floating pgbar">
							<label class="control-label">Password </label>
							<input type="password" class="form-control pgbar" name="password" required>
						</div>
					</div>

					<div class="col-sm-offset-2 col-md-6"><br>
						<label class="">Jenis Kelamin</label>
						 <div class="radio">
							 <label>
								 <input type="radio" checked="true" value="Laki-Laki" name="jk" >
									Laki-laki
							 </label>
						  <label>
							 <input type="radio" value="Perempuan" name="jk">
									Perempuan
							</label>
						 </div>
				 </div>

 					<div class="col-md-3">
 						<div class="form-group pgbar">
 							<label class="control-label">Tanggal Lahir </label>
							<!-- <input id="BD" class="datepicker form-control" name="tgl" type="text" value="" >> -->
							<input required type="date" id="tanggal" name="tgl" placeholder="mm-dd-yyyy" pattern="\d{1,2}-\d{1,2}-\d{4}" min='' max=''>
 						</div>
 					</div>

					<div class="col-md-3">
						<label class="control-label">Upload foto(jpg,png,jpeg | tidak wajib)</label>
							<input type="file" name="gambar">
					</div>

				 <div class="row">
					 <div class="text-center col-md-12">
							 <button type="submit" value="upload" class="btn btn-primary" name="submit">Submit</button>
					 </div>
				 </div>

		<?php echo form_close(); ?>

				 <script>
					 function test(){
						 swal({
					    title: "Success!",
					    text: "Anda Berhasil Terdaftar!",
					    type: "success"
					}).then(function() {
					    window.location = "class/action.php";
					});
					 }
				 </script>
			</form>

				<?php echo form_open('login'); ?>
					 <p>Sudah Punya Akun?</p>
					 <button type="" class="btn btn-primary" name="back">Login</button>
				 </form>
			</div>
		</div>

			<!-- Progress bar -->
				<div class="container">
					<div class="row">
						<div class="col-md-offset-6">
						 <div class="progress progress-line-primary ">
							 <div class="progress-bar" id="progressbar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%";>
							 </div>
						 </div>
					 </div>
				  </div>
				</div>
      </div>

    <div class="sharing-area text-center">
            <h3>Contact us!</h3>
            <a href="#" class="btn btn-twitter">
                <i class="fa fa-twitter"></i>
                See our twitter
            </a>
            <a href="#" class="btn btn-facebook">
                <i class="fa fa-facebook-square"></i>
                See our Facebook
            </a>
	<!-- <a href="#" class="btn btn-google-plus">
                <i class="fa fa-google-plus"></i>
                Share
            </a>
	<a href="#" class="btn btn-github">
                <i class="fa fa-github"></i>
            	Star
            </a> -->
    </div>
  </div>

    <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
            <ul>
							<li>
								<a href="">
								   About Us
								</a>
							</li>
            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; copyright 2018
	        </div>
	    </div>
	</footer>

</body>

<script>
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	 if(dd<10){
					dd='0'+dd
			}
			if(mm<10){
					mm='0'+mm
			}

	today = yyyy+'-'+mm+'-'+dd;
	var mintoday = (yyyy-0020); //kurangin 16 thn gatau kenapa
	var minyear = mintoday+'-'+mm+'-'+dd;
	// document.getElementById("tanggal").setAttribute("max", today);

	document.getElementById("tanggal").setAttribute("max", minyear);
	// document.getElementById("tanggal").setAttribute("min", minyear);
</script>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/material.min.js"></script>
	<!-- Progress Bar-->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?php echo base_url();?>assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="<?php echo base_url();?>assets/js/material-kit.js" type="text/javascript"></script>

	<!-- my js -->
	<script src="<?php echo base_url();?>assets/js/script.js" type="text/javascript"></script>

</html>
