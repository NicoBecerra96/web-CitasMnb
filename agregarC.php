<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ./includes/login.php");
    die();
    
    

}



?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body id="page-top">


<form  action="./includes/validar.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Agendar Cita Médica</h3>
                            <div class="form-group">
                                  
                                <label for="doctor" class="form-label">Doctor *</label>
                                <input type="number"  id="rol" name="doctor" class="form-control" placeholder="Escribe el doctor, 1 Maria Alejandra, 2 Thomas..">
                            </div>
                            
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label><br>
                                <input type="especialidad" name="correo" id="especialidad" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                  <label for="fecha" class="form-label">fecha *</label>
                                <input type="date"  id="fecha" name="fecha" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora</label><br>
                                <input type="time" name="hora" id="hora" class="form-control" required>
                            </div>
                            
                            
                      
                        
                           <br>

                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar"class="btn btn-success" 
                               name="registrar">
                               <a href="agendar.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>