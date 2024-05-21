<?php session_start(); ?>

<?php

//on a le tableau de la liste des clients enregistrés
require_once(__DIR__ . '/clientArray.php');

//on recupere les données du user
$post_data = $_POST;

if(isset($post_data['email-login']) && isset($post_data['password-login'])){ //ligne ok
    // echo $clients_array[3]['password'];
    foreach($clients_array as $client){
        //echo $clients_array[3]['password'];
        if($client['mail'] === $post_data['email-login'] && $client['password'] === $post_data['password-login']){
            
            //enregistrement du user dans la session
            $_SESSION['LOGGED_USER'] = 1;
            $_SESSION['LOGGED_USER_last_name'] = $client['nom'];
            $_SESSION['LOGGED_USER_first_name'] = $client['prenom'];
            $_SESSION['LOGGED_USER_mail'] = $client['mail'];
            return;
        }
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
if(!isset($_SESSION['LOGGED_USER'])){
    echo "mauvais mot de passe ou login";
    header("Location: ../login.php");
    exit();
}

?>
    
    
</body>
</html>