<?php
$file = 'contador.txt';

// Se o arquivo não existir, cria com 0
if (!file_exists($file)) {
    file_put_contents($file, "0\n");
}

// Lê todas as linhas
$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Primeiro linha é o número de visitas
$contador = isset($lines[0]) ? (int)$lines[0] : 0;

// Incrementa
$contador++;

// Data e hora do acesso
$hora = date("Y-m-d H:i:s");

// Prepara novo conteúdo
$content = $contador . "\n"; // primeira linha = total de visitas

// Mantém registros antigos
for ($i = 1; $i < count($lines); $i++) {
    $content .= $lines[$i] . "\n";
}

// Adiciona registro do acesso atual
$content .= "Visita $contador em $hora\n";

// Salva de volta no contador.txt
file_put_contents($file, $content);

// Retorna o total de visitas
echo $contador;
?>
