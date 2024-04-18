<?php
// prendo il file json esterno e salvo come stringa il contenuto in una variabile
$json_string = file_get_contents('dischi.json');


// ricodifico la stringa trasformandola in elemento PHP
$list = json_decode($json_string, true);


// verifico che esista in POST la nuova variabile newDiskTitle
// se esiste, aggiungo un nuovo disco alla lista ed aggiorno il file Json con la lista decodificata in testo
if (isset($_POST['newDiskTitle'])) {
  $new_disk = [
    'title' => $_POST['newDiskTitle'],
    'author' => $_POST['newDiskAuthor'],
    'year' => $_POST['newDiskYear'],
    'poster' => $_POST['newDiskPoster'],
    'genre' => $_POST['newDiskGenre'],
  ];
  $list[] = $new_disk;
  file_put_contents('dischi.json', json_encode($list));
}



// trasformo il file PHP come se fosse un file json
header('Content-Type: application/json');

// stampo la lista come stringa
echo json_encode($list);
