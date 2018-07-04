<!-- modal kirim -->
                                    <div class="modal modal-primary fade" id="modalKirim" style="margin-top: 5%">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">KIRIM PENGADUAN</h4>
                                                </div>
                                                
                                                <form method="POST" action="<?php echo base_url('koordinator/kirim_pengaduan') ?>">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>laporan :</label>
                                                                <input type="text" name="keterangan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="kirim" href="<?php echo base_url('analis/update_status/'.$data->id_pengaduan)?>" >
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
