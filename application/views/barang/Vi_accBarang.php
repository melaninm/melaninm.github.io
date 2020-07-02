
    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Form Peminjaman</strong>
            </div>
            <div class="card-body card-block">
                <div class="bootstrap-iso">
                    <!-- <form action="<?php echo site_url('crudpinjambarang/aksi_pinjambarang'); ?>" enctype="multipart/form-data" class="form-horizontal"> -->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Peminjaman</label></div>
                        <div class="col-12 col-md-9"><input type="text" placeholder="<?php echo $detail[0]->id_pb; ?>" readonly class="form-control" required></div>

                        <div class="col-12 col-md-9"><input type="hidden" id="idpb" name="idpb" value="<?php echo $detail[0]->id_pb; ?>" class="form-control"></div>

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor SPT</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nospt" name="nospt" value="<?php echo $detail[0]->no_spt; ?>" readonly class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal Pinjam</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal" value="<?php echo $detail[0]->tanggal; ?>" class="tanggal form-control" required readonly></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal Kembali</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal_kembali" class="tanggal_kembali form-control" value="<?php echo $detail[0]->tanggal_kembali; ?>" required readonly></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Pertama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama1" name="nama1" value="<?php echo $detail[0]->nama1; ?>" readonly class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Kedua</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama2" name="nama2" value="<?php echo $detail[0]->nama2; ?>" readonly class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tujuan</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama3" name="nama3" value="<?php echo $detail[0]->tujuan; ?>" readonly class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Surat</label></div>
                        <div class="col-12 col-md-9"><a href="<?php echo site_url('file/download/'.$detail[0]->file_name); ?>" target="_blank"><button class="btn btn-info">Download Surat</button></a></div>
                    </div>
                    <!-- </form> -->
                    <div class="animated fadeIn">
                        <div class="content mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Barang Pilihan</strong>
                                        </div>
                                        <div class="card-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Merk/Type</th>
                                                        <th>No Seri</th>
                                                        <th>Kondisi Barang</th>
                                                        <th>Unit</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($detail as $d) { ?>
                                                        <tr>

                                                            <td><?php echo $d->kode_barang ?></td>
                                                            <td><?php echo $d->nama_barang ?></td>
                                                            <td><?php echo $d->merk ?></td>
                                                            <td><?php echo $d->no_seri ?></td>
                                                            <td><?php echo $d->kondisi_barang ?></td>
                                                            <td><?php echo $d->unitb ?></td>
                                                            <td><?php echo $d->keterangan ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <form action="<?= base_url('crudpinjambarang/update/'); ?>" method="POST">
                                                <input type="hidden" name="id_pb" value="<?= $detail[0]->id_pb ?>">
                                                <input type="hidden" name="action" id="act_value">
                                                <?php if ($detail[0]->status === 'Pending')  : ?>
                                                    <button type="submit" class="btn btn-success" onclick="$('#act_value').val('Diterima');return confirm('Apakah Anda Yakin Menerima Peminjaman? ');" data-popup="tooltip" data-placement="top" title="Terima">Terima</button>
                                                    <button type="submit" class="btn btn-danger" onclick="$('#act_value').val('Ditolak');return confirm('Apakah Anda Yakin Menolak Peminjaman? ');" data-popup="tooltip" data-placement="top" title="Tolak">Tolak</button>
                                                    <button type="submit" disabled class="btn btn-secondary" onclick="$('#act_value').val('Dikembalikan');return confirm('Apakah Anda Yakin Barang sudah dikembalikan? ');" data-popup="tooltip" data-placement="top" title="Kembali">Dikembalikan</button>
                                                <?php elseif($detail[0]->status==="Diterima"): ?>
                                                    <button type="submit" disabled class="btn btn-success" onclick="$('#act_value').val('Diterima');return confirm('Apakah Anda Yakin Menerima Peminjaman? ');" data-popup="tooltip" data-placement="top" title="Terima">Terima</button>
                                                    <button type="submit" disabled class="btn btn-danger" onclick="$('#act_value').val('Ditolak');return confirm('Apakah Anda Yakin Menolak Peminjaman? ');" data-popup="tooltip" data-placement="top" title="Tolak">Tolak</button>
                                                    <button type="submit" class="btn btn-secondary" onclick="$('#act_value').val('Dikembalikan');return confirm('Apakah Anda Yakin Barang sudah dikembalikan? ');" data-popup="tooltip" data-placement="top" title="Kembali">Dikembalikan</button>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>                                
                    


                    