<?php
session_start();
include 'connection-auth.php';
$ai= $_GET['ai'];
$dt= $_GET['dt'];
$st= $_GET['st'];
$pres= $_GET['pres'];
$fn= $_GET['fn'];
$ln= $_GET['ln'];
$pk= $_GET['pk'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <title>Edit Panel async</title>
  </head>
  <body>

                <form style="width: 50%;  padding: 0px 20px 0px 20px;  margin: 180px auto 0px auto;"
                action="" method="POST">
                      <center>  <h1>Edit Status Panel</h1></center>
                  <br>
                <div class="mb-3" style="display:inline-block; width:50%;">
                  <label for="aptid" class="form-label">Appointment ID</label>
                  <input type="text" style="width:100%;" value="<?php echo $ai; ?>" class="form-control" name = "aptid" readonly required>
                </div>
                <div class="mb-3"  style="display:inline-block; width:49%;">
                  <label for="Date" class="form-label">Date</label>
                  <input type="text"  style="width:100%;" value="<?php echo $dt; ?>"  name="date" class="form-control" readonly required>
                </div>
                <br>
                <div class="mb-3" style="display:inline-block; width:22%;">
                  <label for="Status" class="form-label">Status</label>
                  <input type="text" style="width:100%;" value="<?php echo $st; ?>"  name="status" class="form-control"  required>
                </div>
                <div class="mb-3" style="display:inline-block;  width:13%;">
                  <label for="pk" class="form-label">Patient Id</label>
                  <input type="text" style="width:100%;" value="<?php echo $pk; ?>"  name="patientid"  class="form-control" readonly required>
                </div>
                <div class="mb-3" style="display:inline-block; width:63%;">
                  <label for="name" class="form-label">Patient's Name</label>
                  <input type="text" style="width:100%;" value="<?php echo $fn." ".$ln; ?>"  class="form-control" name="name" readonly required>
                </div>
                <br>
                <div class="mb-3" style="display:inline-block;  width:99%;">
                  <label for="prescription" class="form-label">Prescription</label>
                  <input type="text" style="width:100%;" maxlength="1000" value="<?php echo $pres; ?>"  name="prescription"  class="form-control" >
                </div>
                <br>

                <center>
                <input class="btn btn-outline-dark" type="submit" name="update" value="Update" class="btn btn-outline-dark">
                <a name="return" href="doctor-dashboard.php" class="btn btn-outline-dark">Return to HomePage</a>
              </center>
              <br>
            </form>

  </body>
</html>

<?php

if(isset($_POST['update']))
{
  $pid = $_POST['patientid'];
  $status = $_POST['status'];
  $prescription = $_POST['prescription'];

  $data=mysqli_query($conn,"UPDATE appointment SET status='$status', prescription='$prescription' where aptid='$ai' ");

  if($data)
  {
    $_SESSION['recordupdated'] = "Updated";

    header("Location: doctor-dashboard.php");
  }
  else {
      echo "Failed to update record";
  }

}


 ?>
