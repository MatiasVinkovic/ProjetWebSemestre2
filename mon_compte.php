<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte client</title>
    <link rel="stylesheet" href="./css/mon_compte.css">
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
    <?php require_once(__DIR__ . '/header.php'); ?>
</header>

<h1 class="titre-principal">Espace client de <?php echo $_SESSION['LOGGED_USER_first_name']; ?></h1>

<h2>Vos informations sont : </h2> <br>
<h3>Nom : <?php echo $_SESSION['LOGGED_USER_last_name']; ?></h3> <br>
<h3>Prénom : <?php echo $_SESSION['LOGGED_USER_first_name']; ?></h3> <br>
<h3>mail : <?php echo $_SESSION['LOGGED_USER_mail']; ?></h3> <br>

<a href="page_modifier_info.php">modifier mes informations</a>


<?php require_once(__DIR__ . '../footer.php'); ?>


<!-- possibilite de modifier ses informations -->



</body>
</html>