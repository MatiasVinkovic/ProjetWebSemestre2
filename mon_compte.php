<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte client</title>
    <link rel="stylesheet" href="./css/mon_compte.css">
</head>
<body>
<header>
    <?php require_once(__DIR__ . '/header.php'); ?>
</header>

<div class="main-content">
    <h1 class="titre-principal">Espace client de <?php echo $_SESSION['LOGGED_USER_first_name']; ?></h1>

    <h2>Vos informations sont :</h2> <br>
    <h3>Nom : <?php echo $_SESSION['LOGGED_USER_last_name']; ?></h3> <br>
    <h3>Prénom : <?php echo $_SESSION['LOGGED_USER_first_name']; ?></h3> <br>
    <h3>Mail : <?php echo $_SESSION['LOGGED_USER_mail']; ?></h3> <br>

    
</div>

<div class="main-content bouton-bas">
    <a href="page_modifier_info.php">Modifier mes informations</a>
    <a href="manage_conseil.php">Mes conseils</a>
</div>



</body>
</html>
