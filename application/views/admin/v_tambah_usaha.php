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
                    Tambah Data Usaha
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

                                <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']); ?>"
                                    class="btn btn-primary btn-block"><b>Segarkan</b></a>

                                <button class="btn btn-success  btn-block" data-toggle="modal"
                                    data-target="#modal-default"><i class="fa fa-upload"> Import data</i></button>
                                <a class="btn btn-success  btn-block"
                                    href="<?= base_url('assets/uploads/template/template-tambah-usaha.xls'); ?>"
                                    download="template-tambah-usaha.xls"><span class="fa fa-arrow-down"></span> Download
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
                                <li class="active"><a href="#activity" data-toggle="tab">Usaha</a></li>
                                <li class=""><a href="#indikator" data-toggle="tab">Indikator Usaha</a></li>
                                <li class=""><a href="#produk" data-toggle="tab">Produk</a></li>
                                <li class=""><a href="#sarana" data-toggle="tab">Sarana</a></li>
                                <li class=""><a href="#legalitas" data-toggle="tab">Legalitas</a></li>
                                <li class=""><a href="#tenaga_kerja" data-toggle="tab">Tenaga Kerja</a></li>
                                <li class=""><a href="#media_sosial" data-toggle="tab">Media Sosial</a></li>
                                <li class=""><a href="#pelatihan" data-toggle="tab">Riwayat Pelatihan</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Usaha</h3>

                                    </div>
                                    <div class="box-body">
                                        <div class="col-sm-12">
                                            <h5 class="info-text"></h5>
                                        </div>

                                        <form action="<?= base_url('admin/usaha/save_data'); ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Nama Usaha</label>
                                                        <input type="text" class="form-control" id="nama_usaha"
                                                            name="nama_usaha" placeholder="Nama Usaha" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Tahun Berdiri </label>
                                                        <input type="number" class="form-control" id="th_berdiri"
                                                            name="th_berdiri" placeholder="Tahun Berdiri" min="1990"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Bentuk Usaha</label>
                                                        <select class="form-control" name="bentuk_usaha">
                                                            <option value="-">Pilih Bentuk Usaha</option>
                                                            <option value="Ya">PT</option>
                                                            <option value="CV">CV</option>
                                                            <option value="Farma">Farma</option>
                                                            <option value="Koperasi">Koperasi</option>
                                                            <option value="Yayasan">Yayasan</option>
                                                            <option value="Badan Hukum Lainnya">Badan Hukum Lainnya
                                                            </option>
                                                            <option value="Tidak Berbadan Hukum/Perorangan">Tidak
                                                                Berbadan Hukum/Perorangan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NPWP Usaha</label>
                                                        <input type="number" class="form-control" id="npwp_usaha"
                                                            name="npwp_usaha" placeholder="No. NPWP Usaha">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No. Izin</label>
                                                        <input type="number" class="form-control" id="no_izin"
                                                            name="no_izin" placeholder="No. Izin">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Pimpinan</label>
                                                        <input type="text" class="form-control" id="nama_pimpinan"
                                                            name="nama_pimpinan" placeholder="Nama Pimpinan">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NIK Pimpinan</label>
                                                        <input type="number" class="form-control" id="nik" name="nik"
                                                            placeholder="NIK">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NPWP Pimpinan</label>
                                                        <input type="number" class="form-control" id="npwp_pimpinan"
                                                            name="npwp_pimpinan" placeholder="No. NPWP Pimpinan">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control" name="jenis_kelamin">
                                                            <option value="-">Pilih Jenis Kelamin</option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pendidikan Terakhir</label>
                                                        <select class="form-control" name="pendidikan_terakhir">
                                                            <option value="-">Pilih Pendidikan Terakhir</option>
                                                            <option value="SD/MI Sederajat">SD/MI Sederajat</option>
                                                            <option value="SMP/MTS Sederajat">SMP/MTS Sederajat</option>
                                                            <option value="SMA/SMK Sederajat">SMA/SMK Sederajat</option>
                                                            <option value="D1">D1</option>
                                                            <option value="D2">D2</option>
                                                            <option value="D3">D3</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"><b>Alamat Pemilik Usaha</b></h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Alamat Pemilik Usaha</label>
                                                                <input type="text" class="form-control"
                                                                    id="alamat_pemilik" name="alamat_pemilik"
                                                                    placeholder="Alamat Pemilik Usaha" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Jalan</label>
                                                                <input type="text" class="form-control"
                                                                    id="jalan_pemilik" name="jalan_pemilik"
                                                                    placeholder="Jalan">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="number" class="form-control"
                                                                    id="kode_pos_pemilik" name="kode_pos_pemilik"
                                                                    placeholder="Kode Pos">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Desa/Kelurahan</label>
                                                                <input type="text" class="form-control"
                                                                    id="desa_pemilik" name="desa_pemilik"
                                                                    placeholder="Desa" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                <input type="text" class="form-control"
                                                                    id="kecamatan_pemilik" name="kecamatan_pemilik"
                                                                    placeholder="Kecamatan Pemilik" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kabupaten</label>
                                                                <select class="form-control" name="kabupaten_pemilik"
                                                                    id="kabupaten_pemilik" required>
                                                                    <option value="<?= $data['kabupaten_pemilik']; ?>">
                                                                        <?= $data['kabupaten_pemilik']; ?></option>
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

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Apakah Bapak/Ibu/Saudara/i Anggota Koperasi?</label>
                                                        <select class="form-control" name="kepemilikan_koperasi">
                                                            <option value="-">Pilih Kepemikan Koperasi</option>
                                                            <option value="1">Ya</option>
                                                            <option value="0">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Sektor Usaha</label>
                                                        <select class="form-control" name="sektor_usaha" required>
                                                            <option value="-">Pilih Sektor Usaha</option>
                                                            <?php
                                            $no = 1;
                                            foreach ($data_sektor_usaha as $row) : 
                                            ?>
                                                            <option value="<?= $row->nama_sektor; ?>">
                                                                <?= $row->nama_sektor; ?></option>
                                                            <?php
                                            endforeach;
                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Sub Sektor Usaha</label>
                                                        <select class="form-control" name="sub_sektor_usaha" required>
                                                            <option value="-">Pilih Sub Sektor Usaha</option>
                                                            <?php
                                            $no = 1;
                                            foreach ($data_sub_sektor_usaha as $row) : 
                                            ?>
                                                            <option value="<?= $row->nama_sub; ?>">
                                                                <?= $row->nama_sub; ?></option>
                                                            <?php
                                            endforeach;
                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"><b>Alamat Usaha/Bisnis</b></h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Alamat Usaha</label>
                                                                <input type="text" class="form-control" id="alamat"
                                                                    name="alamat" placeholder="Alamat" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Jalan</label>
                                                                <input type="text" class="form-control" id="jalan"
                                                                    name="jalan" placeholder="Jalan">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="number" class="form-control" id="kode_pos"
                                                                    name="kode_pos" placeholder="Kode Pos">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Desa/Kelurahan</label>
                                                                <input type="text" class="form-control" id="desa"
                                                                    name="desa" placeholder="Desa" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                <input type="text" class="form-control" id="kecamatan"
                                                                    name="kecamatan" placeholder="Kecamatan" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kabupaten</label>
                                                                <select class="form-control" name="kabupaten"
                                                                    id="kabupaten" required>
                                                                    <option value="-">Pilih Kabupaten</option>
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
                                                        <div class="col-sm-12">

                                                            <div id='map_canvas'></div>
                                                            <div id="current">Nothing yet...</div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Latitude</label>
                                                                <input type="text" class="form-control" id="latitude"
                                                                    name="latitude" placeholder="Latitude">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Longitude</label>
                                                                <input type="text" class="form-control" id="longitude"
                                                                    name="longitude" placeholder="Longitude">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Merk Produk</label>
                                                        <input type="text" class="form-control" id="merk_produk"
                                                            name="merk_produk" placeholder="Merk Produk yang dimiliki">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Usaha Lain (Percetakan, Pengiklanan, Jasa dan
                                                            sebagainya)</label>
                                                        <input type="text" class="form-control" id="usaha_lain"
                                                            name="usaha_lain"
                                                            placeholder="Usaha Lain. Misal: Percetakan, Pengiklanan, Jasa dan sebagainya">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Telpon/Whatsapp</label>
                                                        <input type="text" class="form-control" id="telpon"
                                                            name="telpon" placeholder="Telpon">
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
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" id="website"
                                                            name="website" placeholder="Website">
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
                                <div class="tab-pane" id="indikator">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Indikator Usaha</h3>

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
                                            Belum ada <b>Data Usaha</b> yang diinputkan.
                                            <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']) ?>"
                                                class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                        </div>
                                    </div>

                                    <?php

                }
                ?>

                                </div>
                                <div class="tab-pane" id="produk">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Daftar Produk</h3>

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
                                            Belum ada <b>Data Usaha</b> yang diinputkan.
                                            <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']) ?>"
                                                class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                        </div>
                                    </div>

                                    <?php

                }
                ?>

                                </div>
                                <div class="tab-pane" id="sarana">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Daftar Sarana</h3>

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
                                                Belum ada <b>Data Usaha</b> yang diinputkan.
                                                <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']) ?>"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                            </div>
                                        </div>

                                        <?php

                }
                ?>
                                        <!-- /.box-body -->

                                    </div>
                                    <div class="tab-pane" id="legalitas">

                                        <div class="box-header with-border">
                                            <h3 class="box-title">Daftar Legalitas</h3>

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
                                                Belum ada <b>Data Usaha</b> yang diinputkan.
                                                <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']) ?>"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                            </div>
                                        </div>

                                        <?php

                }
                ?>

                                    </div>
                                    <div class="tab-pane" id="tenaga_kerja">

                                        <div class="box-header with-border">
                                            <h3 class="box-title">Daftar Tenaga Kerja</h3>

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
                                                            <th>Tahun</th>
                                                            <th>Total Tenaga Kerja</th>
                                                            <th>Jumlah Laki-laki</th>
                                                            <th>Jumlah Perempuan</th>
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
                                                Belum ada <b>Data Usaha</b> yang diinputkan.
                                                <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']) ?>"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                            </div>
                                        </div>

                                        <?php

                }
                ?>

                                    </div>

                                    <div class="tab-pane" id="media_sosial">

                                        <div class="box-header with-border">
                                            <h3 class="box-title">Daftar Media Sosial</h3>

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
                                                            <th>Media Sosial</th>
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
                                                    Belum ada <b>Data Usaha</b> yang diinputkan.
                                                    <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']) ?>"
                                                        class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                                </div>
                                            </div>

                                            <?php

                }
                ?>
                                            <!-- /.box-body -->
                                        </div>

                                        <div class="tab-pane" id="pelatihan">

                                            <div class="box-header with-border">
                                                <h3 class="box-title">Daftar Riwayat Pelatihan</h3>

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
                                                                <th>Tahun Pelaksanaan</th>
                                                                <th>Nama Pelatihan</th>
                                                                <th>Penyelenggara</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>



                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <button class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal-pelatihan"><i class="fa fa-plus"></i>
                                                            TAMBAH RIWAYAT PELATIHAN</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php

                }
                else { 
                    ?>

                                            <div class="panel panel-danger">
                                                <div class="panel-heading">INFO</div>
                                                <div class="panel-body">
                                                    Belum ada <b>Data Usaha</b> yang diinputkan.
                                                    <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']) ?>"
                                                        class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                                </div>
                                            </div>

                                            <?php

                }
                ?>
                                            <!-- /.box-body -->
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
            <form method="post" action="<?php echo base_url('admin/usaha/import_excel'); ?>"
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

