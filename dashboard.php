<?php
    //HELLO FROM THE MASTER BRANCH
    session_start();

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
    <title>Blog: Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/319afa374e.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top justify-content-between">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
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
            <li class="nav-item">
                <a href="profile.php" class="nav-link text-primary"><i class="fas fa-user"></i> Hello, 
                    <?php 
                            echo $_SESSION['first_name']
                        ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-danger" style="opacity: 1;"><i
                        class="fas fa-user-times" alt="logout" title="logout"></i></a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid bg-secondary text-white" style="margin-top:50px;">
        <h2 class="display-1"><i class="fas fa-user-cog"></i> Dashboard</h2>
    </div>
    <div class="container mx-auto mt-5 my-5">
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary btn-lg w-100" role="button" href="addPost.php"><i
                        class="fas fa-plus-circle"></i> Add Post</a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-success btn-lg w-100" role="button" href="categoriesPage.php"><i
                        class="fas fa-folder-plus"></i> Add Category</a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-warning text-white btn-lg w-100" role="button" href="usersPage.php"><i
                        class="fas fa-user-plus"></i> Add User</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped table-hover mt-4">
                    <thead class="thead thead-dark">
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date Posted</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Post one</td>
                            <td>Web Development</td>
                            <td>July 22, 2017</td>
                            <td>
                                <button class="btn btn-outline-dark"><i class="fas fa-angle-double-right"></i>Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Post one</td>
                            <td>Web Development</td>
                            <td>July 22, 2017</td>
                            <td>
                                <button class="btn btn-outline-dark"><i class="fas fa-angle-double-right"></i>Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Post one</td>
                            <td>Web Development</td>
                            <td>July 22, 2017</td>
                            <td>
                                <button class="btn btn-outline-dark"><i class="fas fa-angle-double-right"></i>Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Post one</td>
                            <td>Web Development</td>
                            <td>July 22, 2017</td>
                            <td>
                                <button class="btn btn-outline-dark"><i class="fas fa-angle-double-right"></i>Details</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Post one</td>
                            <td>Web Development</td>
                            <td>July 22, 2017</td>
                            <td>
                                <button class="btn btn-outline-dark"><i class="fas fa-angle-double-right"></i>Details</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="container bg-primary rounded text-center text-white p-3 mt-4">
                    <h2>Posts</h2>
                    <h3><i class="fas fa-pencil-alt"></i> 7</h3>
                    <button class="btn btn-outline-light font-weight-bold text-uppercase">view</button>
                </div>
                
                <div class="container bg-success rounded text-center text-white p-3 mt-4">
                    <h3>Category</h3>
                    <h2><i class="far fa-folder-open"></i> 4</h2>
                    <button class="btn btn-outline-light font-weight-bold text-uppercase">view</button>
                </div>
                <div class="container bg-warning rounded text-center text-white p-3 mt-4">
                    <h3>Users</h3>
                    <h2><i class="fas fa-users"></i> 6</h2>
                    <button class="btn btn-outline-light font-weight-bold text-uppercase">view</button>
                </div>
            </div>
        </div>
</body>

</html>