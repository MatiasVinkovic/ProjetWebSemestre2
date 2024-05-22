<?php

// ce fichier php a pour but de mettre la liste des clients_array dans un tableau associatif

// Nom du fichier
$filename = 'liste_client.txt';

// Vérifier si le fichier existe
if (file_exists($filename)) {
    $file = fopen($filename, 'r');
    // Tableau pour stocker les clients
    $clients_array = [];

    // pn lit toutes les lignes du fichier
    while (($line = fgets($file)) !== false) {
        // on enleve les espaces
        $line = trim($line);

        // passer ca en tableau
        $parts = explode(';', $line);

        // si la ligne qu'on a a bien 4 parties, alors on les met dans un tableau asso
        if (count($parts) === 4) {
            // Ajouter les données dans un tableau associatif
            $clients_array[] = [
                'nom' => $parts[0],
                'prenom' => $parts[1],
                'mail' => $parts[2],
                'password' => $parts[3],
            ];
        }
    }

    // // Fermer le fichier
    fclose($file);

    // // Afficher le tableau associatif
    // echo '<pre>';
    // print_r($clients_array);
    // echo '</pre>';
} else {
    //echo "Le fichier $filename n'existe pas.";
 }
?>
