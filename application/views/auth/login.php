<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta name="description" content="Peminjaman Barang">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/uinsgd.jpg') ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/flag-icon.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/cs-skin-elastic.css') ?>">


  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
  <!--
     <?= $this->session->flashdata('message') ?>

  <div class="sufee-login d-flex align-content-center flex-wrap" >
  
        <div class="container">
      
            <div class="login-content">
      <div class="card">
      
      <div class="card-header">Form Login</div>
                <div class="login-form">
         <img src="<?php echo base_url('assets/uinsgd.jpg') ?> "
             <form class="user" action="<?= base_url('auth/index') ?>" method="post" >
                        
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input class="form-control" name="username" id="username" type="username" placeholder="Username" >
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
                        </div>
                        <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>             
                <input class="form-control" name="password" id="password" type="password" placeholder="Password" >
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
                        </div>
                       
                        <input type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="Login">
                        
                    </form>
                </div>
            </div>
      </div>
        </div>
    </div> -->


  <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>


  <div class="container">

    <body background="<?php echo base_url('assets/uinsgd.jpg') ?>">
      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-lg-8">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Sistem Peminjaman Ruangan dan Barang</h1>
                    </div>
                    <?= $this->session->flashdata('message') ?>

                    <form class="user" method="post" action="<?= base_url('auth/index') ?>">
                      <div class="form-group">
                        <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

  </div>

</body>


</html>