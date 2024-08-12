<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_estudiante = $_POST['id_estudiante'];
    $id_libro = $_POST['id_libro'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    $sql1 = "INSERT INTO Prestamos (id_estudiante, fecha_prestamo, fecha_devolucion) VALUES ('$id_estudiante', '$fecha_prestamo', '$fecha_devolucion')";
    if ($conn->query($sql1) === TRUE) {
        $id_prestamo = $conn->insert_id;
        $sql2 = "INSERT INTO Detalles_Prestamos (id_prestamo, id_libro) VALUES ('$id_prestamo', '$id_libro')";
        if ($conn->query($sql2) === TRUE) {
            $sql3 = "UPDATE Libros SET disponible = FALSE WHERE id_libro = '$id_libro'";
            $conn->query($sql3);
            echo "Préstamo realizado con éxito";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Realizar Préstamo</title>
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
        <h1 class="titulo">Registrar prestamo</h1>

                <div class="img-container">
    <img src="img/logoColor.png" alt="">
</div>

            </div>
        </div>
    </header>
    <div class="container">
        <form method="post" action="realizar_prestamo.php">
            <label for="id_estudiante">ID Estudiante:</label>
            <input type="number" name="id_estudiante" required>

            <label for="id_libro">ID Libro:</label>
            <input type="number" name="id_libro" required>

            <label for="fecha_prestamo">Fecha de Préstamo:</label>
            <input type="date" name="fecha_prestamo" required>

            <label for="fecha_devolucion">Fecha de Devolución:</label>
            <input type="date" name="fecha_devolucion" required>

            <div class="buttons">
                <input type="submit" value="Registrar Préstamo">
                <a href="index.php">Volver a Inicio</a>
            </div>

        </form>
    </div>
</body>
</html>
