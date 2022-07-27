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
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo base_url();?>users/assets/img/65d38d61-c463-47fd-8898-81d65af2dfd0.png');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Blog</h2>
        <ol>
          <li><a href="<?php echo site_url('user/home') ?>">Home</a></li>
          <li><?php echo $page; ?></li>
        </ol>
 
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="row gy-5 posts-list">

<!-- Content -->
<?php foreach($post as $key) : ?>
              <div class="col-lg-6">
                <article class="d-flex flex-column">

                  <div class="post-img">
                    <img src="<?php echo base_url() ?>upload/<?php echo $key->gambar ?>" alt="" class="img-fluid">
                  </div>

                  <h2 class="title">
                    <a href="<?php echo site_url('user/home/detail/'.$key->id_post) ?>"><?php echo $key->judul ?></a>
                  </h2>

                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= getAuthor($key->id_user); ?></a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#"><?= getComment($key->id_post); ?> Comments</a></li>
                    </ul>
                  </div>

                  <div class="content">
                    <p>
                     <?php  echo substr($key->isi, 0, 100),'....'; ?>
                    </p>
                  </div>

                  <div class="read-more mt-auto align-self-end">
                    <a href="<?php echo site_url('user/home/detail/'.$key->id_post) ?>">Read More <i class="bi bi-arrow-right"></i></a>
                  </div>

                </article>
              </div>

              <?php endforeach; ?>
             
             
<!-- End Content -->
            </div><!-- End blog posts list -->

            <!-- RIGHT BLOG -->

            <?php $this->load->view("user/_partialss/right_blog.php") ?>

              
           

         </div>

            <!-- END RIGHT BLOG -->
        </div>

      </div>
    </section><!-- End Blog Section -->

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