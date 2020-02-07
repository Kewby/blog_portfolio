<?php
    include 'functions/categoryFunctions.php';

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
    <title>Blog: Category</title>
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
            <li class="nav-item active">
                <a href="categoriesPage.php" class="nav-link">Categories</a>
            </li>
            <li>
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
                        class="fas fa-user-times"></i></a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid bg-success text-white" style="margin-top:50px;">
        <h2 class="display-1"><i class="fas fa-folder"></i> Category</h2>
    </div>

    <div class="container w-50 mx-auto mt-5">
        <form class="form-inline" method="post">
            <div class="form-group mx-auto">
                <label for="newCategory" class="mr-3">Add Category</label>
                <input type="text" name="category_name" id="inputNewCategory" class="form-control mr-3">
                <button type="submit" name="add" role="button"
                    class="btn btn-success form-control text-uppercase font-weight-bold">Add</button>
            </div>
        </form>
        <?php
                if(isset($_POST['add'])){
                addCategory();
            }
        ?>
    </div>

    <div class="container w-50">
        <table class="table table-hover w-75 mx-auto text-center mt-5">
            <thead class="thead thead-dark text-uppercase">
                <th>Category ID</th>
                <th>Category Name</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayAllCategories();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>