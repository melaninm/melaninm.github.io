<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <?php
            foreach ($tb_barang as $detail) {
            ?>

                <form action="<?php echo site_url('crudbarang/updatebarangDb'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">


                    <div class="row form-group">
                        <div class="col col-md-3"><label for="kd" class=" form-control-label">Kode Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="kd" name="kd" value="<?php echo $detail->kode_barang; ?>" class="form-control" required></div>
                        <div class="col-12 col-md-9"><input type="hidden" id="id" name="id" value="<?php echo $detail->id_barang; ?>" class="form-control"></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nb" name="nb" value="<?php echo $detail->nama_barang; ?>" class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="merk" class=" form-control-label">Merk/Type</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="merk" name="merk" value="<?php echo $detail->merk; ?>" class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="ns" class=" form-control-label">No Seri</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="ns" name="ns" value="<?php echo $detail->no_seri; ?>" class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <!--dibuat dropdown-->
                        <div class="col col-md-3">
                            <label class="form-control-label" for="kb">Kondisi Barang</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select id="kb" class="form-control" name="kb">
                                <option value="Baik">Baik</option>
                                <option value="Sedikit Rusak">Sedikit Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="unit" class=" form-control-label">Unit</label></div>
                        <div class="col-12 col-md-9"><input type="number" min="0" id="unit" name="unit" value="<?php echo $detail->unit; ?>" class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                    </div>

        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-primary btn-sm" value="Update" />
            <a class="btn btn-secondary btn-sm" href="<?php echo site_url('Crudbarang/kebarang') ?>" role="button">Kembali</a>
        </div>
        </form>
    <?php
            }
    ?>
    </div>


</div>
</div>