<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/creer_conseil.css">
    <title>Formulaire de Conseil</title>
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

    <header>
        <?php require_once(__DIR__ . '/header.php') ?>
    </header>
    <h1>Formulaire de Conseil</h1>
    <form action="/php_script/post_in_file_conseil.php" method="post" enctype="multipart/form-data">
        <!-- Titre -->
        <div>
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="new-titre" required>
        </div>
        <br>
        <!-- Catégorie -->
        <div>
            <label for="categorie">Catégorie:</label>
            <select id="categorie" name="new-categorie" required>
                <option value="developpement-personnel">Développement-personnel</option>
                <option value="bien-etre">Bien-être</option>
                <option value="cuisine">Cuisine</option>
                <option value="loisirs">Loisirs</option>
            </select>
        </div>
        <br>
        <!-- Résumé -->
        <div>
            <label for="resume">Résumé:</label>
            <textarea id="resume" name="new-resume" rows="5" cols="40" required></textarea>
        </div>
        <br>
        <!-- Auteur -->
        <div>
            <label for="auteur">Auteur:</label>
            <input type="text" name="new-auteur" required>
        </div>
        <br>
        <!-- Fichier -->
        <div>
            <label for="fichier">Ajouter un fichier:</label>
            <input type="file" id="fichier" name="file-to-upload" accept=" .jpg">
        </div>
        <br>
        <!-- Bouton de soumission -->
        <div>
            <input type="submit" value="Soumettre">
        </div>
    </form>
</body>
</html>
