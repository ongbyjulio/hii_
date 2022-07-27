  
                  <form method="post" action="<?= base_url() ?>admin/about/update">
                    
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label float-left">Nama Daerah Wisata :</label>
                        <input type="text" name="ndw" class="form-control"  value="<?= $key->nm_daerah ?>" >
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label float-left">Keterangan Daerah :</label>
                        <textarea name="kd" class="form-control" style="width: 200px"  ><?= $key->about_daerah ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label float-left">No Telp Wisata :</label>
                        <input type="text" name="ntw" class="form-control"  value="<?= $key->no_telp ?>" >
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label float-left">Email Wisata :</label>
                        <input type="text" name="emailw" class="form-control"  value="<?= $key->email ?>" >
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label float-left">Alamat Lengkap :</label>
                        <input type="text" name="al" class="form-control"  value="<?= $key->alamat ?>" >
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label float-left">Gambar :</label>
                        <input type="file" name="gambar" class="form-control"   >
                    </div>

                    <input type="hidden" name="filelama" value="<?= $key->gambar?>">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            