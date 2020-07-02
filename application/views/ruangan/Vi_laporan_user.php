<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Laporan Peminjaman Ruangan</strong>
                    </div>
                

                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No Peminjaman</th>
                                    <th>No SPT</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Pihak Pertama</th>
                                    <th>Pihak Kedua</th>
                                    <th>Tujuan</th>
                                    <th>Action</th>
                                    <th class="text-center">Status</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                foreach ($tbl_pinjamruangan as $br) {
                                ?>
                                    <tr>
                                        <td><?php echo $br->id_pr ?></td>
                                        <td><?php echo $br->no_spt ?></td>
                                        <td><?php echo $br->tanggal ?></td>
                                        <td><?php echo $br->tanggal_kembali ?></td>
                                        <td><?php echo $br->nama1 ?></td>
                                        <td><?php echo $br->nama2 ?></td>
                                        <td><?php echo $br->tujuan ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="<?php echo site_url('laporanruangan/cetak/' . $br->id_pr); ?>" class="btn btn-small" target="_blank"><i class="fa fa-print"></i>Cetak</a>

                                            <a class="btn btn-danger btn-sm" href="<?php echo site_url('laporanruangan/hapus_user/' . $br->id_pr); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data? ');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash-o"></i>Hapus</a>
                                            
                                        </td>
                                        <?php
                                        if ($br->status == 'Ditolak') {
                                            echo '<td><button class="btn btn-danger form-control">Ditolak</button></td>';
                                        } else if ($br->status == 'Diterima') {
                                            echo '<td><a class="btn btn-success form-control" href="' . base_url("crudpinjamruangan/accpinjam_ruangan_user/" . $br->id_pr) . '">' . $br->status . ' </a></td>';
                                        } else if ($br->status == 'Pending') {
                                            echo '<td><a class="btn btn-info form-control" href="#">' . $br->status . '</a></td>';
                                        } else if ($br->status == 'Dikembalikan') {
                                            echo '<td><a class="btn btn-secondary form-control" href="#">' . $br->status . '</a></td>';
                                        }
                                        ?>
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
</div>