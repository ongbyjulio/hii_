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
                    <div class="container-fluid">
                        <table class="table">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col" width="3%">#</th>
                          <th scope="col ">Kategori</th>
                          <th scope="col">Keterangan</th>

                          <?php if ($this->session->userdata("akses") == 'super_admin') { ?>
                          <th>option</th>
                          <?php } ?>
                        
                          
                      </tr>
                  </thead>
                  <tbody class="table-light">
                    <?php $no=0; foreach($kat as $key): $no++ ?>
                    <tr>
                      <th scope="row"><?= $no; ?>.</th>
                      <td class="fw-bolder"><?= $key->nama; ?></td>
                      <td>
                        <p class="fw-normal"><?= $key->keterangan; ?></p>
                        <img class="img-fluid rounded float-start" width="300px" height="500px" src="<?= base_url()?>upload/kategori/<?= $key->gambar; ?>">
                  </td>
                  <?php if ($this->session->userdata("akses") == 'super_admin') { ?>
                  <td><a href="#" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $key->id_kategori; ?>"><li class="fa fa-edit"></li></a>
                   

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?= $key->id_kategori; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Kategori <b><?= $key->nama; ?></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form method="post" action="<?= base_url() ?>admin/kategori/update" enctype="multipart/form-data">
            <input type="hidden" name="id_kategori" value="<?= $key->id_kategori; ?>">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Gambar</label>
            <input type="File" name="gambar" class="form-control" id="recipient-name">
            <input type="hidden" name="filelama" class="form-control" value="<?= $key->gambar; ?>" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Keterangan:</label>
            <textarea class="form-control" name="keterangan" id="message-text"> <?= $key->keterangan; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
    </div>
</div>
</div>
</div>
                  </td>
                  <?php } ?>
                      
                  </tr>
              <?php endforeach; ?>
                  
              </tbody>
          </table>
          

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