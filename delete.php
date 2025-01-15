<?php
require "database.php";

if (isset($_GET['id'])) {
    $id =$_GET['id'];
}

$query = "DELETE FROM contacts where id = $id";
 $result= mysqli_query($connect,$query);

 if ($result) {
    header("Location: dashboard.php");
 }
?>