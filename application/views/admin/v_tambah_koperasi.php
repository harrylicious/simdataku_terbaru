<style>
    #map_canvas {
        width: 980px;
        height: 500px;
    }

    #current {
        padding-top: 25px;
    }
</style>
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
                    Tambah Data Koperasi
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
                            <div class="box-body box-profile">



                                <h3 class="profile-username text-center"><?php  ?></h3>



                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>ID Admin :</b> <a class="pull-right"><strong><?= $_SESSION['idadmin']; ?>
                                            </strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Username Admin :</b> <a
                                            class="pull-right"><strong><?= $_SESSION['username']; ?> </strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nama Admin :</b> <a
                                            class="pull-right"><strong><?= $_SESSION['nama_lengkap']; ?> </strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Terakhir Update:
                                        </b><?php  echo last_updated() != "" ? last_updated() : 0 ?><a
                                            class="pull-right"></a>
                                    </li>
                                </ul>

                                <a href="<?= base_url('admin/Koperasi/tambah/'.$_SESSION['idadmin']); ?>"
                                    class="btn btn-primary btn-block"><b>Segarkan</b></a>

                                <button class="btn btn-success  btn-block" data-toggle="modal"
                                    data-target="#modal-default"><i class="fa fa-upload"> Import data</i></button>
                                <a class="btn btn-success  btn-block"
                                    href="<?= base_url('assets/uploads/template/template-tambah-koperasi.xls'); ?>"
                                    download="template-tambah-koperasi.xls"><span class="fa fa-arrow-down"></span> Download
                                    template</a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->

                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Koperasi</a></li>
                                <li class=""><a href="#kegiatan" data-toggle="tab">Kegiatan Koperasi</a></li>
                                <li class=""><a href="#anggota" data-toggle="tab">Anggota</a></li>
                                <li class=""><a href="#pengawas" data-toggle="tab">Pengawas</a></li>
                                <li class=""><a href="#pengurus" data-toggle="tab">Pengurus</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Koperasi</h3>

                                    </div>
                                    <div class="box-body">
                                        <div class="col-sm-12">
                                            <h5 class="info-text"></h5>
                                        </div>

                                        <form action="<?= base_url('admin/koperasi/save_data'); ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Nama Koperasi</label>
                                                        <input type="text" class="form-control" id="nama_koperasi"
                                                            name="nama_koperasi" placeholder="Nama Koperasi" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Tahun Berdiri </label>
                                                        <input type="number" class="form-control" id="tahun_berdiri"
                                                            name="tahun_berdiri" placeholder="Tahun Berdiri" min="1990"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tempat Kedudukan</label>
                                                        <input type="text" class="form-control" id="tempat_kedudukan"
                                                            name="tempat_kedudukan" placeholder="Tempat Kedudukan">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No. Badan Hukum</label>
                                                        <input type="number" class="form-control" id="no_badan_hukum"
                                                            name="no_badan_hukum" placeholder="No. Badan Hukum">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Badan Hukum</label>
                                                        <input type="date" class="form-control" id="tgl_badan_hukum"
                                                            name="tgl_badan_hukum" placeholder="Tanggal Badan Hukum">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal PAD</label>
                                                        <input type="date" class="form-control" id="tgl_pad"
                                                            name="tgl_pad" placeholder="Tanggal PAD">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Notaris / Camat Badan Hukum</label>
                                                        <input type="text" class="form-control" id="notaris_camat_badan_hukum"
                                                            name="notaris_camat_badan_hukum" placeholder="Notaris / Camat Badan Hukum">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No. Akta Perubahan PAD</label>
                                                        <input type="text" class="form-control" id="no_akta_perubahan_pad"
                                                            name="no_akta_perubahan_pad" placeholder="No. Akta Perubahan PAD">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Notaris Camat Akta PD</label>
                                                        <input type="text" class="form-control" id="notaris_camat_akta_pd" name="notaris_camat_akta_pd"
                                                            placeholder="Notaris Camat Akta PD">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jangka Waktu Pendirian</label>
                                                        <input type="number" class="form-control" id="jangka_waktu_pendirian"
                                                            name="jangka_waktu_pendirian" placeholder="Jangka Waktu Pendirian">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"><b>Alamat Koperasi</b></h3>
                                                </div>
                                                <div class="box-body">
                                                <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Provinsi</label>
                                                                <input type="text" class="form-control"
                                                                    id="provinsi" name="provinsi"
                                                                    placeholder="Provinsi"  value="Nusa Tenggara Barat" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kabupaten</label>
                                                                <select class="form-control" name="kabupaten"
                                                                    id="kabupaten" required>
                                                                    <option value="<?= $data['kabupaten']; ?>">
                                                                        <?= $data['kabupaten']; ?></option>
                                                                    <?php
                                                                        $no = 1;
                                                                        foreach ($data_kabupaten as $row) : 
                                                                        ?>
                                                                                        <option value="<?= $row->nama; ?>">
                                                                                            <?= $row->nama; ?></option>
                                                                                        <?php
                                                                        endforeach;
                                                                        ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Desa/Kelurahan</label>
                                                                    <select class="form-control" name="desa" id="desa" required>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <input type="text" class="form-control"
                                                                    id="alamat" name="alamat"
                                                                    placeholder="Alamat" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="number" class="form-control"
                                                                    id="kodepos" name="kodepos"
                                                                    placeholder="Kode Pos">
                                                            </div>
                                                        </div>
                                                    </div>     
                                            </div>

                                   

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Telpon/Whatsapp</label>
                                                            <input type="text" class="form-control" id="no_telpon"
                                                                name="no_telpon" placeholder="Telpon">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" id="email" name="email"
                                                                placeholder="Email">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nomer Fax</label>
                                                            <input type="text" class="form-control" id="fax"
                                                                name="fax" placeholder="Fax">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Status Koperasi</label>
                                                            <select class="form-control" name="status_koperasi">
                                                                <option value="-">Pilih</option>
                                                                <option value="Aktif" selected>Aktif</option>
                                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                                            </select>
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
                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <div class="tab-pane" id="kegiatan">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Kegiatan Usaha</h3>

                                    </div>

                                    <?php
                                    if (false) {
                                        ?>

                                    <div class="box">
                                        <div class="box-header">
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">

                                            <table id="dtHorizontalExample"
                                                class="table table-striped table-bordered table-sm ">
                                                <thead>
                                                    <tr>
                                                        <th>NO.</th>
                                                        <th>Tahun</th>
                                                        <th>Modal Sendiri</th>
                                                        <th>Modal Luar</th>
                                                        <th>Nilai Aset</th>
                                                        <th>Nilai Omzet</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>

                                    <?php

                                        }
                                        else { 
                                            ?>

                                        <div class="panel panel-danger">
                                            <div class="panel-heading">INFO</div>
                                            <div class="panel-body">
                                                Belum ada <b>Data Koperasi</b> yang diinputkan.
                                                <a href="<?= base_url('admin/koperasi/tambah/'.$_SESSION['idadmin']) ?>"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                            </div>
                                        </div>

                                        <?php

                                        }
                                        ?>

                                </div>
                                <div class="tab-pane" id="anggota">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Daftar Anggota</h3>

                                    </div>
                                    <?php
                                if (false) {
                                    ?>

                                                    <div class="box">
                                                        <div class="box-header">
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body">

                                                            <table id="dtHorizontalExample"
                                                                class="table table-striped table-bordered table-sm ">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Photo</th>
                                                                        <th>Nama Produk</th>
                                                                        <th>Deskripsi</th>
                                                                        <th>Jenis</th>
                                                                        <th>Nilai Aset</th>
                                                                        <th>Harga</th>
                                                                        <th>Jml. Produk</th>
                                                                        <th>Views</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <?php

                                }
                                else { 
                                    ?>

                                    <div class="panel panel-danger">
                                        <div class="panel-heading">INFO</div>
                                        <div class="panel-body">
                                            Belum ada <b>Data Koperasi</b> yang diinputkan.
                                            <a href="<?= base_url('admin/koperasi/tambah/'.$_SESSION['idadmin']) ?>"
                                                class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                        </div>
                                    </div>

                                    <?php

                                }
                                ?>

                                </div>
                                <div class="tab-pane" id="pengawas">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Daftar Pengawas</h3>

                                    </div>

                                    <?php
                                if (false) {
                                ?>
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">

                                            <table id="dtHorizontalExample"
                                                class="table table-striped table-bordered table-sm ">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Sarana/Fasilitas/Alat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>
                                        <?php

                                }
                                else { 
                                    ?>

                                        <div class="panel panel-danger">
                                            <div class="panel-heading">INFO</div>
                                            <div class="panel-body">
                                                Belum ada <b>Data Koperasi</b> yang diinputkan.
                                                <a href="<?= base_url('admin/koperasi/tambah/'.$_SESSION['idadmin']) ?>"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                            </div>
                                        </div>

                                        <?php

                                }
                                ?>
                                <!-- /.box-body -->

                                    </div>
                                    <div class="tab-pane" id="pengurus">

                                        <div class="box-header with-border">
                                            <h3 class="box-title">Daftar Pengurus</h3>

                                        </div>
                                        <?php
                                if (false) {
                                    ?>
                                        <div class="box">
                                            <!-- /.box-header -->
                                            <div class="box-body">

                                                <table id="dtHorizontalExample"
                                                    class="table table-striped table-bordered table-sm ">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Legalitas</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <?php

                                        }
                                        else { 
                                            ?>

                                        <div class="panel panel-danger">
                                            <div class="panel-heading">INFO</div>
                                            <div class="panel-body">
                                                Belum ada <b>Data Koperasi</b> yang diinputkan.
                                                <a href="<?= base_url('admin/koperasi/tambah/'.$_SESSION['idadmin']) ?>"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                            </div>
                                        </div>

                                        <?php

                                    }
                                    ?>

                                    </div>

                                    </div>

                                </div>


                                <!-- /.tab-pane -->

                                <!-- /.nav-tabs-custom -->
                            </div>


                            <!-- /.tab-pane -->

                            <!-- /.nav-tabs-custom -->
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

            </section>

        </div>
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
            <form method="post" action="<?php echo base_url('admin/koperasi/import_excel'); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="btn" name="file" required>
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
<script src="https://maps.googleapis.com/maps/api/js?key=12345678&callback=initMap&v=weekly" async>
</script>

<script>
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 1,
        center: new google.maps.LatLng(35.137879, -82.836914),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var myMarker = new google.maps.Marker({
        position: new google.maps.LatLng(47.651968, 9.478485),
        draggable: true
    });

    google.maps.event.addListener(myMarker, 'dragend', function (evt) {
        document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat()
            .toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
    });

    google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
        document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
    });

    map.setCenter(myMarker.position);
    myMarker.setMap(map); 
</script>



<script>

        $("#kabupaten").change(function(){

            var kabupaten = $("#kabupaten").val();

            console.log(kabupaten); 


            $.ajax({
                url : "<?php echo base_url();?>admin/koperasi/get_data_kecamatan_perkabupaten",
                method : "POST",
                data : {kabupaten:kabupaten},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].nama+'>'+data[i].nama+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#kecamatan').html(html);

                }
            });


            $.ajax({
                url : "<?php echo base_url();?>admin/koperasi/get_data_desa_perkabupaten",
                method : "POST",
                data : {kabupaten:kabupaten},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].nama+'>'+data[i].nama+'</option>';
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
                url : "<?php echo base_url();?>admin/koperasi/get_data_desa_perkecamatan",
                method : "POST",
                data : {kecamatan:kecamatan},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].nama+'>'+data[i].nama+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#desa').html(html);

                }
            });
        });

</script>