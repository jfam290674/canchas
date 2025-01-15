<?php
// Mostrar errores para depurar el problema
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = "https://ecupadel.nexosdelecuador.com/public/protected";

// Configuración de cURL para realizar la solicitud
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error de cURL: ' . curl_error($ch);
} else {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP Code: $httpCode\n";
    echo "Response: $response\n";
}

curl_close($ch);
?>
