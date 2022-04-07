<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>/vendor/public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>/vendor/public/assets/css/phoenix.min.css" rel="stylesheet" id="style-default">
    <link href="<?php echo base_url() ?>/vendor/public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <style>
      body {
        opacity: 0;
      }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <div class="container">
          <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-8 col-xxl-6">
              
              <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
                <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/icons/logo.jpg" alt="phoenix" width="240"></div>
              </a>

              
              <div class="card shadow-none border border-300 my-5" data-component-card>
                  <div class="card-header p-4 border-bottom border-300 bg-soft">
                    <div class="row g-3 justify-content-between align-items-end">
                      <div class="col-12 col-md">
                        <h3 class="text-900 mb-0" >Login</h3>
                        <p class="mb-0 mt-2 text-800">Provide your email and password</p>
                      </div>
                     
                    </div>
                  </div>
                  <div class="card-body p-0">
                  <form class="row g-3 m-3" method="post" action="<?php echo base_url() ?>index.php/login">

                  <?php echo validation_errors('<div class="error">', '</div>'); ?>

                        <div class="col-md-12"><label class="form-label" for="inputName">Email</label> 
                          <div class="input-group mb-3">   
                            <input class="form-control" type="text" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="user">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <select class="form-select" id="inputState" name="domain">
                                                  
                            <?php 
                              foreach($domains as $domain)
                              {
                                echo '<option>' . $domain->domain_name . '</option>';
                              }
                            ?>
                            </select>
                          </div>               
                        </div>
                    
                      
                        <div class="col-md-12"><label class="form-label" for="inputUserPassword">Password</label> <input class="form-control" id="inputUserPassword" type="password" name="user_password"></div>
                      
                        <div class="row flex-center mt-3">
                        <div class="col-auto "><button class="btn btn-secondary" type="submit">CANCEL</button></div>
                        <div class="col-auto "><button class="btn btn-primary" type="submit">LOGIN</button></div>
                        </div>
                  

                      </form>
                  </div>
              </div>



                      
                  
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="<?php echo base_url() ?>/vendor/public/assets/js/phoenix.js"></script>
  </body>

</html>