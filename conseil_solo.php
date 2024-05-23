<?php

$conseil_title = $_POST['info-tab1-title'];
$conseil_resume= $_POST['info-tab1-resume'];
$conseil_auteur = $_POST['info-tab1-auteur'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page conseil</title>
</head>
<body>

    <h1><?php echo $conseil_title ?></h1>
    <p>écrit par <b><?php echo $conseil_auteur ?></b></p>
    <h3>Résumé du conseil : </h3>
    <h3><?php echo $conseil_resume ?></h3>



</body>
</html>