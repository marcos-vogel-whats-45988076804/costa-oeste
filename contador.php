<?php
$file = 'contador.json';

if (!file_exists($file)) {
    file_put_contents($file, json_encode(["visitas" => 0]));
}

$data = json_decode(file_get_contents($file), true);

$data['visitas']++;

file_put_contents($file, json_encode($data));

header('Content-Type: application/json');
echo json_encode($data);
?>
