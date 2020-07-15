<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="Peminjaman Ruangan Fakultas Ilmu Sosial dan Politik UIN Bandung">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo.jpg') ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type='text/javascript' src="<?php echo base_url('assets/js/select2/dist/js/select2.min.js');?>"></script>
 

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo.jpg')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flag-icon.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cs-skin-elastic.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-select.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css')?>">
    <link href="<?php echo base_url('assets/css/lib/vector-map/jqvmap.min.css')?>" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.css')?>"/>

</head>

<body>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <!-- <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="<?php echo base_url('assets/images/uinsgd.jpg'); ?>" alt="Logo"></a>
                <a class="navbar-brand hidden"><img src="<?php echo base_url('assets/images/logo.jpg'); ?>" alt="Logo"></a>
            </div>


        </nav> -->

        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button style="width: 250px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand"><img src="<?php echo base_url('assets/images/uinsgd.jpg'); ?>" alt="Logo"></a>
                <a class="navbar-brand hidden"><img src="<?php echo base_url('assets/images/logo.jpg'); ?>" alt="Logo"></a>
            </div>
            <br>
            <div id="main-menu" class="main-menu collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->

                    <?php foreach ($menu2 as $menus) {
                        echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="' . site_url($menus->link) . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="' . $menus->icon . '"></i> ' . $menus->judul_menu . ' 
                        </a>';

                        $a = $menus->id;
                        $submenu = $this->db->query("SELECT * FROM sub_menu_user WHERE menu_id = '$a' ");

                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                        foreach ($submenu->result() as $sub) {
                            echo '<a class="dropdown-item" href="' . site_url($sub->link) . '">' . $sub->judul_submenu . '</a>';
                        }

                        echo "</div></li>";
                    } ?>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-file-o"></i> Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                </ul>


            </div>
        </nav>

    </aside><!-- /#left-panel -->

    <!-- Left Panel -->


    <div id="right-panel" class="right-panel">

        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left">
                        <div class="header-left">
                            <h3><?= $title; ?></h3>
                        </div>
                       
                    </div>
                    <div class="header-right">
                            <p>Welcome, <?php echo $this->session->userdata('nama'); ?> ! </p>
                        </div>

                </div>
            </div>
        </header><!-- /header <p><?php echo $this->session->set_userdata('nama'); ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->

        <?php $this->load->view($page) ?>


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/chart-js/Chart.bundle.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js')?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js');?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
    <script>
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.tanggal_kembali').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });
    </script>
   <!--jquery dan select2-->
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/select2/select2.min.js') ?>"></script>
        <script>
            $(document).ready(function () {
                $(".id_barang").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
        <script>
       $(function () {
    $('select').selectpicker();
});
</script>
</body>

</html>