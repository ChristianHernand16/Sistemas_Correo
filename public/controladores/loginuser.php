<?php
    
   

    session_start();
 include '../../config/conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $tipo=$row["usu_rol"];
    if('ADMIN'==$tipo){

        echo '<script>alert("BIENVENIDO ADMIN")</script> ';
        echo "<script>location.href='../../admin/vista/usuario/indexadmin.php?usuario=$usuario'</script>";
    
    }
     elseif('USER'==$tipo){
         
        echo '<script>alert("BIENVENIDO USUARIO")</script> ';
        echo "<script>location.href='../../admin/vista/usuario/indexusuario.php?usuario=$usuario'</script>";
     

     } 
} else {
    echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		


}

