

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
        
 
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Daftar Koperasi <strong><?= urldecode($wilayah); ?></strong> <br>
            <small></small>
        </h1>
        </section>
            

    <!-- Main content -->
    <section class="content">  
            

      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header"> 
             </div>
            <!-- /.box-header -->
            <div class="box-body">
       
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm "> 
                  <thead>
                      <tr>
                            <th>No.</th>
                            <th>Nama koperasi</th>
                            <th>Tahun Berdiri</th>
                            <th>Tempat Kedudukan</th>
                            <th>No. Badan Hukum</th>
                            <th>Tgl. Badan Hukum</th>
                            <th>Tgl. PAD</th>
                            <th>Notaris</th>
                            <th>No. Akta Perubahan PAD</th>
                            <th>Notaris Camat Akta PD</th>
                            <th>Jangka Waktu Pendirian</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Fax</th>
                            <th>Status Koperasi</th>
                            <th>Aksi</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) : 
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama_koperasi; ?></td>
                        <td><?= $row->tahun_berdiri; ?></td>
                        <td><?= $row->tempat_kedudukan; ?></td>
                        <td><?= $row->no_badan_hukum; ?></td>
                        <td><?= tgl_default($row->tgl_badan_hukum); ?></td>
                        <td><?= tgl_default($row->tgl_pad); ?></td>
                        <td><?= $row->notaris; ?></td>
                        <td><?= $row->nomor_akta_perubahan_pad; ?></td>
                        <td><?= $row->notaris_camat_akta_pd; ?></td>
                        <td><?= $row->jangka_waktu_pendirian; ?></td>
                        <td><?= $row->alamat.",".$row->desa.",".$row->kecamatan.",".$row->kabupaten.",".$row->provinsi; ?></td>
                        <td><?= $row->no_telpon; ?></td>
                        <td><?= $row->nomor_fax; ?></td>
                        <td><?= $row->status_koperasi; ?></td>
                        <td>
                              <a href="<?= base_url('admin/koperasi/edit/').$row->id_koperasi; ?>" class="btn btn-warning">Edit</a>
                              <a href="<?= base_url('admin/koperasi/delete_data/').$row->id_koperasi; ?>" class="btn btn-danger">Hapus</a> 


                          </td>
                      </tr>

                      <?php
                      endforeach;
                      
                    
                    ?>
                
                  </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

               
                
            
      </section>
  </div>

  <?php $this->load->view('admin/parsial/v_footer')?>

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

                return 'Daftar_koperasi'+ '_' + today;
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

                return 'Daftar_koperasi'+'_' + today;
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



</body>


<!-- modal -->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Import Data</h4>
        </div>
        <form method="post" action="<?php echo base_url('admin/koperasi/import_excel'); ?>" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="file" class="btn" name="file" required>
                NB: file harus bertype xls|csv
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Import</button>
            </div>
        </form>
    </div> 
</div>
</div>
<!-- /.modal-dialog -->


</html>


  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  
 