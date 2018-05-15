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

            <button type="button" data-toggle="modal" id="booking_button" data-target="#booking"
              data-isbn="<?php echo $u->ISBN?>" data-judul="<?php echo $u->Judul_Buku?>"
              data-stok="<?php echo $u->Stok?>"
              class="btn btn-theme animate-pop-in2">Pinjam
            </button>

							<div class="row">
								<div class="col-md-6">
									<p class="small mt" style="color:black;">Pengarang</p>
									<p style="color:black;"><?php echo $u->Pengarang ?></p>
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
      <h3>NOTIFICATIONS</h3>

                <!-- First Action -->
                <div class="desc">
                  <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div>
                  <div class="details">
                    <p><muted>2 Minutes Ago</muted><br/>
                       <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                    </p>
                  </div>
                </div>
                <!-- Second Action -->
                <div class="desc">
                  <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div>
                  <div class="details">
                    <p><muted>3 Hours Ago</muted><br/>
                       <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                    </p>
                  </div>
                </div>
                <!-- Third Action -->
                <div class="desc">
                  <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div>
                  <div class="details">
                    <p><muted>7 Hours Ago</muted><br/>
                       <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                    </p>
                  </div>
                </div>
                <!-- Fourth Action -->
                <div class="desc">
                  <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div>
                  <div class="details">
                    <p><muted>11 Hours Ago</muted><br/>
                       <a href="#">Mark Twain</a> commented your post.<br/>
                    </p>
                  </div>
                </div>
                <!-- Fifth Action -->
                <div class="desc">
                  <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div>
                  <div class="details">
                    <p><muted>18 Hours Ago</muted><br/>
                       <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
                    </p>
                  </div>
                </div>

                 <!-- USERS ONLINE SECTION -->
      <h3>TEAM MEMBERS</h3>
                <!-- First Member -->
                <div class="desc">
                  <div class="thumb">
                    <img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
                  </div>
                  <div class="details">
                    <p><a href="#">DIVYA MANIAN</a><br/>
                       <muted>Available</muted>
                    </p>
                  </div>
                </div>
                <!-- Second Member -->
                <div class="desc">
                  <div class="thumb">
                    <img class="img-circle" src="assets/img/ui-sherman.jpg" width="35px" height="35px" align="">
                  </div>
                  <div class="details">
                    <p><a href="#">DJ SHERMAN</a><br/>
                       <muted>I am Busy</muted>
                    </p>
                  </div>
                </div>
                <!-- Third Member -->
                <div class="desc">
                  <div class="thumb">
                    <img class="img-circle" src="assets/img/ui-danro.jpg" width="35px" height="35px" align="">
                  </div>
                  <div class="details">
                    <p><a href="#">DAN ROGERS</a><br/>
                       <muted>Available</muted>
                    </p>
                  </div>
                </div>
                <!-- Fourth Member -->
                <div class="desc">
                  <div class="thumb">
                    <img class="img-circle" src="assets/img/ui-zac.jpg" width="35px" height="35px" align="">
                  </div>
                  <div class="details">
                    <p><a href="#">Zac Sniders</a><br/>
                       <muted>Available</muted>
                    </p>
                  </div>
                </div>
                <!-- Fifth Member -->
                <div class="desc">
                  <div class="thumb">
                    <img class="img-circle" src="assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                  </div>
                  <div class="details">
                    <p><a href="#">Marcel Newman</a><br/>
                       <muted>Available</muted>
                    </p>
                  </div>
                </div>

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
          image: '<?php if($this->session->userdata("path")){echo base_url('gambar/User/').$this->session->userdata("path");}
                  else{echo base_url('gambar/User/Defaultuser.png');}?>',
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
