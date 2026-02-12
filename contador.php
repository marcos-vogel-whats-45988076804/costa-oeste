<?php
// lê o arquivo JSON
$file = 'contador.json';
$data = json_decode(file_get_contents($file), true);

// incrementa
$data['visitas']++;

// salva de volta
file_put_contents($file, json_encode($data));

// devolve o valor atualizado
header('Content-Type: application/json');
echo json_encode($data);
?>
