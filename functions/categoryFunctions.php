<?php
    session_start();
    require_once 'connection.php';

    function displayAllCategories(){
        $conn = db_connect();
        $sql = "SELECT * FROM categories";
        
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"
                    <tr>
                        <td>".$row['category_id']."</td>
                        <td>".$row['category_name']."</td>
                        <td><a href='updateCategory.php?id=".$row['category_id']."' class='btn btn-sm btn-warning text-white'>Update</a></td>
                        <td><a href='deleteCategory.php?id=".$row['category_id']."' class='btn btn-sm btn-danger text-white'>Delete</a></td>
                    </tr>
                ";
            }
        }else{
            echo "<tr>
            <td colspan='4' class = 'text-center 'font-weight-bold'>No Records Found</td>
            </tr>";
        }
    }

    function addCategory(){
        $conn = db_connect();
        
        $category_name = $_POST['category_name'];

        $sql = "INSERT INTO categories (category_name) VALUES('$category_name')";

        if($conn->query($sql)){
            // header ("Location: categoriesPage.php");
            echo "<div class='mt-5 alert alert-success text-center' role='alert'>
                <strong> ADDED NEW CATEGORY: </strong>".$category_name."
                </div>";
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>
                <strong> Error: ".$conn->error."</strong>
                </div>";
        }
    }

?>