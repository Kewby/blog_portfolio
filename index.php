<?php
    include 'functions/userFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/319afa374e.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Mansalva|Montserrat&display=swap');

        * {
            font-family: Montserrat, sans-serif;
        }

        .loginform {
            outline: none;
            border: none !important;
            border-bottom: 1px solid black !important;
            border-radius: 0;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }
        .container{
            margin-top: 110px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="card mx-auto w-50 my-5 border border-0">
            <div class="card-header bg-white text-dark border-0">
                <h2 class="text-center" style="letter-spacing: 0.2em;">Login</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-md-12 mt-3">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" name="username" id="inputUsername" class="p-4 loginform form-control"
                                placeholder="USERNAME" style="letter-spacing: 0.2em;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 mb-4">
                            <!-- <label for="username">Password</label> -->
                            <input type="password" name="password" id="inputPassword" class="p-4 loginform form-control"
                                placeholder="PASSWORD" style="letter-spacing: 0.2em;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 mx-auto">
                            <button type="submit" name="login" class="btn btn-dark form-control text-uppercase"
                                style="letter-spacing: 0.1em; font-size:100%">enter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white text-dark border-0 mt-5">
                <div class="row">
                    <div class="col-md-6 text-left mb-3">
                        <h6><a href="register.php" class="text-dark" style="letter-spacing: 0.1em;">Create an Account</a></h6>
                    </div>
                    <div class="col-md-6 text-right mb-3">
                        <h6><a href="recover.php" class="text-dark " style="letter-spacing: 0.1em;">Recover Account</a></h6>
                    </div>
                </div>
                <?php
                    if (isset($_POST['login'])) {
                        login();
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>