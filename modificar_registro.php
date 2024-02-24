<?php
include("coneccion.php");

// Verificar si se proporcionan datos válidos
if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id_vuelo'];
    $codigo_vuelo = $_POST['codigo_vuelo'];
    $piloto = $_POST['piloto'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $horas_vuelo = $_POST['horas_vuelo'];

    // Actualizar el registro en la base de datos
    $con = connection();
    $query = "UPDATE vuelos SET id_vuelo='$id_vuelo',codigo_vuelo='$codigo_vuelo', piloto='$piloto', origen='$origen', destino='$destino', horas_vuelo='$horas_vuelo' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location: index.php"); // Redirigir de nuevo a la página principal
        exit;
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($con);
    }
} else {
    echo "Datos de actualización inválidos";
}
?>
 