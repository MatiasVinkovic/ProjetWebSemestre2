<?php session_start(); ?>   
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Partage de Conseils</title>
    <link rel="stylesheet" href="./css/accueil.css">
    

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
    
        <?php require_once(__DIR__ . '/header.php');?>

    </header>

    <?php include_once('php_script/existeClient.php'); ?>

    <main>
        <div class="container">
            <section class="search-bar">
                <input type="text" placeholder="Rechercher des conseils...">
                <button>Rechercher</button>
            </section>

            <section class="advice-list">
                <h2>Conseils Populaires</h2>
                <div class="advice-item">
                    <h3>Conseil 1</h3>
                    <p>Résumé du conseil 1...</p>
                </div>
                <div class="advice-item">
                    <h3>Conseil 2</h3>
                    <p>Résumé du conseil 2...</p>
                </div>
                <div class="advice-item">
                    <h3>Conseil 3</h3>
                    <p>Résumé du conseil 3...</p>
                </div>
            </section>
        </div>
    </main>


    

    <footer>
        <div class="container">
            <p>&copy; 2024 Plateforme de Partage de Conseils. Tous droits réservés à nous et même pas à vous</p>
        </div>
    </footer>
</body>
</html>
