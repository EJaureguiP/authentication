<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

  <div class="container px-0" ng-app="app-levels" ng-controller="levels-controller">
     


   <?php
        $this->load->view('dashboard/shared/top-bar');
   ?>

    <div class="row">
    <div class="col-8">
        <div class="card">
        <h5 class="card-header">Levels</h5>
        <div class="card-body">
            
        
        <table id="table-levels" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Level Value</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <tr ng-repeat="level in levels" class="{{level.selected}}"  >
            <td ng-click="set_selection(level)">{{level.level_name }}</td>
            <td ng-click="set_selection(level)">{{level.level_value}}</td>

            <td>
                                            <!-- Call to action buttons -->
            <ul class="list-inline m-0">   
                <li class="list-inline-item">
                    <button class="btn btn-danger btn-sm rounded-0" type="button" ng-click="delete(level)">Eliminar</button>
                </li>
            </ul>
            
        </td>
        </tr>


        </tbody>
        <!--
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Identifier</th>
                <th>Site Url</th>
                <th>Site Image</th>
            </tr>
        </tfoot>
-->
    </table>


        </div>
        </div>
    </div>

    <div class="col-4">
        
        <div class="card">
            <div class="card-header">

            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight"><h5>Level</h5></div>
                <div class="p-2 bd-highlight"> <button type="button" class="btn btn-outline-success d-flex " ng-disabled="!buttons.new.enabled" ng-click="action_new()">New</button></div>
                <div class="p-2 bd-highlight"><button type="button" class="btn btn-outline-info d-flex " ng-disabled="!buttons.edit.enabled" ng-click="action_edit()">Edit</button></div>
                <div class="p-2 bd-highlight"><button type="button" class="btn btn-outline-danger d-flex " ng-disabled="!buttons.cancel.enabled" ng-click="action_cancel()">Cancel</button></div>
            </div>
                    
                
                
            </div>
            <div class="card-body"> 

            <form>
            <input type="text" hidden  ng-model="form.app_id.value">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Level Name</label>
                    <input type="text" class="form-control" ng-model="form.level_name.value" ng-disabled="!form.level_name.enabled"  aria-describedby="emailHelp">
                   
                    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Level Value</label>
                    <input type="number" min="0" class="form-control" id="exampleInputPassword1" ng-model="form.level_value.value" ng-disabled="!form.level_value.enabled">
                </div>

      

                <button  class="btn btn-primary" ng-disabled="!buttons.save.enabled" ng-click="action_save()">Guardar</button>

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
        $('#table-levels').DataTable();
    });

    var app = angular.module('app-levels', []);
        
        app.controller('levels-controller', function($scope, $http, $httpParamSerializerJQLike) {

        const STATE_NONE = 0;
        const STATE_CREATE_NEW = 1;
        const STATE_SAVE = 2;

        const STATE_SELECTED = 3;
        const STATE_EDIT = 4;

        $scope.form = {
            level_id: { value : '', enabled: false },
            level_name: { value : '', enabled: false },
            level_value: { value : '', enabled: false },
        }

        $scope.buttons = {
            new: { enabled: true },
            edit: { enabled: false },
            cancel: { enabled: false },
            save: { enabled: false },
        }
        $scope.error = null;
        
        $scope.levels = [];
        $scope.selected_level = null;

        $scope.state = STATE_NONE;
        $scope.last_state = STATE_NONE;

        $scope.init = function()
        {
            console.log('entering init');
            $scope.setstate(STATE_NONE);
        }

        $scope.setstate = function(state)
        {
            $scope.last_state = $scope.state;
            $scope.state = state;
            $scope.update();
        }

        $scope.clean_fields = function()
        {
            $scope.form.level_name.value = '';
            $scope.form.level_value.value = '';
        }

        $scope.enable_fields = function(level_name_enabled, level_value_enabled)
        {
            $scope.form.level_name.enabled = level_name_enabled;
            $scope.form.level_value.enabled = level_value_enabled;
        }

        $scope.enable_buttons = function(new_enabled, edit_enabled, cancel_enabled, save_enabled)
        {
            $scope.buttons.new.enabled = new_enabled;
            $scope.buttons.edit.enabled = edit_enabled;
            $scope.buttons.cancel.enabled = cancel_enabled;
            $scope.buttons.save.enabled = save_enabled;
        }

        $scope.getData = function()
        {
            if($scope.form.level_name.value == '' || $scope.form.level_value.value == '')
            {
                $scope.error = 'Not app name and identifier provided';
                return null;
            }

            var app = {
                        level_id : $scope.form.level_id.value,
                        level_name : $scope.form.level_name.value,
                        level_value : $scope.form.level_value.value,
                    };

            return app;
        }

        $scope.set_selection = function(level)
        {
            console.log(level);
            $scope.selected_level = level;
            $scope.form.level_id.value = level.level_id;
            $scope.setstate(STATE_SELECTED);

            for (var i = 0; i < $scope.levels.length; i+=1) {
                           //console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);
                if($scope.levels[i] == level)
                {
                    $scope.levels[i].selected = 'selected';
                    console.log("En el índice '" + i + "' hay este valor: " + $scope.levels[i]);
                } else
                {
                    $scope.levels[i].selected = '';
                }        
            }
            //$scope.$apply();
        }

        $scope.delete = function(level)
        {
            //console.log('delete ' + level);
            Swal.fire({
            title: 'Do you want to delete ' + level.level_name + '?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                
            if (result.isConfirmed) {
                var data = {
                        level_id : level.level_id,
                    };

                $http({
                            url: '<?php echo base_url() ?>index.php/level/delete',
                            method: 'POST',
                            data: $httpParamSerializerJQLike( data ),
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

        $scope.update =  function()
        {
            switch($scope.state)
            {
                case STATE_NONE:
                {
                    $scope.error = null;

                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(true, false, false, false);
                    //level_name, level_level
                    $scope.enable_fields(false, false);
                
                    $scope.clean_fields();

                    $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/level/all'
                    }).then(function successCallback(response) {
                        
                        console.log(response.data);
                        $scope.levels = response.data;
                        
                        for (var i = 0; i < $scope.levels.length; i+=1) {
                           //console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);

                           $scope.levels[i].level_value = parseInt($scope.levels[i].level_value);
                           $scope.levels[i].selected = 0;
                        }
                        
                    }); 
                }break;

                case STATE_CREATE_NEW:
                {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);                  
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true);

                    $scope.clean_fields();
    
                }break;

                case STATE_EDIT:
                {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);                  
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true);

                }break;

                case STATE_SAVE:
                {
                    console.log("enter save");
                    var data = $scope.getData();
                    if(data != null)
                    {
                        console.log("state " + $scope.state);
                        console.log("last state " + $scope.last_state);

                        if($scope.last_state == STATE_CREATE_NEW)
                        {
                            console.log("enter new")
                            $http({
                            url: '<?php echo base_url() ?>index.php/level/create',
                            method: 'POST',
                            data: $httpParamSerializerJQLike( data ),
                            headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                            }
                            }).then(function successCallback(response) {
                                console.log(response.data);		
                                $scope.setstate(STATE_NONE);		
                            });

                        } else if($scope.last_state == STATE_EDIT)
                        {
                            console.log("enter edit")
                            console.log(data);
                            $http({
                            url: '<?php echo base_url() ?>index.php/level/update',
                            method: 'POST',
                            data: $httpParamSerializerJQLike( data ),
                            headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                            }
                            }).then(function successCallback(response) {
                                console.log(response.data);		
                                $scope.setstate(STATE_SELECTED);		
                            });
                        }

                     
                    }
                }break

                case STATE_SELECTED:
                {
                       //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                       $scope.enable_buttons(true, true, false, false);                  
                        //app_name, app_identifier, app_site_url, app_image_url
                       $scope.enable_fields(false, false);

                        $scope.form.level_name.value = $scope.selected_level.level_name;
                        $scope.form.level_value.value = $scope.selected_level.level_value;

                } break;
            }
        }

        $scope.action_new = function()
        {
            $scope.setstate(STATE_CREATE_NEW);
        }

        $scope.action_cancel = function()
        {
            $scope.setstate(STATE_NONE);
        }

        $scope.action_save = function()
        {
            $scope.setstate(STATE_SAVE);
        }

        $scope.action_edit = function()
        {
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


