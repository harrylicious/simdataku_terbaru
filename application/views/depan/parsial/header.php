<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIMPUL - Dinas Perdagangan Provinsi NTB</title>
    <link rel="shorcut icon" href="<?php echo base_url() . 'assets/images/favicon.png' ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/bootstrap.min.css' ?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/font-awesome.min.css' ?>">
    
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css' ?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets1/css/paper-dashboard.min.css?v=2.0.1' ?>">

    
    <!-- BARUUUUUUUUUUUUUUUUUUU -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/stylefront.css' ?>">
    <!-- Favicons -->
    <link href="<?php echo base_url() . 'assets/images/favicon.png' ?>" rel="icon">
    <link href="<?php echo base_url() . 'assets/img/apple-touch-icon.png' ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() . 'assets/vendor/icofont/icofont.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/vendor/remixicon/remixicon.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/vendor/boxicons/css/boxicons.min.css' ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <?php
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    ?>



</head>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center ">
 
        <a href="<?php echo site_url(''); ?>" class="logo mr-auto"><img src="<?php echo base_url() . 'assets/images/logo/logo_depan.png' ?>" alt="" class="img-fluid"></a>

        <nav class="nav-menu d-none d-lg-block ">
            <ul>
                <li class="<?= $this->uri->segment(1) == '' ? 'active' : '' ?>"><a href="<?php echo site_url(''); ?>">Beranda</a></li>
                <li class="<?= $this->uri->segment(1) == 'umkm' ? 'active' : '' ?>"><a href="<?php echo site_url('umkm'); ?>">Usaha</a></li>
                <li class="<?= $this->uri->segment(1) == 'komoditas' ? 'active' : '' ?>"><a href="<?php echo site_url('komoditas'); ?>">Komoditas</a></li>
                <li class="<?= $this->uri->segment(1) == 'koperasi' ? 'active' : '' ?>"><a href="<?php echo site_url('regional'); ?>">Regional</a></li>
                <li class="nav-item <?= $this->uri->segment(1) == 'datasheet' ? 'active' : '' ?>"><a href="<?php echo site_url('datausaha'); ?>">Datasheet</a></li>
                <?php
                if($this->session->userdata('akses')=='1'){   ?>
                        <a href="<?php echo site_url('admin/login/logout'); ?>" class="get-started-btn scrollto nav-item <?= $this->uri->segment(1) == 'administrator' ? 'active' : '' ?>">Logout</a>

                <?php } 
                else {
                    ?>
                    <a href="<?php echo site_url('administrator'); ?>" class="get-started-btn scrollto nav-item <?= $this->uri->segment(1) == 'administrator' ? 'active' : '' ?>">Login</a>
                    <?php } ?>
            </ul>
        </nav><!-- .nav-menu -->



    </div>
</header><!-- End Header -->


<!-- Vendor JS Files -->
<script src="<?php echo base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url() . 'assets/js/mainfront.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>