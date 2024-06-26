<?php
session_start();

//on ne veut pas d'espace pour ne pas faire de bug, les prenoms composes seront donc colles
$client_new_lastname = preg_replace('/\s+/', '', $_POST['client-new-lastname']);
$client_new_firstname = preg_replace('/\s+/', '', $_POST['client-new-firstname']);
$client_new_mail = preg_replace('/\s+/', '', $_POST['client-new-mail']);
$client_new_password = preg_replace('/\s+/', '', $_POST['client-new-password']);


echo $client_new_lastname;
echo $client_new_firstname;
echo $client_new_mail;
echo $client_new_password;

//on recupere le tableau de clients actuel
require_once(__DIR__ . '/clientArray.php');
// // Afficher le tableau associatif
//     echo '<pre>';
//     print_r($clients_array);
//     echo '</pre>';

foreach($clients_array as $clients){
    if( $clients['mail'] ===  $client_new_mail){
        $_SESSION['erreur-create-message'] = 'utilisateur deja inscris';
        header("Location: ../page_createAccount.php");
        exit();
    }
}

$file = 'liste_client.txt';
// Lire tout le fichier dans un tableau
$lines = file($file);

//il nous reste plus qu'a ecrire les informations dans le fichier de clients

$insert_data = "\n {$client_new_lastname}; {$client_new_firstname}; {$client_new_mail}; {$client_new_password}" ;

//on insere dans le fichier la nouvelle ligne
file_put_contents('liste_client.txt', $insert_data, FILE_APPEND | LOCK_EX);

$_SESSION['LOGGED_USER'] = 1;
$_SESSION['LOGGED_USER_last_name'] = $client_new_lastname;
$_SESSION['LOGGED_USER_first_name'] = $client_new_firstname;
$_SESSION['LOGGED_USER_mail'] = $client_new_mail;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .paragraphe {
            text-align: center;
            margin: 20px 0;
        }

        .divi-paragraphe {
            max-width: 500px; /* Limite la largeur de la div */
            margin: 0 auto; /* Centre la div horizontalement */
            text-align: center; /* Centre le texte à l'intérieur de la div */
        }

        /* Style pour le bouton de retour */
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin: 20px 0; /* Espace autour du bouton */
        }

        .button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .button:active {
            background-color: #004080;
            transform: translateY(0);
        }
    </style>
</head>
<body>

    <a href="../index.php" class="button">Retour à l'accueil</a>

    <div class="divi-paragraphe">
        <h3>Merci d'avoir créer un compte chez nous !</h3>
    </div>
    
</body>
</html>
