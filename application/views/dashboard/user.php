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
                    echo "Update User";
                } else {
                    echo "Create User";
                }
                ?>

            </h3>

            <div class="card">
                <div class="card-header">
                    User Info
                </div>
                <div class="card-body">
                    <form class="row ">

                        <div class="row my-2">
                            <div class="col">
                                <label for="staticEmail">User name (Email)</label>
                                <input type="text" ng-model="user.user_email" class="form-control" id="staticEmail" value="">
                            </div>

                            <div class="col">
                                <label for="staticEmail">Domain</label>
                                <select ng-model="user.user_domain" ng-options="domain as domain.domain_name for domain in domains track by domain.domain_id" class="form-control"></select>
                            </div>


                        </div>
                        <div class="row my-2">

                            <div class="col">
                                <label for="staticName">Name</label>
                                <input type="text" ng-model="user.user_name" class="form-control" id="staticName" value="">
                            </div>
                            <div class="col">
                                <label for="staticLastname">Lastname</label>
                                <input type="text" ng-model="user.user_lastname" class="form-control" id="staticLastname" value="">
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col">
                                <label for="staticEmail">Password</label>
                                <input type="text" ng-model="user.user_password" class="form-control" value="">
                            </div>
                            <div class=" col">
                                <label for="staticName">Retype Password</label>
                                <input type="text" ng-model="user.user_retype" class="form-control" value="">
                            </div>
                        </div>


                        <div class="row my-2">

                            <div class="col">
                                <label for="staticEmail">Department</label>

                                <select ng-model="user.user_department" ng-options="dep as dep.department_name for dep in departments track by dep.department_id" class="form-control"></select>


                            </div>

                            <div class="col">
                                <label for="staticName">Martech Number</label>
                                <input type="text" class="form-control" ng-model="user.user_martech_number" id="staticName" value="">
                            </div>
                            <div class="col">
                                <label for="staticLastname">Phone</label>
                                <input type="text" class="form-control" id="staticLastname" ng-model="user.user_phone" value="">
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col">
                            </div>

                            <div class="col">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" ng-model="user.user_active">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Active
                                    </label>
                                </div>
                            </div>


                            <div class="col">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" ng-model="user.user_is_admin">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Admin
                                    </label>
                                </div>
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

                                <select ng-model="user.user_level" ng-options="level as level.level_name for level in levels track by level.level_id" class="form-control"></select>

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

                    });

                }
            }

            $scope.save = function() {

                if ($scope.user.user_name == undefined || $scope.user.user_lastname == undefined || $scope.user.user_password == undefined || $scope.user.user_department == undefined) {

                    console.log($scope.user);
                    Swal.fire(
                        'Could not be done!',
                        'You need to set user name, lastname, department and password.',
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


                if (($scope.user.user_level == undefined)) {
                    Swal.fire(
                        'Could not be done!',
                        'Please select a User Level',
                        'error'
                    )
                    return;
                }

                var data = {
                    user_id: $scope.user.user_id,
                    user_email: $scope.user.user_email + '@' + $scope.user.user_domain.domain_name,
                    user_password: $scope.user.user_password,
                    user_name: $scope.user.user_name,
                    user_lastname: $scope.user.user_lastname,
                    user_department_id: parseInt($scope.user.user_department.department_id),
                    user_martech_number: $scope.user.user_martech_number,
                    user_phone: $scope.user.user_phone,
                    user_active: ($scope.user.user_active) ? 1 : 0,
                    user_is_admin: ($scope.user.user_is_admin) ? 1 : 0,
                    user_level_id: parseInt($scope.user.user_level.level_id),
                };

                //console.log(data);

                //if (true) return;

                $http({
                    url: '<?php echo base_url() ?>index.php/user/save',
                    method: 'POST',
                    data: $httpParamSerializerJQLike(data),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    console.log(response.data);
                    window.location.href = "<?php echo SERVER_PATH_URL; ?>authentication/index.php/dashboard/users";
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