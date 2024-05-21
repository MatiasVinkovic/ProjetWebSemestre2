<?php

// Nom du fichier
$filename = '../clients/liste_client.txt';

// on verif si le fichier existe
if (file_exists($filename)) {
    // on ouvre le fichier en mode lecture/écriture
    $file = fopen($filename, 'r+');
    // echo "Le fichier existe déjà et a été ouvert.";
} else {
    // Créer et ouvrir le fichier en mode écriture
    $file = fopen($filename, 'w');
    // echo "Le fichier n'existait pas, il a été créé.";
}

// ouverture reussi ?
if ($file) {
    // utiliser le fichier : 
    
    // Fermer le fichier après utilisation
    fclose($file);
} else {
    echo "Échec de l'ouverture du fichier.";
}
?>