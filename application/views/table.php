<?php if(!$this->session->userdata("admin") == 1){redirect(base_url());} ?>

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
          	<h3><i class="fa fa-angle-right"></i> Katalog Buku Perpustakaan GRII Kertajaya</h3>

    		  	<div class="row mt">
                  <div class="col-lg-12">
                          <div class="content-panel">
    						  <!-- <h4><i class="fa fa-angle-right"></i>untuk search dan sort disini</h4> -->
                            <section id="no-more-tables">

                                <table id="table1" class="display">
                                    <thead class="">
                                    <tr>
                                        <th>No</th>
                                        <th>ISBN</th>
                                        <th>Judul</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                  		$no = 1;
                                  		foreach($buku as $u){
                                		?>
                                    <tr>
                                        <td  data-title="No"><?php echo $no++ ?></td>
                                        <td  data-title="ISBN"><?php echo $u->ISBN ?></td>
                                        <td  data-title="Judul"><?php echo $u->Judul_Buku ?></td>
                                        <td  data-title="Pengarang"><?php echo $u->Pengarang ?></td>
                                        <td  data-title="Penerbit"><?php echo $u->Penerbit ?></td>
                                        <td  data-title="Kategori"><?php echo $u->Kategori ?></td>
                                        <td  data-title="Stok"><?php echo $u->Stok ?></td>
                                        <td  data-title="Gambar">
                                        <?php if($u->DefaultPath == "blankbook.PNG"): ?>
                                          <img src="<?php echo base_url('gambar/Buku/blankbook.png')?>" width="60px" height="50px"></td>
                                        <?php else :?>
                                          <img src="<?php echo base_url('gambar/Buku/').$u->Path;?>" width="60px" height="50px"></td>
                                        <?php endif?>
                                      <td  data-title="Aksi">
                                        <!-- <a href="Table/Delete/<?php echo ($u->ID) ?>"><button id="a" type="button" class="btn btn-danger">
                                          <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button></a> -->
                                        <button id="edit_button" data-toggle="modal" data-target="#edit"
                                          data-id="<?php echo $u->ID?>"
                                          data-isbn="<?php echo $u->ISBN?>" data-judul="<?php echo $u->Judul_Buku?>"
                                          data-pengarang="<?php echo $u->Pengarang?>" data-penerbit="<?php echo $u->Penerbit ?>"
                                          data-kategori="<?php echo $u->Kategori ?>" data-stok="<?php echo $u->Stok?>"
                                          type="button" class="btn btn-success">
                                          <i class="glyphicon glyphicon-edit"></i> Edit
                                        </button>
                                        <a href="Table/Delete/<?php echo ($u->ID) ?>">
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
                                <?php if($this->session->flashdata('error')) : ?>
                                  <div class="alert alert-warning alert-dismissable"> <?php echo $this->session->flashdata('error');?></div>
                                <?php endif; ?>
                              	<?php if($this->session->flashdata('sukses')) : ?>
                                   <div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('sukses');?></div>
                               <?php endif; ?>
                               <?php if($this->session->flashdata('hapus')) : ?>
                                 <div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('hapus');?></div>
                               <?php endif; ?>
                                <button type="button" class="btn btn-theme03" data-toggle="modal" data-target="#tambah">
                                  Tambah Buku
                                </button>
                               <div class="messages"></div>

                                <!-- Modal -->
                                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Input Buku</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <?php $attributes = array('id' => 'form_tambah','method' => 'POST');
                                    echo form_open_multipart('Table/tambah', $attributes); ?>
                                    <!-- <form method="post" action="<?php// echo base_url('Table/tambah'); ?>" id="form_tambah"> -->
                                      <div class="modal-body">
                                        <div class="form-group">
                                           <label>ISBN</label>
                                           <span class="text-danger"><?php echo form_error("isbn"); ?> </span>
                                           <input type="text" class="form-control" placeholder="ISBN" name="isbn" required autofocus>
                                         </div>
                                         <div class="form-group">
                                           <label>Judul Buku</label>
                                            <span class="text-danger"><?php echo form_error("judul"); ?> </span>
                                           <input type="text" class="form-control" placeholder="Judul Buku" name="judul" required>
                                         </div>
                                         <div class="form-group">
                                            <label>Pengarang</label>
                                             <span class="text-danger"><?php echo form_error("pengarang"); ?> </span>
                                            <input type="text" class="form-control" placeholder="Pengarang" name="pengarang" required>
                                          </div>
                                          <div class="form-group">
                                            <label>Penerbit</label>
                                             <span class="text-danger"><?php echo form_error("penerbit"); ?> </span>
                                            <input type="text" class="form-control" placeholder="Penerbit" name="penerbit" required>
                                          </div>
                                          <div class="form-group">
                                             <label>Stok</label>
                                              <span class="text-danger"><?php echo form_error("stok"); ?> </span>
                                             <input type="text" class="form-control" placeholder="Stok" name="stok" required>
                                           </div>
                                        <div class="form-row align-items-center">
                                          <div class="col-auto my-1">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                                            <select class="custom-select mr-sm-2" >
                                              <option selected>Pilih</option>
                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Upload foto(jpg,png,jpeg | tidak wajib)</label>
                                            <input type="file" name="gambar">
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
                                        <h3 class="modal-title" id="exampleModalLabel">Edit Buku</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <?php $attributes = array('id' => 'form_edit');
                                      echo form_open_multipart('Table/edit/', $attributes); ?>

                                      <input type="hidden" id="ID" name="id" >

                                      <div class="modal-body">
                                        <div class="form-group">
                                           <label>ISBN</label>
                                           <input type="text" class="form-control"  id="ISBN" placeholder="ISBN" name="isbn" required autofocus>
                                         </div>
                                         <div class="form-group">
                                           <label>Judul Buku</label>
                                           <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul" required>
                                         </div>
                                         <div class="form-group">
                                            <label>Pengarang</label>
                                            <input type="text" class="form-control" id="pengarang" placeholder="Pengarang" name="pengarang" required>
                                          </div>
                                          <div class="form-group">
                                            <label>Penerbit</label>
                                            <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="penerbit" required>
                                          </div>
                                          <div class="form-group">
                                             <label>Stok</label>
                                             <input type="text" class="form-control" id="stok" placeholder="Stok" name="stok" required>
                                           </div>
                                        <div class="form-row align-items-center">
                                          <div class="col-auto my-1">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                                            <select class="custom-select mr-sm-2" id="kategori">
                                              <option selected>Pilih</option>
                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Upload foto(jpg,png,jpeg | tidak wajib)</label>
                                            <input type="file" name="gambar2">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" onsubmit="DoSubmit()">Save changes</button>
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
  //LUPA di ready benerin lama banget zzz...
  $(document).ready(function(){
    $(document).on("click", "#edit_button", function () {
        var id = $(this).data('id');
        var isbn = $(this).data('isbn');
        var judul = $(this).data('judul');
        var pengarang = $(this).data('pengarang');
        var penerbit = $(this).data('penerbit');
        var kategori = $(this).data('kategori');
        var stok = $(this).data('stok');

        $("input:hidden[name='id']").val(id);
        $(".modal-body #ISBN").val(isbn);
        $(".modal-body #judul").val(judul);
        $(".modal-body #pengarang").val(pengarang);
        $(".modal-body #penerbit").val(penerbit);
        $(".modal-body #kategori").val(kategori);
        $(".modal-body #stok").val(stok);
        // window.location.href("Table/edit/isbn");

        // $('#form_tambah').unbind('submit').bind('submit',function(event) {
        // var form = $(this);
        // event.preventDefault();
        //
        //   $.ajax({
        //     url: "http://localhost:8000/prjperpus-ci/Table/tambah",
        //     type: "POST",
        //     data : form.serialize(), //converting the form data into array and sending it to server
        //     dataType : "json",
        //     success:function(response, status, xhr){
        //       console.log(response);
        //         alert("OKAY"); console.log(xhr.status);
    })
  });

  function DoSubmit(){
alert("a");
  }
  // $('#a').on('click',function(event){
  //   event.preventDefault();
  //   swal({
  //   title: "Are you sure?",
  //   text: "Once deleted, you will not be able to recover this imaginary file!",
  //   icon: "warning",
  //   buttons: true,
  //   dangerMode: true,
  // })
  // .then((willDelete) => {
  //   if (willDelete) {
  //     swal("Poof! Your imaginary file has been deleted!", {
  //       icon: "success",
  //       $this.submit();
  //     });
  //   } else {
  //     swal("Your imaginary file is safe!");
  //   }
  // });

  // })
  </script>


	<script src="<?php echo base_url();?>assets/js/custom/custom.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
