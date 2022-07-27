<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

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
                    echo "Update Password for ";
                } else {
                    echo "Create User";
                }
                ?>
                {{ user.user_name }} {{ user.user_lastname }}
            </h3>

            <div class="card">
                <div class="card-header">
                    User Info
                </div>
                <div class="card-body">
                    <form class="row ">



                        <div class="row my-2">
                            <div class="col">
                                <label for="staticEmail">Password</label>
                                <input type="password" ng-model="user.user_password" class="form-control" value="">
                            </div>
                            <div class=" col">
                                <label for="staticName">Retype Password</label>
                                <input type="password" ng-model="user.user_retype" class="form-control" value="">
                            </div>
                        </div>





                    </form>
                </div>
            </div>

            <div class="d-grid gap-2 col-3 mx-auto my-4">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/dashboard/users">Cancel</a>
                    <button class="btn btn-danger" type="submit" ng-click="save()">Save</button>
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

                        $scope.user.user_password = '';
                        $scope.user.user_retype = '';

                    });

                } else {
                    //Por default seleccionar el primer dominio que traiga de la base de datos...
                    $scope.user.user_domain = $scope.domains[0];
                }
            }

            $scope.save = function() {

                if ($scope.user.user_password == undefined || $scope.user.user_password == '') {
                    console.log($scope.user);
                    Swal.fire(
                        'Could not be done!',
                        'You need to set the password.',
                        'error'
                    )
                    return;
                }


                if (!($scope.user.user_password == $scope.user.user_retype)) {
                    Swal.fire(
                        'Could not be done!',
                        'Both fields of password must be equal.',
                        'error'
                    )
                    return;
                }


                var data = {
                    user_id: $scope.user.user_id,
                    user_password: $scope.user.user_password,
                };


                $http({
                    url: '<?php echo base_url() ?>index.php/user/save_password',
                    method: 'POST',
                    data: $httpParamSerializerJQLike(data),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    console.log(response.data);

                    if (response.data.result == 'fail') {
                        Swal.fire(
                            'Could not be done!',
                            response.data.error,
                            'error'
                        )
                    } else {
                        window.location.href = "<?php echo SERVER_PATH_URL; ?>authentication/index.php/dashboard/users";
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