<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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

                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <!-- Page Heading -->
                 

                    <!--  content DataTales Example -->
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
                                Silahkan Masukkan Data Admin! 
                                <br><br>

                                <form class="user" action="<?php echo site_url('admin/user/proses') ?>" method="post" enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="inputEmail3" name="nama" >
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama') ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>">

                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" id="inputEmail3" name="username" >
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('username') ?>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-5">

                                    <input type="text" class="form-control " 
                                    placeholder="" name="password">

                                </div>
                                <div class="invalid-feedback">
                                    <?php echo form_error('password') ?>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-5">
                                    <button  type="submit" name="submit" class="btn btn-primary">Add</button>&nbsp;
                                    <a href="<?php echo site_url('admin/user') ?>"><button type="button" class="btn btn-dark">Back</button></a>
                                </div>
                              
                            </div>
                             
                               
                                  
                        </form>


                    </div>
                    <div class="card-footer small text-muted">
                        * required fields
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