
<?php

session_start();
if (!isset($_SESSION['email'])) {
   header("Location: sign_in.php");
   die();
}
?>


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
    <button type="submit" name="submit">ADD Contact</button>
</form>

<?php
 
 require "database.php";

 if (isset($_POST['submit'])) {

     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];

     $query = "INSERT INTO contacts (name,email,phone) VALUES ('$name','$email','$phone')";
     $result = mysqli_query($connect,$query);

     if($result)
     {
        echo"<p class='message'>Insert Successfully</p>";
     }

  }

  ?>



<br>
<hr>
<table border="1">
    <tr>
        <th>Contact Id</th>
        <th>Contact Name</th>
        <th>Contact Email</th>
        <th>Contact Phone</th>
        <th>Action</th>
    </tr>

    <?php

    $query = "SELECT *FROM contacts";
    $result = mysqli_query($connect,$query);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
?>
    <tr>
        <td><?php echo  $id;?></td>
        <td><?php echo  $name;?></td>
        <td><?php echo  $email;?></td>
        <td><?php echo  $phone;?></td>
        <td><a href="update.php?id= <?php echo  $id;?>">Update</a>| <a href="delete.php?id= <?php echo  $id;?>">Delete</a></td>
    </tr>
<?php
}
?>


</table>


<br>
    <a href="sign_out.php">Sign Out</a>
</body>
</html>