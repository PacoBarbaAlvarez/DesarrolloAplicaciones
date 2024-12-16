<?php
include 'includes/header.php';
$data = [
    "john.doe@example.com",
    "jane-doe@website.org",
    "invalid-email@com",
    "123-456-7890",
    "987.654.3210",
    "http://www.example.com",
    "https://site.org/path?query=string",
    "not-a-url"
];

// 1. Validación de correos electrónicos
echo "<h2>Validación de correos electrónicos</h2>";
$emailRegex = '/^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,}$/';
foreach ($data as $item) {
    if (preg_match($emailRegex, $item)) {
        echo "<p><b>$item</b> es un correo electrónico válido.</p>";
    } else {
        echo "<p><b>$item</b> no es un correo electrónico válido.</p>";
    }
}

// 2. Extracción de números de teléfono
echo "<h2>Extracción de números de teléfono</h2>";
$phoneRegex = '/\d{3}[-.]\d{3}[-.]\d{4}/';
$phoneNumbers = [];
foreach ($data as $item) {
    if (preg_match($phoneRegex, $item)) {
        $phoneNumbers[] = $item;
    }
}
if (!empty($phoneNumbers)) {
    echo "<p>Números de teléfono válidos:</p><ul>";
    foreach ($phoneNumbers as $phone) {
        echo "<li>$phone</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No se encontraron números de teléfono válidos.</p>";
}

// 3. División de URL en componentes
echo "<h2>División de URLs en componentes</h2>";
$urlRegex = '/^(https?):\/\/([\w.-]+)(\/.*)?$/';
foreach ($data as $item) {
    if (preg_match($urlRegex, $item, $matches)) {
        $protocol = $matches[1];
        $domain = $matches[2];
        $path = isset($matches[3]) ? $matches[3] : '/';
        echo "<p>URL: <b>$item</b></p>";
        echo "<ul>
                <li>Protocolo: $protocol</li>
                <li>Dominio: $domain</li>
                <li>Ruta: $path</li>
              </ul>";
    }
}

// 4. Limpieza de correos inválidos
echo "<h2>Limpieza de direcciones de correo inválidas</h2>";
$cleanedData = preg_replace($emailRegex, '', $data);
echo "<p>Datos originales con correos inválidos eliminados:</p>";
echo "<pre>";
print_r($cleanedData);
echo "</pre>";
include 'includes/footer.php';
?>
