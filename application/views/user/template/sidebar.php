
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="<?php echo base_url('assets/images/uinsgd.jpg');?>" alt="Logo"></a>
                <a class="navbar-brand hidden"><img src="<?php echo base_url('assets/images/logo.jpg');?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    <li class="active">
                        <a href="<?php echo site_url('Admin/index')?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Crudbarang/kebarang')?>"> <i class="menu-icon fa fa-tasks"></i>Daftar Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Crudruangan/keruangan')?>"> <i class="menu-icon fa fa-tasks"></i>Daftar Ruangan</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Crudpinjambarang/kepinjambarang')?>"> <i class="menu-icon fa fa-file-o"></i>Form Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Crudpinjambarang/kepinjambarang')?>"> <i class="menu-icon fa fa-file-o"></i>Form Ruangan</a>
                    </li>
          <li>
                        <a href="<?php echo site_url('Laporanbarang/kelaporan')?>"> <i class="menu-icon fa fa-print"></i>Laporan Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Laporanbarang/kelaporan')?>"> <i class="menu-icon fa fa-print"></i>Laporan Ruangan</a>
                    </li>
          <li>
            <a href="<?php echo site_url('Login/keluar')?>"> <i class="menu-icon fa fa fa-sign-out"></i>  Logout</a>
          </li>
                    
          </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->