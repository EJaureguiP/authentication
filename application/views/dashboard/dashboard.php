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
        <?php
        $this->load->view('dashboard/shared/top-bar');
        ?>
        <div class="container">
            <div class="row py-5">
                <div class="card col-6 m-auto d-block">
                    <div class="row p-5">
                        <!--<div class="col-md-6 text-center">
                            <a href="<?php echo base_url() ?>index.php/dashboard/apps" class="text-decoration-none text-dark">
                                <div class="card">
                                    <img style="width:4rem;  display: block; margin: auto;  margin-top: 3rem; margin-bottom: 3rem;" src="<?php echo base_url() ?>/assets/img/list.png" alt="List">
                                    <h5 style="margin-bottom: 3rem;">Applications</h5>
                                </div>
                            </a>
                        </div>-->
                        <?php if ($this->session->user_is_admin == 1) : ?>
                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url() ?>index.php/dashboard/users" class="text-decoration-none text-dark">
                                    <div class="card">
                                        <img style="width:4rem;  display: block; margin: auto;  margin-top: 3rem; margin-bottom: 3rem;" src="<?php echo base_url() ?>/assets/img/connection.png" alt="List">
                                        <h5 style="margin-bottom: 3rem;">Users</h5>
                                    </div>
                                </a>
                            </div>
                        <?php else : ?>

                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url() ?>index.php/dashboard/user/update_profile?user_id=<?php echo $this->session->user_id ?>" class="text-decoration-none text-dark">
                                    <div class="card">
                                        <img style="width:4rem;  display: block; margin: auto;  margin-top: 3rem; margin-bottom: 3rem;" src="<?php echo base_url() ?>/assets/img/connection.png" alt="List">
                                        <h5 style="margin-bottom: 3rem;">Editar Perfil</h5>
                                    </div>
                                </a>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="<?= base_url() ?>assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>