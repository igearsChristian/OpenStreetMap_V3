<?php
include("DB.php");
session_start();
?>


<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>iGears Map app login</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap");
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }
        body {
        background: #2980b9;
        height: 100vh;
        }
        .center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 420px;
        width: 100%;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
        }
        .center h1 {
        text-align: center;
        padding: 20px 0;
        /* border-bottom: 1px solid silver; */
        }
        .center form {
        padding: 0 40px;
        box-sizing: border-box;
        }
        form .txt_field {
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
        }
        .txt_field input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
        }
        .txt_field label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: 0.5s;
        }
        .txt_field span::before {
        content: "";
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #2691d9;
        transition: 0.5s;
        }
        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label {
        top: -5px;
        color: #2691d9;
        }
        .txt_field input:focus ~ span::before,
        .txt_field input:valid ~ span::before {
        width: 100%;
        }
        .pass {
        margin: -5px 0 20px 5px;
        color: #a6a6a6;
        cursor: pointer;
        }
        .pass:hover {
        text-decoration: underline;
        }
        input[type="submit"] {
        width: 100%;
        height: 50px;
        background: #2691d9;
        border-radius: 25px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
        transition: 0.5s;
        border: none;
        }
        input[type="submit"]:hover {
        border-color: #2691d9;
        }
        .signup_link {
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        color: #666666;
        }
        .signup_link a {
        color: #2691d9;
        text-decoration: none;
        }
        .signup_link a:hover {
        text-decoration: underline;
        }
        .row_container {
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }

        

    </style>
  </head>
  <body>
    <div class="center">
    <div class="row_container">
        <img src="img/igears.png" alt="Igears">
    </div>
      <form action="" method="post">
      <h3>Map app login</h3>
        <div class="txt_field">
          <input type="text" name="user_username" autocomplete="off" required />
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="user_password" autocomplete="off" required />
          <span></span>
          <label>Password</label>
        </div>
        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" value="Login" name="login"/>
        <div class="signup_link">Don't have an account? <a href="registration.php">Sign up</a></div>
        <div class="signup_link">powered by OpenStreetMap</div>
      </form>


    
    </div>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

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
                $_SESSION['type'] = $row_data['type'];
                if($row_data['type']=='admin'){
                    echo "<script>window.open('index_admin.php', '_self');</script>";
                } else if($row_data['type']=='user'){
                    echo "<script>window.open('index_user.php', '_self');</script>";
                }
            }else {
                echo "<script>alert('incorrect password. please enter again')</script>";
            }

        } else{
            echo "<script>alert('invalid credential. please enter again')</script>";
        }


    }
    ?>