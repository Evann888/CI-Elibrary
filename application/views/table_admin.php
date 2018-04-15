<head>
  <link rel="stylesheet" href="<?php echo base_url();?>/css/master.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/datatables.min.css">

</head>

<body>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Katalgog Buku Perpustakaan GRII Kertajaya</h3>

    		  	<div class="row mt">
                  <div class="col-lg-12">
                          <div class="content-panel">
    						  <h4><i class="fa fa-angle-right"></i>untuk search dan sort disini</h4>
                              <section id="no-more-tables">
                                  <table id="table1" class="">
                                      <thead class="cf">
                                      <tr>
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
                                      <tr>
                                          <td  data-title="ISBN">AAC</td>
                                          <td  data-title="Judul">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                          <td  data-title="Pengarang">$1.38</td>
                                          <td  data-title="Penerbit">-0.01</td>
                                          <td  data-title="Kategori">-0.36%</td>
                                          <td  data-title="Stok">$1.39</td>
                                          <td  data-title="Gambar">$1.39</td>
                                          <td  data-title="Aksi">$1.38</td>
                                      </tr>
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

  <script src="<?php echo base_url();?>assets/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#table1').DataTable();
    });
  </script>
</body>
