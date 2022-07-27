<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
// variabel global marker
var marker; 

function taruhMarker(peta, posisiTitik){

    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
  } else { 
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
    });
  } 
  
     // isi nilai koordinat ke form
     document.getElementById("lat").value = posisiTitik.lat();
     document.getElementById("lng").value = posisiTitik.lng();
     
 }
 
 function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-3.7869618804053333,103.54198419140998),
    zoom:13,
    mapTypeId:google.maps.MapTypeId.ROADMAP
};

var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
});

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);


</script>
<!-- Custom fonts for this template-->
<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
              <!-- Page Heading -->
              
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php 
            if(isset($error))
            {
                echo "ERROR UPLOAD : <br/>";
                print_r($error);
                echo "<hr/>";
            }
            ?>

            <!-- DataTales Example -->
            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-11">
                            <div class="p-5">
                             
                                <h1 class="h4 text-info mb-4 "><b>*Input Data</b> <li class="fas fa-fw fa-edit"></li></h1> 
                                <hr>
                                Silahkan Masukkan Data Wisata / Kuliner Yang ada di wilayah Kabupaten Lahat. 
                                <br>   <br>
                                
                                
                                

                                <form class="user" action="<?php echo site_url('admin/post/save') ?>" method="post" enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>" id="inputEmail3" name="judul" placeholder="Judul Postingan">
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('judul') ?>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-4">
                                            <select id="inputState" class="form-control" name="id_kategori">
 
                                               <?php foreach(getKat() as $kat) : ?>
                                                <option value="<?= $kat->id_kategori ?>">
                                                  <?= $kat->nama ?>
                                              </option>
                                          <?php endforeach ?>
                                          


                                      </select>
                                  </div>
                              </div>

                              <input type="hidden" name="id_user" value="<?php echo $this->session->userdata("id_user"); ?>">
                              <input type="hidden" name="tgl_post" value="<?php echo date("Y-m-d H:i:s"); ?>">
                              

                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Konten</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>" name="isi" aria-label="With textarea"></textarea>
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('judul') ?>
                                </div>
                            </div>                          


                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Pilih Lokasi</label>
                                <div class="col-sm-10">
                                    <div id="googleMap" style="width:100%;height:380px;"></div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control col-lg-5" id="lat"
                                    placeholder="..." name="latitude">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Langtitude</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control col-lg-5 " id="lng"
                                    placeholder="..." name="langtitude">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Deskripsi Tempat</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control col-lg-10 " 
                                    placeholder="Keterangan jl,desa,kec dll.." name="dt">

                                </div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('judul') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">

                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar" size="20">

                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input type="submit" name="" class="btn btn-primary btn-user btn-block col-lg-3" value="Publish">



                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer small text-muted">
                        * required fields
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php $this->load->view("admin/_partials/footer.php") ?>

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<?php $this->load->view("admin/_partials/logout.php") ?>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>


</body>

</html>