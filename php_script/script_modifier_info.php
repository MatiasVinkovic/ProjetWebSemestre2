<?php

session_start();

$modified_lastname = $_POST['modified-lastname'];
$modified_firstname = $_POST['modified-firstname'];
$modified_mail = $_POST['modified-mail'];
$modified_password = $_POST['modified-password'];

// Ouvrir le fichier en lecture et écriture
$filename = 'liste_client.txt';
$file = fopen($filename,'r+');

//le but de notre algorithme ici, est de stocker dans un tableau toutes les lignes
// et une fois qu'on tombe sur LA ligne du client concerné, alors on la modifie et on l'injecte

// Initialiser un tableau pour stocker les lignes du fichier
$lines = [];

// parcours
while (($line = fgets($file)) !== false) {
    // Supprimer les espaces
    $new_line = preg_replace('/\s+/', '', $line);

    // passer cela en tableau
    $parts = explode(';', $new_line);

    // Vérifier si les champs correspondent aux valeurs de session
    if ($parts[0] == $_SESSION['LOGGED_USER_last_name'] && $parts[1] == $_SESSION['LOGGED_USER_first_name']) {
        // Modifier la ligne avec les nouvelles valeurs
        $insert_data = " {$modified_lastname}; {$modified_firstname}; {$modified_mail}; {$modified_password}\n";
        // Ajouter la nouvelle ligne modifiée au tableau
        $lines[] = $insert_data;
    } else {
        // si c'est pas la ligne à modifier, conserver la ligne d'origine
        $lines[] = $line;
    }
}

// Réécrire toutes les lignes dans le fichier
fseek($file, 0); //  curseur au début du fichier
//du coup on ecrit tout dans le fichier mtn
foreach ($lines as $line) {
    fwrite($file, $line);
}

$_SESSION['LOGGED_USER_last_name'] = $modified_lastname;
$_SESSION['LOGGED_USER_first_name']= $modified_firstname;
$_SESSION['LOGGED_USER_mail'] =$modified_mail;
$_SESSION['LOGGED_USER_password'] = $modified_password;

// Fermer le fichier
fclose($file);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mes informations</title>
</head>
<body>

<h2>Les nouvelles informations ont bien été pris en compte par le serveur</h2>

<a href="../mon_compte.php">Retour</a>
    
</body>
</html>
