<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $visa = htmlspecialchars($_POST['visa']);
    $tipus = $_POST['tipus'];
    $seients = (int)$_POST['seients'];
    $dies = (int)$_POST['dies'];
    $km = $_POST['km'];
    
    // Preus base
    $preu_dia = ($tipus == "benzina") ? 20 : 30;
    $suplement_seients = ($seients == 5) ? 10 : 0;
    $suplement_km = ($km == "mes") ? 20 : 0;
    
    // Càlculs
    $preu_sense_iva = ($preu_dia * $dies) + $suplement_seients + $suplement_km;
    $iva = $preu_sense_iva * 0.21;
    $preu_final = $preu_sense_iva + $iva;
    
    echo "<h2>Detalls de la Reserva</h2>";
    echo "<p><strong>Client:</strong> $nom</p>";
    echo "<p><strong>Número VISA:</strong> $visa</p>";
    echo "<p><strong>Preu sense IVA:</strong> " . number_format($preu_sense_iva, 2) . " €</p>";
    echo "<p><strong>IVA (21%):</strong> " . number_format($iva, 2) . " €</p>";
    echo "<p><strong>Preu final amb IVA:</strong> " . number_format($preu_final, 2) . " €</p>";
    echo "<p><a href='index.html'>Tornar al formulari</a></p>";
} else {
    echo "<p>Error: Formulari no enviat correctament.</p>";
    echo "<p><a href='index.html'>Tornar al formulari</a></p>";
}
?>
