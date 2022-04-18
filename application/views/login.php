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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Authentication</title>
</head>

<body>


  <div class="container-fluid px-0">
    <div class="container">
      <div class="row min-vh-100 py-5">
        <div class="col-12">

          <div class="card shadow-none border border-300 my-5" data-component-card>
            <div class="card-header p-4 border-bottom border-300 bg-soft">
              <div class="row g-3 justify-content-between align-items-end">
                <div class="row">
                  <div class="col-2">
                    <img src="<?php echo base_url() ?>/assets/img/logo.png" alt="Martech Logo" width="120">
                  </div>
                  <div class="col-10 ">
                    <h3 class="text-900 mb-0 mt-2">Login</h3>
                    <p class="mb-0 mt-2 text-800">Provide your email and password</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <form class="row g-3 m-3" method="post" action="<?php echo base_url() ?>index.php/login">

                <?php echo validation_errors('<div class="error">', '</div>'); ?>

                <?php
                if (isset($error)) {
                  //echo '<div class="error">' . $error . '</div>';
                  echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">';
                  echo  $error;
                  echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                  echo '</div>';
                }
                ?>

                <div class="col-md-12"><label class="form-label" for="inputName">Email</label>
                  <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="user">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <select class="form-select" id="inputState" name="domain">

                      <?php
                      foreach ($domains as $domain) {
                        echo '<option>' . $domain->domain_name . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>


                <div class="col-md-12"><label class="form-label" for="inputUserPassword">Password</label>
                  <input class="form-control" id="inputUserPassword" type="password" name="user_password">
                </div>

                <input name="from" hidden type="text" value="<?= $from ?>">


                <div class="btn-group mt-3">

                  <?php
                  if (!$from) {
                    echo '<button class="btn btn-secondary" type="submit">CANCEL</button>';
                  }
                  ?>

                  <button class="btn btn-primary " type="submit">LOGIN</button>

                </div>


              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>