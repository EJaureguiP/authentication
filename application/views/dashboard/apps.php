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
    
    <title>Authentication</title>
  </head>
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

        <tr ng-repeat="app in applications" >
            <td>{{app.app_name }}</td>
            <td>{{app.app_identifier}}</td>
            <td>{{app.app_site_url}}</td>
            <td>{{app.app_url_image}}</td>
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

            <!--
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            -->

        </div>
        </div>
    </div>

    <div class="col-4">
        
        <div class="card">
            <div class="card-header">

            <div class="d-flex bd-highlight">
  <div class="p-2 flex-grow-1 bd-highlight"><h5>App</h5></div>
  <div class="p-2 bd-highlight"> <button type="button" class="btn btn-outline-success d-flex ">New</button></div>
  <div class="p-2 bd-highlight"><button type="button" class="btn btn-outline-info d-flex ">Edit</button></div>
</div>
           
                
                   


            </div>
            <div class="card-body"> 

            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">App Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Identifier</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Site Url</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Image Url</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
      

                <a  class="btn btn-primary">Guardar</a>
            </form>

            </div>
        </div>

    </div>
    </div>


   </div>


   <script>
    $(document).ready(function() {
        var table = $('#table-apps').DataTable();
       
        /*
        $('#table-apps tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        });
        */
    
    } );





    var app = angular.module('app-apps', []);
        
        app.controller('apps-controller', function($scope, $http, $httpParamSerializerJQLike) {

        const STATE_NONE = 0;

        $scope.app_name = null;
        $scope.app_identifier = null;
        $scope.app_url = null;
        $scope.app_image = null;
        
        $scope.applications = [];

        $scope.state = STATE_NONE;
        $scope.last_state = STATE_NONE;

        $scope.init = function()
        {
            console.log('entering init');
            $scope.setstate(STATE_NONE);
        }

        $scope.setstate = function(state)
        {
            $scope.last_state = state;
            $scope.state = state;
            $scope.update();
        }

        $scope.update =  function()
        {
            switch($scope.state)
            {
                case STATE_NONE:
                {

                    $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/application/all'
                    }).then(function successCallback(response) {
                        $scope.applications = response.data;				
                    }); 
                }break;
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


