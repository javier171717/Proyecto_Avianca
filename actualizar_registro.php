<?php

include "coneccion.php";

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id === null) {
    echo "<p>**Error:** No se proporcionó un ID válido.</p>";
    exit();
}


$sql_select = "SELECT * FROM vuelos WHERE id = $id";
$result = $conn->query($sql_select);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Registro</title>
</head>
<body>
  <h1>Actualizar Registro</h1>
  <form action="procesar_actualizacion.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="id_vuelo">id_vuelo:</label>
    <input type="int" name="id_vuelo" id="id_vuelo" value="<?php echo $row['id_vuelo']; ?>" required>
    <br>
    <label for="codigo_vuelo">codigo_vuelo:</label>
    <input type="int" name="codigo_vuelo" id="codigo_vuelo" value="<?php echo $row['codigo_vuelo']; ?>" required>
    <br>
    <label for="piloto">piloto:</label>
    <input type="text" name="piloto" id="piloto" value="<?php echo $row['piloto']; ?>" required>
    <br>
    <label for="origen">origen:</label>
    <input type="text" name="origen" id="origen" value="<?php echo $row['origen']; ?>" required>
    <br>
    <label for="destino">destino:</label>
    <input type="text" name="destino" id="destino" value="<?php echo $row['destino']; ?>" required>
    <br>
    <label for="horas_vuelo">horas_vuelo:</label>
    <input type="text" name="horas_vuelo" id="horas_vuelo" value="<?php echo $row['horas_vuelo']; ?>" required>
    <br>
    <br>
    <button type="submit">Guardar</button>
    <a href="index.php">Cancelar</a>
  </form>
</body>
</html>
<?php
} else {
    echo "<p>No se encontraron datos para actualizar.</p>";
}
$conn->close();
?>
