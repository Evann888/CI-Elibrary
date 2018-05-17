<body>
  <!-- **********************************************************************************************************************************************************
       MAIN CONTENT
       *********************************************************************************************************************************************************** -->
       <!--main content start-->
       <section id="main-content">
           <section class="wrapper">

           <div class="row">
               <div class="col-lg-9 main-chart">
                 <h1 class="header-title animate-pop-in">Selamat Datang di Elibrary</h1>
                 <h3 class="header-subtitle animate-pop-in">GRII Kertajaya Surabaya</h3>
                 <?php if($this->session->flashdata('error')) : ?>
                   <div class="alert alert-warning alert-dismissable"> <?php echo $this->session->flashdata('error');?></div>
                 <?php endif; ?>
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


      <?php foreach ($buku as $u) :?>
					<div class="col-md-4 mb">
						<!-- WHITE PANEL - TOP USER -->
						<div class="white-panel pn animate-pop-in2">
							<div class="white-header animate-pop-in2">
                <h4 style="color:black;"><?php echo $u->Judul_Buku ?></h4>
							</div>
             <?php if($u->DefaultPath == "blankbook.PNG"): ?>
							<p><img src="<?php echo base_url('gambar/Buku/blankbook.png')?>" class="img-circle animate-pop-in" width="80"></p>
            <?php else :?>
              <p><img src="<?php echo base_url('gambar/Buku/').$u->Path;?>" class="img-circle" width="80"></p>
            <?php endif?></a>

            <?php if($u->Stok <= 0): ?>
              <button type="button" class="btn btn-warning animate-pop-in2">
                Stok Habis
              </button>
            <?php endif; ?>
            <?php if($u->Stok > 0): ?>
              <button type="button" data-toggle="modal" id="booking_button" data-target="#booking"
                data-isbn="<?php echo $u->ISBN?>" data-judul="<?php echo $u->Judul_Buku?>"
                data-stok="<?php echo $u->Stok?>"
                class="btn btn-theme animate-pop-in2">Pinjam
              </button>
            <?php endif; ?>

							<div class="row">
								<div class="col-md-6">
									<p class="small mt hidden-xs hidden-sm hidden-md" style="color:black;">Pengarang</p>
									<p class="small mt hidden-xs hidden-sm hidden-md" style="color:black;"><?php echo $u->Pengarang ?></p>
								</div>
								<div class="col-md-6">
									<p class="small mt" style="color:black;">Stok</p>
									<p style="color:black;"><?php echo $u->Stok ?></p>
								</div>
							</div>
						</div>
					</div><!-- /col-md-4 -->
      <?php endforeach; ?>

      <a href="Main/toPinjam">
        <button type="button" class="btn btn-info btn-lg btn-block">Riwayat Booking</button>
      </a>
      <!-- Modal -->
      <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Booking Buku </h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $attributes = array('id' => 'form_booking','method' => 'POST');
          echo form_open('Main/Booking', $attributes); ?>
            <div class="modal-body">
              <input type="hidden" id="isbnhide" name="isbn" >
              <input type="hidden" name="nama" value="<?php echo $this->session->userdata("nama"); ?>">
              <input type="hidden" name="email" value="<?php echo $this->session->userdata("email"); ?>">

              <div class="form-group">
                <label><b>Judul Buku</b></label>
                <p id="judul" class="form-control-static"></p>
                <input type="hidden" id="judulhide" name="judul" >
              </div>
              <div class="form-group">
                 <label>Stok</label>
                 <p id="stok" class="form-control-static"></p>
                 <input type="hidden" id="stokhide" name="stok" >
               </div>
              <div class="form-group">
                <label>Lama Booking :</label>
                 <input autofocus type="number" name="hari" required min="1" max="30 ">
                 <span> Hari</span>
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

 					</div><!-- /row -->

                   </div><!-- /col-lg-9 END SECTION MIDDLE -->

  <!-- **********************************************************************************************************************************************************
RIGHT SIDEBAR CONTENT
*********************************************************************************************************************************************************** -->

            <div class="col-lg-3 ds">
              <!--COMPLETED ACTIONS DONUTS CHART-->
      <h3>Top BOOK</h3>

                <!-- First Action -->
              <?php foreach ($topbuku as $u) :?>
                <div class="desc">
                  <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div>
                  <div class="details">
                    <p><muted><?php echo $u->Judul_Buku ?></muted><br/>
                       Dikarang oleh <a href="#"><?php echo $u->Pengarang?></a><br/>
                      Sisa Stok : <a href="#"><?php echo $u->Stok?></a>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>

<a href="Main/toTableBukuUser"><p>Lihat Selengkapnya..</p>
                 <!-- USERS ONLINE SECTION -->
      <h3>Anggota Perpustakaan</h3>
                <!-- First Member -->
              <?php foreach ($anggota as $u) :?>
                <div class="desc">
                  <div class="thumb">
                    <img class="img-circle" src="<?php if($u->DefaultPath == "defaultuser.png"){echo base_url('gambar/User/defaultuser.png');}
                    else{echo base_url('gambar/User/').$u->Path;}?>" width="35px" height="35px" align="">
                  </div>
                  <div class="details">
                    <p><a href="#"><?php echo $u->Nama ?></a><br/>
                       Bergabung Sejak <?php echo date("d-m-Y",strtotime($u->date)) ?>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>

            </div><!-- /col-lg-3 -->
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
      $(document).ready(function () {
      var unique_id = $.gritter.add({
          // (string | mandatory) the heading of the notification
          title: 'Selamat Datang <?php echo $this->session->userdata("nama"); ?> di Website GRII Kertajaya',
          // (string | mandatory) the text inside the notification
          text: 'Terima Kasih telah menggunakan layanan kami',
          // (string | optional) the image to display on the left
          image: '<?php echo base_url('gambar/wel.jpg');?>',
          // (bool | optional) if you want it to fade out on its own or just sit there
          sticky: true,
          // (int | optional) the time you want it to be alive for before fading out
          time: '',
          // (string | optional) the class name you want to apply to that specific message
          class_name: 'my-sticky-class'
      });
      return false;
      });
</script>

<script type="text/javascript">
$(document).ready(function(){
  $(document).on("click", "#booking_button", function () {
      var isbn = $(this).data('isbn');
      var judul = $(this).data('judul');
      var stok = $(this).data('stok');

      $(".modal-body #isbnhide").val(isbn);
      $(".modal-body #judulhide").val(judul);
      $(".modal-body #stokhide").val(stok);
      $(".modal-body #judul").text(judul);
      $(".modal-body #stok").text(stok);
  })
});
</script>

<script src="<?php echo base_url();?>assets/js/custom/custom.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
