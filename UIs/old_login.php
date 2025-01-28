<?php
include("DB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .login-container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>iGears map app login</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username" name = "user_username" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password" name = "user_password" autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"  name="login">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Don't have an account? <a href="registration.php">Sign up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <?php 
    if (isset($_POST['login'])) {
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        
        $select_query="select * from `user_table` where username='$user_username'";
        $result= mysqli_query($conn,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        if($row_count > 0){
            // echo "found";
            if(password_verify($user_password, $row_data['password'])){
                // echo $row_data['type'];
                if($row_data['type']=='admin'){
                    echo "<script>window.open('index_admin.php', '_self');</script>";
                } else if($row_data['type']=='user'){
                    echo "<script>window.open('index_user.php', '_self');</script>";
                }
            }else {
                echo "incorrect password";
            }

        } else{
            echo "invalid credential";
        }


    }
    ?>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
