<?php session_start(); ?>

<?php

ini_set('display_errors', 1);

//on a le tableau de la liste des clients enregistrés
require_once(__DIR__ . '/clientArray.php');

//on recupere les données du user
$post_data = $_POST;

if(isset($post_data['email-login']) && isset($post_data['password-login'])){ //ligne ok
    // echo $clients_array[3]['password'];
    $user_found = false;
    foreach($clients_array as $client){
        //echo $clients_array[3]['password'];
        if($client['mail'] === $post_data['email-login'] && $client['password'] === $post_data['password-login']){
            
            //enregistrement du user dans la session
            $_SESSION['LOGGED_USER'] = 1;
            $_SESSION['LOGGED_USER_last_name'] = $client['nom'];
            $_SESSION['LOGGED_USER_first_name'] = $client['prenom'];
            $_SESSION['LOGGED_USER_mail'] = $client['mail'];
            $_SESSION['LOGGED_USER_password'] = $client['password'];
            // Vérifier si le temps de démarrage de la session est déjà défini
            if (!isset($_SESSION['start_time'])) {
                // Définir le temps de démarrage de la session en secondes depuis l'époque Unix
                $_SESSION['start_time'] = time();
            }
            $user_found = true;
            header("Location: ../index.php");
            
            break;
        }
    }
    if (!$user_found) {
        $_SESSION['erreur-login-message'] = 'Nom d\'utilisateur ou mot de passe incorrect';
        header("Location: ../login.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Réussie</title>
    <!-- <meta http-equiv="refresh" content="2;url=http://localhost:8080/index.php"> -->

</head>
<body>

<?php


?>
    
    
</body>
</html>