<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="./css/createAccount.css">
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
</head>
<body>
    <?php session_start(); ?>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>

    <div class="container">
        <h1>Créer un compte</h1>
        <form action="/php_script/nouveau_client_script.php" method="post">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="client-new-lastname" required>
            
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="client-new-firstname" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="client-new-mail" required>
            
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="client-new-password" required>
            
            <input type="submit" value="Créer un compte">
            <?php
            if (!empty($_SESSION['erreur-create-message'])) {
                    echo '<p style="color:red;">' . $_SESSION['erreur-create-message'] . '</p>';
                }
            ?>
        </form>
    </div>
</body>
</html>
