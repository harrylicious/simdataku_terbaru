

<?php
 
$limit = 50000;
$y = 100;
$dataPoints = array();

$total_data = $total_semua_data - $total_data_grafik;

foreach ($data_grafik_kelas_usaha as $data) {
	array_push($dataPoints, array("label" => $data->ket, "y" => $data->total));
}
array_push($dataPoints, array("label" => "Belum terverifikasi", "y" => $total_data));

?>

<?php
 
$dataPoints_komoditas = array();

foreach ($data_grafik_komoditas as $data) {
	array_push($dataPoints_komoditas, array("label" => $data->komoditas, "y" => $data->total));
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "parsial/header.php"; ?>

  <!-- ======= Hero Section ======= -->
<?php include_once "parsial/banner.php"; ?>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Home Section ======= -->
    <section class="section">
      <div class="container">

  
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Total Data Usaha Berdasarkan Kelas Usaha</h5>
                <!-- <p class="card-category">Sebaran Data Per</p> -->
              </div>
              <div class="card-body">
                
              <div id="chartContainer" style="height: 370px; width: 100%;"></div>
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
                <h5 class="card-title">Total Data Usaha Berdasarkan Komoditas</h5>
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
</div>

    <?php include_once "parsial/footer.php"; ?>
  

</html>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
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
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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

