<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo site_url('crudbarang/save'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="row form-group">
                    <div class="col col-md-3"><label for="kd" class=" form-control-label">Kode Barang</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="kd" name="kd" placeholder="Kode Barang" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama Barang</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nb" name="nb" placeholder="Nama Barang" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="merk" class=" form-control-label">Merk/Type</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="merk" name="merk" placeholder="Merk/Type" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="ns" class=" form-control-label">No Seri</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="ns" name="ns" placeholder="No Seri" class="form-control" required></div>
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
                    <div class="col-12 col-md-9"><input type="number" min="1" id="unit" name="unit" placeholder="Unit" class="form-control" required></div>
                </div>

                <div class="row form-group">
                </div>

        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save" />
            <a class="btn btn-secondary btn-sm" href="<?php echo site_url('Crudbarang/kebarang') ?>" role="button">Kembali</a>
        </div>
        </form>
    </div>


</div>
</div>