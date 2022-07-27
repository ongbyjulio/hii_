<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>wiSKul-Lahat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url() ?>assets/img/title.png" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>users/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>users/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>users/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>users/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>users/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>users/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>users/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nova - v1.0.0
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-index">

  <?php $this->load->view("user/_partialss/navbar.php") ?>

  <!-- ======= Hero Section ======= -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo base_url();?>users/assets/img/1ab71c1f-84c0-4490-8b31-cb53c14abc17.png');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>About</h2>
        <ol>
          <li><a href="<?php echo site_url('user/home') ?>">Home</a></li>
          <li>About</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4" data-aos="fade-up">
          <div class="col-lg-4">
            <img src="<?php echo base_url() ?>users/assets/img/65d38d61-c463-47fd-8898-81d65af2dfd0.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8">
            <div class="content ps-lg-5">
              <h3>Kabupaten Lahat</h3>
              <p>
                <?php foreach($about as $key){ echo $key->about_daerah; } ?>
              </p>
              
            </div>
          </div>
        </div>
        <hr>
         <div class="row gy-4" data-aos="fade-up">
          <div class="col-lg-8">
          <div class="content ps-lg-5"> <a href="<?php echo site_url('user/home/bahari') ?>"> <h3  class="col-lg-8 float-right" >Wisata Bahari</h3></a>
              <p>
                <?php foreach($bahari as $key){ echo $key->keterangan; } ?>
              </p>
             </div>
          </div>
          <div class="col-lg-4">
            
             <img src="<?php echo base_url() ?>users/assets/img/2992aa83-c698-49d3-9e6d-9437c03548b8.png" class="img-fluid" alt="">
              
           
          </div>
        </div><hr>

         <div class="row gy-4" data-aos="fade-up">
          <div class="col-lg-4">
            <img src="<?php echo base_url() ?>users/assets/img/1383a579-a627-4542-8d82-30bb569f7be6.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8">
            <div class="content ps-lg-8">
              <a href="<?php echo site_url('user/home/kuliner') ?>"><h3>Wisata Kuliner</h3></a>
              <p>
               <?php foreach($kuliner as $key){ echo $key->keterangan; } ?>
              </p>
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  

  </main>
  <!-- End Hero Section -->

    <?php $this->load->view("user/_partialss/footer.php") ?>
  <!-- End #main -->

  
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url() ?>users/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>users/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url() ?>users/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url() ?>users/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url() ?>users/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url() ?>users/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url() ?>users/assets/js/main.js"></script>

</body>

</html>