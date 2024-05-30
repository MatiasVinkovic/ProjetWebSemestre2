<?php

session_start();

// Vérifier si un fichier a été téléchargé
if (isset($_FILES['new-image']) && $_FILES['new-image']['error'] == 0) {
    // Définir le chemin de destination pour le fichier téléchargé
    $upload_dir = 'php_script/uploads/';
    $upload_file = $upload_dir . basename($_FILES['new-image']['name']);

    // Déplacer le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($_FILES['new-image']['tmp_name'], $upload_file)) {
        // echo "Le fichier a été téléchargé avec succès.\n";
    } else {
        $error_message = "Erreur lors du téléchargement du fichier.";
    }
} else {
    $error_message = "Aucun fichier téléchargé ou une erreur s'est produite.";
}


//le titre qu'on veut trouver a modifier
$want_to_modify_title = $_POST['want-to-modify-title'];
//le nouveau titre
$new_title = $_POST['new-manage1-conseil-titre'];
$new_resume = $_POST['new-manage1-conseil-resume'];
$new_image = 'uploads/' . basename($_FILES['new-image']['name']);
echo "fichier : ";
echo $new_image; 


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




    // Vérifier si les champs correspondent aux valeurs de session              //on verifie si le prenom du logged user est present
    if ($parts[0] == preg_replace('/\s+/', '', $want_to_modify_title) && (str_contains( strtolower($parts[3]) , strtolower(preg_replace('/\s+/', '', $_SESSION['LOGGED_USER_first_name'])) ) ==true) ) {
        // Modifier la ligne avec les nouvelles valeurs
        $insert_data = " \n {$new_title}; {$parts[1]}; {$new_resume}; {$parts[3]}; {$new_image}\n";
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
file_put_contents($filename, implode("", $lines));


// Fermer le fichier
fclose($file);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
    <h3>Le conseil a bien été modifié !</h3>
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>


