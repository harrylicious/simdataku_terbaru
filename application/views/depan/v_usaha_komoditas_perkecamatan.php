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


  <div class="row mb-4">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title"> RANGKUMAN KOMODITAS <strong><?= urldecode(strtoupper($komoditas)); ?></strong></h5>
        </div>
        <div class="card-body">
        
        Total Luas Lahan:  <strong><a href="#"><?= number_format($data_rangkuman_komoditas['total']); ?></a></strong> are di <strong> <?= $wilayah; ?> </strong> <br>
        Total Kapasitas:  <strong><a href="#"><?= number_format($data_rangkuman_produksi['total']); ?></a></strong> di <strong> <?= $wilayah; ?> </strong> <br>

        </div>

      </div>
    </div>
  </div>

  <div class="row mt-4 mb-4">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title"> DAFTAR USAHA KOMODITAS <strong><?= urldecode(strtoupper($komoditas)); ?></strong></h5>
        </div>
        <div class="card-body ">

          <body>
            <table id="dtHorizontalExample" class="display" style="width:100%">
              <thead>
                <tr>
                  <th width="20px">No.</th>
                  <th>Kecamatan</th>
                  <th>Total</th>
                  <th width="30px">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->kabupaten; ?></td>
                    <td><?= number_format($row->total); ?> are</td>
                    <td><a href="<?= base_url('komoditas/get_perkomoditas/') . $row->kabupaten; ?>" class="btn btn-danger">Lihat Daftar</a></td>
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
</div>
  <div class="container-fluid px-0">
    <?php include_once "parsial/footer.php"; ?>
  </div>
</div>


</html>
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