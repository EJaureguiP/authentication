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

              <div class="text-center mb-7">
                <h3>Account Registration</h3>
                <p class="text-700">Get access with your martech email</p>
              </div>
              
              <form class="row g-3">
                        <div class="col-md-12"><label class="form-label" for="inputName">Email</label> 
                          <div class="input-group mb-3">   
                            <input class="form-control" type="text" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control" type="text" placeholder="Username" aria-label="server" aria-describedby="basic-addon1">
                          </div>               
                        </div>
                    
                        
                        <div class="col-md-6"><label class="form-label" for="inputName">Name</label> <input class="form-control" id="inputEmail4" type="text"></div>
                        <div class="col-md-6"><label class="form-label" for="inputLastname">Lastname</label> <input class="form-control" id="inputPassword4" type="text"></div>
                       
                        
                        <div class="col-12"><label class="form-label" for="inputAddress">Address</label> <input class="form-control" id="inputAddress" placeholder="1234 Main St"></div>
                        <div class="col-12"><label class="form-label" for="inputAddress2">Address 2</label> <input class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"></div>
                        <div class="col-md-6"><label class="form-label" for="inputCity">City</label> <input class="form-control" id="inputCity"></div>
                        <div class="col-md-4"><label class="form-label" for="inputState">State</label> <select class="form-select" id="inputState">
                            <option selected="selected">Choose...</option>
                            <option>...</option>
                          </select></div>
                        <div class="col-md-2"><label class="form-label" for="inputZip">Zip</label> <input class="form-control" id="inputZip"></div>
                        <div class="col-12">
                          <div class="form-check"><input class="form-check-input" id="gridCheck" type="checkbox"> <label class="form-check-label" for="gridCheck">Check me out</label></div>
                        </div>
                        <div class="col-12"><button class="btn btn-primary" type="submit">Sign in</button></div>
                      </form>
                  
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="<?php echo base_url() ?>/vendor/public/assets/js/phoenix.js"></script>
  </body>

</html>