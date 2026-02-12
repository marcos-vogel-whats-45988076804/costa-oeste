<?php
$file = 'contador.json';

// Se não existir, cria com 0
if (!file_exists($file)) {
    file_put_contents($file, json_encode(["visitas" => 0]));
}

// Lê o JSON
$data = json_decode(file_get_contents($file), true);

// Incrementa
$data['visitas']++;

// Salva de volta
file_put_contents($file, json_encode($data));

// Retorna o JSON atualizado
header('Content-Type: application/json');
echo json_encode($data);
?>
