<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
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
include_once(__DIR__ . '/conseilArray.php');




//cette ligne est la plus importante de ce code: 
// en effet, apres la premiere recherche ,la premiere page s'affiche
// mais quand on veut aller a la page suivante, le mot recherche n'est pas garder
// en memoire, et donc le tableau est vide, et il y a erreur
// on a donc du faire un algo de verification pour savoir si oui ou non on devait
// ecraser le terme de recherche
// si le POST est vide, alors on ecrase pas la variable de session
// si il n'est pas vide, on a fait une nouvelle recherche, et donc on ecrase
if(empty($_POST['terme-recherche'])){
    $_SESSION['terme-recherche-session'] = $_SESSION['terme-recherche-session'];
}
else{
    $_SESSION['terme-recherche-session'] = $_POST['terme-recherche'];
}

//echo $_SESSION['terme-recherche-session'];

// Nouveau tableau pour stocker les conseils trouvés
$new_tab = [];


// Parcourir chaque conseil du tableau
foreach ($conseils_array as $conseil) {
    // Vérifier si le terme de recherche est présent dans un des éléments du conseil
    foreach ($conseil as $key => $value) {
        if (stripos($value, $_SESSION['terme-recherche-session'])==true) {
            // Ajouter le conseil au nouveau tableau si le terme de recherche est trouvé
            $new_tab[] = $conseil;
            // Sortir de la boucle interne pour éviter d'ajouter plusieurs fois le même conseil
            break;
        }
    }
}

//Afficher le nouveau tableau
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
if (!isset($_SESSION['b'])) {
    $_SESSION['b'] = 1;
    
}

// Incrémenter la variable 'a' si le bouton est cliqué
if (isset($_POST['increment_r'])) {
    $_SESSION['b']++;
    if($_SESSION['b'] > $nombre_page){
        $_SESSION['b'] = $nombre_page;
    }
}

if(isset($_POST['decrement_r'])){
    $_SESSION['b']--;
    if($_SESSION['b'] < 1){
        $_SESSION['b'] = 1;
    }
}

?>


<section class="advice-list">
                <h2>Selon vos recherches : </h2>
                <div class="advice-item">   
                    <?php $indice_1 = calculer_indice_recherche($_SESSION['b'], 0);?>
                    <?php //echo "indice 1 vaut {$indice_1}" ?>            
                    <h3><?php echo "{$new_tab[$indice_1]['titre']}"; ?></h3>
                    <form method="post" action="conseil_solo.php" target="_blank">
                        <input type="hidden" name="info-tab1-title" value="<?php echo $new_tab[$indice_1]['titre']?>">
                        <input type="hidden" name="info-tab1-resume" value="<?php echo $new_tab[$indice_1]['resume']?>">
                        <input type="hidden" name="info-tab1-auteur" value="<?php echo $new_tab[$indice_1]['auteur']?>">
                        <button type="submit" value="envoyer" class="bouton-voir-plus" target="_blank">Voir plus</button>
                    </form>
                    <p><?php echo "{$new_tab[$indice_1]['resume']}"; ?></p>
                        
                </div>
                <div class="advice-item">

                    <?php
                    $indice_2 = calculer_indice_recherche($_SESSION['b'], 1);
                    ?>   

                <h3><?php echo "{$new_tab[$indice_2]['titre']}"; ?></h3>
                <p><?php echo "{$new_tab[$indice_2]['resume']}"; ?></p>
                    
                </div>
                 

                <!-- <h1>Valeur de b : <?php //echo $_SESSION['b']; ?></h1> -->

                <form method="post">
                    <button type="submit" name="increment_r">Incrémenter</button>
                </form>

                <form method="post">
                    <button type="submit" name="decrement_r">Décrémenter</button>
                </form>
                <form method="post">
                    <a href="index.php">RETOUR A L'ACCUEIL</a>
                </form>

                
</section>
