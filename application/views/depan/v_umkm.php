<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";
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

        <body>
          <table id="dtHorizontalExample" class="display" style="width:100%">
            <thead>
              <tr>
                <th width="60px">No.</th>
                <th>Nama UMKM</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
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