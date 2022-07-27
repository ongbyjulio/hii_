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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Postingan</h6><hr>
                            Filter : 
                         <a href="<?php echo site_url('admin/post') ?>" class="text-decoration-none">
                             <span class="badge badge-dark ">All</span>
                         </a>-

                        <a href="<?php echo site_url('admin/post/bahari') ?>" class="text-decoration-none">
                             <span class="badge badge-info ">Bahari</span>
                         </a>-

                            <a href="<?php echo site_url('admin/post/kuliner') ?>" class="text-decoration-none"><span class="badge badge-info ">Kuliner</span></a> 

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            
                                            <th>Judul Post</th>
                                            <th width="100px">Date Post</th>
                                            <th>Keterangan</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                          <th></th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($post as $key): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?>.</td>

                                           
                                            <td><p>"<i><?php echo $key->judul ?></i>"</p></td>
                                            <td><code class="text-dark"><?php echo $key->tgl_post ?>..</code></td>
                                            <td><p><?php  echo substr($key->isi, 0, 100),'....'; ?></p></td>
                                            <?php if ($key->id_kategori == 1) { ?>
                                            <td class="text-dark ">
                                               <b><?php echo ucfirst(getKatId($key->id_kategori)); } else {?>   
                                            </td>
                                            <td class="text-info">
                                               <b><?php echo ucfirst(getKatId($key->id_kategori));?>   
                                            </td>
                                        <?php } ?>

                                         <td> <img src="<?php echo base_url('upload/'.$key->gambar); ?>" class="rounded" width="100px" height="120px">
                                            
                                                
                                            </td>

                                            <td>
                                              <div class="dropdown">
                                                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Option
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>  <a href="<?php echo site_url('admin/post/edit/'.$key->id_post) ?>"
                                             class="btn btn-small dropdown-item"><span class="badge rounded-pill bg-dark">Edit</span> </a> </li>
                                             <li> 
                                                 <a href="#" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key->id_post  ?>"><span class="badge rounded-pill bg-danger">Delete</span> </a>
                                             </li>
                                                </ul>

                                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="exampleModal<?= $key->id_post  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Warning !</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?php echo site_url('admin/post/delete') ?>">
                                                        <div class="modal-body">
                                                            Anda Yakin Ingin Menghapus Postingan Ini ?

                                                            <input type="hidden" value="<?= $key->id_post ?>" name="id">

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

                                            </div>

                                            </td>

                                          <!--   <td class="text-center">
                                                <a href="<?php echo site_url('admin/post/edit/'.$key->id_post) ?>"
                                             class="btn btn-small"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/post/delete/'.$key->id_post) ?>')"
                                             href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
                                        </td> -->
                                            
                                            
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