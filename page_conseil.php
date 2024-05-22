

<?php

session_start();

include_once(__DIR__ . '/conseilArray.php');
require_once(__DIR__ . '/fonction_pagination.php');

$nombre_conseil = count($conseils_array);
$nombre_page = ceil($nombre_conseil / 4);
//echo $nombre_page;

// Initialiser la variable 'a' si elle n'existe pas
if (!isset($_SESSION['a'])) {
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


<section class="advice-list">
                <h2>Les conseils</h2>
                <div class="advice-item">   
                    <?php
                    $indice_1 = calculer_indice($_SESSION['a'], 0);
                    ?>            
                    <h3><?php echo "{$conseils_array[$indice_1]['titre']}"; ?></h3>
                        <p><?php echo "{$conseils_array[$indice_1]['resume']}"; ?></p>
                </div>
                <div class="advice-item">
                    <?php
                    $indice_2 = calculer_indice($_SESSION['a'], 1);
                    ?>   
                <h3><?php echo "{$conseils_array[$indice_2]['titre']}"; ?></h3>
                    <p><?php echo "{$conseils_array[$indice_2]['resume']}"; ?></p>
                </div>
                <div class="advice-item">
                    <?php
                        $indice_3 = calculer_indice($_SESSION['a'], 2);
                    ?> 
                <h3><?php echo "{$conseils_array[$indice_3]['titre']}"; ?></h3>
                <p><?php echo "{$conseils_array[$indice_3]['resume']}"; ?></p>
                </div>
                <div class="advice-item">
                    <?php
                        $indice_4 = calculer_indice($_SESSION['a'], 3);
                    ?> 
                <h3><?php echo "{$conseils_array[$indice_4]['titre']}"; ?></h3>
                    <p><?php echo "{$conseils_array[$indice_4]['resume']}"; ?></p>
                </div>

                <h1>Valeur de a : <?php echo $_SESSION['a']; ?></h1>

                <form method="post">
                    <button type="submit" name="increment">Incrémenter</button>
                </form>

                <form method="post">
                    <button type="submit" name="decrement">Décrémenter</button>
                </form>
                <form method="post">
                    <a href="index.php">RETOUR A L'ACCUEIL</a>
                </form>

                
</section>