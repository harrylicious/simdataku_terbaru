
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
    <?php
        $query=$this->db->query("SELECT * FROM visitors WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
        $jml=$query->num_rows();

    ?>
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

            <!-- Main content -->
            <section class="content">
            <?php include_once "parsial/summary.php"; ?>     

                <div class="row">  
             

                    <div class="col-md-12"> 
                        <div class="box box-info">
                            <div class="box-header with-border">
                            <?php 
                                $teks = "Data Usaha Berdasarkan Komoditas";
                                if ($_SESSION['level'] == "superadmin") {
                                  $teks = "Filter Data Usaha <b>".$_SESSION['alamat']."</b> Bertingkat";
                                }
                                else if ($_SESSION['level'] == "admin") {
                                  $teks = "Daftar Usaha Terentri di <b>".$_SESSION['nama_lengkap']."</b>";
                                }
                                else {
                                  $teks = "Daftar Semua Usaha Kecamatan <b>".$_SESSION['kecamatan']."</b>";
                                }

                                ?> 
                                <h3 class="box-title"><?= $teks; ?> </h3> 

                              
                            </div>
                            <div class="box-body">
                            <form action="<?= base_url('admin/dashboard/get_data_pencarian_bertingkat'); ?>" method="post">
                     
                                <div class="row">
                                    <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Pilih Kabupaten</label>
                                                            <select class="form-control" name="kabupaten" id="kabupaten">
                                                                <option value="<?= $var_kabupaten; ?>"><?= $var_kabupaten; ?></option>
                                                                <?php
                                                                    $no = 1;
                                                                    foreach ($data_kabupaten as $row) : 
                                                                    ?>
                                                                        <option value="<?= $row->kabupaten; ?>"><?= $row->kabupaten." [Total: ".$row->total."]"; ?></option>
                                                                    <?php
                                                                    endforeach;
                                                                    ?>
                                                            </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Pilih Kecamatan</label>
                                                            <select class="form-control" name="kecamatan" id="kecamatan">
                                                                <option value="<?= $var_kecamatan; ?>"><?= $var_kecamatan; ?></option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Pilih Desa/Kelurahan</label>
                                                            <select class="form-control" name="desa" id="desa">
                                                                <option value="<?= $var_desa; ?>"><?= $var_desa; ?></option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Pilih Komoditas</label>
                                                            <select class="form-control" name="komoditas" id="komoditas">
                                                                <option value="<?= $var_komoditas; ?>"><?= $var_komoditas; ?></option>
                                                            </select>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Pilih Metode Pemasaran</label>
                                                            <select class="form-control" name="metode_pemasaran" id="metode_pemasaran">
                                                                <option value="<?= $var_metode_pemasaran; ?>" selected><?= $var_metode_pemasaran; ?></option>
                                                                <option value="ONLINE">ONLINE</option>
                                                                <option value="OFFLINE">OFFLINE</option>
                                                            </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Pilih Level Usaha</label>
                                                            <select class="form-control" name="level_usaha" id="level_usaha">
                                                                <option value="<?= $var_level_usaha; ?>" selected><?= $var_level_usaha; ?></option>
                                                                    <?php
                                                                        $no = 1;
                                                                        foreach ($data_level_usaha as $row) :  
                                                                        ?>
                                                                            <option value="<?= $row->ket; ?>"><?= $row->ket." [Total: ".$row->total."]"; ?></option>
                                                                        <?php
                                                                        endforeach;
                                                                    ?>
                                                            </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">CARI DATA</button>
                                                        <button type="reset" class="btn btn-danger">RESET PENCARIAN</button>
                                                    </div>
                                                </div>
                                                
                            </div>
                                <div class="panel panel-default label-default"><h4><strong>Total Data: <?= $jml_data; ?></strong></h4> </div>
                 




                
                        </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12"> 
                        <div class="box box-info">
                            <div class="box-header with-border">
                            <?php 
                                $teks = "Data Usaha Berdasarkan Komoditas";
                                if (!$var_kabupaten == "") {
                                  $teks = "Daftar Semua Usaha <b>".$var_kabupaten."</b>";
                                }
                                else if (!$var_kecamatan == "") {
                                    $teks = "Daftar Semua Usaha <b>".$var_kecamatan.",".$var_kabupaten."</b>";
                                }
                                else if (!$var_desa == "") {
                                    $teks = "Daftar Semua Usaha <b>".$var_desa.",".$var_kecamatan.",".$var_kabupaten."</b>";
                                }
                                else {
                                  $teks = "Daftar Semua Usaha Level <b>".$var_level_usaha."</b>";
                                }

                                ?> 
                                <h3 class="box-title"><?= $teks; ?> </h3> 

                              
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <?php if ($_SESSION['level'] == "dinas") { ?>

                                    <table id="dtHorizontalExample" class="display" style="width:100%"> 
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                            <th>Komoditas</th>
                                            <th>Total</th> 
                                            <th></th>
                                            </tr>  
                                        </thead>
                                        <tbody><?php
                                                $no=1; ?>
                                                    
                                            <?php
                                            
                                                foreach ($data as $row): 
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $row->komoditas;?></td> 
                                                        <td><?php echo $row->total;?> Usaha</td>
                                                        <td style="text-align:right;"><a href="<?php echo site_url('admin/dashboard/get_data_by_sektor/'.$row->komoditas);?>" class="btn btn-warning">Lihat Daftar</a></td>
                                                    </tr>
                                            <?php endforeach;?> 
                                                   
                                        </tbody>
                                    </table>
                                     
                                    <?php } 
                                    else { 
                                        ?>
                                        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm">
                                              <thead>
                                                  <tr>
                                                        <th>ID</th>
                                        <div class="box-header"> 
                                       </div>
                                                        <th>Nama usaha</th>
                                                        <th>Tahun Berdiri</th>
                                                        <th>Nama Pimpinan</th>
                                                        <th>NIK</th>
                                                        <th>Sektor Usaha</th> 
                                                        <th>Sub Sektor</th>
                                                        <th>Alamat</th>
                                                        <th>Komoditas</th>
                                                        <th>Desa</th>
                                                        <th>Kecamatan</th>
                                                        <th>Kabupaten</th>
                                                        <th>Metode Pemasaran</th>
                                                        <th>Level</th>
                                                      <th width="160px">Aksi</th>
                                                  </tr>
                                              </thead>
                                              
                                              <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($data as $row) :
                                                  ?>
                                                  <tr>
                                                      <td><?= $no++; ?></td>
                                                      <td><?= $row->nama_usaha; ?></td>
                                                      <td><?= $row->th_berdiri; ?></td>
                                                      <td><?= $row->nama_pimpinan; ?></td>
                                                      <td><?= $row->nik; ?></td>
                                                      <td><?= $row->sektor_usaha; ?></td>
                                                      <td><?= $row->sub_sektor_usaha; ?></td>
                                                      <td><?= $row->alamat; ?></td>
                                                      <td><?= $row->komoditas; ?></td>
                                                      <td><?= $row->desa; ?></td>
                                                      <td><?= $row->kecamatan; ?></td>
                                                      <td><?= $row->kabupaten; ?></td>
                                                      <td><?= $row->metode_pemasaran; ?></td>
                                                      <td><?= $row->ket; ?></td>
                                                      <td>
                                                        <?php if ($_SESSION['level'] == "relawan") { ?>
                                                          <a href="<?= base_url('admin/usaha/edit/').$row->id; ?>" class="btn btn-warning">Edit</a>
                                                          <a href="<?= base_url('admin/usaha/delete_data/').$row->id; ?>" class="btn btn-danger">Hapus</a>
                            
                                                        <?php }
                                                        else { ?>
                                                          
                                                      
                                                        <?php } ?>
                                                         
                                                    
                                                      </td>
                                                  </tr>
                            
                                                  <?php
                                                  endforeach;
                                                  
                                                
                                                ?>
                                            
                                              </tbody>
                                        </table>



                                    <?php } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>



                
             
                
            
            </section> 
        </div>

    <?php $this->load->view('admin/parsial/v_footer')?>
        
    <script>

        $("#kabupaten").change(function(){

            var kabupaten = $("#kabupaten").val();

            //console.log(kabupaten); 

            $.ajax({
                url : "<?php echo base_url();?>admin/dashboard/get_data_komoditas_perkabupaten",
                method : "POST",
                data : {kabupaten:kabupaten},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].komoditas+'>'+data[i].komoditas+' [Total: '+data[i].total+']'+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#komoditas').html(html);

                }
            });


            $.ajax({
                url : "<?php echo base_url();?>admin/dashboard/get_data_kecamatan_perkabupaten",
                method : "POST",
                data : {kabupaten:kabupaten},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].kecamatan+'>'+data[i].kecamatan+' [Total: '+data[i].total+']'+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#kecamatan').html(html);

                }
            });


            $.ajax({
                url : "<?php echo base_url();?>admin/dashboard/get_data_desa_perkabupaten",
                method : "POST",
                data : {kabupaten:kabupaten},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].desa+'>'+data[i].desa+' [Total: '+data[i].total+']'+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#desa').html(html);

                }
            });
        });
 
        $("#kecamatan").change(function(){

            var kecamatan = $("#kecamatan").val();

            console.log(kecamatan);

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url : "<?php echo base_url();?>admin/dashboard/get_data_komoditas_perkecamatan",
                method : "POST",
                data : {kecamatan:kecamatan},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].komoditas+'>'+data[i].komoditas+' [Total: '+data[i].total+']'+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#komoditas').html(html);

                }
            });

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url : "<?php echo base_url();?>admin/dashboard/get_data_desa_perkecamatan",
                method : "POST",
                data : {kecamatan:kecamatan},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].desa+'>'+data[i].desa+' [Total: '+data[i].total+']'+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#desa').html(html);

                }
            });
        });

        $("#desa").change(function(){

            var desa = $("#desa").val();

            console.log(desa);

            $.ajax({
                url : "<?php echo base_url();?>admin/dashboard/get_data_komoditas_perdesa",
                method : "POST",
                data : {desa:desa},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].komoditas+'>'+data[i].komoditas+' [Total: '+data[i].total+']'+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#komoditas').html(html);

                }
            });
            });
    </script>



    <script>
        // assumes you're using jQuery
        $(document).ready(function() {
        $('.confirm-div').hide();
        <?php if($this->session->flashdata('msg')){ ?>
        $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
        <?php } ?>
        });
    </script> 

    
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
                  columns: [ 0,1,2,3,4,5,6,7,8,9,10,11]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11],
                    
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

                return 'Daftar_Usaha'+' <?= urldecode($wilayah); ?>' + '_' + today;
              },

            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ],
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
  
                  return 'Daftar_Usaha'+' <?= urldecode($wilayah); ?>' + '_' + today;
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


    </div>

    
<!-- modal -->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Terdeteksi <b><?= $total_data_inaktif['total']; ?></b> Arsip <b>Pindah Inaktif</b> </h4>
        </div>
        <form method="post" action="<?php echo base_url('admin/usaha/pindahkan_semua/'.$_SESSION['kode_uk_up']) ?>" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="table-responsive">
                      <table class="table no-margin"> 
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>ID</th>
                                  <th>Kode</th>
                                  <th>Jenis</th>
                                  <th>Lok. Sekarang</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  $no=1;
                                  foreach ($data_pindah_inaktif as $row):
                                    ?>
                                      <tr>
                                          <td><?php echo $no++;?></td>
                                          <td><?php echo $row->dap_id;?></td> 
                                          <td><?php echo $row->kode_klasifikasi;?></td>
                                          <td><?php echo $row->jenis;?></td>
                                          <td><?php echo $row->lokasi_simpan;?></td>
                                      </tr>
                              <?php endforeach;?>
                          </tbody>
                      </table>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"> Pindahkan Sekarang</button>
            </div>
        </form>
    </div>
</div>
</div>
</body>
</html>


  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>