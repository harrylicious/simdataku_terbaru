
      
        

<?php include_once "parsial/header.php"; ?>
<style>
    
</style>
<style>
    /*
	STYLE SHEET FOR JQUERY LISTNAV PLUGIN V 3.0.0, 11/22/2017
	For more information, visit http://esteinborn.github.com/jquery-listnav
*/
.browse-by-catagories {
  position: relative;
  z-index: 1; }
  .browse-by-catagories a {
    display: inline-block;
    background-color: #f4f4f4;
    border: 2px solid transparent;
    padding: 6px 9px;
    font-size: 15px;
    margin-right: 5px; }
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
      .browse-by-catagories a {
        padding: 4px 7px;
        font-size: 14px;
        margin-right: 4px; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .browse-by-catagories a {
        padding: 4px 7px;
        font-size: 14px;
        margin-right: 5px;
        margin-bottom: 5px; } }
    @media only screen and (max-width: 767px) {
      .browse-by-catagories a {
        padding: 2px 5px;
        font-size: 13px;
        margin-right: 5px;
        margin-bottom: 5px; } }
    .browse-by-catagories a:hover, .browse-by-catagories a:focus, .browse-by-catagories a.active {
      border: 2px solid #000000; }
    .browse-by-catagories a:first-child {
      border-color: transparent;
      background-color: transparent; }

</style>
 <div class="container">
      <div class="row">
		<div class="col-12">
      
        <div class="container">
        <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="browse-by-catagories catagory-menu d-flex flex-wrap align-items-center mb-70">
                        <a href="#" data-filter="*"  class="active">Browse All</a>
                        <a href="#" data-filter=".A">A</a>
                        <a href="#" data-filter=".B">B</a>
                        <a href="#" data-filter=".C">C</a>
                        <a href="#" data-filter=".D">D</a>
                        <a href="#" data-filter=".E">E</a>
                        <a href="#" data-filter=".F">F</a>
                        <a href="#" data-filter=".G">G</a>
                        <a href="#" data-filter=".H">H</a>
                        <a href="#" data-filter=".I">I</a>
                        <a href="#" data-filter=".J">J</a>
                        <a href="#" data-filter=".K">K</a>
                        <a href="#" data-filter=".L">L</a>
                        <a href="#" data-filter=".M">M</a>
                        <a href="#" data-filter=".N">N</a>
                        <a href="#" data-filter=".O">O</a>
                        <a href="#" data-filter=".P">P</a>
                        <a href="#" data-filter=".Q">Q</a>
                        <a href="#" data-filter=".R">R</a>
                        <a href="#" data-filter=".S">S</a>
                        <a href="#" data-filter=".T">T</a>
                        <a href="#" data-filter=".U">U</a>
                        <a href="#" data-filter=".V">V</a>
                        <a href="#" data-filter=".W">W</a>
                        <a href="#" data-filter=".X">X</a>
                        <a href="#" data-filter=".Y">Y</a>
                        <a href="#" data-filter=".Z">Z</a>
                        <a href="#" data-filter=".number">0-9</a>
                    </div>
                </div>
            </div>

            
        <div id="main_content_wrap" class="outer">
            <section id="main_content" class="inner">
            <h2>Data Usaha</h2>
			
			<p>Silahkan Cari A-Z</p>
		
      
      <div class="row oneMusic-albums">
     
<!-- Single Album -->

<!-- Single Album -->
<?php foreach($data as $row):?>
                <div class="col-12 col-sm-3 col-md-3 col-lg-3 single-album-item <?= $row->nama_usaha[0]?>">
                <ul id="demoOne" class="demo a">
               
                <li><a class="" href="<?= base_url('datausaha/detail/'.$row->id_usaha);?>"><?= $row->nama_usaha?></a></li>
              
              
				
      </ul>
</div>
<?php endforeach;?>
               

            </section>
             </div>
        </div>
        <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
      
        
     
     </div>    
    </div>
 </div>
                    
                
  
      <div class="widget-sections-footer">
        <section class="widget-section widget_ci-home-newsletter">
          <div class="widget-newsletter-wrap">
            <div class="container">
              <div class="row align-items-lg-center">
                <div class="col-lg-6 col-12">
                  <div class="widget-newsletter-content-wrap">
                     

                    <div class="widget-newsletter-content">
                      
                        
                     
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-12">
                     
                    
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <?php include_once "parsial/footer.php"; ?>
