<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nombres de las bonders</title>
</head>
<body>
<form action=".">
	<legend><!-- BonderName --></legend>
	<label>Nombre</label>
	<input type="text" name="bonder_name">
	<button type="submit">Cambiar nombre</button>
</form>

<script type="text/javascript" src="../jsLib/jquery/jquery.js"></script>
<script type="text/javascript" src="../jsLib/sammy/lib/min/sammy-0.7.2.min.js"></script>
<script type="text/javascript">
	// Inicializo la aplicacion
	var app = Sammy('body', function () {
		this.get('#/', function () {
			// body...
		})
	})
	// Pido la informacion de la maquina al Host (si existe [que deberia de existir])
	// Despliego la informacion.
	// Actualizo la direccion.

	app.run('#/');
</script>

</body>
</html>