<?php
session_start();
include 'connection-auth.php';
$_SESSION['doctorloggedout'] = "Yes";
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>



      <link rel="stylesheet" href="styles/doctor-dashboard.css">

    <title>Doctor Dashboard</title>
  </head>
  <body>

		<div class="top-container">

			<nav class="navbar navbar-light bg-light navbar-expand-lg ">
				<div class="containers" style="margin-left:10px;">
					<div id="main">
						<button id="openDashauto" class="openbtn" onclick="openNav()">&#9776; Dashboard</button>
					</div>

					</a>
				</div>

				<div class="d-flex" style="margin-right: 10px;">
					 <a class="nav-link active" aria-current="page" href="aboutus.php" style="color:black;">Developers</a>
				</div>

			</nav>

		</div>


		<div id="mySidebar" class="sidebar tab" style="background:  	#202020;">
  	<a href="javascript:void(0)" class="closebtn clbt" onclick="closeNav()">&times;</a>
<br><br>
		<a class="tablinks" style="cursor:pointer;" onclick="openCity(event, 'homepage')" id="defaultOpen">Home Page<br>
		</a>

  	<a class="tablinks" style="cursor:pointer;" onclick="openCity(event, 'profile')" >Profile<br>
		</a>

    <a class="tablinks" id="AptTab" style="cursor:pointer;" style="width:50%;" onclick="openCity(event, 'aptlist')">Appointments<br>
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

	<div id="homepage" class="tabcontent" style="margin-left:0px; margin-top:0px; margin-right:0px; margin-bottom: 0px; background-color:#3F90CE ;">

    <div style="margin-left:250px;">
      <div style="margin-left:30px; margin-top:0px;" class="jumbotron">
        <?php echo "<br>"; ?>
      <h1 class="display-4" style="color:blanchedalmond;">Hello, Doctor!</h1>
      <p class="lead" style="color:blanchedalmond;">Keep a track of your patients and appointments. Provide your valuable feedback whenever necessary.</p>
      <hr class="my-4">
      <p style="color:blanchedalmond;">Have a good day! </p>
      </div>

    <center>
      <img src="https://cdn.dribbble.com/users/514480/screenshots/2091133/doctor.gif" alt="this slowpoke moves" width=650 style="margin-bottom:0px;"/>
    </center>

    </div>

	</div>



	<div id="profile" class="tabcontent" style="margin-left:300px; margin-top:20px; margin-right:30px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" aria-controls="home" aria-selected="true">Your Profile</button>
      </li>


    </ul>
    <br>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="home-tab">
        <div style="margin-left:auto; margin-right:auto; margin-bottom:20px;">

                    <?php
                      $email = $_SESSION["d_email"];
                      $sql=mysqli_query($conn,"SELECT * FROM doctor where d_email='$email'");
                      $row  = mysqli_fetch_array($sql);
                      $firstname = $row["firstname"];
                      $lastname = $row["lastname"];
                      $age = $row["age"];
                      $email = $row["d_email"];
                      $contact = $row["contact"];
                      $fees = $row["fees"];
                     ?>

                     <div style="display:inline-block; position:absolute;">
                          <img src="images\doc-pic-prof1.png" style="width:85%;" alt="doc-img">
                     </div>
                     <div style="display:inline-block; position:absolute; margin-left:500px;">
                        <h1 style="display:inline-block;"><?php echo "Dr. ".$firstname." ".$lastname;?></h1><br>
                         <h5 style="display:inline-block;"><?php echo $age." years" ;  ?> </h5>
                         <br>
                         <hr class="style1">


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
                               <?php
                       $result=mysqli_query($conn,"SELECT specialization FROM specialization WHERE d_email='$email'")or die("Could Not Perform the Query in the Database");

                       ?>
                       <br><br>
                     <h5><b>Specializations</b></h5>

                     <?php
                     $i=0;
                     while($row = mysqli_fetch_array($result)) {
                       if ($i%4 == 0 && $i!=0)
                       { ?>
                         <div style="height:4px;">

                         </div>
                          <button type="button" class="btn btn-outline-secondary"><?php echo $row["specialization"]; ?></button>



                      <?php
                      $i++;
                    }

                    else { ?>
                    <button type="button" class="btn btn-outline-secondary"><?php echo $row["specialization"]; ?></button>

                    <?php
                    $i++;
                  }}
                    ?>



                    <br>

                    <br>
                    <h5><b>Consultancy Fees</b></h5>
                     <p><?php echo " Rs. ".$fees; ?> </p>

                   </div>
    </div>

  </div>


    </div>
</div>



	<div id="aptlist" class="tabcontent" style="margin-left:300px; margin-top:20px; margin-right:30px;">
	<center><h1 style="margin-top:25px;">Your Appointments</h1><center>

    <?php if(isset($_SESSION['recordupdated']))
    {
      echo "<div class='alert alert-success' role='alert'> Records Updated Successfully </div>";
      unset($_SESSION['recordupdated']);
    }
     ?>


        <table class="table table-striped">
          <thead>
          <tr>

          <th scope="col">Appointment ID</th>

            <th scope="col">Date</th>
              <th scope="col">Status</th>
                <th scope="col" >Prescription</th>
                <th scope="col">Patient's Name</th>
            <th scope="col"></th>

          </tr>
           </thead>
        <?php

        $sql = "SELECT  * FROM appointment WHERE d_email = '$email'";

        $result = $conn->query($sql);
        echo "<br>";
        if($result->num_rows>0)
        {  while($row = $result->fetch_assoc()){

          $var_patient = $row["pid"];
          $sql2=mysqli_query($conn,"SELECT firstname,lastname FROM patient where pid='$var_patient' ");
          $row2  = mysqli_fetch_array($sql2);

          echo
          "<tr ><td>".$row["aptid"].
          "</td><td>".$row["date"].
          "</td><td>".$row["status"].
          " </td><td style='word-wrap: break-word; width:400px;'>".$row["prescription"].
          " </td><td>".$row2["firstname"]." ".$row2["lastname"]."</td>";

          if($row["status"]!="Cancelled")
          echo
          "<td><a class = 'btn btn-primary btn-sm' style='height:50%;' href='edit-apt.php?ai=$row[aptid]&dt=$row[date]&st=$row[status]&pres=$row[prescription]&fn=$row2[firstname]&ln=$row2[lastname]&pk=$row[pid]'>Edit</a>".
          "</td></tr>";

        }
          echo "</table>";
        }
        else {
            echo "</table>";
          echo "<br>There are no appointments registered in our record!";
        }

         ?>

  </div>


  <div id="feedback" class="tabcontent" style="margin-left:300px; margin-top:20px;">
    <div class="card" style="width: 75rem; margin: 50px auto 50px;">



        <form style="width: 50%; background-color: none;  padding: 0px 20px 0px 20px;  margin: 50px auto 50px auto;"
        action="submit-feedback3.php" method="post">
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
        <div class="mb-3" style="display:inline-block; width:100%;">
          <label for="email" class="form-label" style="font-size:18px;">Email ID</label>
          <input type="email" style="width:100%;" value=" <?php echo $email; ?>" class="form-control" name = "email" readonly required>
        </div>

        <?php

            $sqlQUERY=mysqli_query($conn,"SELECT * FROM doctor where d_email='$email'");
            $row  = mysqli_fetch_array($sqlQUERY);
            $_SESSION['d_email'] = $email;
         ?>


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
