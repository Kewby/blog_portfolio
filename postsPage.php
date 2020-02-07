<?php
    include 'functions/postFunctions.php';

    if(empty($_SESSION['login_id'])){
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
    <title>Blog: Post</title>
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
            <li class="nav-item active">
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
                    <?php echo $_SESSION['first_name'];?>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-danger" style="opacity: 1;"><i
                        class="fas fa-user-times"></i></a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid bg-info text-white" style="margin-top:50px;">
        <h2 class="display-1"><i class="fas fa-pen-nib"></i> Post</h2>        
    </div>
    <div class="container mt-4">
        <a href="addPost.php" class="btn btn-lg btn-outline-dark border border-0"><i class="fas fa-edit"></i> Add Post</a>
    </div>

    <div class="container mt-2">
        <table class="table table-hover table-striped overflow-auto">
            <thead class="thead thead-dark">
                <th>Post ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date Posted</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayUserPosts();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>