<!-- Tab Pane Draft -->
   <div class="tab-content">
    <div class="active tab-pane fade in" id="edit_profil">
     <div class="box-body">
      TAB PANE 1
     </div>
     <div class="box-footer with-border">
      <a href="#edit"  class="btn btn-primary" data-toggle="tab">Edit Profil</a>
     </div>
    </div>
    <!-- /.tab-pane -->
    
    <div class="tab-pane fade in" id="edit">
    TAB PANE 2
    <a href="#edit_profil" class="btn btn-primary" data-toggle="tab" >Batal</a>
    </div>
    <!-- /.tab-pane -->
    
   </div>
   <!-- /.tab-content -->



   

                <form action="" method="POST" role="form">

                  <div class="form-group" style="margin-left: 15px">
                    <label>Silahkan isikan tanggal kejadian :</label>
                    <div class="input-group col-sm-6">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" datapicker required="Wajib diisi">
                    </div>
                  </div>

                  <div class="form-group" style="margin-left: 15px">
                    <label>Silahkan isikan subjek pengaduan :</label>
                    <div class="input-group col-sm-12">
                      <div class="input-group-addon">
                        <i class="fa fa-edit"></i>
                      </div>
                      <input type="text" name="subjek" class="form-control" required="required">
                    </div>
                  </div>

                  <div class="form-group" style="width: 100%; margin-bottom: 10px">
                    <div class="col-md-6">
                      <label><b>Pilih tempat kejadian:</b></label>
                      <select class="form-control" name="tempat"  id="tempat" required="Wajib diisi">
                        <option value="0">----------------------------------------- pilih tempat ------------------------------------------</option>
                        <?php
                        foreach ($tempat as $data){
                          ?>
                          <option value="<?php echo $data->id_tempat ?>" >
                            <?php echo $data->nama_tempat ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select> 
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                      <label><b>Pilih ruang kejadian</b></label>
                      <select class="form-control ruang" name="ruang" id="ruang required">
                        <option>----------------------------------------- pilih ruang ------------------------------------------</option>
                      </select>
                    </div>
                  </div><br>

                  <div class="form-group" style="width: 100%;">
                    <div class="col-md-6">
                      <label><b>Pilih kategori kejadian:</b></label>
                      <select class="form-control" name="kategori"  id="kategori" required="Wajib diisi">
                        <option value="0">----------------------------------------- pilih tempat ------------------------------------------</option>
                        <?php
                        foreach ($kategori as $data){
                          ?>
                          <option value="<?php echo $data->id_kategori ?>" >
                            <?php echo $data->kategori ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select> 
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                      <label><b>Pilih jenis kejadian</b></label>
                      <select class="form-control ruang" name="ruang" id="ruang required">
                        <option>----------------------------------------- pilih ruang ------------------------------------------</option>
                      </select>
                    </div>
                  </div>

                </form>
              </div>
              <div class="panel-footer">
                Panel Footer
              </div>