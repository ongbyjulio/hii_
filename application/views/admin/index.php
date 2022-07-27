 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title><?php echo $title; ?></title>

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
                   <?php if ($this->session->flashdata('message')) :
                      echo $this->session->flashdata('message');
                  endif; ?>
                 
                 <!-- Breadcrumb -->
                 <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                 <!-- End Breadcrumb -->

                 <div class="card shadow mb-4 ">

                    <div class="card-header py-3 bg-transparent">
                            

                             <div class="row">

                 

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example --><div class="alert alert-warning mb-3 text-info "><b>Admin Post</b></div>
                             <div class="row">
                                 <?php foreach($post as $key) : ?>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-dark shadow">
                                        <div class="card-body">
                                             &nbsp;&nbsp;<img class="img-profile rounded-circle " width="50px"
                                                src="<?php echo base_url() ?>upload/user/<?php if($key->gambar == 'default.jpg'){ echo 'team-2.jpg'; } 
                                        if($key->gambar != 'default.jpg'){ 
                                        echo $key->gambar; }?>">
                                               &nbsp; <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                                    Total Post : <B><?= getTotalPost($key->id_user) ?></B></span><hr>
                                            <center><div class="text-dark small"><b><?php echo $key->nama ?></b></div></center>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                
                            </div>
                            

                            <!-- Color System -->
                          

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kategori Post</h6>
                                </div>
                                 
                                <div class="card-body">
                                    <h4 class="small font-weight-bold"> Bahari <span
                                            class="float-right"><?= getTotalWB() ?> postingan</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= getTotalWB() ?>%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                   
                                
                                    <h4 class="small font-weight-bold"> Kuliner <span
                                            class="float-right"><?= getTotalWK() ?> postingan</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= getTotalWK() ?>%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                   
                                </div>
                               
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Wisata</h6>
                                </div>
                                <div class="card-body">
                                    <p><?= getWisata(); ?></p>
                                    
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
       <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>


</body>

</html>