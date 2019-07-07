<?php 
	include('config.ini.php'); 
	session_start();
	include('header.php');
?>
<form name="frmNewUser" id="frmNewUser" method="post" class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label>Nombre</label><br>
			<input type="text" name="name" id="name" class="form-control" required>
		</div>
		<div class="col-md-6">
			<label>Descripcion</label><br>
			<textarea cols="52" class="form-control" name="description"> </textarea>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<button type="button" onclick="envioDatosFrm()" class="btn btn-primary btn-lg btn-block">Registrar</button>
		</div>
		<div class="col-md-2"></div>
	</div>
	<br>
</form>

<script type="text/javascript">
	
	function envioDatosFrm(){
		//obtener los datos 1 por uno del formulario
		var name=document.getElementById("name").value;
		if(!name){
			new Noty({
				theme: 'light',
			    type: 'error',
			    layout: 'topRight',
			    text: 'Recuerde que el nombre del usuario es obligatorio',
			    killer:true
			}).show();
		}else{
			envioValidacion();
		}
	}

	function envioValidacion(){
		$.ajax({
			url: "config/registroNewUsrBk.php",
			type: "POST",
			data: $("#frmNewUser").serialize(),
			success:function(resultado){

				var dato = resultado.split('|');
					var codigo=dato[1];
					var msg=dato[2];

				//si la respuesta fue 0 significa que no exist el usuario en le sistema, de los contrario se encontro el usuario
				if(codigo==0){
					new Noty({
						//parmetros basicos del noty
						theme: 'light',
					    type: 'info',
					    layout: 'topRight',
					    text: msg,
					    killer:true
					}).show();
				}else{
					new Noty({
						//parmetros basicos del noty
						theme: 'light',
					    type: 'info',
					    layout: 'topRight',
					    text: msg,
					    killer:true,
					    timeout:2500,
					    progressBar:true,
					    callbacks: {
					    	//cuando cierre sola la lerta direcciona al usuario
						    afterClose: function() {
						    	location.href="home.php";
						    },
						}
					}).show();
				}
			}
		});		
	}
</script>

