<link href="panel/assets/css/bootstrap.min.css" rel="stylesheet" />
<?php 
include("./panel/funciones.php");


function iniciarSesion() {

	$usuario = $_POST['username'];
	$pwd = $_POST['pass'];
	global $conn;
	conectar();

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$pwd'";

	//Ejecutamos la consulta
	$ejecutar = $conn->query($sql);

	/*--- DAR INFORMACION---*/
	//Comprobamos si hay filas en la base de datos que coincidan
	if($ejecutar->num_rows > 0 ){
	 	header('Location: ./panel/cms.php' );
		} else {
	 		print "<br><div class='alert alert-danger'>
                        <span>Revisa los datos</span>
                   </div>";
		}
}
 
 iniciarSesion();	
?>