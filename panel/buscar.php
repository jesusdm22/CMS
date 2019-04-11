<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Buscar - Elecktra CMS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- My own JS functions -->
    <script type="text/javascript" src="assets/js/alerta.js"></script>
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
<?php include("funciones.php")?>
<div class="wrapper">
    <div class="sidebar" data-color="purple"  data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <!-- NAVBAR -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Elecktra CMS
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="cms.php">
                        <i class="pe-7s-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                 <li class="active">
                    <a href="grabar.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Grabar</p>
                    </a>
                </li>
                 <li class="active">
                    <a href="buscar.php">
                        <i class="pe-7s-search"></i>
                        <p>Buscar</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <!-- PANEL SUPERIOR -->
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Inicio</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- BODY -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Recuperar nombre -->
                        <h3>
                            Buscar un cliente.
                        </h3>
                        <br>
                        <input class="form-control" id="myInput" type="text" placeholder="Introduce su nombre o número de TLF">
                        <hr>

                        <!-- PHP -->
                        <?php 
                            //Cargamos estilos y scripts
                            include('datos.html');

                            /*------------ CONEXION + SQL ------------*/
                            //Datos para la conexion
                            $host = 'localhost';
                            $user = 'root';
                            $pass = 'Jdm.2210';
                            $db = 'cms';
		            

                            //Realizamos la conexión
                            $conn = new mysqli($host, $user, $pass, $db);

                            //Guardamos la consulta en una variable
                            $sql = "SELECT * FROM datos";
                            $ejecutar = $conn->query($sql);
                            
                        ?>
                        <!-- ./PHP-->


                        <!-- TABLA DE CLIENTES -->

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                    while ($columna = $ejecutar->fetch_assoc()) {
                                        echo "<tr>";
                                            echo "<td>" . $columna['ID']."</td>";
                                            echo "<td>" . $columna['nombre']."</td>";
                                            echo "<td>" . $columna['direccion']."</td>";
                                            echo "<td>" . $columna['telefono']."</td>";
                                            echo "<td id='acciones'>
                                                    <div>
                                                        <a class='btn btn-warning' onclick='alerta()'>Editar</a>
                                                        <a class='btn btn-danger' onclick='alerta()'>Eliminar</a>
                                                    </div>  
                                                  </td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                      </table>

                      <!-- ./TABLA DE CLIENTES-->


                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>
                    Jesús Díaz Muñoz
                </p>
            </div>
        </footer>

    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <!-- Script to filter on the page -->
     <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script> 
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
