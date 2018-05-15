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
                 <h1 class="header-title animate-pop-in">Daftar Pinjaman Buku Anda</h1>

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

                 .animate-pop-in2 {
                  animation: pop-in .6s cubic-bezier(0, 0.9, 0.3, 1.2) forwards;
                  opacity: 0;
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

                  <div class="content-panel">
                     <section id="no-more-tables">
                       <!--  di custom js table1-->
                         <table id="table1" class="display">
                             <thead class="">
                             <tr>
                                 <th>No</th>
                                 <th>Judul</th>
                                 <th>Tanggal Disetujui</th>
                                 <th>Tanggal Kembali</th>
                                 <th>Status</th>
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
                                 <td  data-title="Tanggal Disetujui"><?php echo $u->Tanggal_Pinjaman ?></td>
                                 <td  data-title="Tanggal Kembali"><?php echo $u->Tanggal_Kembali ?></td>
                                 <td  data-title="Status"><?php echo $u->Status ?></td>
                                 <td  data-title="Aksi">
                                     <a href="Pinjam/Cancel/<?php echo ($u->ID) ?>">
                                     <button id="cancel_button" type="button" class="btn btn-danger">
                                       <i class="glyphicon glyphicon-remove"></i> Cancel
                                     </button>
                                     </a>
                                   </td>
                             </tr>
                             <?php } ?>
                             </tbody>
                         </table>
                       </section>

 					</div><!-- /row -->
        </div>
                   </div><!-- /col-lg-9 END SECTION MIDDLE -->
        </div><! --/row -->
    </section>
</section>

<!--main content end-->
    </div><! --/row -->
</section>
</section>

</body>
