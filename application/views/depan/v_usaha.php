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

<?php include_once "parsial/banner.php"; ?>

<!-- ======= Hero Section ======= -->

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