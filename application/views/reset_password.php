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
    <link href="<?= base_url() ?>assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="<?= base_url() ?>assets/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= base_url() ?>assets/angular-1.8.2/angular.min.js"></script>

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
    <div class="container" ng-app="app-apps" ng-controller="apps-controller">
        <div class="row py-5">
            <div class="card col-6 m-auto d-block">


                <div class="text-center mt-4" data-component-card>
                    <img src="<?php echo base_url() ?>/assets/img/logo.png" alt="Martech Logo" width="120">
                    <h3 class="text-900 mb-0 mt-1">Generar Nuevo Password</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row g-3 m-3">


                        <div class="col-md-12" ng-show="step==1"><label class="form-label" for="inputName">Correo</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Email" ng-model="user" aria-label="email" aria-describedby="basic-addon1" name="user">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <select class="form-select" id="inputState" name="domain" ng-model="domain">
                                    <?php
                                    foreach ($domains as $domain) {
                                        echo '<option>' . $domain->domain_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary" ng-show="step==1" ng-disabled="user==''" ng-click="send_email()">
                            Enviar Correo de Recuperación
                        </button>


                        <div class="col-md-12" ng-show="step==2"><label class="form-label" for="inputName">Codigo</label>
                            <div class="input-group mb-3">
                                <input class="form-control ms-1 me-1" type="text" placeholder="" ng-model="code1">
                                <input class="form-control ms-1 me-1" type="text" placeholder="" ng-model="code2">
                                <input class="form-control ms-1 me-1" type="text" placeholder="" ng-model="code3">
                                <input class="form-control ms-1 me-1" type="text" placeholder="" ng-model="code4">
                                <input class="form-control ms-1 me-1" type="text" placeholder="" ng-model="code5">
                                <input class="form-control ms-1 me-1" type="text" placeholder="" ng-model="code6">
                            </div>
                        </div>

                        <div class="col-md-6" ng-show="step==2"><label class="form-label" for="inputName">Contraseña</label>
                            <input class="form-control ms-1 me-1" type="password" placeholder="" ng-model="password">
                        </div>

                        <div class="col-md-6" ng-show="step==2"><label class="form-label" for="inputName">Confirme Contraseña</label>
                            <input class="form-control ms-1 me-1" type="password" placeholder="" ng-model="password2">
                        </div>

                        <button class="btn btn-primary" ng-show="step==2" ng-disabled="code1=='' || code2=='' || code3=='' || code4=='' || code5=='' ||code6=='' || password =='' || password2 =='' " ng-click="set_password()">
                            Generar Nuevo Password
                        </button>

                        <div ng-show="step==3">
                            <p class="bg-primary">Se pudo realizar el cambio de password, Cierre esta pantalla e ingrese de nuevo.</p>
                        </div>

                    </div>
                </div>



            </div>

        </div>
    </div>
    </div>

    <script src="<?= base_url() ?>assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var app = angular.module('app-apps', []);
        app.controller('apps-controller', function($scope, $http, $httpParamSerializerJQLike) {

            $scope.step = 0;
            $scope.user = '';
            $scope.domain = '<?php echo $domains[0]->domain_name ?>';


            $scope.code1 = '';
            $scope.code2 = '';
            $scope.code3 = '';
            $scope.code4 = '';
            $scope.code5 = '';
            $scope.code6 = '';

            $scope.password = '';
            $scope.password2 = '';

            $scope.init = function() {
                $scope.step = 1;
                console.log('Entering here');
            }

            $scope.send_email = function() {
                var email_to_send = $scope.user + '@' + $scope.domain;
                console.log(email_to_send);

                var data = {
                    email: email_to_send
                };
                $http({
                    url: '<?= base_url() ?>index.php/send-email-recovery',
                    method: 'POST',
                    data: $httpParamSerializerJQLike(data), // Make sure to inject the service you choose to the controller
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' // Note the appropriate header
                    }
                }).then(function(response) {

                    console.log(response);

                    if (response.data.response == 'ok') {
                        $scope.step = 2;
                    } else if (response.data.response == 'fail') {
                        Swal.fire(
                            'Revisa el Password!',
                            $scope.data.message,
                            'error'
                        )
                    }

                }).catch((error) => {
                    console.log(error);
                });
            }



            $scope.set_password = function() {

                if ($scope.password != $scope.password2) {
                    console.log('El passsword es diferente');
                    Swal.fire(
                        'Revisa el Password!',
                        'El password y la confirmacion del Password no coinciden',
                        'error'
                    )
                    return;
                }

                var code_to_send = $scope.code1.toString() + $scope.code2.toString() + $scope.code3.toString() + $scope.code4.toString() + $scope.code5.toString() + $scope.code6.toString();
                var email_to_send = $scope.user + '@' + $scope.domain;
                var data = {
                    email: email_to_send,
                    code: code_to_send,
                    password: $scope.password
                };

                $http({
                    url: '<?= base_url() ?>index.php/reset-password-with-code',
                    method: 'POST',
                    data: $httpParamSerializerJQLike(data), // Make sure to inject the service you choose to the controller
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' // Note the appropriate header
                    }
                }).then(function(response) {

                    console.log(response);

                    if (response.data.response == 'ok') {
                        $scope.step = 3;
                    } else if (response.data.response == 'fail') {
                        Swal.fire(
                            'Revisa el Password!',
                            $scope.data.message,
                            'error'
                        )
                    }

                }).catch((error) => {
                    console.log(error);
                });


            }

            $scope.init();
        });
    </script>
</body>

</html>