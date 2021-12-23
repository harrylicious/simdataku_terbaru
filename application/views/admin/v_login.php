<!DOCTYPE html>
<html>

<head>

  <?php $this->load->view('admin/parsial/v_head'); ?>

</head>

<body class="hold-transition login-page l-bg-blue-dark">
  <div class="login-box">
    <div>
      <p><?php echo $this->session->flashdata('msg'); ?></p>
    </div>
    <!-- /.login-logo --> 
    <div class="login-box-body p-3 mb-2 bg-gradient-danger">
      <p class="login-box-msg"> <img width="100;" src="<?php echo base_url() . 'assets/images/icon.png' ?>"></p>
      <h5 class="login-box-msg"> Login SIMDATAKU - Dinas Koperasi & UMKM Provinsi NTB</h5>
      <hr />

      <form action="<?php echo site_url() . 'admin/login/auth' ?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-info btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->
      <hr />
      <p>
        <center>Copyright <?php echo date('Y'); ?> by Dinas Koperasi & UMKM Provinsi NTB All Right Reserved</center>
      </p>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <!-- iCheck -->
  <!-- <script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script> -->
  <!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script> -->
</body>

</html>