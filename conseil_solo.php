<?php

$conseil_title = $_POST['info-tab1-title'];
$conseil_resume= $_POST['info-tab1-resume'];
$conseil_auteur = $_POST['info-tab1-auteur'];
$tmp = trim($_POST['info-tab1-image'], " ");
$conseil_image = "/php_script" . "/" . $tmp;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/conseil_solo.css">
    <title>page conseil</title>
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

    <h1><?php echo $conseil_title ?></h1>
    <p>écrit par <b><?php echo $conseil_auteur ?></b></p>

    <h3>Résumé du conseil : </h3>
    
    <div class="container">
    <div class="divi-paragraphe">
        <h3 class="paragraphe"><?php echo $conseil_resume ?></h3>
    </div>
</div>
   
    
    
    
    <img src="<?php echo $conseil_image ?>" alt="" height="3    00" width="400">



</body>
</html>