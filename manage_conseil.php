<?php

require_once(__DIR__ . '/conseilArray.php');
// //Afficher le tableau associatif
//     echo '<pre>';
//     print_r($conseils_array);
//     echo '</pre>';
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/page_conseil.css">
    <title>Document</title>
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
    
</body>
</html>

<?php
session_start();

$name = $_SESSION['LOGGED_USER_first_name'];

// Nouveau tableau pour stocker les conseils trouvés
$new_tab = [];


// Parcourir chaque conseil du tableau
foreach ($conseils_array as $conseil) {
    // Vérifier si le terme de recherche est présent dans un des éléments du conseil
    foreach ($conseil as $key => $value) {
        if (stripos($value, $name)==true) {
            // Ajouter le conseil au nouveau tableau si le terme de recherche est trouvé
            $new_tab[] = $conseil;
            // Sortir de la boucle interne pour éviter d'ajouter plusieurs fois le même conseil
            break;
        }
    }
}

// //Afficher le nouveau tableau
// echo '<pre>';
// print_r($new_tab);
// echo '<pre>';

?>
<?php require_once(__DIR__ . '/fonctions.php');


$nombre_conseil_new_tab = count($new_tab);
// echo $nombre_conseil_new_tab;
$nombre_page = ceil($nombre_conseil_new_tab / 2);

//echo $nombre_page;

$nombre_conseil = count($new_tab);
$nombre_page = ceil($nombre_conseil / 2);

// Initialiser la variable 'a' si elle n'existe pas
if (!isset($_SESSION['c'])) {
    $_SESSION['c'] = 1;
    
}

// Incrémenter la variable 'a' si le bouton est cliqué
if (isset($_POST['increment_r'])) {
    $_SESSION['c']++;
    if($_SESSION['c'] > $nombre_page){
        $_SESSION['c'] = $nombre_page;
    }
}

if(isset($_POST['decrement_r'])){
    $_SESSION['c']--;
    if($_SESSION['c'] < 1){
        $_SESSION['c'] = 1;
    }
}

// Temps actuel
$current_time = time();

// Durée de la session en secondes
$session_duration = $current_time - $_SESSION['start_time'];

// Convertir la durée en heures, minutes et secondes
$hours = floor($session_duration / 3600);
$minutes = floor(($session_duration % 3600) / 60);
$seconds = $session_duration % 60;

// Afficher la durée de la session
?>


<section class="advice-list advice-list-manage">
                <h1 class="conseil-title">Les conseils de <?php echo $_SESSION['LOGGED_USER_first_name'] ;?> :  </h1>
                <h3 class="stat-number"> <span style="font-size:30px;">Statistique : </span><br> Vous avez publié <span style="color:red;"><?php echo $nombre_conseil ?></span> conseils</h3>
                <h4 class="stat-time">Vous êtes connecté depuis : <?php echo "La session est active depuis : {$minutes} minutes et {$seconds} secondes."; ?></h4>
                <div class="advice-item">   
                    <?php $indice_1 = calculer_indice_manage($_SESSION['c'], 0);?>
                    <?php //echo "indice 1 vaut {$indice_1}" ?>            
                    <h3><?php echo "{$new_tab[$indice_1]['titre']}"; ?></h3>
                    <form method="post" action="modifier_un_conseil.php" target="_blank">
                        <input type="hidden" name="manage1-conseil-titre" value="<?php echo $new_tab[$indice_1]['titre']?>">
                        <input type="hidden" name="manage1-conseil-resume" value="<?php echo $new_tab[$indice_1]['resume']?>">
                        <input type="hidden" name="manage1-conseil-image" value="<?php echo $new_tab[$indice_1]['image']?>">
                        <p><?php echo "{$new_tab[$indice_1]['resume']}"; ?></p>
                        <button type="submit" value="envoyer" class="bouton-voir-plus" target="_blank">Modifier</button>
                    </form>
                    
                        
                </div>
                <?php   if(!($_SESSION['c'] == $nombre_page && $nombre_conseil % 2 == 1)){  ?>
                <div class="advice-item">

                    <?php
                    $indice_2 = calculer_indice_manage($_SESSION['c'], 1);
                    ?>   

                    <h3><?php echo "{$new_tab[$indice_2]['titre']}"; ?></h3>
                    <form method="post" action="modifier_un_conseil.php" target="_blank">
                        <input type="hidden" name="manage1-conseil-titre" value="<?php echo $new_tab[$indice_2]['titre']; ?>">
                        <input type="hidden" name="manage1-conseil-resume" value="<?php echo $new_tab[$indice_2]['resume']; ?>">
                        <input type="hidden" name="manage1-conseil-image" value="<?php echo $new_tab[$indice_2]['image']; ?>">
                        <p><?php echo "{$new_tab[$indice_2]['resume']}"; ?></p>
                        <button type="submit" value="envoyer" class="bouton-voir-plus" target="_blank">Modifier</button>
                    </form>
                

                </div>
                <?php
                }
                ?>
                 

                
</section>
<h3 class="a-value">Page <?php echo " {$_SESSION['c']} / {$nombre_page}" ; ?></h3>

            
                <div id="button-down-page">
                    <form method="post">
                        <button type="submit" name="decrement_r" class="button_r btn-right" >Page précedente</button>
                    </form>
                
                        <form method="post" >
                            <button type="submit" name="increment_r" class="button_r btn-left">Page suivante</button>
                        </form>
                </div>
                

                <div class="bouton-retour-div">
                    <form method="post">
                        <a href="index.php" class="bouton-retour">Retour à l'accueil</a>
                    </form>
                </div>

                    
                </form>

