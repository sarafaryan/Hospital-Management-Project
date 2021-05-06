<?php
session_start();
include 'connection-auth.php';

if(isset($_POST['submit']))
{
  extract($_POST);


      $sql1=mysqli_query($conn,
      "UPDATE doctor SET firstname ='$firstname', lastname='$lastname',
        age= $age, fees=$fees, contact= '$contact' WHERE d_email = '$email'") or die("Could Not Perform the Query in the Database");

          header("Location: edit-success.php");


}

 ?>
