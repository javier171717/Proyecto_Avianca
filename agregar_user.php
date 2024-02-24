<?php
include "coneccion.php";

if (empty($_POST["codigo_vuelo"]) || empty($_POST["piloto"]) || empty($_POST["origen"]) || empty($_POST["destino"]) || empty($_POST["horas_vuelo"])) {
    echo "<p>**Error:** Todos los campos son obligatorios.</p>";
    exit();
}


$codigo_vuelo = filter_var($_POST["codigo_vuelo"], FILTER_SANITIZE_STRING);
$piloto = filter_var($_POST["piloto"], FILTER_SANITIZE_STRING);
$origen = filter_var($_POST["origen"], FILTER_SANITIZE_STRING);
$destino = filter_var($_POST["destino"], FILTER_SANITIZE_STRING);
$horas_vuelo = filter_var($_POST["horas_vuelo"], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO vuelos (codigo_vuelo, piloto, origen, destino, horas_vuelo) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $codigo_vuelo, $piloto, $origen, $destino, $horas_vuelo);
$stmt->execute();
$stmt->close();

$id = $conn->insert_id;

$conn->close();

echo "<p>Registro guardado correctamente!</p>";

echo "<p>Datos ingresados:</p>";
echo "<table border='1'>";
echo "<tr><th>id</th><th>codigo_vuelo</th><th>piloto</th><th>origen</th><th>destino</th><th>horas_vuelo</th></tr>";
echo "<tr><td>$id</td><td>$codigo_vuelo</td><td>$piloto</td><td>$origen</td><td>$destino</td><td>$horas_vuelo</td></tr>";
echo "</table>";

echo"<p><a href='from_user.php'>Ir al formulario</a></p>";

?>
