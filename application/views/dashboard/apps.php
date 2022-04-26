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
    <div class="container px-0" ng-app="app-apps" ng-controller="apps-controller">
        <?php
        $this->load->view('dashboard/shared/top-bar');
        ?>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">Applications</h5>
                    <div class="card-body">


                        <table id="table-apps" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Identifier</th>
                                    <th>Site Url</th>
                                    <th>Site Image</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr ng-repeat="app in applications" class="{{app.selected}}" ng-click="set_selection(app)">
                                    <td>{{app.app_name }}</td>
                                    <td>{{app.app_identifier}}</td>
                                    <td>{{app.app_site_url}}</td>
                                    <td>{{app.app_image_url}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h5>App</h5>
                            </div>
                            <div class="p-2 bd-highlight"> <button type="button" class="btn btn-outline-success d-flex " ng-disabled="!buttons.new.enabled" ng-click="action_new()">New</button></div>
                            <div class="p-2 bd-highlight"><button type="button" class="btn btn-outline-info d-flex " ng-disabled="!buttons.edit.enabled" ng-click="action_edit()">Edit</button></div>
                            <div class="p-2 bd-highlight"><button type="button" class="btn btn-outline-danger d-flex " ng-disabled="!buttons.cancel.enabled" ng-click="action_cancel()">Cancel</button></div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form>
                            <input type="text" hidden ng-model="form.app_id.value">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">App Name</label>
                                <input type="text" class="form-control" ng-model="form.app_name.value" ng-disabled="!form.app_name.enabled" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Identifier</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" ng-model="form.app_identifier.value" ng-disabled="!form.app_identifier.enabled">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Site Url</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" ng-model="form.app_site_url.value" ng-disabled="!form.app_site_url.enabled">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Image Url</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" ng-model="form.app_image_url.value" ng-disabled="!form.app_image_url.enabled">
                            </div>
                            <button class="btn btn-danger btn-lg" ng-disabled="!buttons.save.enabled" ng-click="action_save()">Guardar</button>

                            <p ng-if="error">{{error}}</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //set datatable init
        $(document).ready(function() {
            $('#table-apps').DataTable();
        });

        var app = angular.module('app-apps', []);

        app.controller('apps-controller', function($scope, $http, $httpParamSerializerJQLike) {

            const STATE_NONE = 0;
            const STATE_CREATE_NEW = 1;
            const STATE_SAVE = 2;

            const STATE_SELECTED = 3;
            const STATE_EDIT = 4;

            $scope.form = {
                app_id: {
                    value: '',
                    enabled: false
                },
                app_name: {
                    value: '',
                    enabled: false
                },
                app_identifier: {
                    value: '',
                    enabled: false
                },
                app_site_url: {
                    value: '',
                    enabled: false
                },
                app_image_url: {
                    value: '',
                    enabled: false
                },
            }

            $scope.buttons = {
                new: {
                    enabled: true
                },
                edit: {
                    enabled: false
                },
                cancel: {
                    enabled: false
                },
                save: {
                    enabled: false
                },
            }
            $scope.error = null;

            $scope.applications = [];
            $scope.selected_application = null;

            $scope.state = STATE_NONE;
            $scope.last_state = STATE_NONE;

            $scope.init = function() {
                console.log('entering init');
                $scope.setstate(STATE_NONE);
            }

            $scope.setstate = function(state) {
                $scope.last_state = $scope.state;
                $scope.state = state;
                $scope.update();
            }

            $scope.clean_fields = function() {
                $scope.form.app_name.value = '';
                $scope.form.app_identifier.value = '';
                $scope.form.app_site_url.value = '';
                $scope.form.app_image_url.value = '';
            }

            $scope.enable_fields = function(app_name_enabled, app_identifier_enabled, app_site_url_enabled, app_image_url_enabled) {
                $scope.form.app_name.enabled = app_name_enabled;
                $scope.form.app_identifier.enabled = app_identifier_enabled;
                $scope.form.app_site_url.enabled = app_site_url_enabled;
                $scope.form.app_image_url.enabled = app_image_url_enabled;
            }

            $scope.enable_buttons = function(new_enabled, edit_enabled, cancel_enabled, save_enabled) {
                $scope.buttons.new.enabled = new_enabled;
                $scope.buttons.edit.enabled = edit_enabled;
                $scope.buttons.cancel.enabled = cancel_enabled;
                $scope.buttons.save.enabled = save_enabled;
            }

            $scope.getData = function() {
                if ($scope.form.app_name.value == '' || $scope.form.app_identifier.value == '') {
                    $scope.error = 'Not app name and identifier provided';
                    return null;
                }

                var app = {
                    app_id: $scope.form.app_id.value,
                    app_name: $scope.form.app_name.value,
                    app_identifier: $scope.form.app_identifier.value,
                    app_site_url: $scope.form.app_site_url.value,
                    app_image_url: $scope.form.app_image_url.value,
                };

                return app;
            }

            $scope.set_selection = function(app) {
                console.log(app);
                $scope.selected_application = app;
                $scope.form.app_id.value = app.app_id;
                $scope.setstate(STATE_SELECTED);

                for (var i = 0; i < $scope.applications.length; i += 1) {
                    //console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);
                    if ($scope.applications[i] == app) {
                        $scope.applications[i].selected = 'selected';
                    } else {
                        $scope.applications[i].selected = '';
                    }
                }


                //$scope.$apply();
            }

            $scope.update = function() {
                switch ($scope.state) {
                    case STATE_NONE: {
                        $scope.error = null;

                        //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                        $scope.enable_buttons(true, false, false, false);
                        //app_name, app_identifier, app_site_url, app_image_url
                        $scope.enable_fields(false, false, false, false);

                        $scope.clean_fields();

                        $http({
                            method: 'get',
                            url: '<?= base_url() ?>index.php/application/all'
                        }).then(function successCallback(response) {
                            $scope.applications = response.data;

                            for (var i = 0; i < $scope.applications.length; i += 1) {
                                //console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);
                                $scope.applications[i].selected = 0;
                            }

                        });
                    }
                    break;

                case STATE_CREATE_NEW: {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true, true, true);

                    $scope.clean_fields();

                }
                break;

                case STATE_EDIT: {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true, true, true);

                }
                break;

                case STATE_SAVE: {
                    console.log("enter save");
                    var data = $scope.getData();
                    if (data != null) {
                        console.log("state " + $scope.state);
                        console.log("last state " + $scope.last_state);

                        if ($scope.last_state == STATE_CREATE_NEW) {
                            console.log("enter new")
                            $http({
                                url: '<?php echo base_url() ?>index.php/application/create',
                                method: 'POST',
                                data: $httpParamSerializerJQLike(data),
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                }
                            }).then(function successCallback(response) {
                                console.log(response.data);
                                $scope.setstate(STATE_NONE);
                            });

                        } else if ($scope.last_state == STATE_EDIT) {
                            console.log("enter edit")
                            console.log(data);
                            $http({
                                url: '<?php echo base_url() ?>index.php/application/update',
                                method: 'POST',
                                data: $httpParamSerializerJQLike(data),
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                }
                            }).then(function successCallback(response) {
                                console.log(response.data);
                                $scope.setstate(STATE_SELECTED);
                            });
                        }


                    }
                }
                break

                case STATE_SELECTED: {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(true, true, false, false);
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(false, false, false, false);

                    $scope.form.app_name.value = $scope.selected_application.app_name;
                    $scope.form.app_identifier.value = $scope.selected_application.app_identifier;
                    $scope.form.app_site_url.value = $scope.selected_application.app_site_url;
                    $scope.form.app_image_url.value = $scope.selected_application.app_image_url

                }
                break;
                }
            }

            $scope.action_new = function() {
                $scope.setstate(STATE_CREATE_NEW);
            }

            $scope.action_cancel = function() {
                $scope.setstate(STATE_NONE);
            }

            $scope.action_save = function() {
                $scope.setstate(STATE_SAVE);
            }

            $scope.action_edit = function() {
                $scope.setstate(STATE_EDIT);
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