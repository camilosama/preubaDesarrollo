
<?php 
	include('config.ini.php'); 
	session_start();

	include('header.php');
	?>
<button type="button" onclick="frmRegistroNewUser()" class="btn btn-success">Registrar Nuevo Usuario</button><br><br>
	<?php

	$conn = mysqli_connect($serverDb, $userDb, $pwDb,$nameDb);
	$sql = "SELECT name, value, description FROM goods";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		session_start();
	    while($row = $result->fetch_assoc()) {
	    	$name=$row["name"];
	    	?>
	    	<div class="row">
		    	<div class="col-md-2"></div>
				<div class="col-md-6">
				<?php echo "<strong>Nombre:</strong> $name <br><strong>Descripcion:</strong> ".$row["description"]; ?>
				<hr>
				</div>
				<div class="col-md-4">
					<a href="homeEditInfo.php?name=<?php echo $name ?>"><button type="button" class="btn btn-primary">Editar</button></a>
					<a href="homeDeleteInfo.php?name=<?php echo $name ?>"><button type="button" class="btn btn-secondary">Eliminar</button></a>
				
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
</div>

