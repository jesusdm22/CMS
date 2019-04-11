<style type="text/css">
	body {
		font-family:'Helvetica';
	}
</style>


<?php

include("../funciones.php");

	//Funcion para grabar un nuevo usuario los datos del usuario

	global $dbhost, $dbuser, $dbpwd, $dbname, $conn, $usuario;
	conectar();

	$nombre = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];

	//Guardamos la consulta en una variable
	$sql = "INSERT INTO datos(nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";

	//Ejecutamos la consulta

	if ($_POST['nombre'] !== '' && $_POST['direccion'] !== '' && $_POST['telefono'] !== '') {
		
		$conn->query($sql);
		echo "<div style='color: green; font-size: 21px;'>
  				Cliente guardado correctamente.
			   </div>";

	} else {
		echo "<div style='color: lightred; font-size: 21px;'>
  				Algo no va bien... Vuelve a intentarlo.
			   </div>";
		echo "";
	}




?>