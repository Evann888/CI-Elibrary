<body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Contact Us</h3>

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      <form action="Contact_form/postEmail" class="form-horizontal style-form" method="POST">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Subjek</label>
                              <div class="col-sm-4">
                                  <input class="form-control round-form" autofocus type="text" f>
                                    <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-4">
                                <?php if($this->session->userdata("status") != 'login'): ?>
                                  <input class="form-control round-form" autofocus type="text" f>
                                <?php elseif($this->session->userdata("status") == 'login'):?>
                                  <p class="form-control round-form"><?php echo $this->session->userdata("email"); ?></p>
                                <?php endif;?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Message</label>
                              <div class="col-sm-6">
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Input Message Here"></textarea>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-theme">Send Message</button>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->
          	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--script for this page-->
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="<?php echo base_url();?>assets/js/bootstrap-switch.js"></script>

	<!--custom tagsinput-->
	<script src="<?php echo base_url();?>assets/js/jquery.tagsinput.js"></script>

	<!--custom checkbox & radio-->

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


	<script src="<?php echo base_url();?>assets/js/form-component.js"></script>

</body>
