<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                           

                        <div class="card-header py-3">
                     <?php if ($this->session->flashdata('message')) :
                              echo $this->session->flashdata('message');
                          endif; ?>
                          <?php if ($this->session->userdata("akses") == 'super_admin') { ?>
                          <h6 class="m-0 font-weight-bold text-primary"> <a href="<?php echo site_url('admin/user/add_user') ?>" class="text-decoration-none float-right"><button class="btn btn-primary btn-l">+ Tambah </button></a>
                          <?php } ?>
                        
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           
                                            <th class=""> Nama Admin</th>
                                          
                                            <th>Status Akun</th>
                                            <th> Create Date</th>
                                            <th class=""></th>
                                            


                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $no=0; foreach ($user as $key): $no++;?>
                                        <tr>
                                            
                                            <td class="text-">
                                               
                                                <img class="img-profile rounded-circle " width="50px"
                                                src="<?php echo base_url() ?>upload/user/<?php if($key->gambar == 'default.jpg'){ echo 'team-2.jpg'; } 
                                        if($key->gambar != 'default.jpg'){ 
                                        echo $key->gambar; }?>">
                                               &nbsp; <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                                    <?php echo $key->nama ?></span>

                                                </td>
                                           
                                            <td>
                                                <?php if ($key->status == 'aktif') {?>
                                                    <span class="badge bg-info">Aktive</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-dark">Non-Aktive</span>
                                                <?php }?>
                                                    
                                            </td>
                                            <td class="text-info"><?php echo $key->tgl_dibuat ?></td>
                                           
                                            
                                            <td class="text-center text-dark">

                                        <div class="dropdown">
                                          <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Option
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <?php if ($this->session->userdata("akses") == 'super_admin') { ?>
                                            <li>
                                                <?php if($key->akses == 'admin' && $key->status == 'aktif') { ?>
                                                    <form method="post" action="user/edit/<?php echo $key->id_user ?>"> 

                                                        <input type="hidden" name="id_user" value="<?php echo $key->id_user ?>">
                                                        <input type="hidden" name="status" value="non-aktif">

                                                        <button type="submit" class="btn dropdown-item"><span class="badge rounded-pill bg-danger">Non-Aktif account</span> </button>
                                                    </form>


                                                <?php } elseif ($key->akses == 'admin' && $key->status == 'non-aktif') { ?>
                                                    <form method="post" action="user/edit/<?php echo $key->id_user ?>"> 

                                                        <input type="hidden" name="id_user" value="<?php echo $key->id_user ?>">
                                                        <input type="hidden" name="status" value="aktif">

                                                        <button type="submit" class="btn dropdown-item"><span class="badge rounded-pill bg-success">Aktif account</span> </button>
                                                    </form>

                                                    <?php }?>

                                                </li>
                                                <?php if ($key->akses == 'admin'){?>
                                            <li>   <a href="#" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key->id_user  ?>"><span class="badge rounded-pill bg-danger">Delete account</span> </a>
                                            <?php }} ?>


                                              </li>
                                              <li><a class="btn dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModals<?= $key->id_user  ?>">
                                                  <span class="badge rounded-pill bg-info">Detail account</span> </a></li>

                                                  </ul>

                                        <!-- Modal Delete -->
                                    <div class="modal fade" id="exampleModal<?= $key->id_user  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Warning !</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="user/delete">
                                                        <div class="modal-body">
                                                              <div class="alert alert-success">
                                                               Anda Yakin Ingin Menghapus Akun ?
                                                           </div> 

                                                            <input type="hidden" value="<?= $key->id_user ?>" name="id">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Delete -->
                                        <!-- ------------ -->
                                        <!-- Modal Detail -->
                                        <div class="modal fade" id="exampleModals<?= $key->id_user  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Akun</h5>
                                                
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">   
                                                <img class="img-profile rounded-circle " width="100px"
                                                src="<?php echo base_url() ?>upload/user/<?php if($key->gambar == 'default.jpg'){ echo 'team-2.jpg'; } 
                                        if($key->gambar != 'default.jpg'){ 
                                        echo $key->gambar; }?>">
                                               &nbsp; <br>
                                                    <?= $key->nama ?>
<br><br>
                                <table class="table table-warning">
  <thead>
    <tr>
      <th scope="col">Account</th>
      <th scope="col">Creat.At</th>
      <th scope="col">Akses</th>
      <th scope="col">Post</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><span class="badge rounded-pill bg-info">Detail account</span> </th>
      <td><?= $key->tgl_dibuat ?></td>
      <td><?= $key->akses?></td>
      <td><?= getTotalPost($key->id_user);?></td>
    </tr>
   
  </tbody>
</table>
                                                

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                               
                                            </div>
                                        </div>
                                    </div>
</div>
                                        <!-- Modal Detail -->



                                    </div>



                                        </td>
                                            
                                            
                                        </tr>
                                        <?php endforeach; ?> 
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
               

              <!-- Modal -->

              

        <!-- Modal -->

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