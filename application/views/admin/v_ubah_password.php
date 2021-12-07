<!--Counter Inbox-->
<!DOCTYPE html>
<html>

<head>

  <?php $this->load->view('admin/parsial/v_head'); ?>


</head>


<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">

    <?php
    $this->load->view('admin/parsial/v_header');
  ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php
    $this->load->view('admin/parsial/v_sidebar');
    ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
         Ubah Password
          <small></small>
        </h1>
      </section>

      <!-- Main content -->
         <!-- Main content -->
    <section class="content">

<div class="row">

  <!-- /.col -->
  <div class="col-md-12">
  <div class="box-body">
                        <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-sm-12">
                            <h5 class="info-text"></h5>
                        </div>
 
                        <form action="<?= base_url('admin/user/update_password/'.$_SESSION['idadmin']); ?>" method="post">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Password Baru:</label>
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Password Baru" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 ">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ulangi Password Baru:</label>
                                            <input type="text" class="form-control" id="password_ulangi" name="password_ulangi" placeholder="Ulangi Password Baru" required>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">SIMPAN</button>
                                   </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
  </div>
  
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/parsial/v_footer')?>



  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>

</body>
</html>




