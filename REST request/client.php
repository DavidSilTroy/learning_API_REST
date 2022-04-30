<?php
#use in the terminal: php client.php http://localhost:8000/books/1
#use in the terminal: php client.php http://localhost:8000/books/10
#use in the terminal: php client.php http://localhost:8000/books
#use in the terminal: php client.php http://localhost:8000/book

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

switch ( $httpCode ) {
    case 200:
        echo 'Respuesta correcta';
        break;
    case 400:
        echo 'Pedido incorrecto';
        break;
    case 404:
        echo 'Recurso no encontrado';
        break;
    case 500:
        echo 'Falló el servidor';
        break;
}