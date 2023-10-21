<?php
function generateRandomPhoneNumber() {
    $ddds = range(11, 99);
    $randomDDD = $ddds[array_rand($ddds)];
    $prefix = "9";
    $randomNumbers = mt_rand(100000000, 999999999);
    return "($randomDDD) $prefix$randomNumbers";
}

// Crie um array para armazenar os números gerados
$phoneNumbers = [];

// Gere 1000 números de telefone
for ($i = 0; $i < 3000; $i++) {
    $phoneNumbers[] = generateRandomPhoneNumber();
}

// Abra um arquivo CSV para escrita
$csvFile = fopen('numeros_de_telefone.csv', 'w');

// Escreva os números no arquivo CSV sem aspas
foreach ($phoneNumbers as $phoneNumber) {
    fwrite($csvFile, $phoneNumber . PHP_EOL);
}

// Feche o arquivo
fclose($csvFile);

echo 'Arquivo CSV "numeros_de_telefone.csv" foi gerado com sucesso.';
?>
