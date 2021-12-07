
<!DOCTYPE html>
<html>
<head>
<style>

tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>

    
    <?php $this->load->view('admin/parsial/v_head'); ?>

</head>
<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <?php
            $this->load->view('admin/parsial/v_header');
        ?>
        
        <aside class="main-sidebar">
            <?php $this->load->view('admin/parsial/v_sidebar'); ?>
        </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Dokumen
        <small></small> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dokumen</a></li>
        <li class="active">Data Dokumen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <h1>Akses dibatasi.</h1>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/parsial/v_footer')?>


<!-- /.modal-dialog -->

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
    <!-- Sparkline -->
    <!-- <script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script> -->
    <!-- jvectormap -->
    <!-- <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script> -->
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script> -->


</body>
</html>
