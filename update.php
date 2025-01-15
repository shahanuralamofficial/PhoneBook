
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        label{
            display:block;
        }
        .message
        {
            color:green;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label>Name:</label>
    <input type="text" name="name" id=""><br>
    <label>Email:</label>
    <input type="email" name="email" id=""><br>
    <label>Phone:</label>
    <input type="tel" name="phone" id=""><br>
    <button type="submit" name="submit">Update Contact</button>
</form>

</body>

</html>

<?php
 
 require "database.php";

 
if (isset($_GET['id'])) {
    $id =$_GET['id'];
}

 if (isset($_POST['submit'])) {

     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];

     $query ="UPDATE contacts SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id";

     $result= mysqli_query($connect,$query);

 if ($result) {
    header("Location: dashboard.php");
 }
    }