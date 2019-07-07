<?php 
  include('config/config.ini.php'); 
  session_start();
  $name=$_GET['name'];
?>

<html>
  <head>
    <?php include('css.php'); ?>
  </head>
  <body>
    <br>
    <div class="container" style="background-color: #ffffff">

    <?php
      include('config/header.php');
      $conn = mysqli_connect($serverDb, $userDb, $pwDb,$nameDb);
      //sql para eliminar resgistro
      $sql = "DELETE FROM goods WHERE name='$name'";

      if ($conn->query($sql) === TRUE) {
      ?>
      <br>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="alert alert-primary text-center" role="alert">
            Eliminacion Exitosa 
            <a href="home.php"> <button type="button" class="btn btn-success">Regresar</button></a>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
      <?php
      } else {
          echo "Error deleting record: " . $conn->error;
      }

      $conn->close();
    ?>
  
      </div>
  </body>
</html>
  <?php include('js.php'); ?>


</div>