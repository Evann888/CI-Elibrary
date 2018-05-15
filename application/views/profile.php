<body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Halaman Ganti Password</h3>

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                    <?php $attributes = array('id' => 'form_tambah','class'=> 'form-horizontal','method' => 'POST');
                  echo form_open_multipart('Profile/ubahPass', $attributes); ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password Lama</label>
                              <div class="col-sm-4">
                                  <input class="form-control round-form" name="plama" autofocus type="password" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Konfirmasi Password</label>
                              <div class="col-sm-4">
                                  <input class="form-control round-form" name="pkonf" autofocus type="password" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password Baru</label>
                              <div class="col-sm-4">
                                  <input class="form-control round-form" name="pbaru" autofocus type="password" required>
                              </div>
                          </div>
                          <div class="text-success"> <?php if($this->session->flashdata('ubahpass')){echo $this->session->flashdata('ubahpass');}?></div>
                          <div class="text-danger"> <?php if($this->session->flashdata('konfgagal')){echo $this->session->flashdata('konfgagal');}?></div>
                          <div class="text-danger"> <?php if($this->session->flashdata('dbgagal')){echo $this->session->flashdata('dbgagal');}?></div>
                          <button type="submit" class="btn btn-theme">Submit</button>
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
