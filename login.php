<html>
	<head>
		<?php include('css.php'); ?>
	</head>
	<body>
		<div class="container">
    		<div class="row">
      			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        			<div class="card card-signin my-5">
          				<div class="card-body">
            				<h5 class="card-title text-center">Modulo de Ingreso <img src="imagen/007-group.png" width="55px" height="55px"> </h5>
            				<hr>
				            <form class="form-signin" name="frmLogin" id="frmLogin" method="post">
								<div class="form-label-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
										</div>
  										<input type="text" class="form-control" id="user" name="user" required autocomplete="off">
									</div>
								</div>

								<div class="form-label-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Clave</span>
										</div>
										<input type="text" class="form-control" name="pw" id="pw" required="" autocomplete="off">
									</div>
				              	</div>
				              	<hr>
								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onclick="envioDatosFrm()">Ingresar</button>
								<hr class="my-4">
            				</form>
          				</div>
        			</div>
      			</div>
    		</div>
  		</div>
	</body>
</html>
	<?php include('js.php'); ?>

<script type="text/javascript">
	function envioDatosFrm(){
		//obtener los datos 1 por uno del formulario
		var usr=document.getElementById("user").value;
		var pw=document.getElementById("pw").value;
		if(!usr || !pw){
			new Noty({
				theme: 'light',
			    type: 'error',
			    layout: 'topRight',
			    text: 'Recuerde que los datos de usuario  clave son obligatorio',
			    killer:true
			}).show();
		}else{
			envioValidacion();
		}
	}

	function envioValidacion(){
		$.ajax({
			url: "config/validacionLogin.php",
			type: "POST",
			data: $("#frmLogin").serialize(),
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