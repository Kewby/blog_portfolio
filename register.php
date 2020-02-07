<?php
    include 'functions/userFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css?family=sMansalva|Montserrat&display=swap');

        * {
            font-family: Montserrat, sans-serif;
            color: white;
        }

        .darko {
            background-color: #000000 !important;
            /* color: #000000 !important; */
        }

        .loginform {
            outline: none;
            border: none !important;
            border-bottom: 1px solid white !important;
            border-radius: 0;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body class="darko">
    <div class="card mx-auto w-50 mt-3 border border-0">
        <div class="card-header darko text-white border-0">
            <h2 class="text-center" style="letter-spacing: 0.2em;">Registration</h2>
        </div>
        <div class="card-body darko">
            <form action="" method="post">
                <div class="row mt-2">
                    <div class="form-group col-md-6">
                        <label for="first_name" style="letter-spacing: 0.1em;">First Name<span style="color: crimson">*</span></label>
                        <input type="text" name="first_name" id="inputFirstName" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name" style="letter-spacing: 0.1em;">Last Name<span style="color: crimson">*</span></label>
                        <input type="text" name="last_name" id="inputLastName" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-md-12">
                        <label for="address" style="letter-spacing: 0.1em;">Address</label>
                        <input type="text" name="address" id="inputAddress" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-md-12">
                        <label for="contact_number" style="letter-spacing: 0.1em;">Contact Number<span style="color: crimson">*</span></label>
                        <input type="text" name="contact_number" id="inputContactNumber" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" pattern="[0-9]+" maxlength="11" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-md-12">
                        <label for="email" style="letter-spacing: 0.1em;">Email<span style="color: crimson">*</span></label>
                        <input type="email" name="email" id="inputEmail" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-md-12">
                        <label for="username" style="letter-spacing: 0.1em;">Username<span style="color: crimson">*</span></label>
                        <input type="text" name="username" id="inputUsername" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-md-12">
                        <label for="password" style="letter-spacing: 0.1em;">Password<span style="color: crimson">*</span></label>
                        <input type="password" name="password" id="inputContactNumber" class="loginform form-control darko" style="letter-spacing: 0.2em; color:#B1B1B1;" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-group col-md-6">
                        <button type="submit" name="register" class="btn btn-dark form-control form-control-lg float-left" style="letter-spacing: 0.1em;">Register</button>
                    </div>
                    <div class="form-group col-md-6">
                        <p class="text-right"><span class="text-white">Have an account? </span><a href="login.php" class="text-primary">Sign In</a></p>
                    </div>
                </div>
                <?php
                    if(isset($_POST['register'])){
                        register();
                    }
                ?>
            </form>

        </div>
    </div>
</body>
</html>