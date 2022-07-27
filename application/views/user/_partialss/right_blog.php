 <div class="blog-pagination">
  <ul class="justify-content-center">
    <li> <?php echo $this->pagination->create_links(); ?></li>
    
  </ul>
</div>  
        </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

            <div class="sidebar ps-lg-4">

              <!-- End sidebar search formn-->

              <div class="sidebar-item categories"> 
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  <li><a href="<?php echo site_url('user/home/blog') ?>">All <span>(<?php echo getTotalBlog()?>)</span></a></li>
                  <li><a href="<?php echo site_url('user/home/bahari') ?>">Wisata <span>(<?php echo getTotalWB()?>)</span></a></li>
                  <li><a href="<?php echo site_url('user/home/kuliner') ?>">Kuliner <span>(<?php echo getTotalWK()?>)</span></a></li>
                  
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

          <!-- End sidebar tags-->

            </div><!-- End Blog Sidebar -->

          </div>
            <!-- End blog pagination -->