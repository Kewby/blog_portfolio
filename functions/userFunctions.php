<?php
    session_start();

    require_once 'connection.php';

    function login(){
        $conn = db_connect();
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM accounts INNER JOIN users ON users.account_id = accounts.account_id WHERE accounts.username = '$username' AND accounts.password = '$password'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
                $_SESSION['login_id'] = $row['account_id'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['first_name'] = $row['first_name'];
            }

            if($_SESSION['status'] == 'A'){
                header("Location:dashboard.php");
            }elseif($_SESSION['status'] == 'U'){
                header("Location: userDashboard.php");
            }

        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
                <strong>Incorrect Username or Password</strong>
            </div>";
        }  
    }

    function register(){
        $conn = db_connect();
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // echo $first_name, $last_name, $address, $contact_number, $email, $username, $password;
        
        //sql1
        $insertIntoAccounts = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

        if($conn->query($insertIntoAccounts)){
            $last_account_id = $conn->insert_id;
            //sql2n
            $insertIntoUsers = "INSERT INTO users (first_name, last_name, address, contact_number, email, account_id) VALUES ('$first_name', '$last_name', '$address','$contact_number', '$email','$last_account_id')";

            if($conn->query($insertIntoUsers)){
                // header("Location: login.php");
                echo "<script>window.location.replace('login.php');</script>";
            }else{
                echo "<div class='alert alert-danger text-center' role='alert'>
                <strong> Error in USERS Table: ".$conn->error."</strong>
                </div>";
            }
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
            <strong> Error in ACCOUNTS Table: ".$conn->error."</strong>
            </div>";
        }
    }

    function displayAllUsers(){
        $conn = db_connect();

        $sql = "SELECT * FROM users INNER JOIN accounts ON accounts.account_id = users.account_id WHERE accounts.status = 'U'";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                        <td>".$row['user_id']."</td>
                        <td>".$row['first_name']." ".$row['last_name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['contact_number']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['username']."</td>
                        <td><a href='updateUser.php?id=".$row['account_id']."' class='btn btn-sm btn-warning text-white'>Update</a></td>
                        <td><a href='deleteUser.php?id=".$row['account_id']."' class='btn btn-sm btn-danger text-white'>Delete</a></td>
                    </tr>
                ";
            }
        }else{
            echo "<tr>
            <td colspan='8' class = 'text-center 'font-weight-bold'>No Records Found</td>
            </tr>";
        }
    }

    function addUser(){
        $conn = db_connect();
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // echo $first_name, $last_name, $address, $contact_number, $email, $username, $password;
        
        $insertIntoAccounts = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

        if($conn->query($insertIntoAccounts)){
            $last_account_id = $conn->insert_id;

            $insertIntoUsers = "INSERT INTO users (first_name, last_name, address, contact_number, email, account_id) VALUES ('$first_name', '$last_name', '$address','$contact_number', '$email','$last_account_id')";

            if($conn->query($insertIntoUsers)){
                // header("Location: login.php");
                // echo "<script>window.location.replace('usersPage.php');</script>";
                echo "<div class='mt-3 alert alert-success text-center' role='alert'>
                <strong> ADDED NEW USER: </strong>".$first_name." ".$last_name."
                </div>";
            }else{
                echo "<div class='alert alert-danger text-center' role='alert'>
                <strong> Error in USERS Table: ".$conn->error."</strong>
                </div>";
            }
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
            <strong> Error in ACCOUNTS Table: ".$conn->error."</strong>
            </div>";
        }
    }
?>