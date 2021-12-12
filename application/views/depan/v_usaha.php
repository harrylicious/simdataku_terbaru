<!DOCTYPE html>
<html lang="en">
<?php
 
$limit = 50000;
$y = 100;
$dataPoints = array();

foreach ($data_grafik as $data) {
  $bulan = get_bulan(substr($data->tgl, 5, 2));
	array_push($dataPoints, array("label" => $bulan." ".substr($data->tgl, 0, 4), "y" => $data->total));
}

?>
<?php include_once "parsial/header.php"; ?>

<!-- ======= Hero Section ======= -->
<section class="hero-section" id="hero">

  <div class="wave">

    <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink">
      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
          <path
            d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
            id="Path"></path>
        </g>
      </g>
    </svg>

  </div>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 hero-text-image">
        <div class="row">
          <div class="col-lg-8 text-center text-lg-start">
            <h1 data-aos="fade-right">SIMDATAKU DISKOP</h1>
            <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Sistem Informasi Manajemen Data Terpadu</p>
            <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#"
                class="btn btn-outline-white">Get started</a></p>
          </div>
          <div class="col-lg-4 iphone-wrap">
            <img src="<?php echo base_url(); ?>assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right">
            <img src="<?php echo base_url(); ?>assets/img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
          </div>
        </div>
      </div>
    </div>
  </div>

</section><!-- End Hero -->


<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title"> <strong>GRAFIK PERTUMBUHAN DATA</strong></h5>
          </div>
          <div class="card-body ">

          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="container-fluid px-0">
  <?php include_once "parsial/footer.php"; ?>
</div>


</html>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Pertumbuhan Data Usaha Masuk Perbulan"
	},
	axisY: {
		title: "Total Data Usaha"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>