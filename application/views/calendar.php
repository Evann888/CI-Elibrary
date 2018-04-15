<link href="<?php echo base_url();?>assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

<body>

  <section id="container" >

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Calendar</h3>
              <!-- page start-->
              <div class="row mt">
                  <aside class="col-lg-3 mt">
                      <h4><i class="fa fa-angle-right"></i> Draggable Events</h4>
                      <div id="external-events">
                          <div class="external-event label label-theme">My Event 1</div>
                          <div class="external-event label label-success">My Event 2</div>
                          <div class="external-event label label-info">My Event 3</div>
                          <div class="external-event label label-warning">My Event 4</div>
                          <div class="external-event label label-danger">My Event 5</div>
                          <div class="external-event label label-default">My Event 6</div>
                          <div class="external-event label label-theme">My Event 7</div>
                          <div class="external-event label label-info">My Event 8</div>
                          <div class="external-event label label-success">My Event 9</div>
                          <p class="drop-after">
                              <input type="checkbox" id="drop-remove">
                              Remove After Drop
                          </p>
                      </div>
                  </aside>
                  <aside class="col-lg-9 mt">
                      <section class="panel">
                          <div class="panel-body">
                              <div id="calendar" class="has-toolbar"></div>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

  </section>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	   <script src="<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>

    <!--script for this page-->
	   <script src="<?php echo base_url();?>assets/js/calendar-conf-events.js"></script>

  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

</body>
