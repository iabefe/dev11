<?php
// Recuperamos los datos del formulario
$nombre = $_POST['nombre'];
$visa = $_POST['visa'];
$tipo = $_POST['tipo'];
$seats = $_POST['seats'];
$dias = $_POST['dias'];
$km = $_POST['km'];

// Definimos precios base
$precio_dia = ($tipo == 'benzina') ? 20 : 30;
$suplemento_seats = ($seats == 5) ? 10 : 0;
$suplemento_km = ($km == 'mas') ? 20 : 0;

// Calculamos el precio base
$precio_base = ($precio_dia * $dias) + $suplemento_seats + $suplemento_km;

// Calculamos el IVA (21%)
$iva = $precio_base * 0.21;

// Precio final con IVA
$precio_final = $precio_base + $iva;

// Mostramos el resultado
echo "<h1>Detalles de la Reserva</h1>";
echo "Nombre: $nombre<br>";
echo "Número de VISA: $visa<br>";
echo "Precio sin IVA: " . number_format($precio_base, 2) . " €<br>";
echo "IVA (21%): " . number_format($iva, 2) . " €<br>";
echo "Precio Final con IVA: " . number_format($precio_final, 2) . " €<br><br>";
echo '<a href="index.html">Volver al formulario</a>';
?>

