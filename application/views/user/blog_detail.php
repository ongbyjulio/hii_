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
  <!-- Map -->
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script>
    function initialize() {
      var propertiPeta = {
        center:new google.maps.LatLng(-3.7869618804053333,103.54198419140998),
        zoom:12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };

      var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

  // membuat Marker
  var marker=new google.maps.Marker({
    position: new google.maps.LatLng(<?php echo $post->latitude ?>,<?php echo $post->langtitude ?>),
    map: peta
  });

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
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
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>upload/<?php echo $post->gambar ?>');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Blog Details</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Blog Details</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <article class="blog-details">

              <div class="post-img text-center">
                <img src="<?php echo base_url() ?>upload/<?php echo $post->gambar ?>" alt="" class="img-fluid">
              </div>

              <h2 class="title"><?php echo $post->judul ?></h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= getAuthor( $post->id_user);?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01"><?php echo $post->tgl_post ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#"><?= getComment($post->id_post); ?> Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>
                  <?php echo $post->isi ?>
                </p>
              </div><!-- End post content -->

              <div class="meta-bottom"> 
               
                <ul class="cats">
                  <li><a href="#"><?php echo $post->deskripsi_tempat ?></a></li>
                </ul>

               
             
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->

            <div class="post-author d-flex align-items-center">
              <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
              <div>
                <h4>Lokasi</h4><br>

                    <div id="googleMap" style="width:900%;height:380px;"></div>
                 

                <p>
                 
                </p>

              </div>
            </div><!-- End post author -->

            <div class="comments">

              <h4 class="comments-count"><?= getComment($post->id_post); ?> Comments</h4>



<?php

foreach($comment as $key) :

?>
             <!--  <div id="comment-1" class="comment">
                <div class="d-flex">
                  
                  <div>
                    <h5><a href=""><?= $key->name ?></a> 

                   </h5>
                   <div class="comment-img"><img src="<?php echo base_url() ?>users/assets/img/blog/comments-4.jpg" alt=""></div>
                    <time datetime="2020-01-01"><?= $key->waktu ?></time>
                    <p>
                      <?= $key->comment ?>
                       <?= $key->id_comment ?>  <?= $key->reply_comment ?>
                    </p>
                  </div>
                </div>
              </div> -->
                 <div id="comment-1 mb-2" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="<?php echo base_url() ?>users/assets/img/blog/undraw_profile_1.svg" alt=""></div>
                  <div>
                    <h5><a href=""><?= $key->name ?></a></h5>
                    <time datetime="2020-01-01"><?= $key->waktu ?></time>
                    <p>
                      <?= $key->comment ?>
                    </p>
                  </div>
                </div>
              </div>

<?php endforeach; ?>






              <!-- End comment #1 -->

              

              <div class="reply-form">
                <?php if ($this->session->flashdata('message')) :
                  echo $this->session->flashdata('message');
                endif; ?>
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>

                <form action="<?php echo site_url('user/home/comment/'. $post->id_post) ?>" method="post">
                  <input type="hidden" name="id_post" value="<?php echo $post->id_post ?>">
                  <input type="hidden" name="waktu" value="<?php echo date("Y-m-d H:i:s"); ?>">
           

                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="email" class="form-control" placeholder="Your Email*" required>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*" required></textarea>
                    </div>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Post Comment</button>
                </form>

              </div>

            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

            <div class="sidebar ps-lg-4">
 
             <!-- End sidebar search formn-->

           
              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  <li><a href="<?php echo site_url('user/home/blog/all') ?>">All <span>(<?php echo getTotalBlog()?>)</span></a></li>
                  <li><a href="<?php echo site_url('user/home/blog/wisata') ?>">Wisata <span>(<?php echo getTotalWB()?>)</span></a></li>
                  <li><a href="<?php echo site_url('user/home/blog/kuliner') ?>">Kuliner <span>(<?php echo getTotalWK()?>)</span></a></li>
                  
                </ul>
              </div><!-- End sidebar categories-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">

                  <?php foreach($recent as $key) : ?>
                  <div class="post-item mt-3">
                    <img src="<?php echo base_url() ?>upload/<?php echo $key->gambar ?>" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="<?php echo site_url('user/home/detail/'.$key->id_post) ?>"><?php echo $key->judul ?></a></h4>
                      <time datetime="2020-01-01"><?php echo $key->tgl_post ?></time>
                    </div>
                  </div>
                  <?php endforeach; ?><!-- End recent post item-->
                <!-- End recent post item-->
                </div>

              </div><!-- End sidebar recent posts-->

            

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

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