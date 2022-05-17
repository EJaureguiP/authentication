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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                <h5>Levels</h5>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-success btn-lg form-inline text-end" href="<?php echo base_url(); ?>index.php/dashboard/user/create">Agregar usuario</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <table id="table-levels" class="table display" style="width:100%">
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

                                <tr ng-repeat="user in users">
                                    <td>{{user.user_email }}</td>
                                    <td>{{user.user_name}}</td>
                                    <td>{{user.user_lastname}}</td>
                                    <td>{{user.user_marterch_number}}</td>
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

                    </div> <!-- card-body -->


                </div> <!-- card -->

            </div> <!-- col -->

        </div> <!-- row -->


    </div> <!-- container -->

    <script>
        //set datatable init
        $(document).ready(function() {
            $('#table-levels').DataTable();
        });

        var app = angular.module('app-users', []);

        app.controller('users-controller', function($scope, $http, $httpParamSerializerJQLike) {

            $scope.users = [];

            //init function
            $scope.init = function() {
                $http({
                    method: 'get',
                    url: '<?= base_url() ?>index.php/user/all'
                }).then(function successCallback(response) {
                    console.log(response.data);
                    $scope.users = response.data;

                });
            }


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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>