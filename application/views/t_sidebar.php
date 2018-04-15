<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="main/toProfile"><img src="<?php echo base_url();?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered"> <?php echo $this->session->userdata("nama"); ?></h5>

            <li class="mt">
                <a class="active" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>Display</span>
                </a>
                <ul class="sub">
                    <li><a  href="main/toCalendar">Calendar</a></li>
                    <li><a  href="main/toGallery">Gallery</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Login and Register</span>
                </a>
                <ul class="sub">
                    <li><a  href="main/toRegister">Register Page</a></li>
                    <li><a  href="main/toLogin">Login</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-th"></i>
                    <span>Data Tables</span>
                </a>
                <ul class="sub">
                    <li><a  href="main/toTable">Tabel Buku</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="main/toContact" >
                    <i class="fa fa-tasks"></i>
                    <span>Contact Us</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="main/toAdmin" >
                    <i class="fa fa-cogs"></i>
                    <span>Admin</span>
                </a>
                <ul class="sub">
                    <li><a  href="main/toTable">Managemen Buku</a></li>
                    <li><a  href="main/toTable">Managemen User</a></li>
                    <li><a  href="main/toTable">Kirim Notifikasi</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> -->
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url();?>assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/gritter-conf.js"></script>
