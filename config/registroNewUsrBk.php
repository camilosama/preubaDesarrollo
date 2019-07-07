<?php
	include('config.ini.php');
	$conn = mysqli_connect($serverDb, $userDb, $pwDb,$nameDb);

	$name=$_POST['name'];
	$adminPw=$_POST['pw'];

	$sql = "INSERT INTO goods (name, description, value)
	VALUES ('$name', '$description', 0)";

	if ($conn->query($sql) === TRUE) {
	   	echo "|1|EL USUARIO <strong>".$_SESSION['nameAdmin']."</strong> FUE REGISTRADO DE FORMA CORRECTA.";
	} else {
	    echo "|0|EL USUARIO NO SE REGISTRO EN EL SISTEMA. VERIFIQUE LA INFORMACION INGRESADA.";
	}
	$conn->close();
?>