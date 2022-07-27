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

                    <!-- Page Heading -->
                      <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pesan List:</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-">Nama</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            
                                            <th class="text-center">Option</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $no=0; foreach ($mail as $key): $no++;?>
                                        <tr>
                                            <td><?php echo $no,'.' ?></td>
                                            <td><?php echo $key->name ?></td>
                                          
                                            <td><?php echo $key->email ?></td>
                                            <td><?php echo substr($key->message, 0, 100),'....'; ?></td>

                                            <td>
                                                <?php if ($key->status == 1) { ?>
                                                    <span class="badge rounded-pill bg-secondary text-light">belum dilihat</span>

                                                <?php } elseif ($key->status == 2) { ?>
                                                    <span class="badge rounded-pill bg-info text-light">Pesan dilihat</span>
                                                <?php } ?>
                                                
                                                    
                                                </td>

                                            
                                            <td class="text-center">
                                                <a href="#" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key->id_mail ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>


                                                <div class="modal fade" id="exampleModal<?= $key->id_mail ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                      <form method="post" action="<?php base_url() ?>mail/edit/<?= $key->id_mail ?>">
                                                        <input type="hidden" name="id_mail" value="<?= $key->id_mail ?>">
                                                          <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label float-left">Recipient:</label>
                                                            <input type="text" class="form-control" id="recipient-name" placeholder="<?= $key->email ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label float-left">Message:</label>
                                                            <textarea class="form-control" placeholder="<?= $key->message ?>" id="message-text" disabled></textarea>
                                                        </div>
                                                        <input type="hidden" name="status" value="2">
                                                        <div class="modal-footer">

                                                            <button type="submit" class="btn btn-primary">Close</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModals<?= $key->id_mail  ?>"><li class="fa fa-trash text-danger" aria-hidden="true"></li></a>
                                         <div class="modal fade" id="exampleModals<?= $key->id_mail  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Warning !</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="Mail/delete">
                                                        <div class="modal-body">
                                                           <div class="alert alert-success">
                                                               Anda Yakin Ingin Menghapus Pesan ?
                                                           </div> 

                                                            <input type="hidden" value="<?= $key->id_mail ?>" name="id">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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