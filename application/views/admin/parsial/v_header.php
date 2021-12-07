
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url('admin/dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SIMPUL - Dinas Perdagangan Provinsi NTB</span>
      <!-- logo for regular state and mobile devices -->
      SIMPUL-NTB
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
      
          <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM user WHERE kode_user='$id_admin'");
              $c=$q->row_array();
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/images/logo.png'; ?>" onerror="this.src='<?= base_url('assets/images/user.svg') ?>'" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $c['nama_lengkap'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/logo.png'; ?>" onerror="this.src='<?= base_url('assets/images/user.svg') ?>'" class="img-circle" alt="">

                <p>
                  <?php echo $c['nama_lengkap'];?>
                  <?php if($c['level']=='admin'):?>
                    <small>Administrator</small>
                  <?php else:?>
                    <small>Author</small>
                  <?php endif;?>
                </p>
              </li>
              <!-- Menu Body -->

            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url().''?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
