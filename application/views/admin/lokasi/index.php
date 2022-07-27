 <!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $title; ?></title>

     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
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

                    <!-- Page Heading -->
                   <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Data Lokasi
  </a>
  
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <table class="table">
<thead class="table-dark">
  <tr>
    <th>No</th>
    <th>Wisata</th>
    <th>Lokasi</th>
    <th>Lat</th>
    <th>Long</th>
  </tr>
</thead>
<tbody class="fw-normal table-warning">
  <?php $no=0; foreach ($post as $key): $no++;?>
  <tr class="table-">
    <td class=""><?= $no; ?></td>
  <td><?= $key->judul ?></td>
  <td><?= $key->deskripsi_tempat ?></td>
  <td><?= $key->latitude?></td>
  <td><?= $key->langtitude?></td>
  </tr>
<?php endforeach ?>
</tbody>

</table>
  </div>
</div>


 




                   <div class="card mb-8 border-bottom-info bg-white rounded">
                        <div class="card-body">
                          <div id="map" style="width: 1030px; height: 500px;"></div>
                      </div>

                  </div>

                  <!-- DataTales Example -->

                  
                  <script>

                    var map = L.map('map').setView([-3.791760357755374, 103.5198280874178], 12);

                    var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 14,

                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                 <?php foreach ($post as $key) : ?>
                        // code...
                
                    var marker = L.marker([<?php echo $key->latitude ?>,<?php echo $key->langtitude ?>]).addTo(map)
                    .bindPopup('<?php echo $key->deskripsi_tempat ?>').openPopup();

                      <?php  endforeach; ?>

                  
                </script>

             <!--    <hr>
                <b class="hr">Deskripsi Tempat</b><br>
                 <table class="table table-striped">
                  <thead>
                    <tr class="">
                      <th scope="col">No.</th>
                      <th scope="col">Postingan</th>
                      <th scope="col">Deskripsi Tempat</th>
                      <th scope="col">Latitude</th>
                      <th scope="col">Longtitude</th>
                  
                  </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($post as $key) : ?>       
              <tr>
                  <th scope="row"><?php echo $no++; ?></th>
                  <td><?php echo $key->judul; ?></td>
                  <td><?php echo $key->deskripsi_tempat; ?></td>
                  <td><?php echo $key->latitude; ?></td>
                  <td><?php echo $key->langtitude; ?></td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table> -->
      


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