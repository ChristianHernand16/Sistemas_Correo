<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Mensaje</title>
        <style type="text/css" rel="stylesheet">
            .error{
            color: red;
            }
        </style>
    </head>

    <body>
        <?php
            //incluir conexión a la base de datos
            include '../../config/conexionBD.php';
            $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
            $remitente = isset($_POST["remitente"]) ? mb_strtoupper(trim($_POST["remitente"]), 'UTF-8') : null;
            $destino = isset($_POST["destino"]) ? mb_strtoupper(trim($_POST["destino"]), 'UTF-8') : null;
            $asunto = isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"]), 'UTF-8') : null;
            $mensaje = isset($_POST["mensaje"]) ? trim($_POST["mensaje"]): null;

            $sql = "INSERT INTO mensaje VALUES (0, '$fecha', '$remitente', '$destino','$asunto', '$mensaje','N')";
            if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
            } else {
             if($conn->errno == 1062){
            echo "<p class='error'>El correo esta registrado en el sistema </p>";
                }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            //cerrar la base de datos
            $conn->close();
            echo "<a href='../vista/nuevomensaje.html'>Regresar</a>";
        ?>
    </body>
</html>
