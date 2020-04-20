<?php
    include "functions/profileFunctions.php";
    session_start();
    $profile_id = $_SESSION['login_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/319afa374e.js"></script>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="postsPage.php" class="nav-link">Posts</a>
            </li>
            <li class="nav-item">
                <a href="categoriesPage.php" class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
                <a href="usersPage.php" class="nav-link">Users</a>
            </li>
        </ul>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item active">
                <a href="profile.php" class="nav-link text-primary"><i class="fas fa-user"></i> Hello,
                    <?php echo $_SESSION['first_name'];?>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-danger" style="opacity: 1;"><i
                        class="fas fa-user-times"></i></a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid bg-secondary text-white" style="margin-top:50px;">
        <h2 class="display-1"><i class="fas fa-user"></i> Profile</h2>        
    </div>

    <div class="container ml-5 mt-5">
        <?php
            $profile_details = displayProfile($profile_id);                
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="new_first_name" class="text-white"><small>First Name</small></label>
                            <input type="text" name="new_first_name" class="form-control" value="<?php echo $profile_details['first_name']?>" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="new_last_name" class="text-white"><small>Last Name</small></label>
                            <input type="text" name="new_last_name" value="<?php echo $profile_details['last_name']?>" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="new_address" class="text-white"><small>Address</small></label>
                            <input type="text" name="new_address" value="<?php echo $profile_details['address']?>" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="new_contact_number" class="text-white"><small>Contact Number</small></label>
                            <input type="number" name="new_contact_number" value="<?php echo $profile_details['contact_number']?>" class="form-control" placeholder="Contact Number">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="new_email" class="text-white"><small>Email</small></label>
                            <input type="email" name="new_email" value="<?php echo $profile_details['email']?>" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="new_username" class="text-white"><small>Username</small></label>
                            <input type="text" name="new_username" value="<?php echo $profile_details['username']?>"  class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="new_password" class="text-white"><small>Password</small></label>
                            <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm_password" class="text-white"><small>Confirm Password<span class='text-danger'>*</span></small></label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                    <input type="hidden" name="old_password" value="<?php echo $profile_details['password']?>" >

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#confirmPassword">UPDATE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CONTAINER -->
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="confirmPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center" id="exampleModalLongTitle">CONFIRM YOUR OLD PASSWORD</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <!-- MODAL FORM -->
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-0">
                                <input type="password" name="confirm_old_password" id="" class="form-control form-control-lg text-center" placeholder="PASSWORD">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row text-right">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $password_check = checkOldPassword($profile_id);
                                
            if($password_check == 1){
                $first_name = $_POST['new_first_name'];
                $last_name = $_POST['new_last_name'];
                $address = $_POST['new_address'];
                $contact_number = $_POST['new_contact_number'];
                $email = $_POST['new_email'];
                $username = $_POST['new_username'];
                                    
                if(empty($_POST['new_password'])){
                    $password = $_POST['old_password'];
                }elseif(!empty($_POST['new_password']) && $_POST['new_password'] === $_POST['confirm_password']){
                    $password = md5($_POST['new_password']);
                } 


                // echo $first_name, $last_name, $address, $contact_number, $email, $username, $password;
                updateProfile($first_name, $last_name, $address, $contact_number, $email, $username, $password, $profile_id);
            }else{
                                    echo "<div class='alert alert-danger text-center' role='alert'>
                                    <strong>INCORRECT OLD PASSWORD</strong>
                                </div>";
                                }                           
                        }
                    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>