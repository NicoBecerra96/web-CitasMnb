<?php
   
require_once ("_db.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;


		}

	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","r_user");
        extract($_POST);
        $consulta="UPDATE citamedica_a SET doctor = '$doctor', especialidad = '$especialidad', fecha = '$fecha', hora = '$hora' WHERE nombre_paciente = '$nombre_paciente' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../../agendarC.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","r_user");
    extract($_POST);
    $doctor= $_POST['doctor'];
    $consulta= "DELETE FROM citamedica_a WHERE doctor= $doctor";

    mysqli_query($conexion, $consulta);


    header('Location: ../../agendarC.php');

}

function acceso_user() {
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","","r_user");
    $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../dash.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../views/lector.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}
function acceso_historia_c() {
    
    $_HISTORIAC['historia_c']=$historiac;

    $conexion=mysqli_connect("localhost","root","","r_user");
    $consulta= "SELECT * FROM historiaclinica WHERE historia_c='$historiac';
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../Historia_clinica.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../views/lector.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}





