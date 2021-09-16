

<?php
include './madmin/msettings/baglan.php';
$urunsor=$db->prepare("SELECT * FROM urunler order by urun_sira ASC");
$urunsor->execute();
$slider=$db->prepare("SELECT * FROM slider order by slider_sira ASC");
$slider->execute();
$menu=$db->prepare("SELECT * FROM menu order by menu_sira ASC");
$menu->execute();
$iletisim=$db->prepare("SELECT * FROM iletisim  ");
$iletisim->execute();
$ayar=$db->prepare("SELECT * FROM genel_ayar  ");
$ayar->execute();
?>

<!DOCTYPE html>
<html lang="tr">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
 
     <!-- Site Metas -->
       <?php  $say=0;

               while($ayarcek=$ayar->fetch(PDO::FETCH_ASSOC)) { ?>
    <title><?php echo $ayarcek['ayar_title'] ?></title>  
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
    <meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
<?php }?>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" class="politics_version">

    <!-- LOADER -->
    <div id="preloader">
        <div id="main-ld">
			<div id="loader"></div>  
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->
	
    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container-fluid">

        <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <img class="img-fluid" src="images/birtatlogo.jpeg" alt="" />
    </a>

       
     
        <div class="collapse navbar-collapse" id="navbarResponsive">
        
          <ul class="navbar-nav ml-auto">
     
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="#home"><span>Anasayfa</span></a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#menu"><span>Menü</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#galeri"><span>Galeri</span></a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact"><span>İletişim</span></a>
            </li>
         
          </ul>
        </div>
      </div>
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
    </nav>

    <section id="home" class="main-banner">
    
    <div class="slider-new-2 owl-carousel owl-theme">
        
      <div class="item slider-screen">
        <div class="slider-img-full">
          <?php  $say=0;

               while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)) { 

                $say++; 

             if($slidercek['slider_durum']==1){?>
          <img style="with:600px;height:600"  src="<?php echo $slidercek['slider_resimyol'] ?>" alt="<?php echo $slidercek['slider_ad'] ?>" />
      
          <?php } ?>
      <?php } ?>
        </div>
          
  
      </div>  
      
      
      
      
      
    </div>
    
  </section>
	
	
	
<div id="menu" class="section lb">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h3>Menüler</h3>
              
            </div><!-- end title -->

            <div class="row">
            	<?php  $say=0;

               while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { 

               	$say++; 
               	if($uruncek['urun_durum']==1){?>
				<div class="col-md-3">
                    <div class="services-inner-box">
						<div >
							<img style="border-radius: 10px;"src="<?php echo $uruncek['urun_resimyol'] ?>" alt="<?php echo $uruncek['urun_ad'] ?>" class="img-fluid"  />
						</div>
						<h2><?php echo $uruncek['urun_ad'] ?></h2>
						<h5 style="color: black-gray;"><?php echo $uruncek['urun_icerik'] ?></h5>
						 <h2 style="color: black;"><?php echo $uruncek['urun_fiyat'] ?> TL</h2>
					</div>

           
				 </div><!-- end col -->

                 <?php }?>
               <?php } ?>

            </div><!-- end row -->
        </div><!-- end container -->
    </div>
  
	
	<div id="galeri" class="section wb">
		<div class="container-fluid">
			<div class="section-title text-center">
                <h3>Galeri</h3>

              
			
			<div class="gallery-list row">
				<?php 

               while($menucek=$menu->fetch(PDO::FETCH_ASSOC)) { ?>
				<div class="col-md-4 col-sm-6 gallery-grid gal_a gal_b">
					<div class="gallery-single fix">
						

        
						<img style="width: 450px;height: 350px;border-radius: 10px;" src="<?php echo $menucek['menu_resimyol'] ?>"  class="img-fluid" alt="Image">
						<div class="img-overlay">
					
							<a href="<?php echo $menucek['menu_resimyol'] ?>" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<?php }?>
		
				
			</div>
		</div>
	</div>

</div>

	

    <div id="contact" class="section db">
        <div class="container-fluid">
            <div class="section-title text-center">
              <div class="row">
                <div class="col-md-12 ">
                 
                      
           <?php 
            	 while($iletisimcek=$iletisim->fetch(PDO::FETCH_ASSOC)) { ?>
                <h3>adres:</h3>
                <h4 style="color: white;"><?php echo $iletisimcek['iletisim_adres'] ?></h4>
              <img src="images/telephone.png" alt="telefon"><h3>sipariş için bizi arayın</h3><br>
               <a style="color: white;"href="tel://<?php echo $iletisimcek['iletisim_telefon'] ?>"><h1 style="color: white;" > <?php echo $iletisimcek['iletisim_telefon'] ?></h1></a>
              
              <a style="color: white;"href="tel://+90<?php echo $iletisimcek['iletisim_telefon2'] ?>"><h1 style="color: white;" > <?php echo $iletisimcek['iletisim_telefon2'] ?></h1></a>
              <h1 style="color: white;">açık:<?php echo $iletisimcek['iletisim_mesai'] ?></h1>
                <?php }?>
          
          

                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	<footer class="main-footer">
		<div class="container">
			<div class="row">
       
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="mb-3 img-logo">
           
           
         
        
			
				<div class="col-3 col-md-4 ">
					
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.463176357745!2d27.35152081544689!3d41.40746320271318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b4a57d89919a99%3A0x4130c14e025510a3!2sDiyarbak%C4%B1r%20Birtat%20lahmacun!5e0!3m2!1str!2str!4v1614069568105!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
				</div>
				</div>
				
				
			</div>
		</div>
	</footer>

    <div class="copyrights">
        <div class="container-fluid">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-links">
                        <a href="#home">Anasayfa</a>
                        <a href="#menu">Menüler	</a>
                       
                        <a href="#galeri">Galeri</a>
                        <a href="#contact">iletişim</a>
                    </p>
                    <p class="footer-company-name">All Rights Reserved. &copy; 2021<a href="">Diyarbakır Birtat Lahmacun</a>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<!-- Camera Slider -->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script> 
	<script src="js/parallaxie.js"></script>
	<script src="js/headline.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
</body>
</html>