<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
    header("Location: /hipermedialJV/SistemaDEGestion/public/vista/login.html"); 
    } 
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../../../css/estilosIndex.css" type="text/css">
<head>
</head>

<body>
    <table id="tablaDatos">
    <caption>Mensajes Recibidos</caption>
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Asunto</th>
            <th></th>
        </tr>

        <?php
        $codigo = $_SESSION['codigo'];
        $correo = $_GET['correo'];

        include '../../../config/conexionBD.php';
        
        $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' AND usu_correo LIKE '$correo%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $sql2 = "SELECT * FROM correo WHERE mail_eliminado = 'N' AND mail_remitente = $row[usu_codigo] AND
                mail_destinatario = $codigo ";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();

                $sql3 = "SELECT usu_correo FROM usuario WHERE usu_codigo = $row2[mail_remitente]";
                $result3 = $conn->query($sql3);

                if ($result3 != null) {
                     $row3 = $result3->fetch_assoc();
                     echo "<tr>";
                     echo "   <td>" . $row2['mail_fecha'] . "</td>";
                     echo "   <td>" . $row3['usu_correo'] . "</td>";
                     echo "   <td>" . $row2['mail_asunto'] . "</td>";
                     echo "   <td>". "<a href = '../../vista/usuario/leerRecibidos.php?fecha=".$row2['mail_codigo']."'>"."Leer</a>"."</td>";
                     echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "   <td colspan='4'> No existen mensajes en su bandeja de entrada del correo $correo  </td>";
                    echo "</tr>";
                }

                    
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='4'> No existen mensajes en su bandeja de entrada del correo $correo </td>";
            echo "</tr>";
        }
        ?>
</table>
</body>

</html>