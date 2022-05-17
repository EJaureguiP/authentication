<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>vendor/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Authentication</title>
</head>
<style>
    body {
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
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
    <div class="container">
        <div class="row py-5">
            <div class="card col-6 m-auto d-block">
                <div class="text-center mt-4" data-component-card>
                    <img src="<?php echo base_url() ?>/assets/img/logo.png" alt="Martech Logo" width="120">
                    <h3 class="text-900 mb-0 mt-5">Login</h3>
                    <p class="mb-0 mt-2 text-800">Provide your email and password</p>
                </div>
                <div class="card-body p-0">
                    <form class="row g-3 m-3" method="post" action="
                        <?php
                        $url = base_url() . 'index.php/login';

                        if (isset($from)) {
                            $url .= '?from=' . $from;
                        }

                        echo $url;
                        ?>">

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
                                echo '<a class="btn btn-secondary mb-3" href="' . base_url() . 'index.php">CANCEL</a>';
                            }
                            ?>

                            <button class="btn btn-danger mb-3" type="submit">LOGIN</button>
                        </div>
                    </form>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="<?= base_url() ?>vendor/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>