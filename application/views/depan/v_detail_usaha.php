<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";
?>
<!--//END HEADER -->


<!--//END HEADER -->
<div class="p-5 mb-0" style="background: rgba(137, 3, 0, 0);"></div>

<div class="container">
  <?php include_once "parsial/summary_doc.php"; ?>


  <div class="row">
    <div class="col-sm-4">
      <!--left col-->


      <label for="">ID UMKM : </label>
      <ul class="list-group">
        <li class="list-group-item text-muted"><strong style="font-size: 20px"><?= $data['id']; ?></strong> </li>
  
      </ul> </br>

      <ul class="list-group">
        <li class="list-group-item text-muted"><strong>Rangkuman:</strong> </li>
        <li class="list-group-item text-left"><span class="pull-left">Nomor Izin : <?= $data['no_izin']; ?></span> </li>
        <li class="list-group-item text-left"><span class="pull-left">Tahun Berdiri : <?= $data['th_berdiri']; ?></span> </li>
        <li class="list-group-item text-left"><span class="pull-left">Jml. Produksi : <?= number_format($data['kapasitas_produksi'])." ".$data['satuan_produksi']."/".$data['periode_produksi']; ?> </span> </li>
        <li class="list-group-item text-left"><span class="pull-left">Metode Pemasaran : <?= $data['metode_pemasaran']; ?> </span> </li>
      </ul> </br>

      <ul class="list-group">
        <li class="list-group-item text-left"><strong>Sektor & Sub Sektor:</strong> </li>
        <li class="list-group-item text-left"><span class="pull-left">Sektor Usaha : <?= $data['sektor_usaha']; ?></span> </li>
        <li class="list-group-item text-left  "><span class="pull-left">Sub Sektor Usaha : <?= $data['sub_sektor_usaha']; ?></span> </li>
      </ul>
    </div>

    <div class="col-sm-8">
      <div class="form-group">
        <label for="">Nama Usaha:</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['nama_usaha']; ?> </li>
      </div>
      <div class="form-group">
        <label for="">Alamat:</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['alamat']; ?></span></li>
      </div>
      <div class="form-group">
        <label for="">Desa</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['desa']; ?> </li>
      </div>
      <div class="form-group">
        <label for="">Kecamatan</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['kecamatan']; ?> </li>
      </div>
      <div class="form-group">
        <label for="">Kabupaten</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['kabupaten']; ?> </span></li>
      </div>
      <div class="form-group">
        <label for="">Provinsi</label>
        <li class="list-group-item text-left"><span class="pull-left">Nusa Tenggara Barat </li>
      </div>


    
    </div>
  </div>

  
<div class="row mt-4 mb-4">
  <div class="col-md-12">
  <label for=""><b>DAFTAR PRODUK : </b></label>
    
  <body>
          <table id="dtHorizontalExample" class="display" style="width:100%">
            <thead>
              <tr>
                <th width="60px">No.</th>
                <th>Nama Produk</th>
                <th>Keterangan</th>
                <th>Kapasitas Produksi/Bulan</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data_produk as $row) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row->nama_produk; ?></td>
                  <td><?= $row->deskripsi; ?></td>
                  <td><?= $row->jml_produksi_bulanan; ?>/bulan</td>
                </tr>

              <?php
              }

              ?>

            </tbody>
          </table>
        </body>
  </div>
</div>

<div class="row mt-4 mb-4">
  <div class="col-md-12">
  <label for=""><b>DAFTAR LEGALITAS : </b></label>
    
  <body>
          <table id="dtHorizontalExample1" class="display" style="width:100%">
            <thead>
              <tr>
                <th width="60px">No.</th>
                <th>Nama Legalitas</th>
                <th>Tahun</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data_legalitas as $row) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row->nama_izin; ?></td>
                  <td><?= $row->th_izin; ?></td>
                </tr>

              <?php
              }

              ?>

            </tbody>
          </table>
        </body>
  </div>
</div>


<div class="row mt-4 mb-4">
  <div class="col-md-12">
  <label for=""><b>RIWAYAT TERIMA BANTUAN : </b></label>
    
  <body>
          <table id="dtHorizontalExample2" class="display" style="width:100%">
            <thead>
              <tr>
                <th width="60px">No.</th>
                <th>Asal Bantuan</th>
                <th>Jenis Bantuan</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($data_bantuan as $row) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row->asal_bantuan; ?></td>
                  <td><?= $row->jenis_bantuan; ?></td>
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

<script>
  $(document).ready(function() {
    $('#dtHorizontalExample1').DataTable({
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

<script>
  $(document).ready(function() {
    $('#dtHorizontalExample2').DataTable({
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

<script>
  $(document).ready(function() {
    $('#dtHorizontalExample3').DataTable({
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