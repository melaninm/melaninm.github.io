<!-- TABEL-->
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Laporan Peminjaman Barang</strong>
                    </div>

                    <div class="card-header">
                        <div align="center">
                            <?php echo form_open('Laporanbarang/search') ?>
                            <input type="text" name="keyword" placeholder=" Cari Nama / Tujuan .. ">
                            <input type="submit" name="search_submit" value="Cari">
                            <?php echo form_close() ?>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No Peminjaman</th>
                                    <th>No SPT</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Pihak Kedua</th>
                                    <th>Tujuan</th>
                                    <th>Action</th>
                                    <th class="text-center">Status</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                foreach ($tbl_pinjambarang as $br) {
                                ?>
                                    <tr>
                                        <td><?php echo $br->id_pb ?></td>
                                        <td><?php echo $br->no_spt ?></td>
                                        <td><?php echo $br->tanggal ?></td>
                                        <td><?php echo $br->tanggal_kembali ?></td>
                                        <td><?php echo $br->nama2 ?></td>
                                        <td><?php echo $br->tujuan ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="<?php echo site_url('laporanbarang/cetak/' . $br->id_pb); ?>" class="btn btn-small" target="_blank"><i class="fa fa-print"></i>Cetak</a>

                                            <a class="btn btn-danger btn-sm" href="<?php echo site_url('laporanbarang/hapus/' . $br->id_pb); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus ? ');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash-o"></i>Hapus</a>
                            
                                        </td>
                                        <?php
                                        if ($br->status == 'Ditolak') {
                                            echo '<td><a class="btn btn-danger form-control" href="' . base_url("crudpinjambarang/accpinjam_barang/" . $br->id_pb) . '">' . $br->status . '</a></td>';
                                        } else if ($br->status == 'Diterima') {
                                            echo '<td><a class="btn btn-success form-control" href="' . base_url("crudpinjambarang/accpinjam_barang/" . $br->id_pb) . '">' . $br->status . '</a></td>';
                                        } else if ($br->status == 'Pending') {
                                            echo '<td><a class="btn btn-info form-control" href="' . base_url("crudpinjambarang/accpinjam_barang/" . $br->id_pb) . '">' . $br->status . '</a></td>';
                                        } else if ($br->status == 'Dikembalikan') {
                                            echo '<td><a class="btn btn-secondary form-control" href="' . base_url("crudpinjambarang/accpinjam_barang/" . $br->id_pb) . '">' .  $br->status . '</a></td>';
                                        }

                                        ?>
                                  </div>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    
                    <div class="row">
                            <div class="col">
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal_konfirm_m_n" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi Penerimaan Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Yakin ingin menerima peminjaman ini?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal2">Batal</button>
                <a type="button" class="btn btn-primary" id="konfirm_link_m_n">Terima</a>
                <a type="button" class="btn btn-primary" id="konfirm_link_m_n2">Tolak</a>
            </div>
        </div>
    </div>
</div>
<script>
    function confirm_modal(konfirm_url, konfirm_url2, title) {
        jQuery('#modal_konfirm_m_n').modal2('show', {
            backdrop: 'static',
            keyboard: false
        });
        jQuery("#modal_konfirm_m_n .grt").text(title);
        document.getElementById('konfirm_link_m_n').setAttribute("href", konfirm_url);
        document.getElementById('konfirm_link_m_n').focus();
        document.getElementById('konfirm_link_m_n2').setAttribute("href", konfirm_url2);
        document.getElementById('konfirm_link_m_n2').focus();
    }
</script>