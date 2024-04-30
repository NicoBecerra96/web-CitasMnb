<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>agendarC</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <h5>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?></h5>
                    </a>
                </li>

                <li>
                    <a href="dash.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="CitasAgendadas.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="HistoriaC.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Historia clinica</span>
                    </a>
                </li>

                <li>
                    <a href="resultados.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Resultados</span>
                    </a>
                </li>
              



                <li>
                    <a href="includes/_sesion/cerrarSesion.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Cerrar Sesión</span>

                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Busca Aquí">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="imgs/customer01.jpg" alt="">
                </div>
            </div>
<!--DATOS DE CITAS AGENDADAS---------------------------------->
        <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="index.php">Registar</a>
                        </li>                       
                    </ul>
                </div>
                <div class="card-body">
                    <table class="table">
                        <h2 class="card-title">Cita Médica Asignada</h2>
                        <thead>
                            <tr>
                               <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Ubicación</th>
                                <th>Nombre Paciente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="card-body">
                            |<?php 
                                $conexion=mysqli_connect("localhost","root","","r_user");               
                                $SQL="SELECT citamedica_a.doctor, citamedica_a.especialidad, citamedica_a.fecha, citamedica_a.hora, citamedica_a.ubicacion, user.nombre FROM citamedica_a
                                LEFT JOIN user ON citamedica_a.nombre_paciente = user.nombre";
                                $dato = mysqli_query($conexion, $SQL);

                                if($dato -> num_rows >0){
                                while($fila=mysqli_fetch_array($dato)){
                            ?>
                            <tr>
                                <td><?php echo $fila['doctor']; ?></td>
                                <td><?php echo $fila['especialidad']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                                <td><?php echo $fila['hora']; ?></td>
                                <td><?php echo $fila['ubicacion']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                            
                                <td>
                                    <a class="btn btn-warning" href="views/c_a/editar_cita.php?id=<?php echo $fila['id']?>"> 
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    
                                    
                                    <a class="btn btn-danger" href="views/eliminar_user.php?id=<?php echo $fila['id']?>">
                                    <i class="fa fa-trash"></i></a>
                                </td>
                             </tr>
                             
                            <?php
                            }
                            }else{
                            ?>
                            <tr class="text-center">
                                <td colspan="16">No existen registros</td>
                            </tr>
                            <?php
                            }
                             ?>
                        </tbody>   
                    </table>
                
                </div>
    <!-- =========== Scripts =========  -->
    <script src="js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/user.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script src="https://kit.fontawesome.com/5ea4a5740b.js" crossorigin="anonymous"></script>
</body>
</html>