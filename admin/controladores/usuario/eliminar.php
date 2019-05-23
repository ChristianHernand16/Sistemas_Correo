<<<<<<< HEAD
=======
<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /SistemaDeGestion/public/vista/login.html");
 }
?>
>>>>>>> 4db4a76b7b0592b4361d507ba78bb45683d5d885
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];

 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE
usu_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
 } else {
 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
 }
<<<<<<< HEAD
 echo "<a href='../../vista/usuario/indexadmin.php'>Regresar</a>";
=======
 echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
>>>>>>> 4db4a76b7b0592b4361d507ba78bb45683d5d885
 $conn->close();

?>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 4db4a76b7b0592b4361d507ba78bb45683d5d885
