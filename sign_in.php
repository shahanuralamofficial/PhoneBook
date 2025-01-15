<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        .alert{
         color: red;
            
        }
        label
        {
            display:block;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label>Email:</label>
        <input type="email" name="email" id="" placeholder="Enter your email"> <br>
        <label>Password:</label>
        <input type="password" name="password" id="" placeholder="Enter your password"> <br>
        <button type="submit" name="submit">Sign In</button> <br>
        <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p>
    </form>
</body>
</html>

<?php

session_start();

 
 require "database.php";

 if (isset($_POST['submit'])) {

     $email =$_POST['email'];
     $password = $_POST['password'];

     $query = "SELECT * FROM users WHERE email = '$email'";
     $result = mysqli_query($connect, $query);

     $users = mysqli_fetch_assoc($result);

     if ($users) {
        if ($password === $users['password']) {

            $_SESSION['email'] = $users ['email'];

            header("Location: dashboard.php");
            die();
        }
        else {
            echo"<p class='alert'>Wrong Password</p>";
        }
     }else {
        echo"<p class='alert'>Email doesn't Exit </p>";
     }

 }

 ?>