<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Conseil</title>
</head>
<body>

    <header>
        <?php require_once(__DIR__ . '/header.php') ?>
    </header>
    <h1>Formulaire de Conseil</h1>
    <form action="/php_script/post_in_file_conseil.php" method="post">
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
                <option value="developpement_personnel">Développement personnel</option>
                <option value="bien_etre">Bien-être</option>
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
        <!-- Bouton de soumission -->
        <div>
            <input type="submit" value="Soumettre">
        </div>
    </form>
</body>
</html>

    
</body>
</html>