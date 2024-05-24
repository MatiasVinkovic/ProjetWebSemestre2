<?php

//le titre qu'on veut trouver a modifier
$want_to_modify_title = $_POST['want-to-modify-title'];
//le nouveau titre
$new_title = $_POST['new-manage1-conseil-titre'];
$new_resume = $_POST['new-manage1-conseil-resume'];


// echo "on veut modifier le titre {$want_to_modify_title}";
// echo "on veut comme nouveau titre {$new_title}";

// Ouvrir le fichier en lecture et écriture
$filename = 'liste_conseil.txt';
$file = fopen($filename,'r+');

// Initialiser un tableau pour stocker les lignes du fichier
$lines = [];

// Parcourir les lignes
while (($line = fgets($file)) !== false) {
    // Supprimer les espaces
    $new_line = preg_replace('/\s+/', '', $line);

    // passer cela en tableau
    $parts = explode(';', $new_line);
    


    // ca marche super bien, mais le probleme, c'est que le resume a plus d'espace mtn




    // Vérifier si les champs correspondent aux valeurs de session
    if ($parts[0] == preg_replace('/\s+/', '', $want_to_modify_title)) {
        // Modifier la ligne avec les nouvelles valeurs
        $insert_data = " \n {$new_title}; {$parts[1]}; {$new_resume}; {$parts[3]}; {$parts[4]}\n";
        // Ajouter la nouvelle ligne modifiée au tableau
        $lines[] = $insert_data;
        echo "1";
    } else {
        // Si ce n'est pas la ligne à modifier, conserver la ligne d'origine
        $lines[] = $line;
        echo "0";
    }
}

// Réécrire toutes les lignes dans le fichier
fseek($file, 0); // Remettre le curseur au début du fichier
foreach ($lines as $line) {
    fwrite($file, $line);
}


// Fermer le fichier
fclose($file);



?>