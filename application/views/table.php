<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/cr-1.4.1/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/cr-1.4.1/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
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
                                    <thead class="cf">
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
                                        <td  data-title="ISBN"><?php echo $no++ ?></td>
                                        <td  data-title="ISBN"><?php echo $u->ISBN ?></td>
                                        <td  data-title="Judul"><?php echo $u->Judul_Buku ?></td>
                                        <td  data-title="Pengarang"><?php echo $u->Pengarang ?></td>
                                        <td  data-title="Penerbit"><?php echo $u->Penerbit ?></td>
                                        <td  data-title="Kategori"><?php echo $u->Kategori ?></td>
                                        <td  data-title="Stok"><?php echo $u->Stok ?></td>
                                        <td  data-title="Gambar"></td>
                                        <td  data-title="Aksi">
                                          <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                              <li><a href="#">Edit</a></li>
                                              <li><a href="#">Hapus</a></li>
                                            </ul>
                                          </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
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
                                      <?php $attributes = array('id' => 'form_tambah'); echo form_open('Table/tambah', $attributes); ?>

                                      <div class="modal-body">
                                        <div class="form-group">
                                           <label>ISBN</label>
                                           <input type="text" class="form-control" id="" placeholder="ISBN" name="isbn">
                                         </div>
                                         <div class="form-group">
                                           <label>Judul Buku</label>
                                           <input type="text" class="form-control" id="" placeholder="Judul Buku" name="judul">
                                         </div>
                                         <div class="form-group">
                                            <label>Pengarang</label>
                                            <input type="text" class="form-control" id="" placeholder="Pengarang" name="pengarang">
                                          </div>
                                          <div class="form-group">
                                            <label>Penerbit</label>
                                            <input type="text" class="form-control" id="" placeholder="Penerbit" name="penerbit">
                                          </div>
                                          <div class="form-group">
                                             <label>Stok</label>
                                             <input type="text" class="form-control" id="" placeholder="Stok" name="stok">
                                           </div>
                                        <div class="form-row align-items-center">
                                          <div class="col-auto my-1">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                              <option selected>Pilih</option>
                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                            </select>
                                          </div>
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

	<script src="<?php echo base_url();?>assets/js/custom/custom.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
