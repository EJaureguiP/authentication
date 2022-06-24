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



    <script src="<?= base_url() ?>assets/angular-1.8.2/angular.min.js"></script>
    <script src="<?= base_url() ?>assets/sweetalert2/sweetalert2.all.min.js"></script>

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
    <div class="container px-0" ng-app="app-user" ng-controller="user-controller">
        <?php
        $this->load->view('dashboard/shared/top-bar');
        ?>
        <div>
            <h3 class="text-light">
                <?php
                if (isset($user_id)) {
                    echo "Actualizar Datos del Usuario";
                } else {
                    echo "Crear Usuario";
                }
                ?>

            </h3>

            <div class="card">
                <div class="card-header">
                    Informacion del Usuario
                </div>
                <div class="card-body">
                    <form class="row ">

                        <div class="row my-2">
                            <div class="col">
                                <label for="staticEmail">Correo Electrónico</label>
                                <input type="text" ng-model="user.user_email" class="form-control" id="staticEmail" value="" disabled>
                            </div>

                            <div class="col">
                                <label for="staticEmail">Dominio del Correo</label>
                                <select ng-model="user.user_domain" ng-options="domain as domain.domain_name for domain in domains track by domain.domain_id" class="form-control" disabled></select>
                            </div>

                            <div class="col">
                                <label for="staticMartechSign">Firma Martech</label>
                                <input type="text" ng-model="user.user_martech_sign" class="form-control" id="staticMartechSign" value="">
                            </div>

                        </div>
                        <div class="row my-2">

                            <div class="col">
                                <label for="staticName">Nombre(s)</label>
                                <input type="text" ng-model="user.user_name" class="form-control" id="staticName" value="">
                            </div>

                            <div class="col">
                                <label for="staticLastname">Apellido(s)</label>
                                <input type="text" ng-model="user.user_lastname" class="form-control" id="staticLastname" value="">
                            </div>
                        </div>


                        <div class="row my-2">

                            <div class="col">
                                <label for="staticEmail">Departmento</label>
                                <select ng-model="user.user_department" ng-options="dep as dep.department_name for dep in departments track by dep.department_id" class="form-control" disabled></select>
                            </div>

                            <div class="col">

                                <label for="staticEmail">Planta</label>
                                <select ng-model="user.user_plant" ng-options="plant as plant.plant_name for plant in plants track by plant.plant_id" class="form-control" disabled></select>
                            </div>

                            <div class="col">
                                <label for="staticEmail">Turno</label>
                                <select ng-model="user.user_shift" ng-options="shift as shift.shift_name for shift in shifts track by shift.shift_id" class="form-control" disabled></select>
                            </div>

                        </div>


                        <div class="row my-2">

                            <div class="col">
                                <label for="staticName">Número Martech</label>
                                <input type="text" class="form-control" ng-model="user.user_martech_number" id="staticName" value="" disabled>
                            </div>
                            <div class="col">
                                <label for="staticLastname">Teléfono</label>
                                <input type="text" class="form-control" id="staticLastname" ng-model="user.user_phone" value="">
                            </div>


                        </div>
                    </form>
                </div>
            </div>

            <div class="card my-2">
                <div class="card-header">
                    Apps Permissions
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">User Level</label>
                            </div>
                            <div class="col-auto">

                                <select ng-model="user.user_level" ng-options="level as level.level_name for level in levels track by level.level_id" class="form-control" disabled></select>

                                <!--
                                <select class="form-select" aria-label="Default select example">
                                    <option ng-repeat="level in levels" value="{{level.level_id}}" ng-model="user.user_level_id">{{level.level_name}}</option>
                                </select>
                                -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 col-3 mx-auto my-4">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/dashboard">Cancelar</a>
                    <button class="btn btn-danger" type="submit" ng-click="save()">Guardar</button>
                </div>
            </div>

        </div>




    </div>

    <script>
        var app = angular.module('app-user', []);

        app.controller('user-controller', function($scope, $http, $httpParamSerializerJQLike) {

            $scope.domains = [];
            $scope.departments = [];
            $scope.levels = [];
            $scope.plants = [];
            $scope.shifts = [];

            $scope.user_id = null;

            $scope.user = {};

            $scope.init = function(user_id = null) {
                $scope.user_id = user_id;
                $scope.loadData();
            }


            $scope.loadData = function() {
                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/user/get_user_data'
                }).then(function successCallback(response) {
                    console.log(response.data);
                    $scope.levels = response.data.levels;
                    $scope.domains = response.data.domains;
                    $scope.departments = response.data.departments;
                    $scope.plants = response.data.plants;
                    $scope.shifts = response.data.shifts;
                    $scope.loadUser();
                });
            }


            $scope.loadUser = function() {
                if ($scope.user_id != null) {
                    console.log('Hay que cargar el user_id');

                    $http({
                        method: 'get',
                        url: '<?= base_url() ?>index.php/user/get_user?user_id=' + $scope.user_id
                    }).then(function successCallback(response) {
                        $scope.user = response.data[0];

                        $email_splitted = $scope.user.user_email.split('@');
                        $scope.user.user_email = $email_splitted[0];

                        const foundDomain = $scope.domains.filter(domain => domain.domain_name == $email_splitted[1]);
                        //search domain name
                        $scope.user.user_domain = foundDomain[0];

                        $scope.user.user_password = '';
                        $scope.user.user_retype = '';

                        const departmentFound = $scope.departments.filter(dep => dep.department_id == $scope.user.user_department_id);
                        $scope.user.user_department = departmentFound[0];

                        const LevelFound = $scope.levels.filter(level => level.level_id == $scope.user.user_level_id);
                        $scope.user.user_level = LevelFound[0];

                        console.log('user level found ' + $scope.user.user_level);

                        $scope.user.user_active = $scope.user.user_active == 1 ? true : false;
                        $scope.user.user_is_admin = $scope.user.user_is_admin == 1 ? true : false;

                        const plantFound = $scope.plants.filter(plant => plant.plant_id == $scope.user.user_plant_id);
                        $scope.user.user_plant = plantFound[0];

                        const shiftFound = $scope.shifts.filter(shift => shift.shift_id == $scope.user.user_shift_id);
                        $scope.user.user_shift = shiftFound[0];

                    });

                } else {
                    //Por default seleccionar el primer dominio que traiga de la base de datos...
                    $scope.user.user_domain = $scope.domains[0];
                }
            }

            $scope.save = function() {

                if ($scope.user.user_name == undefined || $scope.user.user_lastname == undefined || $scope.user.user_password == undefined || $scope.user.user_department == undefined || $scope.user.user_martech_sign == undefined) {

                    console.log($scope.user);
                    Swal.fire(
                        'No se pudo realizar!',
                        'You need to set user name, martech sign,  lastname, department and password.',
                        'error'
                    )
                    return;
                }


                var data = {
                    user_id: $scope.user.user_id,
                    user_martech_sign: $scope.user.user_martech_sign,
                    user_name: $scope.user.user_name,
                    user_lastname: $scope.user.user_lastname,
                    user_phone: $scope.user.user_phone,
                };


                $http({
                    url: '<?php echo base_url() ?>index.php/user/save_individual_profile',
                    method: 'POST',
                    data: $httpParamSerializerJQLike(data),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    console.log(response.data);

                    if (response.data.result == 'fail') {
                        Swal.fire(
                            'No se pudo realizar!',
                            response.data.error,
                            'error'
                        )
                    } else {

                        Swal.fire(
                            'Actualizado!',
                            'Se ha actualizado correctamente su perfil de usuario.',
                            'success'
                        ).then((result) => {
                            window.location.href = "<?php echo SERVER_PATH_URL; ?>authentication/index.php/dashboard";
                        })


                    }


                });
            }


            $scope.init(
                <?php
                if (isset($user_id)) {
                    echo "'" . $user_id . "'";
                } ?>);

        });
    </script>


    <!-- Optional JavaScript; choose one of the two! -->

    <script src="<?= base_url() ?>assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>