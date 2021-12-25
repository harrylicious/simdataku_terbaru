<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";
?>
  <!-- ======= Hero Section ======= -->

  <?php include_once "parsial/banner.php"; ?>
  <!-- End Hero -->

<!--//END HEADER -->
<div class="p-5 mb-0" style="background: rgba(137, 3, 0, 0);"></div>

<div class="container">
  <?php include_once "parsial/summary_doc.php"; ?>
  </div>

    <!-- ======= Home Section ======= -->
    <section class="section">
      <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
        <h5 class="card-title"> <strong>DAFTAR SEMUA KOPERASI KABUPATEN/KOTA</strong></h5>
        </div>
        <div class="card-body ">

          <body>
            <table id="dtHorizontalExample" class="display" style="width:100%">
              <thead>
                <tr>
                  <th width="60px">No.</th>
                  <th>Kabupaten/Kota</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= strtoupper($row->kabupaten); ?></td>
                    <td><?= $row->total; ?> Koperasi</td>
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