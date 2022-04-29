<?php
#primero hay que activr la API creada por nosotros mismos :3

echo 'inicio del del tipo GET'.PHP_EOL;

#consultando todo
// $consulta = file_get_contents('http://localhost:8000?resource_type=books').PHP_EOL;
#consultando una colección en específico
// $consulta = file_get_contents('http://localhost:8000?resource_type=books&resource_id=1').PHP_EOL;
#consultando al router.php en lugar del server.php
// $consulta = file_get_contents('http://localhost:8000/books').PHP_EOL;
#consultando específico al router.php en lugar del server.php
$consulta = file_get_contents('http://localhost:8000/books/1').PHP_EOL;

echo $consulta.PHP_EOL;

$data = json_decode($consulta, true);
print_r( $data).PHP_EOL;

echo 'fin del tipo GET'.PHP_EOL;
echo ''.PHP_EOL;
echo 'inicio del del tipo POST'.PHP_EOL;

$data_to = [
    'titulo' => 'Lo que el viento creó',
    'id_autor' => '4',
    'id_genero' => '5',
];

$payload = json_encode($data_to);

$ch = curl_init('http://localhost:8000/books');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
curl_setopt($ch, CURLOPT_HTTPHEADER,
	[ 
	    'Content-Type: application/json',
	    'Content-Length: ' . strlen($payload)
	]
);
$result = curl_exec($ch);
curl_close($ch).PHP_EOL;
$data = json_decode($result, true);
print_r( $data).PHP_EOL;

echo 'fin del tipo POST'.PHP_EOL;


