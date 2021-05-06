<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Editing Window</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  </head>
  <body style="background: linear-gradient(60deg, #bdc3c7 0%,#2c3e50 100%); height: 750px;">

    <?php
    session_start();
    include 'connection-auth.php';
    if(isset($_POST['submit']))
    {
      extract($_POST);

      $email = $_POST["email"];
      	/*filling data in patient details table*/
          $sql1=mysqli_query($conn,"SELECT * FROM doctor WHERE d_email='$email'")or die("Could Not Perform the Query in the Database");
          $row  = mysqli_fetch_array($sql1);


          if(is_array($row))
          {
            $_SESSION["d_email"]=$row['d_email'];
                $_SESSION["password"]=$row['password'];
              $_SESSION["firstname"]=$row['firstname'];
                $_SESSION["lastname"]=$row['lastname'];
                $_SESSION["age"]=$row['age'];
                  $_SESSION["fees"]=$row['fees'];
                    $_SESSION["contact"]=$row['contact'];
            }
          else {
              header("Location: notfound.php");
          }
    }
     ?>

    <div class="card" style="width: 65rem; margin: 50px auto 50px;">



        <form style="width: 50%; background-color: none;  padding: 0px 20px 0px 20px;  margin: 50px auto 50px auto;"
        action="edit-form-page2-doctor.php" method="post">
      <br>
          <div style="position:absolute;">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
          <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
          </svg>
          </div>
            <center>

               <h1 style="margin-left:45px;">Edit Registration</h1>
             </center>

          <br>
        <div class="mb-3" style="display:inline-block; width:50%;">
          <label for="email" class="form-label" style="font-size:18px;">Doctor's Email ID</label>
          <input type="email" style="width:100%;" value=" <?php echo $_SESSION["d_email"] ?>" class="form-control" name = "email" readonly required>
        </div>
        <div class="mb-3"  style="display:inline-block; width:49%;">
          <label for="password" class="form-label" style="font-size:18px;">Password</label>
          <input type="password"  style="width:100%;"  value="<?php echo $_SESSION["password"] ?>" name="password" class="form-control" readonly required>
        </div>
        <br>
        <div class="mb-3" style="display:inline-block; width:50%;">
          <label for="firstname" class="form-label" style="font-size:18px;">First Name</label>
          <input type="text" style="width:100%;" name="firstname"  value="<?php echo $_SESSION["firstname"] ?>"  class="form-control"  required>
        </div>
        <div class="mb-3" style="display:inline-block;  width:49%;">
          <label for="lastname" class="form-label" style="font-size:18px;">Last Name</label>
          <input type="text" style="width:100%;" name="lastname"   value="<?php echo $_SESSION["lastname"] ?>"  class="form-control" required>
        </div>
        <br>
        <div class="mb-3" style="display:inline-block; width:99%;">
          <label for="age" class="form-label" style="font-size:18px;">Age</label>
          <input type="number" style="width:100%;" class="form-control"  value="<?php echo $_SESSION["age"] ?>"  name="age" required>
        </div>

<center>

        <?php
        $result=mysqli_query($conn,"SELECT specialization FROM specialization WHERE d_email='$email'")or die("Could Not Perform the Query in the Database");
        if (mysqli_num_rows($result) > 0) {
        ?>

      <table  class="table table-striped">
      <tr>
        <th scope="col">Specializations</th>
      </tr>

      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {
       ?>

       <tr>
     <td><?php echo $row["specialization"]; ?></td>
     </tr>
     <?php
     $i++;
     }
     ?>

         </table>
      <?php
      }
      else{
        echo "No result found";
      }
      ?>
        </p>
</center>
      <br>
        <div class="mb-3" style="display:inline-block; width:39%;">
          <label for="fees" class="form-label" style="font-size:18px;">Consultancy Fees</label>
          <input type="number" style="width:100%;" class="form-control"  value="<?php echo $_SESSION["fees"] ?>"  name="fees" required>
        </div>
        <div class="mb-3" style="display:inline-block; width:60%;">
          <label for="phone"  class="form-label" style="font-size:18px;">Contact Number</label>
          <input type="phone" style="width:100%;" class="form-control"  value="<?php echo $_SESSION["contact"] ?>"  name= "contact" required>
        </div>
        <center>
        <input type="submit" name="submit" class="btn btn-outline-dark btn-lg" value="Modify"></input>
        <a type="submit" name="return" href="admin-dashboard.php" class="btn btn-outline-dark btn-lg">Return to HomePage</a>
      </center><br>
    </form>
</div>

  </body>
</html>
