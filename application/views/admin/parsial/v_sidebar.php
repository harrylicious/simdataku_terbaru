<?php
error_reporting(0);

?>
<section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        
        <!-- 
        <li>
          <a href="<?php echo base_url('admin/document'); ?>">
            <i class="fa fa-list"></i> <span>Daftar Arsip</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li> -->
        <li>
          <a href="<?php echo base_url('admin/usaha').''?>">
            <i class="fa fa-plus"></i> <span>Data Usaha</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        
        <li>
          <a href="<?php echo base_url('admin/usaha/tambah/'.$_SESSION['idadmin']); ?>">
            <i class="fa fa-plus"></i> <span>Tambah</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php

        if ($_SESSION['level'] == "relawan") {
          ?>


        <li>
          <a href="<?php echo base_url('admin/usaha/verifikasi').''?>">
            <i class="fa fa-plus"></i> <span>Verifikasi Usaha</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

          <?php
        }

        ?>
        <li>
          <a href="<?php echo base_url('admin/user/profil/'.$_SESSION['idadmin']); ?>">
            <i class="fa fa-eye"></i> <span>Profil</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php

        if ($_SESSION['level'] == "relawan") {
          ?>


        
        <?php } ?>

    
        <li>
          <a href="<?php echo base_url('admin/user/ubah_password').''?>">
            <i class="fa fa-key"></i> <span>Ubah Password</span>
            <span class="pull-list">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php

        if ($_SESSION['level'] == "superadmin") {
          ?>
           <li>
          <a href="<?php echo base_url('admin/user').''?>">
            <i class="fa fa-user"></i> <span>Kelola Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
          <?php
        }

        ?>
        <?php

        if ($_SESSION['level'] == "admin") {
          ?>
            <li>
              <a href="<?php echo base_url('admin/user').''?>">
                <i class="fa fa-user"></i> <span>Kelola Relawan</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>

             <li>
              <a href="<?php echo base_url('admin/user').''?>">
                <i class="fa fa-user"></i> <span>Target Verifikasi</span>
                <span class="pull-right-container">
                  <small class="label pull-right"></small>
                </span>
              </a>
            </li>
            <?php
          }

          ?>
 
        <li>
          <a href="<?php echo base_url('admin/login/logout');
          ?>">
            <i class="fa fa-arrow-left"></i> <span style="color: #FF6600">Keluar</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>



      </ul>
    </section>