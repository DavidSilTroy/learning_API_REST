<?php
#primero hay que activr la API creada por nosotros mismos :3

#consultando todo
// $consulta = file_get_contents('http://localhost:8000?resource_type=books').PHP_EOL;
#consultando una colección en específico
// $consulta = file_get_contents('http://localhost:8000?resource_type=books&resource_id=1').PHP_EOL;
#consultando al router.php en lugar del server.php
// $consulta = file_get_contents('http://localhost:8000/books').PHP_EOL;
#consultando específico al router.php en lugar del server.php
$consulta = file_get_contents('http://localhost:8000/books/1').PHP_EOL;

echo $consulta;

$data = json_decode($consulta, true);
print_r( $data).PHP_EOL;

