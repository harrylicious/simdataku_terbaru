<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";




//    $test = array(
//     array("label"=> "Sachin Tendulkar", "y"=> 49),
//     array("label"=> "Ricky Ponting", "y"=> 30),
//     array("label"=> "Kumar Sangakkara", "y"=> 25),
//     array("label"=> "Jacques Kallis", "y"=> 17),
//     array("label"=> "Mahela Jayawardene", "y"=> 19),
//     array("label"=> "Hashim Amla", "y"=> 26),
//     array("label"=> "Brian Lara", "y"=> 19),
//     array("label"=> "Virat Kohli", "y"=> 32),
//     array("label"=> "Rahul Dravid", "y"=> 12),
//     array("label"=> "AB de Villiers", "y"=> 25)
//   );

 
// $odi = array(
// 	array("label"=> "Sachin Tendulkar", "y"=> 49),
// 	array("label"=> "Ricky Ponting", "y"=> 30),
// 	array("label"=> "Kumar Sangakkara", "y"=> 25),
// 	array("label"=> "Jacques Kallis", "y"=> 17),
// 	array("label"=> "Mahela Jayawardene", "y"=> 19),
// 	array("label"=> "Hashim Amla", "y"=> 26),
// 	array("label"=> "Brian Lara", "y"=> 19),
// 	array("label"=> "Virat Kohli", "y"=> 32),
// 	array("label"=> "Rahul Dravid", "y"=> 12),
// 	array("label"=> "AB de Villiers", "y"=> 25)
// );
 
// $t20 = array(
// 	array("label"=> "Sachin Tendulkar", "y"=> 0),
// 	array("label"=> "Ricky Ponting", "y"=> 0),
// 	array("label"=> "Kumar Sangakkara", "y"=> 0),
// 	array("label"=> "Jacques Kallis", "y"=> 0),
// 	array("label"=> "Mahela Jayawardene", "y"=> 10),
// 	array("label"=> "Hashim Amla", "y"=> 0),
// 	array("label"=> "Brian Lara", "y"=> 0),
// 	array("label"=> "Virat Kohli", "y"=> 0),
// 	array("label"=> "Rahul Dravid", "y"=> 0),
// 	array("label"=> "AB de Villiers", "y"=> 0)
// );

// $t21 = array(
// 	array("label"=> "Sachin Tendulkar", "y"=> 5),
// 	array("label"=> "Ricky Ponting", "y"=> 3),
// 	array("label"=> "Kumar Sangakkara", "y"=> 10),
// 	array("label"=> "Jacques Kallis", "y"=> 2),
// 	array("label"=> "Mahela Jayawardene", "y"=> 10),
// 	array("label"=> "Hashim Amla", "y"=> 3),
// 	array("label"=> "Brian Lara", "y"=> 1),
// 	array("label"=> "Virat Kohli", "y"=> 7),
// 	array("label"=> "Rahul Dravid", "y"=> 9),
// 	array("label"=> "AB de Villiers", "y"=> 3)
// );
?>
<!--//END HEADER -->
<style>
  @media screen and (max-width: 600px) {
    #banner {
      visibility: hidden;
      clear: both;
      float: left;
      display: none;
    }

  }

  tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box; 
  }
</style>

<!--//END HEADER -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container-fluid">
    <div class="row">
      <img src="<?php echo base_url() . 'assets/images/banner.jpg' ?>" class="img-fluid" alt="" height="1500">
    </div>
  </div>

</section><!-- End Hero -->

<?php include_once "parsial/summary_doc.php"; ?>

<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title"> <strong>DAFTAR SEMUA UMKM</strong></h5>
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
                <h5 class="card-title">Grafik Kabupaten</h5>
                <!-- <p class="card-category">Sebaran Data Per</p> -->
              </div>
              <div class="card-body ">
                <canvas id="myChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>
          

       

<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title"> <strong>DAFTAR SEMUA UMKM</strong></h5>
      </div>
      <div class="card-body ">

        <body>
          <table id="dtHorizontalExample" class="display" style="width:100%">
            <thead>
              <tr>
                <th width="60px">No.</th>
                <th>Nama UMKM</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data as $row) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row->nama_usaha; ?></td>
                  <td><?= $row->alamat; ?></td>
                  <td><?= $row->kecamatan; ?></td>
                  <td><a href="<?= base_url('usaha/detail/') . $row->id; ?>" class="btn btn-danger">Detail</a></td>
                </tr>

              <?php
              }

              ?>

            </tbody>
          </table>
        </body>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container-fluid px-0">
  <?php include_once "parsial/footer.php"; ?>
</div>


</html>

<?php foreach ($data_grafik as $key => $value) {
  $kabupaten[] = $value->kabupaten;
  $jumlah[] = $value->total;
  
}?>
<script src="<?php echo base_url().'assets1/js/plugins/chartjs.min.js'?>"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=  json_encode($kabupaten)?>,
        datasets: [{
            label: 'Data Usaha Perkabupaten/Kota',
            data: <?= json_encode($jumlah)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 12, 255, 1)',
                'rgba(123, 102, 255, 1)',
                'rgba(183, 92, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 12, 255, 1)',
                'rgba(123, 102, 255, 1)',
                'rgba(183, 92, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});



var juChart = document.getElementById('chartJenisUsaha').getContext('2d');
var myChart = new Chart(juChart, {
    type: 'bar',
    data: {
        labels: <?=  json_encode($label_grafik_jenis_usaha)?>,
        datasets: [{
            label: 'Data Usaha Komoditas',
            data: <?= json_encode($value_grafik_jenis_usaha)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script>
  $(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
      "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each(function() {
      var title = $(this).text();
      $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });

    // DataTable
    var table = $('#example').DataTable({
      initComplete: function() {
        // Apply the search
        this.api().columns().every(function() {
          var that = this;

          $('input', this.footer()).on('keyup change clear', function() {
            if (that.search() !== this.value) {
              that
                .search(this.value)
                .draw();
            }
          });
        });
      }
    });

  });
</script>
 
<?php
$ci = get_instance();

foreach ($data_grafik as $key => $value) {

  $kabupaten[] = $value->kabupaten;
    $res = $ci->m_usaha->get_total_perkabupaten($value->kabupaten);
  foreach ($res as $key => $value) {
     $label[] = $value->komoditas;
     $total[] = $value->total;

  }

}


for ($i=0; $i < count($kabupaten); $i++) { 
  ${"bar$i"} = array();
  for ($j=0; $j < count($label); $j++) {
    ${"bar$i"}[] = array("label"=> $label[$j], "y"=> $total[$j]);
    # code...
  }
  # code...
}


?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Grafik Sebaran Komoditas Perkabupaten Se-NTB"
	},
	axisX:{
		reversed: true
	},
	axisY:{
		includeZero: true
	},
	toolTip:{
		shared: true
	},
	data: [
  <?php for ($i=0; $i < count($kabupaten); $i++) { 
  
    # code...
  ?>  
  {
		type: "stackedBar",
		name: "<?php echo $kabupaten[$i]; ?>",
		dataPoints: <?php echo json_encode(${"bar$i"}, JSON_NUMERIC_CHECK); ?>
	},
  <?php } ?>
  ]
});
chart.render();
 
}
</script>