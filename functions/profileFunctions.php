<?php
    require_once 'connection.php';

    function displayProfile($profile_id){
        $conn = db_connect();

        $sql = "SELECT * FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE users.user_id = '$profile_id'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
           return $result->fetch_assoc();
        }else{
            echo "No User Found".$conn->error;
        }
    }

    function checkOldPassword($profile_id){
        $conn = db_connect();

        $confirm_old_password = md5($_POST['confirm_old_password']);

        $sql = "SELECT password FROM accounts INNER JOIN users ON users.account_id=accounts.account_id WHERE user_id = '$profile_id' AND password = '$confirm_old_password'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            return 1; //TRUE
        }else{
           echo $conn->error;
        }
    }

    function updateProfile($first_name, $last_name, $address, $contact_number, $email, $username, $password, $profile_id){
        $conn = db_connect();

        $sql = "UPDATE accounts INNER JOIN users ON users.account_id = accounts.account_id
                SET users.first_name = '$first_name',
                    users.last_name = '$last_name',
                    users.address = '$address',
                    users.contact_number = '$contact_number',
                    users.email = '$email',

                    accounts.username = '$username',
                    accounts.password = '$password'
                WHERE user_id = '$profile_id'
        ";

        if($conn->query($sql)){
            header("Location: profile.php");
            // echo "<script>window.location.replace('profile.php');</script>";
        //     echo "<div class='alert alert-success text-center' role='alert'>
        //     <strong>Success</strong>
        // </div>";
        }else{
            die("ERROR: ".$conn->error);
        }
    }
?>