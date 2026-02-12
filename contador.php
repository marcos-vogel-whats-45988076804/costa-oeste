<?php
$file = 'contador.txt';

// Lê o contador atual
$contador = 0;
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (count($lines) > 0) {
        $contador = (int)$lines[0]; // a primeira linha é o número de visitas
    }
}

// Incrementa
$contador++;

// Pega a data e hora do acesso
$hora = date("Y-m-d H:i:s");

// Prepara o conteúdo para salvar
$content = $contador . "\n"; // primeira linha é o número total de visitas

// Adiciona o registro do acesso (data e hora) nas linhas seguintes
for ($i = 1; $i < count($lines); $i++) {
    $content .= $lines[$i] . "\n"; // mantém os acessos antigos
}
$content .= "Visita $contador em $hora\n";

// Salva de volta no arquivo
file_put_contents($file, $content);

// Retorna o contador para mostrar no site
echo $contador;
?>
