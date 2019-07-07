<?php
	include('config.ini.php');
	$conn = mysqli_connect($serverDb, $userDb, $pwDb,$nameDb);

	$adminName=$_POST['user'];
	$adminPw=$_POST['pw'];

	$sql = "SELECT name, state FROM goodsAdministrator
	WHERE name='$adminName' AND password='$adminPw'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		session_start();
	    while($row = $result->fetch_assoc()) {
	    	$_SESSION['nameAdmin']  = $row["name"];
	    	$_SESSION['stateAdmin']  = $row["state"];
	       echo "|1|EL USUARIO <strong>".$_SESSION['nameAdmin']."</strong> FUE VALIDADO DE FORMA CORRECTA.";
	    }
	} else {
	    echo "|0|EL USUARIO NO SE ENCONTRO EN EL SISTEMA. VERIFIQUE LA INFORMACION INGRESADA.";
	}

	$conn->close();
?>