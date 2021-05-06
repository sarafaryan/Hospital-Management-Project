<?php
session_start();
include 'connection-auth.php';
$_SESSION['patientloggedout']="yes";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Spinnaker&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>



      <link rel="stylesheet" href="styles/patient-dashboard-styles.css">

    <title>Patient Dashboard</title>
  </head>
  <body>

		<div class="top-container">

			<nav class="navbar navbar-light bg-light navbar-expand-lg ">
				<div class="containers" style="margin-left:10px;">
					<div id="main">
						<button class="openbtn" id="openDashauto" onclick="openNav()">&#9776; Dashboard</button>
					</div>

					</a>
				</div>

				<div class="d-flex" style="margin-right: 10px;">
				 <a class="nav-link active" aria-current="page" href="aboutus.php" style="color:black;">Developers</a>
				</div>

			</nav>

		</div>


		<div id="mySidebar" class="sidebar tab" style="background-image: linear-gradient(to top, #09203f 0%, #537895 100%);">
  	<a href="javascript:void(0)" class="closebtn clbt" onclick="closeNav()">&times;</a>
<br><br>
		<a class="tablinks" style="cursor:pointer;" onclick="openCity(event, 'homepage')" id="defaultOpen">Home Page<br>
		</a>

  	<a class="tablinks" style="cursor:pointer;" onclick="openCity(event, 'profile')" >Profile<br>
		</a>


        <a class="tablinks" style="cursor:pointer;" style="width:50%;" onclick="openCity(event, 'manage-reg')">Book Appointment<br>
        </a>

    <a class="tablinks" style="cursor:pointer;" style="width:50%;" onclick="openCity(event, 'aptlist')">Appointments<br>
    </a>



  	<a class="tablinks"  style="cursor:pointer;" onclick="openCity(event, 'feedback')">Feedback<br>
		</a>

    <a class="tablinks" style="cursor:pointer;" style="width:50%;" href="index.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg><?php echo " "; echo " "; ?>Logout<br>
    </a>

	</div>

  <div id="homepage" class="tabcontent" style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom: 0px; background-color:#FAFAF9 ;">

    <div style="margin-left:250px;">
      <div style="margin-left:30px; margin-top:0px;" class="jumbotron">
        <?php echo "<br>"; ?>
      <h1 class="display-4" style="color:black;">Hello, Patient!</h1>
      <p class="lead" style="color:black;">This is the control unit for the database, where you can manage the doctors, keep a check on patients, appointments.</p>
      <hr class="my-4">
      <p style="color:black;">Have a good day! </p>
      </div>

    <center>
      <img src="https://patientexperience.mediclinicinfohub.co.za/resources/front-end/images/MC_LOOP_01_ADMISSION_v1.gif" alt="this slowpoke moves" width=500 style="margin-bottom:0px;"/>
    </center>

    </div>

	</div>


	<div id="profile" class="tabcontent" style="margin-left:300px; margin-top:20px; margin-right:30px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" aria-controls="home" aria-selected="true">Your Profile</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#remove" type="button" role="tab" aria-controls="profile" aria-selected="false">Edit Details</button>
      </li>



    </ul>
    <br>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="home-tab">
        <div style="margin-left:auto; margin-right:auto; margin-bottom:20px;">


                    <?php
                    $email = $_SESSION["p_email"];

                    $sqlforpatient=mysqli_query($conn,"SELECT * FROM patient where p_email='$email' ");
                    $rowforpatient  = mysqli_fetch_array($sqlforpatient);
                      $firstname = $rowforpatient["firstname"];
                      $lastname = $rowforpatient["lastname"];
                      $age = $rowforpatient["age"];
                        $gender = $rowforpatient["gender"];
                      $contact = $rowforpatient["contact"];
                      $bloodgroup = $rowforpatient["bloodgroup"];
                      $patientpassword = $rowforpatient["password"];
                      $patientid = $rowforpatient["pid"];

                     ?>

                     <div style="display:inline-block; position:absolute;">
                          <img src="https://static.vecteezy.com/system/resources/previews/000/966/159/original/doctor-consulting-with-patient-vector.jpg" style="width:50%;" alt="doc-img">
                     </div>
                     <div style="display:inline-block; position:absolute; margin-left:600px; margin-top:50px;">
                        <h1 style="display:inline-block; font-family: 'Spinnaker', sans-serif;"><?php echo "PATIENT ID: ".$patientid;?></h1><br>
                    <br>   <hr class="style1">
                     <h2 style="display:inline-block;"><?php echo $firstname." ".$lastname;?></h2>
                         <h5 style="display:inline-block;"><?php echo ", ".$age." years" ;  ?> </h5><br>
                            <h5 style="display:inline-block;"><?php echo $gender ;  ?> </h5>
                         <br>
                        <br>

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-droplet-half" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/>
    <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"/>
  </svg>
                        <p style="margin-bottom:0px; display:inline-block;">Blood Group: <?php echo $bloodgroup; ?></p>
                    <div style="height:4px;"></div>


                         <svg xmlns="http://www.w3.org/2000/svg" display=inline-block width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
          </svg>
                         <p style="margin-bottom:0px; display:inline-block;">Email ID: <?php echo $email; ?></p>
                         <br>
                         <div style="height:4px;"></div>
                         <svg xmlns="http://www.w3.org/2000/svg" display=inline-block width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
          </svg>
                         <p style="margin-bottom:0px; display:inline-block;">Contact Number: <?php echo "+".$contact ?></p>


                    <br>


                   </div>
                 </div>




      </div>

      <div class="tab-pane fade" id="remove" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card" style="width: 65rem; margin: 50px auto 50px;">
          <form style="width: 50%; background-color: none;  padding: 0px 20px 0px 20px;  margin: 50px auto 50px auto;"
                  action="update-patient.php" method="post">
                <br>
                    <div style="position:absolute;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
                    </div>
                      <center>

                         <h1 style="margin-left:45px;">Edit your profile</h1>
                       </center>

                    <br>
                  <div class="mb-3" style="display:inline-block; width:50%;">
                    <label for="email" class="form-label" style="font-size:18px;">Email ID</label>
                    <input type="email" style="width:100%;" value=" <?php echo $email; ?>" class="form-control" name = "email" readonly required>
                  </div>

                    <div class="mb-3"  style="display:inline-block; width:49%;">
                    <label for="password" class="form-label" style="font-size:18px;">Password</label>
                    <input type="password"  style="width:100%;"  value="<?php echo $patientpassword; ?>" name="password" class="form-control" required>
                  </div>
                  <br>
                  <div class="mb-3" style="display:inline-block; width:50%;">
                    <label for="firstname" class="form-label" style="font-size:18px;">First Name</label>
                    <input type="text" style="width:100%;" name="firstname"  value="<?php echo $firstname;?>"  class="form-control"  required>
                  </div>
                  <div class="mb-3" style="display:inline-block;  width:49%;">
                    <label for="lastname" class="form-label" style="font-size:18px;">Last Name</label>
                    <input type="text" style="width:100%;" name="lastname"   value="<?php echo $lastname?>"  class="form-control"  required>
                  </div>
                  <br>
                  <div class="mb-3" style="display:inline-block; width:24%;">
                    <label for="age" class="form-label" style="font-size:18px;">Age</label>
                    <input type="number" style="width:100%;" name="age"  value="<?php echo $age?>"  class="form-control"  required>
                  </div>
                  <div class="mb-3" style="display:inline-block; width:25%;">
                    <label for="blood" class="form-label" style="font-size:18px;">Blood Group</label>
                    <input type="text" style="width:100%;" name="blood"  value="<?php echo $bloodgroup?>"  class="form-control"  required>
                  </div>
                  <div class="mb-3" style="display:inline-block;  width:49%;">
                    <label for="gender" class="form-label" style="font-size:18px;">Gender</label>
                    <input type="text" style="width:100%;" name="gender"   value="<?php echo $gender?>"  class="form-control"  required>
                  </div>
                  <br>
                  <div class="mb-3" style="display:inline-block; width:99%;">
                    <label for="phone" class="form-label" style="font-size:18px;">Contact Number</label>
                    <input type="number" style="width:100%;" name="phone"  value="<?php echo $contact?>"  class="form-control"  required>
                  </div>

                  <br>


                  <center>
                  <input class="btn btn-outline-dark" type="submit" style="width:50%;" name="submit" value="Update">
                </center>


              </form>
      </div>

      </div>


    </div>
</div>



	<div id="aptlist" class="tabcontent" style="margin-left:300px; margin-top:20px; margin-right:30px;">
	<center><h1 style="margin-top:25px;">Your Appointments</h1><center>

    <?php if(isset($_SESSION['recorddeleted']))
    {
      echo "<div class='alert alert-success' role='alert'> Appointment Cancelled </div>";
      unset($_SESSION['recorddeleted']);
    }
     ?>

    <table class="table">
      <thead class="thead-dark">
      <tr>

      <th scope="col">Appointment ID</th>

        <th scope="col">Date</th>
          <th scope="col">Status</th>
                  <th scope="col">Prescription </th>
                          <th scope="col">Doctor's Name</th>
                              <th scope="col">Action</th>

      </tr>
       </thead>
    <?php
    $patientemail = $_SESSION["p_email"];
    $sql3=mysqli_query($conn,"SELECT pid FROM patient where p_email='$patientemail' ");
    $row3  = mysqli_fetch_array($sql3);
    $pidofthispatient = $row3['pid'];
    $sql = "SELECT  * FROM appointment WHERE pid = '$pidofthispatient' ";


    $result = $conn->query($sql);
    echo "<br>";
    if($result->num_rows>0)
    {  while($row = $result->fetch_assoc()){

      $var_doc = $row["d_email"];
      $sql2=mysqli_query($conn,"SELECT firstname,lastname FROM doctor where d_email='$var_doc' ");
      $row2  = mysqli_fetch_array($sql2);

      echo "<tr ><td>".$row["aptid"]." </td><td>".$row["date"].
      " </td><td>".$row["status"]." </td><td style='word-wrap: break-word; width:400px;'>".$row["prescription"]." </td><td>".$row2["firstname"]." ".$row2["lastname"]."</td>";

      if($row["status"]=="Active")
      {
      echo
      "<td><a class = 'btn btn-primary btn-sm' style='height:50%;' href='cancel-apt.php?ai=$row[aptid]'>Cancel</a>".
      "</td></tr>";

      }
      else {
        echo
        "<td>"."  -"."</td></tr>";
      }

    }
      echo "</table>";
    }
    else {
        echo "</table>";
      echo "<br>There are no appointments registered in our record!";
    }
    $conn->close();
     ?>

    </div>

    <div id="doctorlist" class="tabcontent" style="margin-left:300px; margin-top:20px; margin-right:30px;">
    <center><h3>

      List of Doctors Registered</h3></center>
    <table class="table table-striped">
      <thead>
      <tr>

      <th scope="col">E-mail</th>
          <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
                  <th scope="col">Age</th>
                      <th scope="col">Fees</th>
                          <th scope="col">Contact</th>
      </tr>
       </thead>
    <?php
    include 'connection-auth.php';
    $sql = "SELECT  d_email,firstname,lastname,age,fees, contact from doctor";
    $result = $conn->query($sql);
    echo "<br>";
    if($result->num_rows>0)
    {  while($row = $result->fetch_assoc()){
      echo "<tr ><td>".$row["d_email"]." </td><td>".$row["firstname"].
      " </td><td>".$row["lastname"]." </td><td>".$row["age"]." </td><td>".$row["fees"]." </td><td>".$row["contact"]."</td></tr>";

    }
      echo "</table>";
    }
    else {
        echo "</table>";
      echo "<br>There is no doctor registered in our record!";
    }

     ?>
  </div>


	<div id="manage-reg" class="tabcontent" style="margin-left:300px; margin-top:20px; margin-right:30px;">


  <div class="card" style="width: 65rem; margin: 50px auto 50px;">



      <form style="width: 50%; background-color: none;  padding: 0px 20px 0px 20px;  margin: 50px auto 50px auto;"
      action="apt-book.php" method="post">
    <br>
        <div style="position:absolute;">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
  </svg>
        </div>
          <center>

             <h1 style="margin-left:45px;">Book an Appointment</h1>
           </center>

        <br>
      <div class="mb-3" style="display:inline-block; width:50%;">
        <label for="email" class="form-label" style="font-size:18px;">Email ID</label>
        <input type="email" style="width:100%;" value=" <?php echo $patientemail; ?>" class="form-control" name = "email" readonly required>
      </div>

      <?php

          $sqlQUERY=mysqli_query($conn,"SELECT * FROM patient where p_email='$patientemail'");
          $row  = mysqli_fetch_array($sqlQUERY);
          $_SESSION['passingpatientemail'] = $patientemail;
       ?>

      <div class="mb-3"  style="display:inline-block; width:49%;">
        <label for="name" class="form-label" style="font-size:18px;">Name</label>
        <input type="text"  style="width:100%;"  value="<?php echo $row['firstname']." ".$row['lastname']; ?>" name="name" class="form-control" readonly required>
      </div>
      <br>
      <div class="mb-3" style="display:inline-block; width:50%;">
        <label for="age" class="form-label" style="font-size:18px;">Age</label>
        <input type="number" style="width:100%;" name="age"  value="<?php echo $row['age']?>"  class="form-control" readonly required>
      </div>
      <div class="mb-3" style="display:inline-block;  width:49%;">
        <label for="gender" class="form-label" style="font-size:18px;">Gender</label>
        <input type="text" style="width:100%;" name="gender"   value="<?php echo $row['gender']?>"  class="form-control" readonly required>
      </div>
      <br>

        <label for="date" class="form-label" style="font-size:18px;">Choose a Date</label>
          <input class="form-control" style="width:100%;" type="date" name="date" required>

      <br>
          <div class="mb-3" style="display:inline-block; width:100%;">
      <select class="form-control" style="width:100%;" name="doctor" >
        <?php
        $sqlQUERY2=mysqli_query($conn,"SELECT DISTINCT specialization FROM specialization");

        while ($row  = mysqli_fetch_array($sqlQUERY2))
        {

            echo "<option style='background:#bdc3c7; color:white;' disabled>". $row['specialization']."</option>";
            $spec =  $row['specialization'];
            $sqlQUERY3=mysqli_query($conn,"SELECT d_email FROM specialization WHERE specialization='$spec'");
              while ($rownow  = mysqli_fetch_array($sqlQUERY3))
              { $emailofdoc = $rownow['d_email'];
                $sqlQUERY4=mysqli_query($conn,"SELECT firstname,lastname FROM doctor WHERE d_email='$emailofdoc'");
                $rownow2  = mysqli_fetch_array($sqlQUERY4);
                echo "<option value=".$rownow['d_email'].">"."Dr. ". $rownow2['firstname']." ". $rownow2['lastname']."</option>";
              }
        }

    ?>
    </select>
      </div>
      <center>
      <input class="btn btn-outline-dark" type="submit" style="width:50%;" name="submit" value="Schedule">
    </center>

<center>


  </form>
</div>

  </div>

  <div id="feedback" class="tabcontent" style="margin-left:250px; margin-top:20px;">
    <div class="card" style="width: 75rem; margin: 50px auto 50px;">



        <form style="width: 50%; background-color: none;  padding: 0px 20px 0px 20px;  margin: 50px auto 50px auto;"
        action="submit-feedback2.php" method="post">
      <br>
          <div style="position:absolute;">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
  </svg>
          </div>
            <center>

               <h1 style="margin-left:45px;">Give us a feedback</h1>
             </center>

          <br>
        <div class="mb-3" style="display:inline-block; width:50%;">
          <label for="email" class="form-label" style="font-size:18px;">Email ID</label>
          <input type="email" style="width:100%;" value=" <?php echo $patientemail; ?>" class="form-control" name = "email" readonly required>
        </div>

        <?php

            $sqlQUERY=mysqli_query($conn,"SELECT * FROM patient where p_email='$patientemail'");
            $row  = mysqli_fetch_array($sqlQUERY);
            $_SESSION['passingpatientemail'] = $patientemail;
         ?>

        <div class="mb-3"  style="display:inline-block; width:49%;">
          <label for="id" class="form-label" style="font-size:18px;">Patient ID</label>
          <input type="text"  style="width:100%;"  value="<?php echo $row['pid']; ?>" name="pid" class="form-control" readonly required>
        </div>
        <br>
        <div class="mb-3" style="display:inline-block; width:50%;">
          <label for="firstname" class="form-label" style="font-size:18px;">First Name</label>
          <input type="text" style="width:100%;" name="firstname"  value="<?php echo $row['firstname']?>"  class="form-control" readonly required>
        </div>
        <div class="mb-3" style="display:inline-block;  width:49%;">
          <label for="lastname" class="form-label" style="font-size:18px;">Last Name</label>
          <input type="text" style="width:100%;" name="lastname"   value="<?php echo $row['lastname']?>"  class="form-control" readonly required>
        </div>
        <br>
        <div class="mb-3" style="display:inline-block; width:100%;">
          <label for="phone" class="form-label" style="font-size:18px;">Contact Number: </label>
          <input type="phone" style="width:100%;" name="contact"  value="<?php echo $row['contact']?>"  class="form-control" readonly required>
        </div>

        <br>
        <div style="width:100%;" class="form-group">
           <label for="exampleFormControlTextarea1"></label>
           <textarea class="form-control" style="width:100%;" name="message" placeholder="I want to provide feeback regarding" id="exampleFormControlTextarea1" rows="7" cols="20"></textarea>
         </div>


        <br>
        <center>
        <input class="btn btn-outline-dark" type="submit" style="width:50%;" name="submit" value="SUBMIT FEEDBACK">
      </center>
    </form>
  </div>

  </div>




<script type="text/javascript">

document.getElementById("openDashauto").click();
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function openCity(evt, cityName) {
		var i, tabcontent, tablinks;


tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
	tabcontent[i].style.display = "none";
}


tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
	tablinks[i].className = tablinks[i].className.replace(" active", "");
}


document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " active";

}
document.getElementById("defaultOpen").click();
</script>

  </body>
</html>
