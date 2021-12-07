

<!--Counter Inbox-->
<!DOCTYPE html>
<html>

<head>

  <?php 
  $this->load->view('admin/parsial/v_head'); ?>

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
        Profil <b><?= $_SESSION['nama_lengkap']; ?></b>
          <small></small>
        </h1>
      </section>

      <!-- Main content -->
         <!-- Main content -->
    <section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Identitas Anda</h3>

                </div>
      <div class="box-body">
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Tgl. Daftar  : </b> <a class="pull-right"><strong><?= $data['created_at']; ?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Kode :</b> <a class="pull-right"><strong><?= $data['kode_user']; ?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Terakhir Update: </b><?php  echo last_updated() != "" ? last_updated() : 0 ?><a class="pull-right"></a>
          </li>
        </ul>

        <a href="<?= base_url('admin/user/profil/'.$data['kode_user']); ?>" class="btn btn-primary btn-block"><b>Segarkan</b></a>
        
     </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->

    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Identitas Anda</h3>

                </div>

                <div class="box-body">
                        <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-sm-12">
                            <h5 class="info-text"></h5>
                        </div>

                        <form action="<?= base_url('admin/document/save_data'); ?>" method="post">
                        <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label>Kode User</label>
                                        <input type="text" class="form-control" id="kode_user" name="kode_user" placeholder="Kode User" value="<?= $data['kode_user']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label>Nama Lengkap </label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= $data['nama_lengkap']; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $data['alamat']; ?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Desa</label>
                                        <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa" value="<?= $data['desa']; ?>" required>
                                    </div>
                                </div>

                            </div>

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $data['kecamatan']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kabupaten" value="<?= $data['kabupaten']; ?>">
                                    </div>
                                </div>

                            </div>

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telpon</label>
                                        <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Telpon" value="<?= $data['telp']; ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $data['email']; ?>">
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Level</label>
                                            <select class="form-control" name="level" required>
                                                <option value="<?= $data['level']; ?>"><?= $data['level']; ?></option>
                                                <option value="Admin">Admin</option>
                                                <option value="Relawan">Relawan</option>
                                            </select>
                                    </div>
                                </div>

                            
                            </div>

                            

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $data['username']; ?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?= $data['password']; ?>" required>
                                    </div>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
               
    </div>
        

        <!-- /.tab-pane -->

    <!-- /.nav-tabs-custom -->
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



<!-- modal -->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Unggah Data</h4>
        </div>
        <form method="post" action="<?php echo base_url('admin/document/import_excel'); ?>" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="file" class="btn" name="file" readonly>
                NB: file harus bertype xls|csv
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Unggah</button>
            </div>
        </form>
    </div> 
</div>
</div>


<script>
  $(document).ready(function () {
    $('#dtHorizontalExample tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="'+title+' Search" />' );
	} );

  $('#dtHorizontalExample').DataTable({
    
    dom: 'Bfrtip',
    buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14],
                    
                },
                filename: function(){
                  
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
                today = dd+'-'+mm+'-'+yyyy;

                return 'Daftar_Usaha_Komoditas_'+' <?= urldecode($komoditas); ?>' + '_' + today;
              },
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
                },
                filename: function(){
                  
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
                today = dd+'-'+mm+'-'+yyyy;

                return 'Daftar_Usaha_Komoditas_'+' <?= ($komoditas); ?>' + '_' + today;
              },
            },
            'colvis'
        ],
  "scrollX": true,
  "deferRender": true,
  "responsive": true,
   
  
  });
  
  
  $('.dataTables_length').addClass('bs-select');
  });
</script>





