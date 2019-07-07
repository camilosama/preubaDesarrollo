<html>
	<head>
		<?php include('css.php'); ?>
	</head>
	<body onload="llamdoModulo()">
		<br>
		<div class="container" style="background-color: #ffffff">
    		<div id="resultadoJs"></div>
    	</div>
	</body>
</html>
	<?php include('js.php'); ?>

<script type="text/javascript">
	function llamdoModulo(){
		$.ajax({
			url: "config/home.php",
			type: "POST",
			//data: $("#frmLogin").serialize(),
			beforeSend:function(){
				new Noty({
					//parmetros basicos del noty
					theme: 'light',
				    type: 'warning',
				    layout: 'center',
				    text: "CARGANDO MODULO",
				    killer:true,
				}).show();
			},
			success:function(resultado){
				new Noty({
					//parmetros basicos del noty
					theme: 'light',
				    type: 'info',
				    layout: 'center',
				    text: "MODULO LISTO",
				    killer:true,
				    timeout:1000,
				    progressBar:true,
				    callbacks: {
					    afterClose: function() {
					    	$("#resultadoJs").html(resultado)
					    },
					}
				}).show();
			}
		});		
	}

	function frmRegistroNewUser(){
		$.ajax({
			url: "config/frmNewUser.php",
			type: "POST",
			//data: $("#frmLogin").serialize(),
			beforeSend:function(){
				new Noty({
					//parmetros basicos del noty
					theme: 'light',
				    type: 'warning',
				    layout: 'center',
				    text: "CARGANDO MODULO",
				    killer:true,
				}).show();
			},
			success:function(resultado){
				new Noty({
					//parmetros basicos del noty
					theme: 'light',
				    type: 'info',
				    layout: 'center',
				    text: "MODULO LISTO",
				    killer:true,
				    timeout:1000,
				    progressBar:true,
				    callbacks: {
					    afterClose: function() {
					    	$("#resultadoJs").html(resultado)
					    },
					}
				}).show();
			}
		});		
	}





</script>