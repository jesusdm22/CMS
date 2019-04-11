<?php

/*VARIABLES */

//Para la DB
$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "Jdm.2210";
$dbname = "cms";
$conn;

//Para los datos del usuario
$user;
$pwd;


//Funcion para conectar a la DB
function conectar() {
	global $dbhost, $dbuser, $dbpwd, $dbname, $conn;
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
}


//Funcion para recuperar los datos del usuario
function recuperarDatos() {
	//Requerimos de las variables globales para ejecutar conectar()
	global $dbhost, $dbuser, $dbpwd, $dbname, $conn, $usuario;
	conectar();

	//Realizamos la consulta
	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

	//La ejecutamos y cazamos los datos
	$ejecutar = $conn->query($sql);
	while ($columna = $ejecutar->fetch_assoc()) {
	    	echo $columna['usuario']."<br>";
	 }
}

function paginaEnConstruccion() {
	echo "<br><p style='font-size: 18px;' class='alert alert-warning'>Su página de inicio está en construcción. Espere a la nueva version del CMS</p>";
}


?>
