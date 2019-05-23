<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usu</title>

 <h1>Mensajes Recibidos</h1>
 <div id="informacion"><b>Buscar</b></div>

 <link href="estilo/menuCSS3.css" rel="stylesheet" />
 


</head>

<body>

<form onsubmit="return buscarPorCedula()">
        <input type="text" id="cedula" name="cedula" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" />
    </form>

    <p> 
<img src="images.jpg" align="right" width="150" height="150">

</p>
   

 <table border style="width:100%">
 <tr>

 <th>Fecha</th>
 <th>Remitente</th>
 <th>Asunto</th>
 
 </tr>
 <?php
 include '../../../config/conexionBD.php';
 $sql = "SELECT * FROM mensaje";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
  
  echo "<tr>";
  echo " <td>" . $row["men_fecha"] . "</td>";
  echo " <td>" . $row['men_remitente'] ."</td>";
  echo " <td>" . $row['men_asunto'] . "</td>";
  
  echo " <td> <a href='leercorreousuario.php?codigo=" . $row['men_id'] . "'>Leer</a> </td>";
 

  echo "</tr>";
     
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 
 }
 $conn->close();
 ?>
 </table border>



 


</body>
</html>

