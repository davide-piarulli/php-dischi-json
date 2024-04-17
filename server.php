<?php
// prendo il file json esterno e salvo come stringa il contenuto in una variabile
$json_string = file_get_contents('dischi.json');
var_dump($json_string);


$list = json_decode($json_string);

header('Content-Type: application/json');

echo json_encode($list);
