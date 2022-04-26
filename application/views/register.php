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

    <title>Hello, world!</title>
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
    <div class="container">
        <div class="row py-5">
            <div class="card col-6 m-auto d-block">
                <div class="card-body">
                    <h2 class="text-center">User registration</h2>
                    <form class="row g-3" method="post" action="<?php echo base_url() ?>index.php/register">
                        <div class="col-md-12"><label class="form-label" for="inputName">Email</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <select class="form-select" id="inputState" name="domain">
                                    <?php
                                    foreach ($domains as $domain) {
                                        echo '<option>' . $domain->domain_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6"><label class="form-label" for="inputUserName">Name</label> <input class="form-control" id="inputUserName" type="text" name="user_name"></div>
                        <div class="col-md-6"><label class="form-label" for="inputUserLastname">Lastname</label> <input class="form-control" id="inputUserLastname" type="text" name="user_lastname"></div>

                        <div class="col-md-6"><label class="form-label" for="inputUserPassword">Password</label> <input class="form-control" id="inputUserPassword" type="password" name="user_password"></div>
                        <div class="col-md-6"><label class="form-label" for="inputRetypePassword">Retype Password</label> <input class="form-control" id="inputRetypePassword" type="password" nqme="retype"></div>

                        <div class="mt-3 text-end">
                            <div class="btn-group">
                                <button class="btn btn-secondary">CANCEL</button>
                                <button class="btn btn-danger ms-3" type="submit">REGISTER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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