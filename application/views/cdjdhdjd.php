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
                                    <input type="password" name="re_new" class="form-control" value="<?php echo set_value('re_new') ?>" required>
                                </div>
                        </div>
                    </div>
                </div>

<!-- user -->

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width: 35%">Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th style="width: 40px;">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($user as $data)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $data->nama_pengguna ?></td>
                                        <td><?php echo $data->email ?></td>
                                        <td><?php echo $data->role ?></td>
                                        <td>
                                            <?php
                                            $i++;
                                            if($data->status == 1)
                                            {
                                             echo "<span class='badge success'>aktif</span>";
                                         }
                                         else
                                         {
                                             echo "<span class='badge danger'>tidak aktif</span>";
                                         } 
                                         ?></td>
                                         <td>
                                            <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editUser<?php echo $data->id_user; ?>"></i></span>&nbsp;

                                            <a href="<?php echo base_url('admin/hapus_user/'.$data->id_user) ?>"><i class="fa fa-trash-o" style="color: red"></i></a>
                                        </td>
                                    </tr>

                                    <!-- modal edit user -->
                                    <div class="modal modal-primary fade" id="editUser<?php echo $data->id_user; ?>" style="margin-top: 5%">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                              <h4 class="modal-title">EDIT DATA USER</h4>
                                          </div>

                                          <form method="POST" action="<?php echo base_url('admin/edit_user') ?>">
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label>Nama Pengguna :</label>
                                                            <input class="form-control" type="text" name="nama" value="<?php echo $data->nama_pengguna ?>">
                                                            <input class="form-control" type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email :</label>
                                                            <input class="form-control" type="text" name="email" value="<?php echo $data->email ?>">
                                                            <input class="form-control" type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary" value="Simpan">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- modal edit user -->

                            <?php
                        } 
                        ?>
                    </tbody>
                </table>


<?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-<?php echo $this->session->flashdata('style'); ?>" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp;<br>
              <?php echo $this->session->flashdata('message'); ?>
            </div>
          <?php endif; ?>