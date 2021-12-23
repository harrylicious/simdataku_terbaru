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
                                        <b>Tgl. Daftar : </b> <a
                                            class="pull-right"><strong><?= $data['created_at']; ?></strong></a>
                                    </li>
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
                                        <b>ID Koperasi :</b> <a class="pull-right"><strong><?= $id; ?></strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Terakhir Update:
                                        </b><?php  echo last_updated() != "" ? last_updated() : 0 ?><a
                                            class="pull-right"></a>
                                    </li>
                                </ul>
                                <button class="btn btn-success  btn-block" data-toggle="modal"
                                    data-target="#modal-default"><i class="fa fa-upload"> IMPORT DATA</i></button>
                                <a class="btn btn-success  btn-block"
                                    href="<?= base_url('assets/uploads/template/template-tambah.xls'); ?>"
                                    download="template-tambah.xls"><span class="fa fa-arrow-down"></span> DOWNLOAD
                                    TEMPLATE IMPORT</a>
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
                                <li class="active"><a href="#koperasi" data-toggle="tab">Koperasi</a></li>
                                <li class=""><a href="#kegiatan" data-toggle="tab">Kegiatan Koperasi</a></li>
                                <li class=""><a href="#anggota" data-toggle="tab">Anggota</a></li>
                                <li class=""><a href="#pengawas" data-toggle="tab">Pengawas</a></li>
                                <li class=""><a href="#pengurus" data-toggle="tab">Pengurus</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="koperasi">

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Koperasi</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-sm-12">
                                            <h5 class="info-text"></h5>
                                        </div>


                                        <form action="<?= base_url('admin/koperasi/update_data/'.$data['id_koperasi']); ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Nama Koperasi</label>
                                                        <input type="text" class="form-control" id="nama_koperasi"
                                                            name="nama_koperasi" placeholder="Nama Koperasi" value="<?= $data['nama_koperasi']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Tahun Berdiri </label>
                                                        <input type="number" class="form-control" id="tahun_berdiri"
                                                            name="tahun_berdiri" placeholder="Tahun Berdiri" min="1990" value="<?= $data['tahun_berdiri']; ?>"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tempat Kedudukan</label>
                                                        <input type="text" class="form-control" id="tempat_kedudukan"
                                                            name="tempat_kedudukan" placeholder="Tempat Kedudukan" value="<?= $data['tempat_kedudukan']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No. Badan Hukum</label>
                                                        <input type="number" class="form-control" id="no_badan_hukum"
                                                            name="no_badan_hukum" placeholder="No. Badan Hukum" value="<?= $data['no_badan_hukum']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Badan Hukum</label>
                                                        <input type="date" class="form-control" id="tgl_badan_hukum"
                                                            name="tgl_badan_hukum" placeholder="Tanggal Badan Hukum" value="<?= $data['tgl_badan_hukum']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal PAD</label>
                                                        <input type="date" class="form-control" id="tgl_pad"
                                                            name="tgl_pad" placeholder="Tanggal PAD" value="<?= $data['tgl_pad']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Notaris / Camat Badan Hukum</label>
                                                        <input type="text" class="form-control" id="notaris_camat_badan_hukum"
                                                            name="notaris_camat_badan_hukum" placeholder="Notaris / Camat Badan Hukum" value="<?= $data['notaris']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No. Akta Perubahan PAD</label>
                                                        <input type="text" class="form-control" id="no_akta_perubahan_pad"
                                                            name="no_akta_perubahan_pad" placeholder="No. Akta Perubahan PAD" value="<?= $data['nomor_akta_perubahan_pad']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Notaris Camat Akta PD</label>
                                                        <input type="text" class="form-control" id="notaris_camat_akta_pd" name="notaris_camat_akta_pd"  value="<?= $data['notaris_camat_akta_pd']; ?>"
                                                            placeholder="Notaris Camat Akta PD">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jangka Waktu Pendirian</label>
                                                        <input type="text" class="form-control" id="jangka_waktu_pendirian"
                                                            name="jangka_waktu_pendirian" placeholder="Jangka Waktu Pendirian"  value="<?= $data['jangka_waktu_pendirian']; ?>">
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
                                                                                        <option value="<?= $row->kode; ?>">
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
                                                                        <option value="<?= $data['kecamatan']; ?>"><?= $data['kecamatan']; ?></option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Desa/Kelurahan</label>
                                                                    <select class="form-control" name="desa" id="desa" required>
                                                                        <option value="<?= $data['desa']; ?>"><?= $data['desa']; ?></option>
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
                                                                    placeholder="Alamat" required value="<?= $data['alamat']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="number" class="form-control"
                                                                    id="kodepos" name="kodepos"
                                                                    placeholder="Kode Pos" value="<?= $data['kodepos']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>     
                                            </div>
                                            <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Telpon/Whatsapp</label>
                                                            <input type="text" class="form-control" id="no_telpon"
                                                                name="no_telpon" placeholder="Telpon" required value="<?= $data['no_telpon']; ?>">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nomer Fax</label>
                                                            <input type="text" class="form-control" id="fax"
                                                                name="fax" placeholder="Fax" value="<?= $data['nomor_fax']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Status Koperasi</label>
                                                            <select class="form-control" name="status_koperasi">
                                                                <option value="<?= $data['status_koperasi']; ?>"> <?= $data['status_koperasi']; ?></option>
                                                                <option value="Aktif">Aktif</option>
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
                                        </form>
                                    </div>

                                </div>
                                </div>
                                <div class="tab-pane" id="kegiatan">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Daftar Kegiatan Koperasi</h3>

                                    </div>

                                    <?php
                                    if (!$check_kegiatan_usaha) {
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
                                                        <th>Nama Kegiatan</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                    $no = 1;
                                    foreach ($data_kegiatan as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row->nama_kegiatan; ?></td>
                                                        <td><?= $row->keterangan; ?></td> 
                                                        <td>
                                                            <a href="<?= base_url('admin/koperasi/delete_data_kegiatan_koperasi/'.$row->id.'/'.$id); ?>"
                                                                class="btn btn-danger">Hapus</a>


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
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button data-toggle="modal" data-target="#modal-kegiatan-koperasi"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH KEGIATAN
                                                    USAHA</button>
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
                                            Belum ada <b>Data Koperasi</b> yang diinputkan.
                                            <a href="<?= base_url('admin/koperasi/edit/'.$_SESSION['idadmin']) ?>"
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
                                    if (!$check_anggota) {
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
                                                        <th>Tahun</th>
                                                        <th>Anggota</th>
                                                        <th>Lelaki</th>
                                                        <th>Perempuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                $no = 1;
                                                foreach ($data_anggota as $row) : 
                                                ?>
                                                    <tr>
                                                        <td><?= $no++;; ?></td>
                                                        <td><?= $row->tahun; ?></td>
                                                        <td><?= $row->anggota; ?> Orang</td>
                                                        <td><?= $row->lelaki; ?> Orang</td>
                                                        <td><?= $row->perempuan; ?> Orang</td>
                                                        <td>
                                                            <a href="<?= base_url('admin/koperasi/delete_data_anggota/'.$row->id.'/'.$id); ?>"
                                                                class="btn btn-danger">Hapus</a>


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
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal-anggota"><i class="fa fa-plus"></i> TAMBAH
                                                    DATA ANGGOTA</button>
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
                                            Belum ada <b>Data Koperasi</b> yang diinputkan.
                                            <a href="<?= base_url('admin/koperasi/edit/'.$_SESSION['idadmin']) ?>"
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
                                    if (!$check_pengawas) {
                                    ?>
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">

                                            <table id="dtHorizontalExample"
                                                class="table table-striped table-bordered table-sm ">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Pengawas</th>
                                                        <th>Masa Bakti</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                    $no = 1;
                                    foreach ($data_pengawas as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++;; ?></td>
                                                        <td><?= $row->nama_pengawas; ?></td>
                                                        <td><?= $row->masa_bakti; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/koperasi/delete_data_pengawas/'.$row->id.'/'.$id); ?>"
                                                                class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                    endforeach;
                                    
                                    
                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal-pengawas"><i class="fa fa-plus"></i> TAMBAH
                                                    DATA PENGAWAS</button>
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
                                            Belum ada <b>Data Koperasi</b> yang diinputkan.
                                            <a href="<?= base_url('admin/koperasi/edit/'.$_SESSION['idadmin']) ?>"
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
                                    if (!$check_pengurus) {
                                    ?>
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">

                                            <table id="dtHorizontalExample"
                                                class="table table-striped table-bordered table-sm ">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Ketua</th>
                                                        <th>Sekretaris</th>
                                                        <th>Bendahara</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                    $no = 1;
                                    foreach ($data_pengurus as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++;; ?></td>
                                                        <td><?= $row->ketua; ?></td>
                                                        <td><?= $row->sekretaris; ?></td>
                                                        <td><?= $row->bendahara; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/koperasi/delete_data_pengurus/'.$row->id.'/'.$id); ?>"
                                                                class="btn btn-danger">Hapus</a>
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

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal-pengurus"><i class="fa fa-plus"></i> TAMBAH
                                                    DATA PENGURUS</button>
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
                                            Belum ada <b>Data Koperasi</b> yang diinputkan.
                                            <a href="<?= base_url('admin/koperasi/edit/'.$_SESSION['idadmin']) ?>"
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
                <h4 class="modal-title">Unggah Data</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/koperasi/import_excel'); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="btn" name="file">
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

<div class="modal fade" id="modal-kegiatan-koperasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Kegiatan Usaha</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/koperasi/save_data_kegiatan_koperasi/'.$id); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Kegiatan:</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                                    placeholder="Nama Kegiatan" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Keterangan:</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Keterangan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-anggota">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Anggota</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/koperasi/save_data_anggota/'.$id); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tahun:</label>
                                <input type="number" class="form-control" id="tahun" name="tahun"
                                    placeholder="Misal: 2018, 2019, 2020" min="1990" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Jumlah Anggota:</label>
                                <input type="text" class="form-control" id="jumlah_anggota" name="jumlah_anggota"
                                    placeholder="Jumlah Anggota" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Jumlah Anggota Laki-laki:</label>
                                <input type="text" class="form-control" id="jumlah_anggota_lelaki" name="jumlah_anggota_lelaki"
                                    placeholder="Jumlah Anggota Lelaki" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Jumlah Anggota Perempuan:</label>
                                <input type="text" class="form-control" id="jumlah_anggota_perempuan" name="jumlah_anggota_perempuan"
                                    placeholder="Jumlah Anggota Perempuan" required>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-pengawas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Pengawas</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/koperasi/save_data_pengawas/'.$id); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Pengawas:</label>
                                <input type="text" class="form-control" id="nama_pengawas" name="nama_pengawas"
                                    placeholder="Nama Pengawas" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Masa Bakti:</label>
                                <input type="text" class="form-control" id="masa_bakti" name="masa_bakti"
                                    placeholder="Masa Bakti" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-pengurus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Pengurus</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/koperasi/save_data_pengurus/'.$id); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Ketua:</label>
                                <input type="text" class="form-control" id="ketua" name="ketua"
                                    placeholder="Nama Ketua" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Sekretaris:</label>
                                <input type="text" class="form-control" id="sekretaris" name="sekretaris"
                                    placeholder="Nama Sekretaris" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Bendahara:</label>
                                <input type="text" class="form-control" id="bendahara" name="bendahara"
                                    placeholder="Nama Bendahara" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>



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
                        html += '<option value='+data[i].kode+'>'+data[i].nama+'</option>';
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
                url : "<?php echo base_url();?>admin/koperasi/get_data_desa_perkecamatan",
                method : "POST",
                data : {kecamatan:kecamatan},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].kode+'>'+data[i].nama+'</option>';
                    }
                    html += '<option value="" selected>-</option>';
                    $('#desa').html(html);

                }
            });
        });

</script>