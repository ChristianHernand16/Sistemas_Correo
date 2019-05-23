<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
 <h1>Mensaje Electronico</h1>
 <link href="estilo/menuCSS3.css" rel="stylesheet" />
</head>

<body>

<p> 
<img src="images.jpg" align="right" width="150" height="150">

</p>
   

 <table border style="width:100%">
 <tr>
 <th>Fecha</th>
 <th>Remitente</th>
 <th>Destino</th>
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
  echo " <td>" . $row['men_destino'] . "</td>";
  echo " <td>" . $row['men_asunto'] . "</td>";
  
  echo " <td> <a href='eliminarcorreoadmin.php?codigo=" . $row['men_id'] . "'>Eliminar</a> </td>";
 

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

