<?php
    include 'functions/postFunctions.php';
    $post_id = $_GET['post_id'];

    if(empty($post_id)){
        header('Location: postsPage.php');
        die;
    }elseif(empty($_SESSION['login_id'])){
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
    <title>Blog: Post Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/319afa374e.js"></script>
    <style>
        .lighto {
            background-color: #FFF !important;
            /* color: #000000 !important; */
        }

        .custom-form {
            outline: none;
            border: none !important;
            border-bottom: 1px solid black !important;
            border-radius: 0;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }

        input[type=date]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            display: none;
        }
    </style>
</head>

<body>
<div class="navbar">
        <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="postsPage.php" class="nav-link text-secondary" style="opacity: 1;"><i class="fas fa-chevron-left fa-2x"></i></a>
                </li>
                <!-- <li class="nav-item">
                    <a href="post.php" class="nav-link">Posts</a>
                </li>
                <li class="nav-item">
                    <a href="category.php" class="nav-link">Categories</a>
                </li>
                <li>
                    <a href="user.php" class="nav-link">Users</a>
                </li> -->
            </ul>
            <ul class="navbar-nav float-right">
                <!-- <li class="nav-item">
                    <a href="profile.php" class="nav-link text-primary"><i class="fas fa-user"></i> Profile</a>
                </li> -->
                <li class="nav-item">
                    <a href="updatePost.php?post_id=<?php echo $post_id?>" class="nav-link text-info" style="opacity: 1;"><i class="fas fa-pen fa-2x"></i>
                        <!-- <span style='font-size: 25px;'> Edit Post</span> -->
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container mt-5 mx-auto w-50">
        <?php
            displayPostDetails($post_id);
        ?>
    </div>

</body>

</html>