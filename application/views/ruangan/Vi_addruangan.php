<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Ruangan</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo site_url('crudruangan/save'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="row form-group">
                    <div class="col col-md-3"><label for="kd" class=" form-control-label">Kode Ruangan</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="kr" name="kr" placeholder="Kode Ruangan" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama Ruangan</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nr" name="nr" placeholder="Nama Ruangan" class="form-control" required></div>
                </div>

                <!-- <div class="row form-group">
                    <div class="col col-md-3"><label for="st" class=" form-control-label">Status</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="st" name="st" placeholder="Tersedia" class="form-control" required readonly=""></div>
                </div>-->


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class="form-control-label" for="st">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select id="st" class="form-control" name="st">
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>

        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save" />
            <a class="btn btn-secondary btn-sm" href="<?php echo site_url('Crudruangan/keruangan') ?>" role="button">Kembali</a>
        </div>
        </form>
    </div>


</div>
</div>