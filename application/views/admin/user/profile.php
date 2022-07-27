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
                <div class="container-fluid rounded bg-gradient-light col-lg-20 col-l-100 ">

                    <!-- Page Heading -->
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                  
  <div class="container bg-gradient-light py-3 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-7 col-xl-5">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">

              
              <div class="flex-shrink-0">
                <img src="<?php echo base_url() ?>upload/user/<?php if($user->gambar == 'default.jpg'){ echo 'team-2.jpg'; } 
                                        if($user->gambar != 'default.jpg'){ 
                                        echo $user->gambar; }?>"

                  alt="Generic placeholder image" class="img-fluid"
                  style="width: 180px; border-radius: 10px;">
              </div>&nbsp;&nbsp;
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1"><?php echo $user->nama; ?></h5>
                <p class="mb-2 pb-1" style="color: #2b2a2a;"><span class="badge badge-info"><?php echo $user->akses; ?></span></p>
                <div class="d-flex justify-content-start bg-gradient-light rounded text-dark p-2 mb-2"
                  >
                  <div>
                    <p class="small text-muted mb-1">Akun</p>
                    <p class="mb-0">
                        <span class="badge badge-success">Aktive</span>
                    </p>
                  </div>
                  <div class="px-3">
                    <p class="small text-muted mb-1">Postingan</p>
                    <p class="mb-0"><?= getTotalALL( $user->id_user)?></p>
                  </div>
                  
                </div>



                <div class="d-flex pt-1">
                  
                  <button type="button" class="btn btn-outline-primary flex-grow-1" data-bs-toggle="modal" data-bs-target="#exampleModalc">
                    Edit Profile
                  </button>

                  <div class="modal fade" id="exampleModalc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit My Profile</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                         <form class="" method="post" action="<?= base_url() ?>admin/user/update" enctype="multipart/form-data"
                          >
                          <input type="hidden" name="id_user" value="<?php echo $user->id_user; ?>">
                           <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nm" value="<?php echo $user->nama; ?>" id="floatingInput">
                            <label for="floatingInput">Name</label>
                          </div>
                           <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="<?php echo $user->username; ?>" name="username" id="floatingInputs">
                            <label for="floatingInputs">Username</label>
                          </div>
                          <div class="form-floating">
                            <input type="password" class="form-control"  name="pass" id="pass" placeholder="Password">
                            <input type="hidden" class="form-control" value="<?php echo $user->password; ?>" name="pass_lama" id="pass" placeholder="Password">
                            <div class="mb-3">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"><a href="#" class="text-decoration-none text-success">&nbsp;Lihat Password</a></span>
                            </div>
                            
                            <label for="floatingPassword">Password</label>
                          </div>
                          
                          <label class="text-muted">&nbsp;Profile</label>
                           <div class="mb-3">
                            <input type="File" class="form-control" name="gambar" id="floatingFile">
                            <input type="hidden" class="form-control" name="filelama" value="<?php echo $user->gambar; ?>" id="floatingFile">
                            
                          </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <!-- Latest compiled and minified JavaScript -->
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                        <script>
                          $(document).ready(function(){
                            $(".glyphicon").click(function(){         
                              if ($(this).hasClass("glyphicon-eye-open")==true) {
                                $("#pass").attr("type", "text");              
                                $(this).removeClass("glyphicon glyphicon-eye-open");
                                $(this).addClass("glyphicon glyphicon-eye-close");

                              } else {
                                $("#pass").attr("type", "password");
                                $(this).removeClass("glyphicon-eye-close");
                                $(this).addClass("glyphicon-eye-open");             
                              }           
                            });
                          });
                        </script>

                      </div>
                        
                      </div>
                    </div>
                  </div>
        <hr>
                </div>
                <!-- Button trigger modal -->


<!-- Modal -->
      </div>
            </div>
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