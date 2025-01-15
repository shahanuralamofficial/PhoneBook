<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
   <div class="signup">
   <h1>Welcome to our App</h1>
    <p>Register Here</p>
    <form action="" method="post">
        <label>Email:</label>
        <input type="email" name="email" id="" placeholder="Enter your email"> <br>
        <label>Password:</label>
        <input type="password" name="password" id="" placeholder="Enter your password"> <br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" id="" placeholder="Confirm Password"> <br>
        <button type="submit" name="submit">Sign Up</button> <br>
        <p>Already have an account? <a href="sign_in.php" target="_blank">Sign In</a></p>

    </form>
   </div>
</body>
</html>

<?php
 
 require "database.php";

 if (isset($_POST['submit'])) {

     $email =$_POST['email'];
     $password = $_POST['password'];
     $confirm_password = $_POST['confirm_password'];

    if (empty($email) || empty($password) || empty($confirm_password)) {
        echo"<p class='alert'>All feild must be filled up</p>";
    }

    elseif (strlen($password) < 6) {
        echo"<p class='alert'>Password must be greater than 6 characters</p>";
    }
    elseif ($password != $confirm_password) {
        echo"<p class='alert'>Password & confirm password must be same</p>";
    }

    else {
       $query =  "INSERT INTO users (email, password) VALUES ('$email', '$password')";

       $result = mysqli_query( $connect, $query);
    }
 }

?>