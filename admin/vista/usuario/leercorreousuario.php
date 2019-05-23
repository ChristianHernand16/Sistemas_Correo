


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Leer Correo</title>
</head>

<body>
    <?php
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM mensaje where men_id=$codigo";
    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="formulario01" method="POST" action="">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <label for="fecha">Fecha (*)</label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $row["men_fecha"]; ?>" disabled />
                <br>
                
                <label for="remitente">Remitente (*)</label>
                <input type="text" id="remitente" name="remitente" value="<?php echo $row["men_remitente"]; ?>" disabled />
                <br>
                <label for="destino">Destino (*)</label>
                <input type="text" id="destino" name="destino" value="<?php echo $row["men_destino"]; ?>" disabled />
                <br>
                <label for="telefono">Asunto (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["men_asunto"]; ?>" disabled />
                <br>
                <label for="telefono">Texto (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["men_mensaje"]; ?>" disabled />
                <br>
          
                <br>
                
                <a href='../../vista/usuario/indexusuario.php'>Regresar</a>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close(); ?>
</body>

</html>