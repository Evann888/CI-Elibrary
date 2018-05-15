link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/cr-1.4.1/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
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
                                        type="button" class="btn btn-info">
                                          <i class="glyphicon glyphicon-book"></i> Pinjam
                                        </button>
                                        <!-- <a href="Table/Delete/<?php echo ($u->ID) ?>"> -->
                                        <!-- <button id="b" type="button" class="btn btn-danger">
                                          <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                        </a> -->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

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
