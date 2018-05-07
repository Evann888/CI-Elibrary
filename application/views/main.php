<body>
  <!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
  <h1 class="main-heading-title">We are<span class="main-element themecolor" data-elements=" Information Technology, FTIK, ITS"></span></h1>


              </div><!-- /col-lg-3 -->
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
          image: '<?php echo base_url();?>assets/img/ui-sam.jpg',
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
