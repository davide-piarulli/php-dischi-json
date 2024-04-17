<?php
// prendo il file json esterno e salvo come stringa il contenuto in una variabile
$json_string = file_get_contents('dischi.json');


// ricodifico la stringa trasformandola in elemento PHP
$disk = json_decode($json_string);

// trasformo il file PHP come se fosse un file json
header('Content-Type: application/json');

// stampo la lista come stringa
echo json_encode($disk);
