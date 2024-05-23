<?php

ini_set('display_errors', 1);

//on recupere les donnees du formulaire
$new_titre = $_POST['new-titre'];
$new_categorie = $_POST['new-categorie'];
$new_resume = $_POST['new-resume'];
$new_auteur = $_POST['new-auteur'];

$file = '../liste_conseil.txt';
// Lire tout le fichier dans un tableau
$lines = file($file);

// Compter le nombre de lignes
$id = count($lines)+1;

// echo $new_titre; 
// echo $new_categorie;
// echo $new_resume;
// echo $new_auteur;
// echo $id;
echo "Merci d'avoir ecris ce conseil, notre équipe se charge de mettre cela en ligne le plus tot possible !";
//il nous reste plus qu'a ecrire les informations dans le fichier de conseils

$insert_data = "\n {$new_titre}; {$new_categorie}; {$new_resume}; {$new_auteur}; {$id}" ;

//on insere dans le fichier la nouvelle ligne
file_put_contents('../liste_conseil.txt', $insert_data, FILE_APPEND | LOCK_EX);





?>