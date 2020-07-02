<div class="container-fluid">
  <div class="row">
    <div class="col-md-5">
        <div class="card">

          <div class="card-body">
            <?php
              foreach($barang as $detail){
            ?>
            <form class="form" method="post" action="<?= base_url('user_barang/update_barang') ?>">
              <div>
                <h1>Edit Daftar Barang</h1>
              </div>
            
              <div class="form-group">
                <input class="input form-control" type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $detail->nama_barang; ?>" required>
              </div>
              <div class="form-group">
                <input class="input form-control" type="text" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $detail->kode_barang; ?>" required>
              </div>
               <div class="form-group">
                <select id="kondisi_barang" class="form-control" name="kondisi_barang" placeholder="Kondisi Barang">
                  <option value="Baik">Baik</option>
                  <option value="Sedikit Rusak">Sedikit Rusak</option>
                  </select>
              </div>

              <div class="form-group">
                <input class="input form-control" type="number" min="1" name="unit_barang" id="unit_barang" placeholder="Unit Barang" value="<?php echo $detail->unit_barang; ?>" required>
              </div>
              
                 
              <div class="form-group">
                <button class="btn btn-primary" type="submit" value="submit">Simpan</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->