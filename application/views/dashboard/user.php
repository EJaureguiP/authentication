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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Authentication</title>
</head>

<body>

    <div class="container px-0" ng-app="app-user" ng-controller="user-controller">

        <?php
        $this->load->view('dashboard/shared/top-bar');
        ?>

        <?php
        echo form_open('user/create');
        ?>

        <div>


            <h3>Create New User</h3>

            <div class="card">
                <div class="card-header">
                    User Info
                </div>

                <div class="card-body">
                    <form class="row ">

                        <div class="row my-2">
                            <div class="col">
                                <label for="staticEmail">Email</label>
                                <input type="email" name="user_email" class="form-control" id="staticEmail" value="">
                            </div>
                            <div class="col">
                                <label for="staticName">Name</label>
                                <input type="text" name="user_name" class="form-control" id="staticName" value="">
                            </div>
                            <div class="col">
                                <label for="staticLastname">Lastname</label>
                                <input type="text" name="user_lastname" class="form-control" id="staticLastname" value="">
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col">
                                <label for="staticEmail">Password</label>
                                <input type="email" name="user_password" class="form-control" id="staticEmail" value="">
                            </div>
                            <div class="col">
                                <label for="staticName">Retype Password</label>
                                <input type="text" name="user_retype_password" class="form-control" id="staticName" value="">
                            </div>
                        </div>


                        <div class="row my-2">

                            <div class="col">
                                <label for="staticEmail">Department</label>

                                <select name="user_department_id" class="form-control">
                                    <option>No selection</option>
                                    <?php
                                    foreach ($departments as $dep) {
                                        echo '<option value="' . $dep['department_id'] . '">' . $dep['department_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col">
                                <label for="staticName">Martech Number</label>
                                <input type="text" class="form-control" name="user_martech_number" id="staticName" value="">
                            </div>
                            <div class="col">
                                <label for="staticLastname">Phone</label>
                                <input type="text" class="form-control" id="staticLastname" name="user_phone" value="">
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col">
                            </div>

                            <div class="col">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="user_active" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="col">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="user_is_admin" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Admin
                                    </label>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>

            </div>


            <div class="card">
                <div class="card-header">
                    Apps Permissions
                </div>

                <div class="card-body">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">App Name</th>
                                <th scope="col">User Level</th>
                                <th scope="col">User Type</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr ng-repeat="user_permission in user_permissions">
                                <th scope="row">{{user_permission.app_name}}</th>

                                <th scope="row">
                                    <select class="form-select" aria-label="Default select example">

                                        <option ng-repeat="app_level in apps_levels">{{app_level.level_name}}</option>


                                    </select>
                                </th>
                                <th scope="row">
                                    <select class="form-select" aria-label="Default select example">
                                        <option ng-repeat="app_type in apps_types">{{app_type.type_name}}</option>
                                    </select>
                                </th>
                            </tr>

                        </tbody>
                    </table>

                    <?php




                    ?>

                </div>

            </div>


            <div class="d-grid gap-2 col-3 mx-auto">
                <div class="btn-group">
                    <button class="btn btn-secondary mx-2" type="button">Cancel</button>
                    <button class="btn btn-primary mx-2" type="submit">Save</button>
                </div>
            </div>

        </div>

        </form>


    </div>

    <script>
        var app = angular.module('app-user', []);

        app.controller('user-controller', function($scope, $http, $httpParamSerializerJQLike) {

            $scope.user_permissions = [];

            $scope.apps_levels = [];
            $scope.apps_types = [];

            $scope.init = function() {

                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/user/permissions'
                }).then(function successCallback(response) {
                    $scope.user_permissions = response.data;
                    console.log('tenemos esto');
                    console.log($scope.user_permissions);
                });


                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/user/get_apps_levels'
                }).then(function successCallback(response) {
                    $scope.apps_levels = response.data;
                    console.log($scope.apps_levels);
                });

                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/user/get_apps_types'
                }).then(function successCallback(response) {
                    $scope.apps_types = response.data;
                    console.log($scope.apps_types);
                });

            }

            $scope.init();

        });
    </script>


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