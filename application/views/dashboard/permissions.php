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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>

    <title>Level and User Types by App</title>
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
    <div class="container px-0" ng-app="app-apps" ng-controller="apps-controller">
        <?php
        $this->load->view('dashboard/shared/top-bar');
        ?>
        <div class="row my-4">
            <div class="col-md-6">
                <p class="fs-5 text-end mt-2 text-light">Aplicacion</p>

            </div>
            <div class="col-md-6">
                <select class="form-select w-50 fs-5" ng-options="app as app.app_name for app in applications track by app.app_id" ng-model="selected_application" ng-change="selected_change()"></select>
            </div>
        </div>
        <div class="row" ng-if="selected_application">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5>Levels</h5>
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-success btn-lg form-inline text-end" data-bs-toggle="modal" data-bs-target="#addNewLevelModal">Add Level</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                        <table id="table-apps-levels" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Level Name</th>
                                    <th>Level Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="app_level in apps_levels">
                                    <td>{{app_level.level_name }}</td>
                                    <td>{{app_level.level_value}}</td>

                                    <td><button class="btn btn-danger" ng-click="remove_level(app_level)"><i class="fa-solid fa-trash"></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row my-3" ng-if="selected_application">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5>User Types</h5>
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-success btn-lg form-inline text-end" data-bs-toggle="modal" data-bs-target="#addNewTypeModal">Add user types</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table-apps-types" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Type Name</th>
                                    <th>Type Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="app_type in apps_types">
                                    <td>{{app_type.type_name }}</td>
                                    <td>{{app_type.type_value}}</td>
                                    <td><button class="btn btn-danger" ng-click="remove_type(app_type)"><i class="fa-solid fa-trash"></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addNewLevelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new User Level</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select name="mySelect" id="mySelect" class="form-select" ng-options="level.level_name for level in levels track by level.level_id" ng-model="selected_level"></select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="add_level()" data-bs-dismiss="modal">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addNewTypeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new User Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select name="mySelect" id="mySelect" class="form-select" ng-options="type.type_name for type in types track by type.type_id" ng-model="selected_type"></select>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="add_type()" data-bs-dismiss="modal">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <script>
        //set datatable init
        $(document).ready(function() {
            $('#table-apps-levels').DataTable();
            $('#table-apps-types').DataTable();
        });



        var app = angular.module('app-apps', []);

        app.controller('apps-controller', function($scope, $http, $httpParamSerializerJQLike) {


            $scope.applications = [];
            $scope.selected_application = null;

            $scope.levels = [];
            $scope.selected_level = null;
            $scope.apps_levels = [];

            $scope.types = [];
            $scope.selected_type = null;
            $scope.apps_types = [];



            $scope.init = function() {
                console.log('entering init');
                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application/all'
                }).then(function successCallback(response) {
                    $scope.applications = response.data;
                });

                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/level/get_all'
                }).then(function successCallback(response) {
                    console.log(response.data);
                    $scope.levels = response.data;
                });

                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/type/get_all'
                }).then(function successCallback(response) {
                    console.log(response.data);
                    $scope.types = response.data;
                });
            }

            $scope.selected_change = function() {
                console.log('selected_change' + $scope.selected_application.app_name);

                //Load Levels
                $scope.loadAppsLevels();

                //Load types
                $scope.loadAppsTypes();
            }

            $scope.loadAppsLevels = function() {
                console.log('loadAppsLevels');
                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application_level/all?app_id=' + $scope.selected_application.app_id
                }).then(function successCallback(response) {

                    console.log('asdf');
                    console.log(response.data);
                    $scope.apps_levels = response.data;
                });
            }


            /*
             $scope.levels = [];
             $scope.selected_level = null; 
             $scope.apps_levels = [];
            */
            $scope.add_level = function() {
                //console.log('add level');
                var data = {
                    app_id: $scope.selected_application.app_id,
                    level_id: $scope.selected_level.level_id
                };

                if ($scope.selected_level != null) {
                    console.log(data);
                    $http({
                        url: '<?php echo base_url() ?>index.php/application_level/add',
                        method: 'POST',
                        data: $httpParamSerializerJQLike(data),
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    }).then(function successCallback(response) {
                        console.log(response.data);
                        $scope.loadAppsLevels();
                    });
                }


                $scope.selected_level = null;
            }

            $scope.remove_level = function(app_level) {
                console.log(app_level);

                var data = {
                    app_id: $scope.selected_application.app_id,
                    level_id: app_level.level_id
                };


                $http({
                    url: '<?php echo base_url() ?>index.php/application_level/remove',
                    method: 'POST',
                    data: $httpParamSerializerJQLike(data),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    console.log(response.data);
                    $scope.loadAppsLevels();
                });


            }


            $scope.loadAppsTypes = function() {

                console.log('loadAppsTypes');
                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application_type/all?app_id=' + $scope.selected_application.app_id
                }).then(function successCallback(response) {

                    console.log('asdf');
                    console.log(response.data);
                    $scope.apps_types = response.data;
                });
            }




            $scope.add_type = function() {
                //console.log('add level');
                var data = {
                    app_id: $scope.selected_application.app_id,
                    type_id: $scope.selected_type.type_id
                };

                if ($scope.selected_type != null) {
                    console.log(data);
                    $http({
                        url: '<?php echo base_url() ?>index.php/application_type/add',
                        method: 'POST',
                        data: $httpParamSerializerJQLike(data),
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    }).then(function successCallback(response) {
                        console.log(response.data);
                        $scope.loadAppsTypes();
                    });
                }


                $scope.selected_type = null;
            }

            $scope.remove_type = function(app_type) {
                console.log(app_type);

                var data = {
                    app_id: $scope.selected_application.app_id,
                    type_id: app_type.type_id
                };


                $http({
                    url: '<?php echo base_url() ?>index.php/application_type/remove',
                    method: 'POST',
                    data: $httpParamSerializerJQLike(data),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function successCallback(response) {
                    console.log(response.data);
                    $scope.loadAppsTypes();
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