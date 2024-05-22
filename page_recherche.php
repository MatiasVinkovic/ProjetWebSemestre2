<?php
require_once(__DIR__ . '/conseilArray.php');

//on recupere les donnees de la barre de recherche
$post_data = $_POST;
$terme_recherche = $post_data['terme-recherche'];
echo $terme_recherche;

// //Afficher le tableau associatif
//     echo '<pre>';
//     print_r($conseils_array);
//     echo '</pre>';


// Nouveau tableau pour stocker les conseils trouvés
$new_tab = [];

// Parcourir chaque conseil du tableau
foreach ($conseils_array as $conseil) {
    // Vérifier si le terme de recherche est présent dans un des éléments du conseil
    foreach ($conseil as $key => $value) {
        if (stripos($value, $terme_recherche)==true) {
            // Ajouter le conseil au nouveau tableau si le terme de recherche est trouvé
            $new_tab[] = $conseil;
            // Sortir de la boucle interne pour éviter d'ajouter plusieurs fois le même conseil
            break;
        }
    }
}

// Afficher le nouveau tableau
echo '<pre>';
print_r($new_tab);
echo '<pre>';
?>








?>