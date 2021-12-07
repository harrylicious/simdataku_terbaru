
<?php include_once "parsial/header.php"; ?>
 <!-- <section class="detailed_chart">
    <div class="container">   
        <div class="row">
            <div class="col-md-12">
                <center><h2 style="color:#FFF">Pencarian Produk</h2></center>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                <div class="card-body ">
                <form action="">
                
                <input type="text" name="keyword" id="search_text" class="form-control search_text" placeholer="Cari Produk">
                <input type="submit">
                </form>
            </form>
                <br>
                <div class="table" id="result">
                    <i>Hasil Scan:</i>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <i class="fa fa-history"></i> Pencarian dalam 1.3 ms
                    </div>
                </div>
                </div>
            </div>
            </div>    
            </div>
        </div>
    </div>
</section>  -->

<!--============================= DETAILED CHART =============================-->
<div class="detailed_chart">
    <?php include_once "parsial/summary.php"; ?>
</div>
<!--//END DETAILED CHART -->

<!--============================= OUR PRODUCT =============================-->
<section class="our_courses">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php if ($produk->num_rows()<0) {?>
                <h2>Hasil dengan Keyword </h2>

            <?php }?>
            </div>
        </div>
        
        <div class="row">
          <?php foreach ($produk->result() as $row) :?>
          
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" id='result'> 
                <div class="courses_box mb-2" >
                    <div class="course-img-wrap" >
                       <div class="card danger-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>     
                       <img src="<?= base_url('assets/images/products/thumbnail') . '/' . $row->photo; ?>" class="img-fluid" alt="courses-img">
                    </div>
                    <!-- // end .course-img-wrap -->
                    <a href="<?php echo site_url('produk/'.$row->slug);?>" class="course-box-content">
                        <h4 style="text-align:center;text-style:bold"><b><?php echo $row->nama_produk;?></b></h4>
                        <center><span class="badge badge-primary text-center"><?php echo $row->nama_usaha;?></span></center>
                    </a>
                 
                </div>

            </div>
          <?php endforeach;?>
        </div> <br>
    
        <div class="row">
            <div class="col-md-12 text-center">
                 <a href="<?php echo site_url('produk');?>" class="btn btn-default btn-courses">Selengkapnya</a>
            </div>
            
        </div>
    </div>
</section>
<!--//END OUR COURSES -->
<!--============================= DETAILED CHART =============================-->
<div class="detailed_chart">
<?php include_once "parsial/summary.php"; ?>
</div>
<!--//END DETAILED CHART -->
<!--============================= FOOTER =============================-->
<?php include_once "parsial/footer.php"; ?>


