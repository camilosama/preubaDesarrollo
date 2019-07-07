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
    <form id="frmEdirInfo" name="frmEdirInfo" method="post" action="config/homeEditInfo.php">
    <?php
      include('config/header.php');
      $conn = mysqli_connect($serverDb, $userDb, $pwDb,$nameDb);
      $sql = "SELECT name, value, description FROM goods WHERE name='$name'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        session_start();
          while($row = $result->fetch_assoc()) {
            $name=$row["name"];
            $description=$row["description"];
            ?>
            <div class="row">
              <div class="col-md-2"></div>
            <div class="col-md-6">
              <input type="hidden" name="originalName" value="<?php echo $name ?>">
              <label>Name:</label><br>
              <input type="text" name="nameOfUser" class="form-control" value="<?php echo $name ?>">
              <br>
              <label>Description</label><br>
              <textarea cols="52" name="description" class="form-control"><?php echo $description ?></textarea>
            <hr>
            </div>
            <div class="col-md-4"><br><br>
              <button type="submit" class="btn btn-primary" type="">Cambiar Datos</button>
            </div>
          </div>
      <?php
          }
      } else {
        ?>
        <div class="row">
          <div class="col-md-12">
              <br><p class="text-center">NO SE ENCONTRARON USUARIOS EN EL SISTEMA.</p>
          </div>
        </div>
          <?php
      }

      $conn->close();
    ?>
      </form>
      </div>
  </body>
</html>
  <?php include('js.php'); ?>


</div>