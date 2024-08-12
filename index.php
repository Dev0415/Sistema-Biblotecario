<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca ITCA-SAN MIGUEL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
   
        .container {
            padding: 20px;
            text-align: center;
        }
        .titulo {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .hamburger {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 1000;
        }
        .hamburger div {
            width: 100%;
            height: 5px;
            background-color: #333;
            margin: 6px 0;
        }
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #333;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            z-index: 999;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            color: #f1f1f1;
        }
        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
    
    </style>
</head>
<body>

<div class="container">
    <h1 class="titulo">ITCA-FEPADE</h1>
</div>

<div class="hamburger" onclick="openNav()">
    <div></div>
    <div></div>
    <div></div>
</div>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="registrar_libro.php">Registrar Nuevo Libro</a>
    <a href="registrar_estudiante.php">Registrar Nuevo Estudiante</a>
    <a href="realizar_prestamo.php">Realizar Préstamo</a>
    <a href="generar_informe.php">Descargar Informes</a>
</div>

<div class="bienvenido">
    <h1>¡LE DAMOS LA BIENVENIDA A NUESTRA BIBLIOTECA!</h1>
</div>

<img src="img/Light Gray Simple Textured Welcome Back To School Banner.png" alt="">

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>

</body>
</html>