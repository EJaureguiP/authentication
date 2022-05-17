<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="<?= base_url() ?>assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Authentication</title>
</head>
<style>
  body {
    height: 100vh;
    background-repeat: no-repeat;
    background-size: contain;
    background: #014a8f;
    /* Old browsers */
    background: -moz-linear-gradient(top, #014a8f 0%, #0082b2 100%);
    /* FF3.6-15 */
    background: -webkit-linear-gradient(top, #014a8f 0%, #0082b2 100%);
    /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, #014a8f 0%, #0082b2 100%);
    /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#014a8f', endColorstr='#0082b2', GradientType=0);
    /* IE6-9 */
  }
</style>

<body>

  <div class="container px-0">

    <nav class="navbar navbar-dark navbar-top navbar-expand">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
          <li class="nav-item"><a class="nav-link active" aria-current="page" id="navbarDropdownNotification" href="<?php echo base_url() ?>index.php/home/login">INGRESAR</a></li>
         <!--<li class="nav-item"><a class="nav-link" aria-current="page" id="navbarRegister" href="<?php echo base_url() ?>index.php/home/register">REGISTRAR</a></li> -->
        </ul>
      </div>
    </nav>

    <div class="content pt-2">


    </div>

  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <script src="<?= base_url() ?>assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>