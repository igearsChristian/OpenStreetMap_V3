<?php
include("DB.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .registration-container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container registration-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                    <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username" name = "user_username"  required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password"  name = "user_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password" name = "conf_password" required>
                            </div>
                            <div class="form-group">
                                <label for="account_type">Account Type</label>
                                <select class="form-control" id="account_type" name="account_type" required>
                                    <option value="" disabled selected>Select account type</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="registrationForm">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Already have an account? <a href="login.php">Login here</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php 
    if (isset($_POST['registrationForm'])) {
        include("DB.php");
        // Fetch the POST data
        $username = $_POST['user_username'];
        $password = $_POST['user_password'];
        $confirm_password = $_POST['conf_password'];
        $account_type = $_POST['account_type'];

        echo $username;
        if($password!=$confirm_password){
            echo "<script>alert('passwords do not match. please enter again')</script>";
        } else{
            // Sanitize input
            $username = htmlspecialchars($username);
    
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $insert_query = "INSERT INTO `user_table` (username, password, type) VALUES ('$username', '$hashed_password', '$account_type')";
            $result= mysqli_query($conn,$insert_query);
            if($result){
                echo "<script>alert('registeration successful')</script>";
            }
        }
        
    } else{
        // echo "r";
    }


?>