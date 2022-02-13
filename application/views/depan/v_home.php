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


 $dataPoints_kelas = array();
 
 $total_data = $total_semua_data - $total_data_grafik;
 
 foreach ($data_grafik_kelas_usaha as $data) {
   array_push($dataPoints_kelas, array("label" => $data->ket, "y" => $data->total));
 }
 array_push($dataPoints_kelas, array("label" => "Belum terverifikasi", "y" => $total_data));
 
  
 $dataPoints_komoditas = array();
 
 foreach ($data_grafik_komoditas as $data) {
   array_push($dataPoints_komoditas, array("label" => $data->komoditas, "y" => $data->total));
 }
 
 ?>

<?php include_once "parsial/header.php"; ?>

  <!-- ======= Hero Section ======= -->
  <?php include_once "parsial/banner.php"; ?>
  
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Home Section ======= -->
    <section class="section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-5" data-aos="fade-up">
            <h2 class="section-heading">SIMDATAKU Hadir Menjawab</h2>
          </div>
        </div>

        <div class="row"> 
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <i class="bi bi-people"></i>
              </div>
              <h3 class="mb-3">Monitoring Data</h3>
              <p>Melihat Pertumbuhan Data Usaha Se-NTB</p>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <i class="bi bi-brightness-high"></i>
              </div>
              <h3 class="mb-3">Pertumbuhan Realtime</h3>
              <p>Mengetahui Secara Realtime Data yang Berkembang</p>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <i class="bi bi-bar-chart"></i>
              </div>
              <h3 class="mb-3">Usaha/Bisnis Naik Kelas!</h3>
              <p>Mengetahui Perkembangan Level Usaha Dengan Baik</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="section">

      <div class="container">
        <!-- <div class="row justify-content-center text-center mb-5" data-aos="fade">
          <div class="col-md-6 mb-5">
            <img src="assets/img/undraw_svg_1.svg" alt="Image" class="img-fluid">
          </div>
        </div> -->

        <div class="row">
          <div class="col-md-4">
            <div class="step">
              <span class="number">01</span>
              <h3>Relawan</h3>
              <p>Terlibat dalam pengelolaan data dan menambahkan data Se-NTB</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="step">
              <span class="number">02</span>
              <h3>Verifikator</h3>
              <p>Melakukan verifikasi data usaha yang masuk melalui dashboard</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="step">
              <span class="number">03</span>
              <h3>Admin</h3>
              <p>Mengelola data verifikator dan relawan melalui sistem.</p>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title"> <strong>GRAFIK PERTUMBUHAN USAHA</strong></h5>
              </div>
              <div class="card-body ">

              <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              </div>
            </div>
          </div>
        </div>
  
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title"><strong>GRAFIK USAHA BERDASARKAN KELAS</strong></h5>
                <!-- <p class="card-category">Sebaran Data Per</p> -->
              </div>
              <div class="card-body">
                
              <div id="chartContainer_kelas" style="height: 370px; width: 100%;"></div>
              <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>
          
        <div class="row mt-4 mb-4">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title"><strong>GRAFIK USAHA BERDASARKAN KOMODITAS</strong></h5>
              </div>
              <div class="card-body ">
              <div id="chartContainer_komoditas" style="height: 370px; width: 100%;"></div>
              <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </section>

    
    <!-- ======= CTA Section ======= -->
    <section class="section cta-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
            <h2>Download Aplikasi Sekarang Juga</h2>
          </div>
          <div class="col-md-5 text-center text-md-end">
            <p><a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-apple"></i><span>App store</span></a> <a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-play-store"></i><span>Google play</span></a></p>
          </div>
        </div>
      </div>
    </section><!-- End CTA Section -->

  </main><!-- End #main -->
<?php include_once "parsial/footer.php"; ?>

</body>

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
 
 
 
var chart = new CanvasJS.Chart("chartContainer_kelas", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Total Data Usaha Berdasarkan Kelas"
	},
	subtitles: [{
		text: "Kelas: Mikro, Kecil, Menengah, Besar"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints_kelas, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer_komoditas", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Total Data Usaha Berdasarkan Komoditas"
	},
	axisY: {
		title: "Data Perkomoditas"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## usaha",
		dataPoints: <?php echo json_encode($dataPoints_komoditas, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>