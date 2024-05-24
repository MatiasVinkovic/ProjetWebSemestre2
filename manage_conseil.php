<?php

require_once(__DIR__ . '/conseilArray.php');
// //Afficher le tableau associatif
//     echo '<pre>';
//     print_r($conseils_array);
//     echo '</pre>';
// ?>

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

?>

<section class="advice-list">
                <h2>les conseils de <?php echo $_SESSION['LOGGED_USER_first_name'] ;?> :  </h2>
                <div class="advice-item">   
                    <?php $indice_1 = calculer_indice_recherche($_SESSION['c'], 0);?>
                    <?php //echo "indice 1 vaut {$indice_1}" ?>            
                    <h3><?php echo "{$new_tab[$indice_1]['titre']}"; ?></h3>
                    <form method="post" action="modifier_un_conseil.php" target="_blank">
                        <input type="hidden" name="manage1-conseil-titre" value="<?php echo $new_tab[$indice_1]['titre']?>">
                        <input type="hidden" name="manage1-conseil-resume" value="<?php echo $new_tab[$indice_1]['resume']?>">
                        <button type="submit" value="envoyer" class="bouton-voir-plus" target="_blank">Modifier</button>
                    </form>
                    <p><?php echo "{$new_tab[$indice_1]['resume']}"; ?></p>
                        
                </div>
                <div class="advice-item">

                    <?php
                    $indice_2 = calculer_indice_recherche($_SESSION['c'], 1);
                    ?>   

                <h3><?php echo "{$new_tab[$indice_2]['titre']}"; ?></h3>
                <p><?php echo "{$new_tab[$indice_2]['resume']}"; ?></p>
                    
                </div>
                 

                <h1>Valeur de c : <?php echo $_SESSION['c']; ?></h1>

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