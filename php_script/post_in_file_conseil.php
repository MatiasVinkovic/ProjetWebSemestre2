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
// $new_auteur = $_POST['new-auteur'];
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

$insert_data = " \n  {$new_titre}; {$new_categorie}; {$new_resume}; {$_SESSION['LOGGED_USER_first_name']} {$_SESSION['LOGGED_USER_last_name']}; {$new_image} \n" ;
//on insere dans le fichier la nouvelle ligne
file_put_contents('../liste_conseil.txt', $insert_data, FILE_APPEND | LOCK_EX);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon conseil</title>
    <link rel="stylesheet" href="./css/modify_conseil.css">
</head>

<style>
        /* Importation de la police */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        /* Personnalisation de la scroll bar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            border-radius: 5px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.25);
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-color: grey;
        }

        /* Styles généraux */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        h3 {
            color: #666;
            margin-bottom: 10px;
            text-align: center;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            color: #0056b3;
            transform: scale(1.05);
        }

        a:active {
            transform: scale(1);
        }
    </style>
<body>



    <h3>Le conseil a bien été posté !</h3>
    <a href="../index.php">Retour à l'accueil</a>

</body>
</html>