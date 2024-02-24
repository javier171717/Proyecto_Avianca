<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AVIANCA</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="background-image">
        <div class="container">
            <div class="card">
                <h1>AVIANCA</h1>
                <form id = "moviefrom"action="agregar_user.php" method="post">
                    <label for="codigo_vuelo">codigo_vuelo:</label>
                    <input type="text" name="codigo_vuelo" id="codigo_vuelo" required>
                    <br>
                    <label for="piloto">piloto:</label>
                    <input type="text" name="piloto" id="piloto" required>
                    <br>
                    <label for="origen">origen:</label>
                    <input type="text" name="origen" id="origen" required>
                    <br>
                    <label for="destino">destino:</label>
                    <input type="text" name="destino" id="destino" required>
                    <br>
                    <label for="horas_vuelo">horas_vuelo:</label>
                    <input type="text" name="horas_vuelo" id="horas_vuelo" required>
                    <br>
                    <br>
                    <button type="submit">Guardar</button>
                    <button type="button" onclick="limpiarInputs()">Borrar</button>
                    <a href='index.php'>Base de datos</a>
                </form>
            </div>
        </div>
    </div>
    <footer>
      <span>
        Hecho por <strong>Javier Jimenez</strong></span></br>
        Todos los derechos resrevados &copy; 2024</span>  
    </footer>
    <script src="index.php"></script>
    <script>
        function limpiarInputs() {
          const inputs = document.querySelectorAll("#moviefrom input");
          const select = document.getElementById("action");
          inputs.forEach(input => {
            input.value = "";
          });
          
          select.value = "yes"; 
        }
      </script>
</body>
</html>
