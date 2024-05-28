<?php

session_start();

//info sur lequel je veux modifier
$conseil_titre = $_POST['manage1-conseil-titre'];
$conseil_resume = $_POST['manage1-conseil-resume'];
$conseil_image = $_POST['manage1-conseil-image'];

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

<div class="container">
    <h1><?php echo $conseil_titre ?></h1>
    <h3>Résumé du conseil : </h3>
    <h3><?php echo $conseil_resume ?></h3>

    <form action="script_modifier_conseil.php" method="post" enctype="multipart/form-data">
        <!-- on envoie le nouveau titre qu'on veut mettre -->
        <input type="text" name='new-manage1-conseil-titre' placeholder="Nouveau titre">
        <input type="text" name='new-manage1-conseil-resume' placeholder="Nouveau résumé">
        <!-- on peut aussi mettre une image -->
        <input type="hidden" name="want-to-modify-title" value="<?php echo $conseil_titre ?>">
        <label for="fichier">Remplacer le fichier:</label>
        <input type="file" name="new-image" accept=".jpg">
        <br><br>
        <button type="submit" value="envoyer" class="bouton" target="_blank">Modifier</button>
    </form>
</div>

    <h3>Le conseil a bien été modifié !</h3>
    <a href="index.php">Retour à l'accueil</a>

</body>
</html>

