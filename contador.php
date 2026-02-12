<?php
// Arquivo onde vamos salvar os dados
$file = 'contador.txt';

// Se o arquivo não existir, cria
if (!file_exists($file)) {
    file_put_contents($file, "0\n"); // primeira linha = total de visitas
}

// Lê todas as linhas existentes
$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Primeira linha = total de visitas
$contador = isset($lines[0]) ? (int)$lines[0] : 0;

// Incrementa
$contador++;

// Pega a data e hora atual
$hora = date("Y-m-d H:i:s");

// Prepara o conteúdo para salvar
$content = $contador . "\n"; // primeira linha = total de visitas

// Mantém registros antigos
for ($i = 1; $i < count($lines); $i++) {
    $content .= $lines[$i] . "\n";
}

// Adiciona registro da visita atual
$content .= "Visita $contador em $hora\n";

// Salva de volta no arquivo
file_put_contents($file, $content);

// Exibe o contador total (opcional)
echo "Total de visitas: $contador";
?>
