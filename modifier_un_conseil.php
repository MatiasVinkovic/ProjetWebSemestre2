

<?php

session_start();

//info sur lequel je veux modifier
$conseil_titre = $_POST['manage1-conseil-titre'];
$conseil_resume= $_POST['manage1-conseil-resume'];
$conseil_image= $_POST['manage1-conseil-image'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon conseil</title>
</head>
<body>

    <h1><?php echo $conseil_titre ?></h1>
    <h3>Résumé du conseil : </h3>
    <h3><?php echo $conseil_resume ?></h3>

    <form action="script_modifier_conseil.php" method="post" enctype="multipart/form-data">
        <!-- on envoie le nouveau titre qu'on veut mettre -->
        <input type="text" name='new-manage1-conseil-titre'>
        <input type="text" name='new-manage1-conseil-resume'> 
                <!-- on peut aussi mettre une image -->

        <!-- on envoie l'info du conseil qu'on veut modifier -->
        <input type="hidden" name="want-to-modify-title" value="<?php echo $conseil_titre?>">
        <label for="fichier">remplacer le fichier:</label>
            <input type="file" name="new-image">
            <br><br>  
        <button type="submit" value="envoyer" class="bouton" target="_blank">Modifier</button>

    </form>
    


</body>
</html>



