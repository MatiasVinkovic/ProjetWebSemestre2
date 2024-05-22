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

<!-- On a la liste -->
<?php include_once(__DIR__ . '/conseilArray.php'); ?>

<!-- <?php include_once(__DIR__ . '/php_script/test.php');?> -->

    <header>
    
        <?php require_once(__DIR__ . '/header.php');
        $nombre_conseil = count($conseils_array);
        ?>
        

    </header>

    

    <main>
        
        <div class="container">
            <section class="search-bar">
                <form action="page_recherche.php" method="POST">
                    <input type="text" placeholder="Rechercher des conseils..." name="terme-recherche">
                    <button type="submit">Rechercher</button>
                </form>
            </section>
            

            <section class="advice-list">
                <h2>Les 3 derniers conseils</h2>
                <div class="advice-item">               
                                                        <!-- ne marche pas ???? -->

                    <h3><?php echo "{$conseils_array[$nombre_conseil-1]['titre']}"; ?></h3>
                    
                    <p><?php echo "{$conseils_array[$nombre_conseil-1]['resume']}"; ?></p>
                </div>
                <div class="advice-item">
                <h3><?php echo "{$conseils_array[$nombre_conseil-2]['titre']}"; ?></h3>
                    
                    <p><?php echo "{$conseils_array[$nombre_conseil-2]['resume']}"; ?></p>
                </div>
                <div class="advice-item">
                <h3><?php echo "{$conseils_array[$nombre_conseil-3]['titre']}"; ?></h3>
                    
                    <p><?php echo "{$conseils_array[$nombre_conseil-3]['resume']}"; ?></p>
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
