<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mes informations personnelles</title>
    <link rel="stylesheet" href="./css/modifier_info.css">
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
    

    <div class="container">
        <br>
        <h1 style="text-align:center;">Modifier mes informations personnelles</h1>
        <!-- PS : tous les input sont mis en mode required pour pas que l'on puisse modifier une seule info), pour des 
                                questions de securité :)  -->
        <form action="/php_script/script_modifier_info.php" method="post"> 
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="modified-lastname" required>
            
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="modified-firstname" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="modified-mail" required>
            
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="modified-password" required>
            
            <input type="submit" value="Modifier mes informations">
            
            
            
        </form>
    </div>
        









</body>
</html>