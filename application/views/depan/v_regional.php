<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";
?>
  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
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
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#" class="btn btn-outline-white">Get started</a></p>
            </div>
            <div class="col-lg-4 iphone-wrap">
              <img src="assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right">
              <img src="assets/img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
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
        <h5 class="card-title"> <strong>DAFTAR SEMUA UMKM KABUPATEN/KOTA</strong></h5>
        </div>
        <div class="card-body ">

          <body>
            <table id="dtHorizontalExample" class="display" style="width:100%">
              <thead>
                <tr>
                  <th width="60px">No.</th>
                  <th>Kabupaten/Kota</th>
                  <th>Total</th>
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
                    <td><?= $row->kabupaten; ?></td>
                    <td><?= $row->total; ?> Usaha</td>
                    <td><a href="<?= base_url('regional/get_perwilayah/') . $row->kabupaten; ?>" class="btn btn-danger">Detail</a></td>
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