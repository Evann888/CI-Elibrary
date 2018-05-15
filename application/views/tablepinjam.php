<body>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/cr-1.4.1/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/cr-1.4.1/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom/custom.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

  <!-- **********************************************************************************************************************************************************
       MAIN CONTENT
       *********************************************************************************************************************************************************** -->
       <!--main content start-->
       <section id="main-content">
           <section class="wrapper">

           <div class="row">
               <div class="col-lg-12 main-chart">
                 <h1 class="header-title animate-pop-in">Daftar Antrian Booking Buku</h1>

                 <style>
                 .header-subtitle {
                   text-transform: uppercase;
                   margin-bottom: 5rem;
                 }

                 .header-button {
                   transform: translateZ(.1px);
                   position: relative;
                   z-index: 10;
                 }

                  .img-circle{
                    animation-delay: 2s;
                  }

                 .animate-pop-in {
                   animation: pop-in .6s ease-out forwards;
                 }
                 /* Animations */

                 @keyframes pop-in {
                   0% {
                     opacity: 0;
                     transform: translateY(-4rem) scale(.8);
                   }
                   100% {
                     opacity: 1;
                     transform: none;
                   }
                 }
                 </style>

                   <div class="row mt">
                     <!-- SERVER STATUS PANELS -->


                     <section id="no-more-tables">
                       <!--  di custom js table1-->
                         <table id="table1" class="display">
                             <thead class="">
                             <tr>
                                 <th>No</th>
                                 <th>Judul</th>
                                 <th>Nama Peminjam</th>
                                 <th>Tanggal Booking</th>
                                 <th>Jangka Waktu(hari)</th>
                                 <th>Action</th>
                             </tr>
                             </thead>
                             <tbody>
                             <?php
                               $no = 1;
                               foreach($pinjam as $u){
                             ?>
                             <tr>
                                 <td  data-title="No"><?php echo $no++ ?></td>
                                 <td  data-title="Judul"><?php echo $u->Judul_Buku ?></td>
                                 <td  data-title="Nama Peminjam"><?php echo $u->Nama ?></td>
                                 <td  data-title="Tanggal Booking"><?php echo date("d-m-Y",strtotime($u->Tanggal_Booking)) ?></td>
                                 <td  data-title="Jangka Waktu(hari)"><?php echo $u->Hari ?></td>

                                 <td  data-title="Aksi">
                                   <?php if($u->Status == 'Menunggu Konfirmasi') : ?>
                                      <button id="approve_button" data-toggle="modal" data-target="#approve"
                                        data-isbn="<?php echo $u->ISBN?>" data-judul="<?php echo $u->Judul_Buku?>"
                                        data-nama="<?php echo $u->Nama?>" data-hari="<?php echo $u->Hari ?>"
                                        type="button" class="btn btn-success">
                                        <i class="glyphicon glyphicon-ok"></i> Approve
                                      </button>
                                      <a href="Tablepinjam/Cancel/<?php echo ($u->ID) ?>">
                                     <button id="cancel_button" type="button" class="btn btn-danger">
                                       <i class="glyphicon glyphicon-remove"></i> Cancel
                                     </button>
                                   <?php else : ?>
                                     <button id="cancel_button" type="button" class="btn btn-success">
                                       Finish  <i class="glyphicon glyphicon-thumbs-up"></i>
                                     </button>
                                   <?php endif ?>
                                 </td>
                             </tr>
                             <?php } ?>
                             </tbody>
                         </table>

                        <?php if($this->session->flashdata('sukses')) : ?>
                            <div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('sukses');?></div>
                        <?php endif; ?>
                        <?php if($this->session->flashdata('hapus')) : ?>
                          <div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('hapus');?></div>
                        <?php endif; ?>

                         <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h3 class="modal-title" id="exampleModalLabel">Approve Booking Buku</h3>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                                 <?php $attributes = array('id' => 'form_approve','method' => 'POST');
                                 echo form_open('Tablepinjam/approve', $attributes); ?>
                                 <div class="modal-body">
                                   <div class="form-group">
                                     <label><b>ISBN</b></label>
                                     <p id="isbn" class="form-control-static"></p>
                                     <input type="hidden" name="isbn" id="isbnhide">
                                   </div>
                                   <div class="form-group">
                                     <label><b>Judul Buku</b></label>
                                     <p id="judul" class="form-control-static"></p>
                                   </div>
                                   <div class="form-group">
                                     <label><b>Nama Peminjam</b></label>
                                     <p id="nama" class="form-control-static"></p>
                                     <input type="hidden" name="nama" id="namahide">
                                   </div>
                                   <div class="form-group">
                                     <label><b>Lama Booking(hari)</b></label>
                                      <p id="hari" class="form-control-static"></p>
                                      <input type="hidden" name="hari" id="harihide">
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary" onclick="">Approve</button>
                                 </div>
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                       </section>
 					</div><!-- /row -->

                   </div><!-- /col-lg-9 END SECTION MIDDLE -->
        </div><! --/row -->
    </section>
</section>

<!--main content end-->
    </div><! --/row -->
</section>
</section>

  <!--main content end-->
</body>

<script type="text/javascript">
$(document).ready(function(){
  $(document).on("click", "#approve_button", function () {
      var isbn = $(this).data('isbn');
      var judul = $(this).data('judul');
      var hari = $(this).data('hari');
      var nama = $(this).data('nama');

      $(".modal-body #isbnhide").val(isbn);
      $(".modal-body #namahide").val(nama);
      $(".modal-body #harihide").val(hari);
      $(".modal-body #isbn").text(isbn);
      $(".modal-body #judul").text(judul);
      $(".modal-body #hari").text(hari);
      $(".modal-body #nama").text(nama);

  })
});
</script>
