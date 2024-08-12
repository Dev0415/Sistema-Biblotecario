<?php
// Incluir la biblioteca TCPDF
require_once('tcpdf/tcpdf.php');

// Conexión a la base de datos (reemplaza con tus propias credenciales)
$conn = new mysqli('localhost', 'root', '', 'biblotecaitca');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos del informe
$sql = "SELECT p.id_prestamo, e.nombre AS estudiante, l.titulo AS libro, dp.fecha_devolucion_real, dp.estado 
        FROM Prestamos p
        JOIN Detalles_Prestamos dp ON p.id_prestamo = dp.id_prestamo
        JOIN Estudiantes e ON p.id_estudiante = e.id_estudiante
        JOIN Libros l ON dp.id_libro = l.id_libro
        WHERE dp.estado IN ('activo', 'en mora')";

$result = $conn->query($sql);

// Crear un nuevo objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Establecer metadatos del PDF
$pdf->SetCreator('Biblioteca ITCA-SAN MIGUEL');
$pdf->SetTitle('Informe de Préstamos');
$pdf->SetHeaderData('', 0, 'Informe de Préstamos', '');

// Agregar una página
$pdf->AddPage();

// Configurar fuente y tamaño
$pdf->SetFont('helvetica', '', 12);

// Encabezado de la tabla
$html = '<table border="1">
            <tr>
                <th>ID Préstamo</th>
                <th>Estudiante</th>
                <th>Libro</th>
                <th>Fecha Devolución Real</th>
                <th>Estado</th>
            </tr>';

// Datos de la tabla
while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id_prestamo'] . '</td>
                <td>' . $row['estudiante'] . '</td>
                <td>' . $row['libro'] . '</td>
                <td>' . $row['fecha_devolucion_real'] . '</td>
                <td>' . $row['estado'] . '</td>
              </tr>';
}

$html .= '</table>';

// Escribir HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('Informe_Prestamos.pdf', 'D');

// Cerrar la conexión y liberar recursos
$conn->close();
