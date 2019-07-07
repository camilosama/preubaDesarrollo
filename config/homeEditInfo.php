<?php 
  include('config.ini.php'); 
  include('../css.php');
  include('../js.php');
  session_start();
  $originalName=$_POST['originalName'];
  $newName=$_POST['nameOfUser'];
  $description=$_POST['description'];
  $conn = mysqli_connect($serverDb, $userDb, $pwDb,$nameDb);

  $sql = "UPDATE goods SET name='$newName',description='$description'
   WHERE name='$originalName'";
  if (mysqli_query($conn, $sql)) {
    header("Refresh: 300; URL=../home.php");
    ?>
    <br>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="alert alert-primary text-center" role="alert">
          Cambio Exitoso 
          <a href="../home.php"> <button type="button" class="btn btn-success">Regresar</button></a>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <?php
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

?>
