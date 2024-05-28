<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/page_conseil.css">
    <title>Les conseils</title>

    <style>
        /* importation des polices */
        
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
        <?php require_once(__DIR__ . '/header.php'); ?>

    </header>
    
</body>
</html>

<?php



session_start();

include_once(__DIR__ . '/conseilArray.php');
require_once(__DIR__ . '/fonctions.php');

$nombre_conseil = count($conseils_array);
$nombre_page = ceil($nombre_conseil / 4);
//echo $nombre_page;

// Initialiser la variable 'a' si elle n'existe pas
if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = 1;
}

if (isset($_SESSION['a']) && $_SESSION['a'] > $nombre_page) {
    $_SESSION['a'] = 1;
}

// Incrémenter la variable 'a' si le bouton est cliqué
if (isset($_POST['increment'])) {
    $_SESSION['a']++;
    if($_SESSION['a'] > $nombre_page){
        $_SESSION['a'] = $nombre_page;
    }
}

if(isset($_POST['decrement'])){
    $_SESSION['a']--;
    if($_SESSION['a'] < 1){
        $_SESSION['a'] = 1;
    }
}

//vaut forcement 1 au debut





 
?>
<h1 id="h1-main">Tous nos conseils</h1>

<section class="advice-container">
                
                <div class="advice-item">   
                    <?php
                    $indice_1 = calculer_indice($_SESSION['a'], 0);
                    ?>         
                    <h3><?php echo "{$conseils_array[$indice_1]['titre']}"; ?></h3>
                    <form method="post" action="conseil_solo.php" target="_blank">
                        <input type="hidden" name="info-tab1-title" value="<?php echo $conseils_array[$indice_1]['titre'];?>">
                        <input type="hidden" name="info-tab1-resume" value="<?php echo $conseils_array[$indice_1]['resume'];?>">
                        <input type="hidden" name="info-tab1-auteur" value="<?php echo $conseils_array[$indice_1]['auteur'];?>">
                        <input type="hidden" name="info-tab1-image" value="<?php echo $conseils_array[$indice_1]['image'];?>">
                        <button type="submit" value="envoyer" class="bouton-voir-plus">Voir plus</button>
                    </form>
                    <p><?php echo "{$conseils_array[$indice_1]['resume']}"; ?></p>
                </div>
               
                <?php   if(!($_SESSION['a'] == $nombre_page && ($nombre_conseil % 4 == 1 ))){  ?>
                    <div class="advice-item">
                        <?php
                        $indice_2 = calculer_indice($_SESSION['a'], 1);
                        ?>   
                    
                    <h3><?php echo "{$conseils_array[$indice_2]['titre']}"; ?></h3>
                        <form method="post" action="conseil_solo.php" target="_blank">
                            <input type="hidden" name="info-tab1-title" value="<?php echo $conseils_array[$indice_2]['titre'];?>">
                            <input type="hidden" name="info-tab1-resume" value="<?php echo $conseils_array[$indice_2]['resume'];?>">
                            <input type="hidden" name="info-tab1-auteur" value="<?php echo $conseils_array[$indice_2]['auteur'];?>">
                            <input type="hidden" name="info-tab1-image" value="<?php echo $conseils_array[$indice_2]['image'];?>">
                            <button type="submit" value="envoyer" class="bouton-voir-plus">Voir plus</button>
                        </form>
                        <p><?php echo "{$conseils_array[$indice_2]['resume']}"; ?></p>
                        
                        </div>
                    <?php 
                    }
                    ?>
                <?php   if(!($_SESSION['a'] == $nombre_page && ($nombre_conseil % 4 == 1 || $nombre_conseil % 4 == 2))){  ?>
                <div class="advice-item">
                    <?php
                        $indice_3 = calculer_indice($_SESSION['a'], 2);
                    ?> 
                <h3><?php echo "{$conseils_array[$indice_3]['titre']}"; ?></h3>
                    <form method="post" action="conseil_solo.php" target="_blank">
                        <input type="hidden" name="info-tab1-title" value="<?php echo $conseils_array[$indice_3]['titre'];?>">
                        <input type="hidden" name="info-tab1-resume" value="<?php echo $conseils_array[$indice_3]['resume'];?>">
                        <input type="hidden" name="info-tab1-auteur" value="<?php echo $conseils_array[$indice_3]['auteur'];?>">
                        <input type="hidden" name="info-tab1-image" value="<?php echo $conseils_array[$indice_3]['image'];?>">
                        <button type="submit" value="envoyer" class="bouton-voir-plus">Voir plus</button>
                    </form>
                    <p><?php echo "{$conseils_array[$indice_3]['resume']}"; ?></p>

                    </div>
                    <?php 
                    }
                    ?>
                    <?php   if(!($_SESSION['a'] == $nombre_page && ($nombre_conseil % 4 == 1 || $nombre_conseil % 4 == 2 || $nombre_conseil % 4 === 3))){  ?>
                <div class="advice-item">
                    <?php
                        $indice_4 = calculer_indice($_SESSION['a'], 3);
                    ?> 
                <h3><?php echo "{$conseils_array[$indice_4]['titre']}"; ?></h3>
                    <form method="post" action="conseil_solo.php" target="_blank">
                        <input type="hidden" name="info-tab1-title" value="<?php echo $conseils_array[$indice_4]['titre'];?>">
                        <input type="hidden" name="info-tab1-resume" value="<?php echo $conseils_array[$indice_4]['resume'];?>">
                        <input type="hidden" name="info-tab1-auteur" value="<?php echo $conseils_array[$indice_4]['auteur'];?>">
                        <input type="hidden" name="info-tab1-image" value="<?php echo $conseils_array[$indice_4]['image'];?>">
                        <button type="submit" value="envoyer" class="bouton-voir-plus">Voir plus</button>
                    </form>
                    <p><?php echo "{$conseils_array[$indice_4]['resume']}"; ?></p>

                    </div>
                    <?php 
                    }
                    ?>
</section>

        <h3 class="a-value">Page <?php echo " {$_SESSION['a']} / {$nombre_page}" ; ?></h3>

            
                <div id="button-down-page">
                    <form method="post">
                        <button type="submit" name="decrement" class="button_r btn-right" >Page précedente</button>
                    </form>
                
                        <form method="post" >
                            <button type="submit" name="increment" class="button_r btn-left">Page suivante</button>
                        </form>
                </div>
                

                <div class="bouton-retour-div">
                    <form method="post">
                        <a href="index.php" class="bouton-retour">Retour à l'accueil</a>
                    </form>
                </div>

                    
                </form>
          
                    