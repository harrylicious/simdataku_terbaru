<?php 
if (isset($semua['total'])) {
  $semua = $semua['total'];
}
else {
  $semua = 0;
}
if (isset($nasional['total'])) {
  $nasional = $nasional['total']; 
}
else {
  $nasional = 0;
}
if (isset($komoditas['total'])) {
  $komoditas = $komoditas['total'];
}
else {
  $komoditas = 0;
}
if (isset($regional['total'])) {
  $regional = $regional['total'];
}
else {
  $regional = 0;
}
if (isset($online['total'])) { 
  $online = $online['total'];
}
else {
  $online = 0;
}
if (isset($offline['total'])) { 
    $offline = $offline['total'];
  }
else {
    $offline = 0;
}

?>
<div class="container  ">
        <div class="row mt-4 mb-4">
            <a href="<?= base_url('umkm'); ?>">
                <div class="col-xl-2 col-lg-2 col-sm-6 col-4 ">
                    <div class="card l-bg-cherry ">
                        <div class="card-statistic-3 p-3"> 
                            <img class="card-icon card-icon-large" width="90px" src="<?= base_url('assets/images/icon_tekstual.png'); ?>" alt="">
                            <div class="mb-0">
                                <h5 class="card-title mb-0 example">SEMUA</h5>
                            </div>
                            <div class="row align-items-center mb-0 d-flex">
                                <div class="card-body">
                                    <h2 class="d-flex align-items-center mb-0 example">
                                    <b><?php echo number_format($semua) ; ?></b>
                                    </h2>
                                </div>
                            </div>
                    </div>
                </div>
            </a>
        </div>
        <a href="<?= base_url('usaha/get_data_berd_skala_pasar/Nasional'); ?>">
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-3">
                      <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_gambar.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">GO NASIONAL</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body ">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($nasional) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
        <a href="<?= base_url('komoditas'); ?>">
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4" >
            <div class="card l-bg-green-dark" >
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_audio_visual.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0  example">KOMODITAS</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($komoditas) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
        <a href="<?= base_url('usaha/get_daftar_desa_terdaftar'); ?>">
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4 ">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_alih_media.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">REGIONAL</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($regional) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
        <a href="<?= base_url('usaha/get_data_berd_metode_pemasaran/ONLINE'); ?>">
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4">
            <div class="card l-bg-sgreen-dark">
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_aktif.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">GO ONLINE</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($online) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
        <a href="<?= base_url('usaha/get_data_berd_metode_pemasaran/OFFLINE'); ?>">
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4">
            <div class="card l-bg-black-dark">
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_inaktif.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">OFFLINE</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($offline) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>
  </div>

