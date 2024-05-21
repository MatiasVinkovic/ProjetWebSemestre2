<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Créer votre compte</title>
</head>
<style>
        /* importation des polices */
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Forum&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        /* personnalisation de la scroll bar */
        ::-webkit-scrollbar{
            width: 5px;
            height: 8px;
        }

        ::-webkit-scrollbar-track{
            border-radius: 5px;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.25);
        }

        ::-webkit-scrollbar-thumb{
            border-radius: 5px;
            background-color: grey;
        }

    </style>
<body>
    
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>


<h1 class="titre-principal">Se connecter</h1>

<!-- CONNEXION AVEC COMPTE EXISTANT-->

<form action="php_script/existeClient.php" method="POST" class="form-login">

    <label for="email" class="label-email">Email : </label> <br>
    <input type="email" class="input-email" id="email" name="email-login" aria-describedby="email-help" placeholder="vous@exemple.com">
    
    <br>

    <label for="password" class="label-password">Mot de passe : </label> <br>
    <input type="password" class="input-password" name="password-login" placeholder="1234azerty"> <br>
    <button type="submit" class="submit-btn">Soumettre</button>
    
    <?php
    
    
    
    ?>
</form>









    
</body>
</html>