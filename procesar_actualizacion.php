<?php
include "coneccion.php";

$id = $_POST["id"];
$codigo_vuelo = filter_var($_POST["codigo_vuelo"], FILTER_SANITIZE_STRING);
$piloto = filter_var($_POST["piloto"], FILTER_SANITIZE_STRING);
$origen = filter_var($_POST["origen"], FILTER_SANITIZE_STRING);
$destino = filter_var($_POST["destino"], FILTER_SANITIZE_STRING);
$horas_vuelo = filter_var($_POST["horas_vuelo"], FILTER_SANITIZE_STRING);

$sql = "UPDATE vuelos SET codigo_vuelo = ?, piloto = ?, origen = ?, destino = ?, horas_vuelo = ? WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo "Error al preparar la consulta: " . $conn->error;
}

$stmt->bind_param("ssssss", $codigo_vuelo, $piloto, $origen, $destino, $horas_vuelo, $id);


$stmt->execute();


if ($stmt->errno) {
    echo "Error al ejecutar la consulta: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro actualizado</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Registro actualizado correctamente</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>codigo_vuelo</th>
            <th>piloto</th>
            <th>origen</th>
            <th>destino</th>
            <th>horas_vuelo</th>
        </tr>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $codigo_vuelo; ?></td>
            <td><?php echo $piloto; ?></td>
            <td><?php echo $origen; ?></td>
            <td><?php echo $destino; ?></td>
            <td><?php echo $horas_vuelo; ?></td>
        </tr>
    </table>
    <p><a href="from_user.php">ir a formulario</a></p>
    <p><a href="index.php">ir a base de datos</a></p>
</body>
</html>
