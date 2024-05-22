<?php

// ce fichier php a pour but de mettre la liste des conseils_array dans un tableau associatif

// Nom du fichier
$filename = 'liste_conseil.txt';
$variable = "ouoiuoouououo";

// Vérifier si le fichier existe
if (file_exists($filename)) {
    $file = fopen($filename, 'r');
    // Tableau pour stocker les conseils
    $conseils_array = [];

    // on lit toutes les lignes du fichier
    while (($line_c = fgets($file)) !== false) {
        // on enleve les espaces
        $line_c = trim($line_c);

        // passer ca en tableau : parts_clients
        $parts_c = explode(';', $line_c);

        // si la ligne qu'on a a bien 4 parties, alors on les met dans un tableau asso
        if (count($parts_c) === 4) {
            // Ajouter les données dans un tableau associatif
            $conseils_array[] = [
                'titre' => $parts_c[0],
                'categorie' => $parts_c[1],
                'resume' => $parts_c[2],
                'auteur' => $parts_c[3],
            ];
        }
    }

    // // Fermer le fichier
    fclose($file);

    // // Afficher le tableau associatif
    // echo '<pre>';
    // print_r($conseils_array);
    // echo '</pre>';

    // echo "voici {$conseils_array[1]['titre']}";

} else {
    //echo "Le fichier $filename n'existe pas.";
 }
?>
