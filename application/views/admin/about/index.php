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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
     <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>


<body id="page-top">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                       <?php if ($this->session->flashdata('message')): ?>
                        
                            <?php echo $this->session->flashdata('message'); ?>
                        
                    <?php endif; ?>
                    <!-- Page Heading -->
                     <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                   
                       

                    <div class="container-fluid shadow-sm p-3 mb-5 bg-body bg-info rounded">

                       
                        
<hr class="bg-light">
<!-- <?php echo base_url();?>users/assets/img/1ab71c1f-84c0-4490-8b31-cb53c14abc17.png -->
                    <?php foreach($about as $key) : ?> 
                        <div class="row align-items-md-stretch">
                          <div class="col-md-6">
                            <div class="h-100 p-5 text-white bg-gradient-info rounded-3">
                              <h2 class=" text-center text-bold fw-bolder"><b>About Daerah</b></h2><br>
                              <img src="<?php echo base_url('upload/kategori/'.$key->gambar); ?>" width="30%" class="rounded-3 float-end">
                              <h3><?= $key->nm_daerah; ?></h3>
                              <p><?= $key->about_daerah; ?></p>
                              
                          </div>
                      </div>

                      <div class="col-md-6">
                        <div class="h-100 p-5 text-white bg-gradient-info  rounded-3">
                          <h2 class="text-center fw-bolder"><b>Contact</b></h2><br>
                          
                          <p><b class="text-dark">Phone:</b> <?= $key->no_telp; ?></p>
                          <p><b class="text-dark">Email:</b> <?= $key->email; ?></p>
                          <p><b class="text-dark">Street:</b> <?= $key->alamat; ?></p>
                         
                          
                      </div>
                  </div>
              </div>

          <?php endforeach ?>

          <?php if ($this->session->userdata('akses') == 'super_admin'): ?>
              
          <hr class="bg-light">
          * <a href="#" class="btn btn-light " data-bs-toggle="modal" data-bs-target="#exampleModalabout"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
          <?php endif ?>


                                                <div class="modal fade" id="exampleModalabout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                     <form method="post" action="<?= base_url() ?>admin/about/update" enctype="multipart/form-data">
                    <input type="hidden" name="about_id" class="" value="<?= $k->about_id ?>">
                    <div class="mb-3">
                        <label  class="col-form-label float-left">Nama Daerah Wisata :</label>
                        <input type="text" name="ndw" class="form-control"  value="<?= $k->nm_daerah ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="col-form-label float-left">Keterangan Daerah :</label>
                        <textarea name="kd" class="form-control"   ><?= $k->about_daerah ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label  class="col-form-label float-left">No Telp Wisata :</label>
                        <input type="text" name="ntw" class="form-control"  value="<?= $k->no_telp ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="col-form-label float-left">Email Wisata :</label>
                        <input type="text" name="emailw" class="form-control"  value="<?= $k->email ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="col-form-label float-left">Alamat Lengkap :</label>
                        <input type="text" name="al" class="form-control"  value="<?= $k->alamat ?>" >
                    </div>

                    <div class="mb-3">
                        <label  class="col-form-label float-left">Gambar :</label>
                        <input type="file" name="gambar" class="form-control"   >
                    </div>

                    <input type="hidden" name="filelama" value="<?= $k->gambar?>">

                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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