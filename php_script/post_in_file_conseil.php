<?php

ini_set('display_errors', 1);
session_start();

//gerer l'image envoyée


// Vérifier si un fichier a été téléchargé
if (isset($_FILES['file-to-upload']) && $_FILES['file-to-upload']['error'] == 0) {
    // Définir le chemin de destination pour le fichier téléchargé
    $upload_dir = 'uploads/';
    $upload_file = $upload_dir . basename($_FILES['file-to-upload']['name']);

    // Déplacer le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($_FILES['file-to-upload']['tmp_name'], $upload_file)) {
        echo "Le fichier a été téléchargé avec succès.\n";
    } else {
        $error_message = "Erreur lors du téléchargement du fichier.";
    }
} else {
    $error_message = "Aucun fichier téléchargé ou une erreur s'est produite.";
}


//on recupere les donnees du formulaire
$new_titre = $_POST['new-titre'];
$new_categorie = $_POST['new-categorie'];
$new_resume = $_POST['new-resume'];
$new_auteur = $_POST['new-auteur'];
$new_image = 'uploads/' . basename($_FILES['file-to-upload']['name']);
echo $new_image;

$file = '../liste_conseil.txt';
// Lire tout le fichier dans un tableau
$lines = file($file);



// echo $new_titre; 
// echo $new_categorie;
// echo $new_resume;
// echo $new_auteur;
// echo $id;
echo "Merci d'avoir ecris ce conseil, notre équipe se charge de mettre cela en ligne le plus tot possible !";
//il nous reste plus qu'a ecrire les informations dans le fichier de conseils

$insert_data = "\n  {$new_titre}; {$new_categorie}; {$new_resume}; {$new_auteur}; {$new_image} \n" ;
//on insere dans le fichier la nouvelle ligne
file_put_contents('../liste_conseil.txt', $insert_data, FILE_APPEND | LOCK_EX);





?>