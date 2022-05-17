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
    <link href="<?= base_url() ?>vendor/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/fontawesome-free-6.1.1-web/css/all.min.css">

    <script src="<?= base_url() ?>/vendor/angular-1.8.2/angular.min.js"></script>
    <script src="<?= base_url() ?>/vendor/sweetalert2/sweetalert2.all.min.js"></script>

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

    <div class="container px-0" ng-app="app-types" ng-controller="types-controller">
        <?php
        $this->load->view('dashboard/shared/top-bar');
        ?>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">User Types</h5>
                    <div class="card-body">
                        <table id="table-types" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="type in types" class="{{type.selected}}">
                                    <td ng-click="set_selection(type)">{{type.type_name }}</td>
                                    <td ng-click="set_selection(type)">{{type.type_value}}</td>
                                    <td>
                                        <!-- Call to action buttons -->
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button class="btn btn-danger" type="button" ng-click="delete(type)"><i class="fa-solid fa-trash"></i></button>
                                            </li>
                                        </ul>
                                    </td>
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
                                <h5>User Type</h5>
                            </div>
                            <div class="p-2 bd-highlight"> <button type="button" class="btn btn-outline-success d-flex " ng-disabled="!buttons.new.enabled" ng-click="action_new()">New</button></div>
                            <div class="p-2 bd-highlight"><button type="button" class="btn btn-outline-info d-flex " ng-disabled="!buttons.edit.enabled" ng-click="action_edit()">Edit</button></div>
                            <div class="p-2 bd-highlight"><button type="button" class="btn btn-outline-danger d-flex " ng-disabled="!buttons.cancel.enabled" ng-click="action_cancel()">Cancel</button></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <input type="text" hidden ng-model="form.type_id.value">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Type Name</label>
                                <input type="text" class="form-control" ng-model="form.type_name.value" ng-disabled="!form.type_name.enabled" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Type Value</label>
                                <input type="text" min="0" class="form-control" id="exampleInputPassword1" ng-model="form.type_value.value" ng-disabled="!form.type_value.enabled">
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
            $('#table-types').DataTable();
        });

        var app = angular.module('app-types', []);

        app.controller('types-controller', function($scope, $http, $httpParamSerializerJQLike) {

            const STATE_NONE = 0;
            const STATE_CREATE_NEW = 1;
            const STATE_SAVE = 2;

            const STATE_SELECTED = 3;
            const STATE_EDIT = 4;

            $scope.form = {
                type_id: {
                    value: '',
                    enabled: false
                },
                type_name: {
                    value: '',
                    enabled: false
                },
                type_value: {
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

            $scope.types = [];
            $scope.selected_type = null;

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
                $scope.form.type_name.value = '';
                $scope.form.type_value.value = '';
            }

            $scope.enable_fields = function(type_name_enabled, type_value_enabled) {
                $scope.form.type_name.enabled = type_name_enabled;
                $scope.form.type_value.enabled = type_value_enabled;
            }

            $scope.enable_buttons = function(new_enabled, edit_enabled, cancel_enabled, save_enabled) {
                $scope.buttons.new.enabled = new_enabled;
                $scope.buttons.edit.enabled = edit_enabled;
                $scope.buttons.cancel.enabled = cancel_enabled;
                $scope.buttons.save.enabled = save_enabled;
            }

            $scope.getData = function() {
                if ($scope.form.type_name.value == '' || $scope.form.type_value.value == '') {
                    $scope.error = 'Not app name and identifier provided';
                    return null;
                }

                var app = {
                    type_id: $scope.form.type_id.value,
                    type_name: $scope.form.type_name.value,
                    type_value: $scope.form.type_value.value,
                };

                return app;
            }

            $scope.set_selection = function(type) {
                console.log(type);
                $scope.selected_type = type;
                $scope.form.type_id.value = type.type_id;
                $scope.setstate(STATE_SELECTED);

                for (var i = 0; i < $scope.types.length; i += 1) {
                    //console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);
                    if ($scope.types[i] == type) {
                        $scope.types[i].selected = 'selected';
                        console.log("En el índice '" + i + "' hay este valor: " + $scope.types[i]);
                    } else {
                        $scope.types[i].selected = '';
                    }
                }
                //$scope.$apply();
            }

            $scope.delete = function(type) {
                //console.log('delete ' + level);
                Swal.fire({
                    title: 'Do you want to delete ' + type.type_name + '?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.isConfirmed) {
                        var data = {
                            type_id: type.type_id,
                        };

                        $http({
                            url: '<?php echo base_url() ?>index.php/type/delete',
                            method: 'POST',
                            data: $httpParamSerializerJQLike(data),
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(function successCallback(response) {
                            console.log(response.data);
                            Swal.fire(
                                'Deleted!',
                                'Your record has been deleted.',
                                'success'
                            )

                            $scope.setstate(STATE_NONE);
                        });
                    }
                })

            }

            $scope.update = function() {
                switch ($scope.state) {
                    case STATE_NONE: {
                        $scope.error = null;

                        //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                        $scope.enable_buttons(true, false, false, false);
                        //level_name, level_level
                        $scope.enable_fields(false, false);

                        $scope.clean_fields();

                        $http({
                            method: 'get',
                            url: '<?= base_url() ?>index.php/type/all'
                        }).then(function successCallback(response) {

                            console.log(response.data);
                            $scope.types = response.data;

                            for (var i = 0; i < $scope.types.length; i += 1) {
                                //console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);

                                $scope.types[i].type_value = $scope.types[i].type_value;
                                $scope.types[i].selected = 0;
                            }

                        });
                    }
                    break;

                case STATE_CREATE_NEW: {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true);

                    $scope.clean_fields();

                }
                break;

                case STATE_EDIT: {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true);

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
                                url: '<?php echo base_url() ?>index.php/type/create',
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
                                url: '<?php echo base_url() ?>index.php/ty[e/update',
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
                    $scope.enable_fields(false, false);

                    $scope.form.type_name.value = $scope.selected_type.type_name;
                    $scope.form.type_value.value = $scope.selected_type.type_value;

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

    <script src="<?= base_url() ?>vendor/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>