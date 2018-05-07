<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/cr-1.4.1/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/cr-1.4.1/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Anggota Perpustakaan GRII Kertajaya</h3>

    		  	<div class="row mt">
                  <div class="col-lg-12">
                          <div class="content-panel">
    						  <!-- <h4><i class="fa fa-angle-right"></i>untuk search dan sort disini</h4> -->
                            <section id="no-more-tables">

                                <table id="table1" class="display">
                                    <thead class="">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>NiK</th>
                                        <th>No HP</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                  		$no = 1;
                                  		foreach($user as $u){
                                		?>
                                    <tr>
                                        <td  data-title="No"><?php echo $no++ ?></td>
                                        <td  data-title="Nama"><?php echo $u->Nama ?></td>
                                        <td  data-title="Jenis Kelamin"><?php echo $u->Jenis_Kelamin ?></td>
                                        <td  data-title="Email"><?php echo $u->Email ?></td>
                                        <td  data-title="Alamat"><?php echo $u->Alamat ?></td>
                                        <td  data-title="Tanggal Lahir"><?php echo $u->Tanggal_Lahir ?></td>
                                        <td  data-title="NIK"><?php echo $u->NIK ?></td>
                                        <td  data-title="No HP"><?php echo $u->No_HP ?></td>
                                        <td  data-title="Aksi">
                                        <!-- <a href="Table/Delete/<?php echo ($u->ID) ?>"><button id="a" type="button" class="btn btn-danger">
                                          <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button></a> -->
                                        <button id="edit_button" data-toggle="modal" data-target="#edit"
                                          data-nomor="<?php echo $u->Nomor?>"
                                          data-nama="<?php echo $u->Nama?>" data-jk="<?php echo $u->Jenis_Kelamin?>"
                                          data-email="<?php echo $u->Email?>" data-alamat="<?php echo $u->Alamat ?>"
                                          data-tgl="<?php echo $u->Tanggal_Lahir ?>" data-nik="<?php echo $u->NIK?>"
                                          data-nohp="<?php echo $u->No_HP?>"
                                          type="button" class="btn btn-success">
                                          <i class="glyphicon glyphicon-edit"></i> Edit
                                        </button>

                                        <a href="Table/Delete/<?php echo ($u->Nama) ?>">
                                        <button id="b" type="button" class="btn btn-danger">
                                          <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                        </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                                <!-- Button trigger modal onclick="tambahBuku()" -->

                                <span class="text-danger"><?php echo validation_errors(); ?> </span>
                                <span class="text-danger"><?php if($this->session->flashdata('error')){echo $this->session->flashdata('error');}?> </span>
                                <div class="text-success"> <?php if($this->session->flashdata('sukses')){echo $this->session->flashdata('sukses');}?></div>
                                <div class="text-danger"><?php if($this->session->flashdata('hapus')){echo $this->session->flashdata('hapus');}?> </div>
                                <button type="button" class="btn btn-theme03" data-toggle="modal" data-target="#tambah">
                                  Tambah User
                                </button>
                               <div class="messages"></div>

                                <!-- Modal -->
                                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Input User</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <?php $attributes = array('id' => 'form_tambah','method' => 'POST');
                                    echo form_open('User/tambah', $attributes); ?>
                                    <!-- <form method="post" action="<?php// echo base_url('Table/tambah'); ?>" id="form_tambah"> -->
                                      <div class="modal-body">
                                          <div class="form-group">
                                             <label>Nama</label>
                                             <span class="text-danger"><?php echo form_error("nama"); ?> </span>
                                             <input type="text" class="form-control" id="" placeholder="Nama" name="nama" required autofocus>
                                           </div>
                                       <div class="form-group">
                                         <label>Jenis Kelamin</label>
                                          <span class="text-danger"><?php echo form_error("jk"); ?> </span>
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
                                         <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                             <span class="text-danger"><?php echo form_error("tgl"); ?> </span>
                                             <input required type="date" id="tanggal" name="tgl" placeholder="mm-dd-yyyy" pattern="\d{1,2}-\d{1,2}-\d{4}" min='' max='' >
                                          </div>
                                         <div class="form-group">
                                            <label>Password</label>
                                            <span class="text-danger"><?php echo form_error("password"); ?> </span>
                                            <input type="password" class="form-control" id="" placeholder="Password" name="password" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                             <span class="text-danger"><?php echo form_error("email"); ?> </span>
                                            <input type="text" class="form-control" id="" placeholder="Email" name="email" required>
                                          </div>
                                          <div class="form-group">
                                            <label>Alamat</label>
                                             <span class="text-danger"><?php echo form_error("alamat"); ?> </span>
                                            <input type="text" class="form-control" id="" placeholder="Alamat" name="alamat" required>
                                          </div>
                                           <div class="form-group">
                                              <label>NIK</label>
                                               <span class="text-danger"><?php echo form_error("nik"); ?> </span>
                                              <input type="text" class="form-control" id="" placeholder="NIK" name="nik" required>
                                            </div>
                                            <div class="form-group">
                                               <label>No Handphone</label>
                                                <span class="text-danger"><?php echo form_error("nohp"); ?> </span>
                                               <input type="text" class="form-control" id="" placeholder="No Handphone" name="nohp" required>
                                             </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" onclick="">Save changes</button>
                                      </div>
                                    </form>
                                       <?php echo form_close(); ?>
                                    </div>
                                  </div>
                                </div>

                                <!-- //EDIT -->
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Edit User</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <?php $attributes = array('id' => 'form_edit'); echo form_open('User/edit', $attributes); ?>

                                      <div class="modal-body">

                                      <input type="hidden" id="nomor" name="nomor" >
                                      <div class="form-group">
                                         <label>Nama</label>
                                         <span class="text-danger"><?php echo form_error("nama"); ?> </span>
                                         <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
                                       </div>
                                       <div class="form-group">
                                         <label>Jenis Kelamin</label>
                                          <span class="text-danger"><?php echo form_error("jk"); ?> </span>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" checked="true" value="Laki-Laki" name="jk" id="jk1">
                                               Laki-laki
                                            </label>
                                           <label>
                                            <input type="radio" value="Perempuan" name="jk" id="jk2">
                                               Perempuan
                                           </label>
                                         </div>
                                       </div>
                                         <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                             <span class="text-danger"><?php echo form_error("tgl"); ?> </span>
                                             <input required type="date" id="tgl" name="tgl" placeholder="mm-dd-yyyy" pattern="\d{1,2}-\d{1,2}-\d{4}" min='' max=''>
                                          </div>
                                         <div class="form-group">
                                            <label>Password</label>
                                            <span class="text-danger"><?php echo form_error("password"); ?> </span>
                                            <input type="password" class="form-control" id="pass" placeholder="Password" name="password" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                             <span class="text-danger"><?php echo form_error("email"); ?> </span>
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" required> <?php echo $this->session->flashdata('Nama'); ?>
                                          </div>
                                          <div class="form-group">
                                            <label>Alamat</label>
                                             <span class="text-danger"><?php echo form_error("alamat"); ?> </span>
                                            <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
                                          </div>
                                           <div class="form-group">
                                              <label>NIK</label>
                                               <span class="text-danger"><?php echo form_error("nik"); ?> </span>
                                              <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" required>
                                            </div>
                                            <div class="form-group">
                                               <label>No Handphone</label>
                                                <span class="text-danger"><?php echo form_error("nohp"); ?> </span>
                                               <input type="text" class="form-control" id="nohp" placeholder="No Handphone" name="nohp" required>
                                             </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" onclick="">Save changes</button>
                                      </div>
                                       <?php echo form_close(); ?>
                                    </div>
                                  </div>
                                </div>
                            </section>
                          </div><!-- /content-panel -->
                      </div><!-- /col-lg-12 -->
                  </div><!-- /row -->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
  </section>

  <script>
  $(document).ready(function(){
    $(document).on("click", "#edit_button", function () {

        var nomor = $(this).data('nomor');
        var nama = $(this).data('nama');
        var jk = $(this).data('jk');
        var email = $(this).data('email');
        var alamat = $(this).data('alamat');
        var tgl = $(this).data('tgl');
        var nik = $(this).data('nik');
        var nohp = $(this).data('nohp');

        $("input:hidden[name='nomor']").val(nomor);
        $(".modal-body #nama").val(nama);
        $(".modal-body #jk1").val(jk);
        $(".modal-body #jk2").val(jk);
        $(".modal-body #email").val(email);
        $(".modal-body #alamat").val(alamat);
        $(".modal-body #tgl").val(tgl);
        $(".modal-body #nik").val(nik);
        $(".modal-body #nohp").val(nohp)
      })
    });

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
  	var mintoday = (yyyy-0020);
  	var minyear = mintoday+'-'+mm+'-'+dd;
    // document.getElementById("tanggal").setAttribute("max", today);
  	// document.getElementById("tanggal").setAttribute("min", minyear);
  	document.getElementById("tanggal").setAttribute("max", minyear);

  // $('#az').on('click',function(event){
  //   swal({
  //     title: "Are you sure?",
  //     text: "Once deleted, you will not be able to recover this imaginary file!",
  //     icon: "warning",
  //     buttons: true,
  //     dangerMode: true,
  //   })
  //   .then((willDelete) => {
  //     if (willDelete) {
  //       swal("Poof! Your imaginary file has been deleted!", {
  //         icon: "success",
  //       });
  //     } else {
  //       swal("Your imaginary file is safe!");
  //     }
  //   });
  // });
  //
  // })
</script>

	<script src="<?php echo base_url();?>assets/js/custom/custom.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
