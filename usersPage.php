<?php
    include 'functions/userFunctions.php';
    
    if(empty($_SESSION['status']=='A')){
        session_unset();
        session_destroy();
        header('Location: index.php');
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/319afa374e.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top justify-content-between">
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
            <li class="nav-item active">
                <a href="usersPage.php" class="nav-link">Users</a>
            </li>
        </ul>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
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

    <div class="container-fluid bg-warning text-white" style="margin-top:50px;">
        <h2 class="display-1"><i class="fas fa-user-edit"></i> User</h2>
    </div>

    <div class="container w-50 mx-auto mt-5">
        <form method="post">
            <div class="form-group">
                <h2 class="display-4">Add User</h2>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="first_name" id="inputNewUserFname" class="form-control mr-3"
                            placeholder="First Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="last_name" id="inputNewUserLname" class="form-control mr-3"
                            placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <input type="email" name="email" id="inputNewUserEmail" class="form-control mr-3"
                            placeholder="Email" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="contact_number" id="inputNewUserContactNumber"
                            class="form-control mr-3" placeholder="Contact Number" maxlength="11" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="address" id="inputNewUserAddress" class="form-control mr-3"
                            placeholder="Address" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="username" id="inputNewUserUsername" class="form-control mr-3"
                    placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="inputNewUserPassword" class="form-control mr-3"
                    placeholder="Password" required>
            </div>
            <button type="submit" name="add" role="button"
                class="btn btn-warning form-control text-uppercase text-white font-weight-bold">Add</button>
        </form>
        <?php
            if(isset($_POST['add'])){
                addUser();
            }
        ?>
    </div>

    <div class="container">
        <table class="table table-hover mx-auto text-center my-5">
            <thead class="thead thead-dark text-uppercase">
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Username</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayAllUsers();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>