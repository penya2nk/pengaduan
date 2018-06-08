<form method="POST" action="<?php echo base_url('admin/ubah_password') ?>">
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password Lama :</label>
                                    <input type="password" name="old" class="form-control" value="<?php echo set_value('old') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Password Baru :</label>
                                    <input type="password" name="new" class="form-control" value="<?php echo set_value('new') ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Ulangi Password Baru :</label>
                                    <input type="password" name="re_new" class="form-control" value="<?php echo set_value('new') ?>" required>
                                </div>
                        </div>
                    </div>
                </div>