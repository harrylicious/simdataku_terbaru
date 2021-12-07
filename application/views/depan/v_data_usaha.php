
<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";
?>
<!--//END HEADER -->
<style>
  tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
  }
</style>

<!--//END HEADER -->
<div class="p-5 mb-0" style="background: rgba(137, 3, 0, 0);"></div>

<div class="container">
<?php include_once "parsial/summary_doc.php"; ?>
  
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
          
        <div class="row mt-4 mb-4">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Grafik Komoditas</h5>
              </div>
              <div class="card-body ">
                <canvas id="chartJenisUsaha" width="400" height="100"></canvas>
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
<?php foreach ($data as $key => $value) {
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