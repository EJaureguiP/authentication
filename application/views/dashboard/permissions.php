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
    
    <title>Level and User Types by App</title>
  </head>
  <body>

  <div class="container px-0" ng-app="app-apps" ng-controller="apps-controller">
     


   <?php
        $this->load->view('dashboard/shared/top-bar');
   ?>
<div class="row my-4">
    <div class="col-md-6">
    <p class="fs-5 text-end mt-2">Aplicacion</p>

    </div>
    <div class="col-md-6">
    <select  class="form-select w-50 fs-5" ng-options="app as app.app_name for app in applications track by app.app_id" ng-model="selected_application" ng-change="selected_change()"></select>
    </div>
</div>   
    <div class="row">
        <div class="col">
            <div class="card">
            <h5 class="card-header">Levels</h5>
            <div class="card-body">
                
            
            <table id="table-apps-levels" class="table display" style="width:100%">
            <thead>
                <tr>
                    <th>Level Name</th>
                    <th>Level Value</th>
                </tr>
            </thead>

            <tbody>

            <tr ng-repeat="app_level in apps_levels"  >
                <td>{{app_level.level_name }}</td>
                <td>{{app_level.level_value}}</td>
            </tr>


            </tbody>


            </table>


            </div>
            
            </div>
        </div>


        <div class="row my-3">
        <div class="col">
            <div class="card">
            <h5 class="card-header">User Types</h5>
            <div class="card-body">
                
            
            <table id="table-apps-types" class="table display" style="width:100%">
            <thead>
                <tr>
                    <th>Type Name</th>
                    <th>Type Value</th>
                </tr>
            </thead>

            <tbody>

            <tr ng-repeat="app_type in apps_types"  >
                <td>{{app_type.type_name }}</td>
                <td>{{app_type.type_value}}</td>
            </tr>


            </tbody>


            </table>


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

        $scope.apps_levels = [];

        $scope.apps_types = [];

        

        $scope.init = function()
        {
            console.log('entering init');
            $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application/all'
                    }).then(function successCallback(response) {
                        $scope.applications = response.data;
                    }); 
        }

       $scope.selected_change = function()
       {
           console.log('selected_change' + $scope.selected_application.app_name);
            
           //Load Levels
           $scope.loadAppsLevels();

           //Load types
           $scope.loadAppsTypes();
       }

       $scope.loadAppsLevels = function()
       {
        $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application_level/all'
                    }).then(function successCallback(response) {
                        $scope.apps_levels = response.data;            
                    }); 
       }


       $scope.loadAppsTypes = function()
       {
        $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application_type/all'
                    }).then(function successCallback(response) {
                        $scope.apps_types = response.data;            
                    }); 
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
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(false, false, false, false);
                
                    $scope.clean_fields();

                    $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application/all'
                    }).then(function successCallback(response) {
                        $scope.applications = response.data;
                        
                        for (var i = 0; i < $scope.applications.length; i+=1) {
                           //console.log("En el índice '" + i + "' hay este valor: " + miArray[i]);
                           $scope.applications[i].selected = 0;
                        }
                        
                    }); 
                }break;

                case STATE_CREATE_NEW:
                {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);                  
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true, true, true);

                    $scope.clean_fields();
    
                }break;

                case STATE_EDIT:
                {
                    //(new_enabled, edit_enabled, cancel_enabled, save_enabled)
                    $scope.enable_buttons(false, false, true, true);                  
                    //app_name, app_identifier, app_site_url, app_image_url
                    $scope.enable_fields(true, true, true, true);

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
                            url: '<?php echo base_url() ?>index.php/application/create',
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
                            url: '<?php echo base_url() ?>index.php/application/update',
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
                       $scope.enable_fields(false, false, false, false);

                        $scope.form.app_name.value = $scope.selected_application.app_name;
                        $scope.form.app_identifier.value = $scope.selected_application.app_identifier;
                        $scope.form.app_site_url.value = $scope.selected_application.app_site_url;
                        $scope.form.app_image_url.value = $scope.selected_application.app_image_url

                } break;
            }
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


