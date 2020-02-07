<?php
    include 'functions/postFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Add Post</title>
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

    <div class="container-fluid" style="margin-top:100px;">
        <h2 class="display-3 text-center mt-4"><i class="far fa-edit"></i> Add Post</h2>
    </div>

    <div class="container mt-5 mx-auto w-50">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <input type="text" name="title" id="" class="form-control lighto custom-form" placeholder="TITLE">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <input type="date" name="date_posted" id="" class="form-control lighto custom-form">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <select name="category" id="" class="form-control lighto custom-form">
                        <option value="#" selected disabled>CATEGORY</option>
                        <?php
                            displayDropdownCategory();
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <textarea name="message" id="" class="form-control lighto custom-form" rows="7"
                        placeholder="MESSAGE"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white" id="basic-addon1">Author:</span>
                        </div>
                        <input type="text" name="author" class="form-control" value="<?php echo $_SESSION['username']?>" aria-label="Username"
                            aria-describedby="basic-addon1" disabled>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <button type="submit" name="add" class="btn btn-dark form-control mt-4">POST</button>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST['add'])){
                $user_id = $_SESSION['login_id'];

                addPost($user_id);
            }
        ?>
    </div>

</body>

</html>