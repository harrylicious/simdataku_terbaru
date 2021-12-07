<?php
if (isset($total)) {
    $semua = $total['total'];
} else {
    $semua = 0;
}

if (isset($total_semua)) {
    $total_semua = $total_semua['total'];
} else {
    $total_semua = 0;
}

if (isset($total_perkabupaten)) {
    $total_perkabupaten = $total_perkabupaten['total'];
} else {
    $total_perkabupaten = 0;
}

if (isset($total_data_inaktif['total'])) {
    $total_inaktif = $total_data_inaktif['total'];
} else {
    $total_inaktif = 0;
}
if (isset($lotim)) {
    $lotim = $lotim['total'];
} else {
    $lotim = 0;
}
if (isset($lobar)) {
    $lobar = $lobar['total'];
} else {
    $lobar = 0;
}
if (isset($loteng)) {
    $loteng = $loteng['total'];
} else {
    $loteng = 0;
}
if (isset($lout)) {
    $lout = $lout['total'];
} else {
    $lout = 0;
}
if (isset($mataram)) {
    $mataram = $mataram['total'];
} else {
    $mataram = 0;
}
if (isset($sumbawa)) {
    $sumbawa = $sumbawa['total'];
} else {
    $sumbawa = 0;
}
if (isset($sumbar)) {
    $sumbar = $sumbar['total'];
} else {
    $sumbar = 0;
}
if (isset($bima)) {
    $bima = $bima['total'];
} else {
    $bima = 0;
}
if (isset($kota_bima)) {
    $kota_bima = $kota_bima['total'];
} else {
    $kota_bima = 0;
}
if (isset($dompu)) {
    $dompu = $dompu['total'];
} else {
    $dompu = 0;
}
if (isset($ntb)) {
    $ntb = $ntb['total'];
} else {
    $ntb = 0;
}
?>




<div class="row">
    <div class="col-lg-12">
        <div class="small-box bg-blue">
        <?php 
        if ($_SESSION['level'] == "superadmin") {
            ?>

            <div class="inner">
                <p>Selamat Datang <b> <?= $_SESSION['nama_lengkap']; ?></b>, Anda saat ini masuk sebagai <b><?= $_SESSION['level']; ?></b>.</p>
                <p>Data yang terhimpun di database sebanyak <b><?= $semua; ?></b>
            </div>
            <?php
        }
        else if ($_SESSION['level'] == "admin") {
            ?>

            <div class="inner">
                    <p>Selamat Datang <b> <?= $_SESSION['username']; ?> (<?= $_SESSION['nama_lengkap']; ?>)</b>, Anda saat ini masuk sebagai <b><?= $_SESSION['level']; ?></b> di <b><?= $_SESSION['kabupaten']; ?></b>.</p>
                    <p>Total Data di <b><?= $_SESSION['kabupaten']; ?></b> adalah <b><?= $total_perkabupaten; ?> </b> dari <b><?= $semua; ?></b>
                </div>
            <?php
        }
        else {
            ?>

            <div class="inner">
                    <p>Selamat Datang <b> <?= $_SESSION['nama_lengkap']; ?></b>, Anda saat ini masuk sebagai <b><?= $_SESSION['level']; ?></b>.</p>
                    <p>Total Data <b><?= $semua; ?> </b> dan yang terhimpun di Akun Anda 
                </div>
            <?php
        }

        ?>
        </div>
    </div>
    <?php if ($total_inaktif > 0 && substr($_SESSION['nama_lengkap'], 0, 2) != "UK" & $semua > 0) { ?>
        <div class="col-lg-12">
            <div class="small-box bg-red">
                <div class="inner">

                    <p>Terdapat arsip <b>Unit Pengolah <?= $_SESSION['wilayah']; ?></b> sudah memasuki masa INAKTIF dan harus segera diajukan
                        perpindahan ke <b> UK <?= $_SESSION['wilayah']; ?></b></p>
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">Lakukan Perpindahan <b><?= $total_inaktif; ?></b> Dokumen</button>
                </div>
            </div>
        </div>
    <?php } ?>

</div>

<?php 
    if ($_SESSION['level'] == "superadmin") {
        ?>
<div class="row mt-4 mb-4">
    <a href="<?= base_url('admin/usaha'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-green-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/ntb-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">NTB</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $ntb; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Lombok Barat?wilayah=Kabupaten Lombok Barat'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-blue-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-barat-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK BARAT</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $lobar; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Lombok Tengah?wilayah=Kabupaten Lombok Tengah'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-orange-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-tengah-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK TENGAH</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $loteng; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Lombok Utara?wilayah=Kabupaten Lombok Utara'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-sgreen-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-utara-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK UTARA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $lout; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Lombok Timur?wilayah=Kabupaten Lombok Timur'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-black-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-timur-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK TIMUR</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $lotim; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Sumbawa Barat?wilayah=Kabupaten Sumbawa Barat'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-yellow-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/sumbawa-barat-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">SUMBAWA BARAT</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $sumbar; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Sumbawa?wilayah=Kabupaten Sumbawa'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-red-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/sumbawa-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">SUMBAWA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $sumbawa; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Dompu?wilayah=Kabupaten Dompu'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-pink-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/dompu-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">DOMPU</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $dompu; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kabupaten Bima?wilayah=Kabupaten Bima'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-purple-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/bima-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">BIMA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $bima; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kota Bima?wilayah=Kota Bima'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-cherry ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/kota-bima-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">KOTA BIMA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $kota_bima; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="<?= base_url('admin/dashboard/get_data_wilayah/Kota Mataram?wilayah=Kota Mataram'); ?>">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-coklat-dark">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/kota-mataram-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">KOTA MATARAM</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $mataram; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>

</div>
<?php
    }
    else {
?>
<div class="row mt-4 mb-4">
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-green-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/ntb-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">NTB</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $ntb; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-blue-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-barat-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK BARAT</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $lobar; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-orange-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-tengah-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK TENGAH</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $loteng; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-sgreen-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-utara-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK UTARA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $lout; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-black-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/lombok-timur-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">LOMBOK TIMUR</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $lotim; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-yellow-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/sumbawa-barat-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">SUMBAWA BARAT</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $sumbar; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-red-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/sumbawa-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">SUMBAWA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $sumbawa; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-pink-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/dompu-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">DOMPU</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $dompu; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-purple-dark ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/bima-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">BIMA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $bima; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-cherry ">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/kota-bima-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">KOTA BIMA</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $kota_bima; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-xs-6">
        <div class="card l-bg-coklat-dark">
            <div class="card-statistic-3 p-1">
                <img class="card-icon card-icon-large" width="50px" src="<?= base_url('assets/images/logo/kota-mataram-logo.png'); ?>" alt="">
                <div class="mb-0">
                    <h6 class="card-title mb-0 example">KOTA MATARAM</h6>
                </div>
                <div class="row align-items-center mb-0 d-flex">
                    <div class="card-body">
                        <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo $mataram; ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php } ?>