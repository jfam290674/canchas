<?php
$url = "https://ecupadel.nexosdelecuador.com/public/protected";

// Token generado previamente
$token = "TU_TOKEN"; // Reemplaza TU_TOKEN con el token que generaste

// Configuración de cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token"
]);

// Ejecutar la solicitud
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

// Mostrar los resultados
echo "HTTP Code: $httpCode\n";
echo "Response: $response\n";
?>
