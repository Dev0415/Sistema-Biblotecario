<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $carnet = $_POST['carnet'];
    $carrera = $_POST['carrera'];

    $sql = "INSERT INTO Estudiantes (nombre, apellido, carnet, carrera) VALUES ('$nombre', '$apellido', '$carnet', '$carrera')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo estudiante registrado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
    <div class="container">
    <h1 class="titulo"> ITCA-FEPADE</h1>

            <nav>
                <ul>
                    <li><a href="registrar_libro.php">Registrar Nuevo Libro</a></li>
                    <li><a href="registrar_estudiante.php">Registrar Nuevo Estudiante</a></li>
                    <li><a href="realizar_prestamo.php">Realizar Préstamo</a></li>
                    <li><a href="generar_informe.php">Descargar Informes</a></li>
                </ul>
            </nav>
        </div>
        <br>
        <br><br><br>
        <div class="container">
        <h1 class="titulo">Registrar Nuevo Estudiante</h1>

                <div class="img-container">
    <img src="img/logoColor.png" alt="">
</div>

            </div>
        </div>
    </header>
    <div class="container">
        <form method="post" action="registrar_estudiante.php">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required>

            <label for="carnet">Carnet:</label>
            <input type="text" name="carnet" required>

            <label for="carrera">Carrera:</label>
            <input type="text" name="carrera">

           

            <form action="index.php" method="get">
            <div class="buttons">
            <input type="submit" value="Registrar">
                <a href="index.php">Volver a Inicio</a>
            </div>
</form>
        </form>
    </div>
</body>
</html>
