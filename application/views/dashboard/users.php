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

    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome-free-6.1.1-web/css/all.min.css">


    <script src="<?= base_url() ?>assets/angular-1.8.2/angular.min.js"></script>
    <script src="<?= base_url() ?>assets/sweetalert2/sweetalert2.all.min.js"></script>

    <title>Authentication</title>
</head>
<style>
    body {
        height: auto;
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
    <div class="container px-0" ng-app="app-users" ng-controller="users-controller">
        <?php
        $this->load->view('dashboard/shared/top-bar');
        ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2>Users</h2>
                            </div>

                            <div class="col-auto">
                                <a class="btn btn-success btn-lg form-inline text-end" href="<?php echo base_url(); ?>index.php/dashboard/user/create"><i class="fa-solid fa-plus"></i></a>
                            </div>

                        </div>


                    </div>

                    <div class="card-body">
                        <div class="container">

                            <div class="row">
                                <div class="col-auto">
                                    <p>Filter By</p>
                                </div>

                                <div class="col ">
                                    <select ng-options="dep as dep.department_name for dep in departments track by dep.department_id" ng-model="selected_department" class="form-control "></select>
                                </div>

                                <div class="col">
                                    <select ng-options="plant as plant.plant_name for plant in plants track by plant.plant_id" ng-model="selected_plant" class="form-control"></select>
                                </div>

                                <div class="col">
                                    <select ng-options="shift as shift.shift_name for shift in shifts track by shift.shift_id" ng-model="selected_shift" class="form-control"></select>
                                </div>

                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-search"></i></span>
                                        <input type="text" class="form-control" placeholder="Search Text" aria-label="Search Text" aria-describedby="basic-addon1" ng-model="search">
                                    </div>
                                </div>


                            </div>

                            <div class=" table-responsive">
                                <table id="table-levels" class="table">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Lastname</th>
                                            <th>Martech #</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>Active</th>
                                            <th>Admin</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr ng-repeat="user in users | filter:filterByDepartment | filter:filterByPlant | filter:filterByShift | filter:filterByText">
                                            <td>{{user.user_email }}</td>
                                            <td>{{user.user_name}}</td>
                                            <td>{{user.user_lastname}}</td>
                                            <td>{{user.user_martech_number}}</td>
                                            <td>{{user.department_name}}</td>
                                            <td>{{user.user_phone}}</td>
                                            <td>{{ (user.user_active == 1) ? 'True' : 'False'  }}</td>
                                            <td>{{ (user.user_is_admin == 1) ? 'True' : 'False' }}</td>

                                            <td>
                                                <!-- Call to action buttons -->
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-secondary" href="<?php echo base_url(); ?>index.php/dashboard/user/update?user_id={{user.user_id }}" type="button"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <button class="btn btn-danger" type="button" ng-click="delete(user)"><i class="fa-solid fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>



                    </div> <!-- card-body -->


                </div> <!-- card -->

            </div> <!-- col -->

        </div> <!-- row -->


    </div> <!-- container -->

    <script>
        //set datatable init
        /*$(document).ready(function() {
            $('#table-levels').DataTable();
        });*/

        var app = angular.module('app-users', []);

        app.controller('users-controller', function($scope, $http, $httpParamSerializerJQLike) {


            $scope.users = [];


            $scope.departments = [];
            $scope.selected_department = null;


            $scope.plants = [];
            $scope.selected_plant = null;


            $scope.shifts = [];
            $scope.selected_shift = null;

            $scope.search = null;

            //init function
            $scope.init = function() {
                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/user/all'
                }).then(function successCallback(response) {
                    //console.log(response.data.users);
                    $scope.users = response.data.users;


                    $scope.departments = response.data.departments;
                    $scope.departments.unshift({
                        'department_name': '-- All Departments --'
                    });

                    $scope.plants = response.data.plants;
                    $scope.plants.unshift({
                        'plant_name': '-- All Plants --'
                    });

                    $scope.shifts = response.data.shifts;
                    $scope.shifts.unshift({
                        'shift_name': '-- All Shifts --'
                    });


                    console.log($scope.departments);

                });
            }



            $scope.filterByDepartment = function(user) {

                if ($scope.selected_department == null || $scope.selected_department.department_id == undefined) {
                    return true;
                } else {
                    if (user.user_department_id == $scope.selected_department.department_id) {
                        return true;
                    } else {
                        return false;
                    }
                }
            };


            $scope.filterByPlant = function(user) {

                if ($scope.selected_plant == null || $scope.selected_plant.plant_id == undefined) {
                    return true;
                } else {
                    if (user.user_plant_id == $scope.selected_plant.plant_id) {
                        return true;
                    } else {
                        return false;
                    }
                }
            };


            $scope.filterByShift = function(user) {

                if ($scope.selected_shift == null || $scope.selected_shift.shift_id == undefined) {
                    return true;
                } else {
                    if (user.user_shift_id == $scope.selected_shift.shift_id) {
                        return true;
                    } else {
                        return false;
                    }
                }
            };


            $scope.filterByText = function(user) {

                //Si el texto de busqueda es null o vacio
                if ($scope.search == null || $scope.search == '') {
                    return true;
                } else {
                    if (user.user_email.toLowerCase().includes($scope.search.toLowerCase()) || user.user_name.toLowerCase().includes($scope.search.toLowerCase()) || user.user_lastname.toLowerCase().includes($scope.search.toLowerCase())) {
                        return true;
                    } else {
                        return false;
                    }
                }
            };


            $scope.delete = function(user) {
                console.log(user);
                //user.user_id

                Swal.fire({
                    title: 'Do you want to delete ' + user.user_email + '?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.isConfirmed) {

                        var data = {
                            user_id: user.user_id,
                        };

                        $http({
                            url: '<?php echo base_url() ?>index.php/user/delete',
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
                })

            }

            $scope.init();

        });
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="<?= base_url() ?>assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>