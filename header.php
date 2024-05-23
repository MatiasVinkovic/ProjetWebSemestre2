<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <title>Document</title>
</head>
<body>


<?php if(isset($_SESSION['LOGGED_USER'])) :?>
            <h1>CyShare : Partager, c'est mieux avec <?php echo $_SESSION['LOGGED_USER_first_name']; ?>!</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="page_conseil.php">Conseils</a></li>
                    <li><a href="creer_conseil.php">Soumettre un Conseil</a></li>
                    <li><a href="logged_out.php">Se déconnecter</a></li>
                    <li><a href="mon_compte.php">Mon compte</a></li>
                </ul>
            </nav>
<?php endif; ?>
 
<?php if(!isset($_SESSION['LOGGED_USER'])) :?>
            <h1>CyShare : Partager, c'est mieux avec vous !</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="page_conseil.php">Conseils</a></li>
                    <li><a href="login.php">Se connecter</a></li>
                </ul>
            </nav>
<?php endif; ?>


        
    
</body>
</html>


