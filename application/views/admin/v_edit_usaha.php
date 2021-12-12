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
                                        <b>ID Usaha :</b> <a class="pull-right"><strong><?= $id; ?></strong></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Terakhir Update:
                                        </b><?php  echo last_updated() != "" ? last_updated() : 0 ?><a
                                            class="pull-right"></a>
                                    </li>
                                </ul>

                                <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']); ?>"
                                    class="btn btn-primary btn-block"><b>SEGARKAN</b></a>

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
                                        <h3 class="box-title">Usaha & Profil Pemilik Usaha</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-sm-12">
                                            <h5 class="info-text"></h5>
                                        </div>


                                        <form action="<?= base_url('admin/usaha/update_data'); ?>" method="post">
                                            <div class="row">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="<?= $data['id']; ?>" value="<?= $data['id']; ?>">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Nama Usaha</label>
                                                        <input type="text" class="form-control" id="nama_usaha"
                                                            name="nama_usaha" placeholder="Nama Usaha"
                                                            value="<?= $data['nama_usaha']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Tahun Berdiri </label>
                                                        <input type="text" class="form-control" id="th_berdiri"
                                                            name="th_berdiri" placeholder="Tahun Berdiri"
                                                            value="<?= $data['th_berdiri']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Bentuk Usaha</label>
                                                        <select class="form-control" name="bentuk_usaha">
                                                            <option value="<?= $data['bentuk_usaha']; ?>">
                                                                <?= $data['bentuk_usaha']; ?></option>
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
                                                        <input type="text" class="form-control" id="npwp_usaha"
                                                            name="npwp_usaha" placeholder="No. NPWP Usaha"
                                                            value="<?= $data['no_npwp_usaha']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No. Izin</label>
                                                        <input type="text" class="form-control" id="no_izin"
                                                            name="no_izin" placeholder="No. Izin"
                                                            value="<?= $data['no_izin']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Pimpinan</label>
                                                        <input type="text" class="form-control" id="nama_pimpinan"
                                                            name="nama_pimpinan" placeholder="Nama Pimpinan"
                                                            value="<?= $data['nama_pimpinan']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NIK Pimpinan</label>
                                                        <input type="text" class="form-control" id="nik" name="nik"
                                                            placeholder="NIK" value="<?= $data['nik']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NPWP Pimpinan</label>
                                                        <input type="text" class="form-control" id="npwp_pimpinan"
                                                            name="npwp_pimpinan" placeholder="No. NPWP Pimpinan"
                                                            value="<?= $data['no_npwp_pribadi']; ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-6 ">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control" name="jenis_kelamin">
                                                            <option value="<?= $data['jenis_kelamin']; ?>">
                                                                <?= $data['jenis_kelamin']; ?></option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pendidikan Terakhir</label>
                                                        <select class="form-control" name="pendidikan_terakhir">
                                                            <option value="<?= $data['pendidikan_terakhir']; ?>">
                                                                <?= $data['pendidikan_terakhir']; ?></option>
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
                                                                    placeholder="Alamat Pemilik Usaha"
                                                                    value="<?= $data['alamat_pemilik']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Jalan</label>
                                                                <input type="text" class="form-control"
                                                                    id="jalan_pemilik" name="jalan_pemilik"
                                                                    placeholder="Jalan"
                                                                    value="<?= $data['jalan_pemilik']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="number" class="form-control"
                                                                    id="kode_pos_pemilik" name="kode_pos_pemilik"
                                                                    placeholder="Kode Pos"
                                                                    value="<?= $data['kode_pos_pemilik']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Desa/Kelurahan</label>
                                                                <input type="text" class="form-control"
                                                                    id="desa_pemilik" name="desa_pemilik"
                                                                    placeholder="Desa"
                                                                    value="<?= $data['desa_pemilik']; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                <input type="text" class="form-control"
                                                                    id="kecamatan_pemilik" name="kecamatan_pemilik"
                                                                    placeholder="Kecamatan Pemilik"
                                                                    value="<?= $data['kecamatan_pemilik']; ?>" required>
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
                                                            <?php
                                            $status_kepemilikan = $data['is_anggota_koperasi'];
                                            if ($status_kepemilikan == 1) {
                                                $status_kepemilikan = "Ya";
                                            }
                                            else {
                                                $status_kepemilikan = "Tidak";

                                            }
                                            ?>
                                                            <option value="<?= $data['is_anggota_koperasi']; ?>">
                                                                <?= $status_kepemilikan; ?></option>
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
                                                            <option value="<?= $data['sektor_usaha']; ?>">
                                                                <?= $data['sektor_usaha']; ?></option>
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
                                                            <option value="<?= $data['sub_sektor_usaha']; ?>">
                                                                <?= $data['sub_sektor_usaha']; ?></option>
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
                                                                    name="alamat" placeholder="Alamat"
                                                                    value="<?= $data['alamat']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Jalan</label>
                                                                <input type="text" class="form-control" id="jalan"
                                                                    name="jalan" placeholder="Jalan"
                                                                    value="<?= $data['jalan']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="number" class="form-control" id="kode_pos"
                                                                    name="kode_pos" placeholder="Kode Pos"
                                                                    value="<?= $data['kode_pos']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Desa/Kelurahan</label>
                                                                <input type="text" class="form-control" id="desa"
                                                                    name="desa" placeholder="Desa"
                                                                    value="<?= $data['desa']; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                <input type="text" class="form-control" id="kecamatan"
                                                                    name="kecamatan" placeholder="Kecamatan"
                                                                    value="<?= $data['kecamatan']; ?>" required>
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
                                                            name="latitude" placeholder="Latitude" value="<?= $data['lat']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Longitude</label>
                                                        <input type="text" class="form-control" id="longitude"
                                                            name="longitude" placeholder="Longitude" value="<?= $data['lng']; ?>">
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Merk Produk</label>
                                                        <input type="text" class="form-control" id="merk_produk"
                                                            name="merk_produk" placeholder="Merk Produk yang dimiliki"
                                                            value="<?= $data['merek_produk']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Usaha Lain (Percetakan, Pengiklanan, Jasa dan
                                                            sebagainya)</label>
                                                        <input type="text" class="form-control" id="usaha_lain"
                                                            name="usaha_lain"
                                                            placeholder="Usaha Lain. Misal: Percetakan, Pengiklanan, Jasa dan sebagainya"
                                                            value="<?= $data['usaha_lain']; ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Telpon/Whatsapp</label>
                                                        <input type="text" class="form-control" id="telpon"
                                                            name="telpon" placeholder="Telpon"
                                                            value="<?= $data['telpon']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            placeholder="Email" value="<?= $data['email']; ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" id="website"
                                                            name="website" placeholder="Website"
                                                            value="<?= $data['website']; ?>">
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
                if (!$check_indikator_usaha) {
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
                                                        <th>Modal Sendiri</th>
                                                        <th>Modal Luar</th>
                                                        <th>Nilai Aset</th>
                                                        <th>Nilai Omzet</th>
                                                        <th>Volume</th>
                                                        <th>SHU</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                    $no = 1;
                                    foreach ($data_indikator_usaha as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row->tahun; ?></td>
                                                        <td>Rp. <?= number_format($row->nilai_modal_sendiri); ?></td>
                                                        <td>Rp. <?= number_format($row->nilai_modal_luar); ?></td>
                                                        <td>Rp. <?= number_format($row->nilai_aset); ?></td>
                                                        <td>Rp. <?= number_format($row->nilai_omzet); ?></td>
                                                        <td>Rp. <?= number_format($row->volume); ?></td>
                                                        <td><?= $row->shu; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/usaha/delete_data_indikator_usaha/'.$row->id.'/'.$id); ?>"
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
                                                <button data-toggle="modal" data-target="#modal-indikator-usaha"
                                                    class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH INDIKATOR
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
                                            Belum ada <b>Data Usaha</b> yang diinputkan.
                                            <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']) ?>"
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
                if (!$check_produk) {
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
                                                        <th>Nama Produk</th>
                                                        <th>Deskripsi</th>
                                                        <th>Harga</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                    $no = 1;
                                    foreach ($data_produk as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++;; ?></td>
                                                        <td><?= $row->nama_produk; ?></td>
                                                        <td><?= $row->deskripsi; ?></td>
                                                        <td>Rp. <?= number_format($row->harga); ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/usaha/delete_data_produk/'.$row->id.'/'.$id); ?>"
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
                                                    data-target="#modal-produk"><i class="fa fa-plus"></i> TAMBAH
                                                    PRODUK</button>
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
                                            <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']) ?>"
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
                if (!$check_sarana) {
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
                                                    <?php
                                    $no = 1;
                                    foreach ($data_sarana as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++;; ?></td>
                                                        <td><?= $row->nama_sarana_fasilitas_alat; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/usaha/delete_data_sarana/'.$row->id.'/'.$id); ?>"
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
                                                    data-target="#modal-sarana"><i class="fa fa-plus"></i> TAMBAH
                                                    SARANA</button>
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
                                            <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']) ?>"
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
                if (!$check_legalitas) {
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
                                                        <th>Legalitas</th>
                                                        <th>No. Izin</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                    $no = 1;
                                    foreach ($data_legalitas as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++;; ?></td>
                                                        <td><?= $row->th_izin; ?></td>
                                                        <td><?= $row->nama_izin; ?></td>
                                                        <td><?= $row->no_izin; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/usaha/delete_data_legalitas/'.$row->id.'/'.$id); ?>"
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
                                                    data-target="#modal-legalitas"><i class="fa fa-plus"></i> TAMBAH
                                                    LEGALITAS</button>
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
                                            <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']) ?>"
                                                class="btn btn-success"><i class="fa fa-plus"></i> Tambahkan</a>
                                        </div>
                                    </div>

                                    <?php

                }
                ?>

                                </div>
                                <div class="tab-pane" id="tenaga_kerja"> 

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Daftar Koperasi & Tenaga Kerja</h3>

                                    </div>
                                    <?php
                if (!$check_tenaga_kerja) {
                    ?>

                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">

                                            <table id="dtHorizontalExample"
                                                class="table table-striped table-bordered table-sm ">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Koperasi</th>
                                                        <th>No. Badan Hukum</th>
                                                        <th>Alamat</th>
                                                        <th>Tahun</th>
                                                        <th>Anggota Laki</th>
                                                        <th>Anggota Per.</th>
                                                        <th>Pengurus Laki</th>
                                                        <th>Pengurus Per.</th>
                                                        <th>Pengawas Laki</th>
                                                        <th>Pengawas Per.</th>
                                                        <th>Manajer Laki</th>
                                                        <th>Manajer Per.</th>
                                                        <th>Karyawan Laki</th>
                                                        <th>Karyawan Per.</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                    $no = 1;
                                    foreach ($data_tenaga_kerja as $row) : 
                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row->nama_koperasi; ?></td>
                                                        <td><?= $row->no_badan_hukum; ?></td>
                                                        <td><?= $row->alamat; ?></td>
                                                        <td><?= $row->tahun; ?></td>
                                                        <td><?= $row->anggota_laki_laki; ?> Orang</td>
                                                        <td><?= $row->anggota_perempuan; ?> Orang</td>
                                                        <td><?= $row->pengurus_laki_laki; ?> Orang</td>
                                                        <td><?= $row->pengurus_perempuan; ?> Orang</td>
                                                        <td><?= $row->pengurus_laki_laki; ?> Orang</td>
                                                        <td><?= $row->pengurus_perempuan; ?> Orang</td>
                                                        <td><?= $row->pengawas_laki_laki; ?> Orang</td>
                                                        <td><?= $row->pengawas_perempuan; ?> Orang</td>
                                                        <td><?= $row->manajer_laki_laki; ?> Orang</td>
                                                        <td><?= $row->manajer_perempuan; ?> Orang</td>
                                                        <td><?= $row->status; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/usaha/delete_data_tenaga_kerja/'.$row->id.'/'.$id); ?>"
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
                                                    data-target="#modal-tenaga-kerja"><i class="fa fa-plus"></i> TAMBAH
                                                    TENAGA KERJA</button>
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
                                            <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']) ?>"
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
                if (!$check_media_sosial) {
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
                                                        <th>Link</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                            $no = 1;
                            foreach ($data_media_sosial as $row) : 
                            ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row->media_sosial; ?></td>
                                                        <td><?= $row->link; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/usaha/delete_data_media_sosial/'.$row->id.'/'.$id); ?>"
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
                                                    data-target="#modal-media-sosial"><i class="fa fa-plus"></i> TAMBAH
                                                    MEDIA SOSIAL</button>
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
                                            <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']) ?>"
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
                if (!$check_pelatihan) {
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


                                                <tbody>
                                                    <?php
                            $no = 1;
                            foreach ($data_pelatihan as $row) : 
                            ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row->tahun; ?></td>
                                                        <td><?= $row->nama_pelatihan; ?></td>
                                                        <td><?= $row->penyelenggara; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/usaha/delete_data_pelatihan/'.$row->id.'/'.$id); ?>"
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
                                                    data-target="#modal-pelatihan"><i class="fa fa-plus"></i> TAMBAH
                                                    RIWAYAT PELATIHAN</button>
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
                                            <a href="<?= base_url('admin/usaha/edit/'.$_SESSION['idadmin']) ?>"
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
            <form method="post" action="<?php echo base_url('admin/usaha/import_excel'); ?>"
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

<div class="modal fade" id="modal-indikator-usaha">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Indikator Usaha</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/usaha/save_data_indikator_usaha/'.$id); ?>"
                enctype="multipart/form-data">
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
                                <label>Modal Sendiri:</label>
                                <input type="number" class="form-control" id="modal_sendiri" name="modal_sendiri"
                                    placeholder="Modal Sendiri" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Modal Luar:</label>
                                <input type="number" class="form-control" id="modal_luar" name="modal_luar"
                                    placeholder="Modal Luar" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nilai Aset:</label>
                                <input type="number" class="form-control" id="nilai_aset" name="nilai_aset"
                                    placeholder="Nilai Aset" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nilai Omzet:</label>
                                <input type="number" class="form-control" id="nilai_omzet" name="nilai_omzet"
                                    placeholder="Nilai Omzet" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Volume:</label>
                                <input type="number" class="form-control" id="volume" name="volume"
                                    placeholder="Nilai Volume">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>SHU:</label>
                                <input type="text" class="form-control" id="shu" name="shu"
                                    placeholder="SHU">
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

<div class="modal fade" id="modal-produk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Produk</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/usaha/save_data_produk/'.$id); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Produk:</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Nama Produk" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Deskripsi:</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    placeholder="Deskripsi Produk" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Harga:</label>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga"
                                    min="0" required>
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


<div class="modal fade" id="modal-sarana">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Sarana/Prasarana</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/usaha/save_data_sarana/'.$id); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Sarana/Prasarana/Fasilitas/Aset Peralatan:</label>
                                <input type="text" class="form-control" id="sarana" name="sarana"
                                    placeholder="Nama Sarana/Fasilitas/Aset Peralatan" required>
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

<div class="modal fade" id="modal-legalitas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Legalitas</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/usaha/save_data_legalitas/'.$id); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Izin:</label>
                                <input type="text" class="form-control" id="nama_izin" name="nama_izin"
                                    placeholder="Nama Izin" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tahun Izin:</label>
                                <input type="number" class="form-control" id="tahun_izin" name="tahun_izin"
                                    placeholder="Tahun Izin" min="1990" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>No. Izin:</label>
                                <input type="text" class="form-control" id="nomor_izin" name="nomor_izin"
                                    placeholder="No. Izin" required>
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

<div class="modal fade" id="modal-tenaga-kerja">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Koperasi Tenaga Kerja</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/usaha/save_data_tenaga_kerja/'.$id); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Koperasi:</label>
                                <input type="text" class="form-control" id="nama_koperasi" name="nama_koperasi"
                                    placeholder="Nama Koperasi" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>No. Badan Hukum:</label>
                                <input type="number" class="form-control" id="no_badan_hukum" name="no_badan_hukum"
                                    placeholder="No. Badan Hukum" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                                    min="1990" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tahun:</label>
                                <input type="number" class="form-control" id="tahun" name="tahun"
                                    placeholder="Misal: 2018, 2019, 2020" required>
                            </div>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Anggota Laki-laki:</label>
                                    <input type="number" class="form-control" id="anggota_laki_laki"
                                        name="anggota_laki_laki" placeholder="Anggota laki laki" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Anggota Perempuan:</label>
                                    <input type="number" class="form-control" id="anggota_perempuan"
                                        name="anggota_perempuan" placeholder="Anggota Perempuan" min="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pengurus Laki-laki:</label>
                                    <input type="number" class="form-control" id="pengurus_laki_laki"
                                        name="pengurus_laki_laki" placeholder="Pengurus Laki-laki" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pengurus Perempuan:</label>
                                    <input type="number" class="form-control" id="pengurus_perempuan"
                                        name="pengurus_perempuan" placeholder="Pengurus Perempuan" min="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pengawas Laki-laki:</label>
                                    <input type="number" class="form-control" id="pengawas_laki_laki"
                                        name="pengawas_laki_laki" placeholder="Pengawas Laki-laki" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pengawas Perempuan:</label>
                                    <input type="number" class="form-control" id="pengawas_perempuan"
                                        name="pengawas_perempuan" placeholder="Pengawas Perempuan" min="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Manajer Laki-laki:</label>
                                    <input type="number" class="form-control" id="manajer_laki_laki"
                                        name="manajer_laki_laki" placeholder="Manajer Laki-laki" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Manajer Perempuan:</label>
                                    <input type="number" class="form-control" id="manajer_perempuan"
                                        name="manajer_perempuan" placeholder="Manajer Perempuan" min="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Karyawan Laki-laki:</label>
                                    <input type="number" class="form-control" id="karyawan_laki_laki"
                                        name="karyawan_laki_laki" placeholder="Karyawan Laki-laki" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Karyawan Perempuan:</label>
                                    <input type="number" class="form-control" id="karyawan_perempuan"
                                        name="karyawan_perempuan" placeholder="Karyawan Perempuan" min="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Status:</label>
                                <select class="form-control" name="status">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
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

<div class="modal fade" id="modal-media-sosial">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Media Sosial</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/usaha/save_data_media_sosial/'.$id); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Media</label>
                                <select class="form-control" name="nama_media" required>
                                    <option value="Website">Website</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Youtube">Youtube</option>
                                    <option value="Twiter">Twiter</option>
                                    <option value="Tik Tok">Tik Tok</option>
                                    <option value="Shopee">Shopee</option>
                                    <option value="Lazada">Lazada</option>
                                    <option value="Bukalapak">Bukalapak</option>
                                    <option value="Blibli">Blibli</option>
                                    <option value="Tokopedia">Tokopedia</option>
                                    <option value="NTB Mall">NTB Mall</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Link Media:</label>
                                <input type="text" class="form-control" id="link" name="link"
                                    placeholder="Link Media. Misal: https://ntbmall.com/store/toko-edelweis" required>
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

<div class="modal fade" id="modal-pelatihan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Riwayat Pelatihan</h4>
            </div>
            <form method="post" action="<?php echo base_url('admin/usaha/save_data_pelatihan/'.$id); ?>"
                enctype="multipart/form-data">
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
                                <label>Nama Pelatihan:</label>
                                <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan"
                                    placeholder="Pelatihan Membuat Kemasan Produk dan sebagainya" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Penyelenggara:</label>
                                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara"
                                    placeholder="Penyelenggara Pelatihan. Misal: Dinas Koperasi & UMKM NTB, Rumah Kemasan"
                                    required>
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
