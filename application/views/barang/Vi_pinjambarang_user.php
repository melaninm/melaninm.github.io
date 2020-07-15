<!-- Header-->
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Form Peminjaman Barang</strong>
        </div>
        <div class="card-body card-block">
            <div class="bootstrap-iso">
                <form action="<?php echo site_url('crudpinjambarang/tomaster_user'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor SPT</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nospt" name="nospt" placeholder="Nomor Surat Perintah Tugas" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal Pinjam</label></div>
                        <div class="col-12 col-md-9"><input type="date" id="datepicker" name="tanggal" placeholder="yyyy-mm-dd" class="tanggal" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal_kembali" class=" form-control-label">Tanggal Kembali</label></div>
                        <div class="col-12 col-md-9"><input type="date" id="datepicker2" name="tanggal_kembali" placeholder="yyyy-mm-dd" class="tanggal_kembali" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Pertama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama1" name="nama1" placeholder=""Admin Lab FISIP" value="Admin Lab FISIP" readonly="" disabled="" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pihak Kedua</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama2" name="nama2" class="form-control" required placeholder="Nama Lengkap Pihak Kedua"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tujuan</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tujuan" name="tujuan" placeholder="Tujuan Peminjaman" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Upload Surat</label> </div>
                        <div class="col-12 col-md-9"><input type="file" id="surat" name="surat" class="filestyle" data-icon="false" required>
                        <p>Tipe File : PDF / WORD / JPG / JPEG / PNG</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"></div>
                        <div class="col-12 col-md-9">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Lanjut
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>