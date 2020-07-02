<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Form Peminjaman Ruangan</strong>
        </div>
        <div class="card-body card-block">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="bootstrap-iso">
                <form action="<?php echo site_url('crudpinjamruangan/todetail_user'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?php
                    foreach ($tbl_pinjamruangan as $detail) {
                    ?>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Peminjaman</label></div>
                            <div class="col-12 col-md-9"><input type="text" value="<?php echo $detail->id_pr; ?>" disabled="" class="form-control" required></div>
                            <div class="col-12 col-md-9"><input type="hidden" id="id_pr" name="id_pr" value="<?php echo $detail->id_pr; ?>" class="form-control"></div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor SPT</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nospt" name="nospt" value="<?php echo $detail->no_spt; ?>" disabled="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal Pinjam</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tanggal" name="tanggal" value="<?php echo $detail->tanggal; ?>" disabled="" class="tanggal" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal Kembali</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="datepicker" name="tanggal_kembali" value="<?php echo $detail->tanggal_kembali; ?>" disabled="" class="tanggal_kembali" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Pertama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama1" name="nama1" value="Admin Lab FISIP" disabled="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Kedua</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama2" name="nama2" value="<?php echo $detail->nama2; ?>" disabled="" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tujuan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama3" name="nama3" value="<?php echo $detail->tujuan; ?>" disabled="" class="form-control" required></div>
                        </div>
                        <div class="animated fadeIn">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Ruangan</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="id_ruangan" id="select" class="form-control">
                                        <?php foreach ($tb_ruangan as $row) { ?>
                                            <option value="<?php echo $row->id_ruangan ?>"><?php echo $row->nama_ruangan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"></div>
                                <div class="col-12 col-md-9">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="content mt-3">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Ruangan Pilihan</strong>
                                            </div>
                                            <div class="card-body">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Ruangan</th>
                                                            <th>Nama Ruangan</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($view_ruangan as $br) {
                                                        ?>
                                                            <tr>

                                                                <td><?php echo $br->kode_ruangan ?></td>
                                                                <td><?php echo $br->nama_ruangan ?></td>
                                                                <td><?php echo $br->keterangan ?></td>
                                                                <td>
                                                                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('crudpinjamruangan/hapus/' . $br->id_ruangan . '/' . $br->id_pr); ?>" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                </form>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticModal2" class="btn btn-small">
                        <i class="fa fa-dot-circle-o"></i> Selesai
                    </button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticModal<?php echo $detail->id_pr; ?>" class="btn btn-small">
                        <i class="fa fa-ban"></i> Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
                    }
?>

<div class="modal fade" id="staticModal2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi Selesai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Yakin ingin menyelesaikan ini?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('crudpinjamruangan/kepinjamruangan_user'); ?>">Ya, Selesai</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticModalhome" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Data akan otomatis tersimpan. ingin pindah halaman?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('Admin/index'); ?>">Ya, pindah</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticModaldaftar" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Data akan otomatis tersimpan. ingin pindah halaman?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('Crudruangan/keruangan'); ?>">Ya, pindah</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticModallaporan" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Data akan otomatis tersimpan. ingin pindah halaman?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('Laporanruangan/kelaporan'); ?>">Ya, pindah</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticModalkeluar" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Data akan otomatis tersimpan. ingin keluar?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('Login/keluar'); ?>">Ya, keluar</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticModal<?php echo $detail->id_pr; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi Batal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Yakin ingin membatalkan proses ini?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('crudpinjamruangan/hapusall_user/' . $detail->id_pr); ?>">Ya, Batal</a>
            </div>
        </div>
    </div>
</div>