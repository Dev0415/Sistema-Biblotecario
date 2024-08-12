<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $anio_publicacion = $_POST['anio_publicacion'];
    $isbn = $_POST['isbn'];

    $sql = "INSERT INTO Libros (titulo, autor, editorial, anio_publicacion, isbn) VALUES ('$titulo', '$autor', '$editorial', '$anio_publicacion', '$isbn')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo libro registrado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Libro</title>
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
        <h1 class="titulo"> Registrar Nuevo Libro</h1>

                <div class="img-container">
    <img src="img/logoColor.png" alt="">
</div>

            </div>
        </div>
    </header>
    
    <d class="container">
        <form method="post" action="registrar_libro.php">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>

            <label for="autor">Autor:</label>
            <input type="text" name="autor" required>

            <label for="editorial">Editorial:</label>
            <input type="text" name="editorial">

            <label for="anio_publicacion">Año de Publicación:</label>
            <input type="number" name="anio_publicacion">

            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn">

        
            <div class="buttons">
            <input type="submit" value="Registrar">
                <a href="index.php">Volver a Inicio</a>
            </div>

</form>



        
</div>
</body>
</html>
