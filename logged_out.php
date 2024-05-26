<?php 
session_start();
session_unset();
session_destroy();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deconnexion</title>
    <style>
        /* Importation des polices */
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Forum&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        /* Personnalisation de la scroll bar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            border-radius: 5px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.25);
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-color: grey;
        }

        /* Styles généraux */
        body {
            font-family: 'Montserrat';
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-family: 'Abril Fatface', cursive;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-family: 'Montserrat', sans-serif;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            font-family: 'Montserrat', sans-serif;
            color: #666;
            margin-bottom: 10px;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h3 {
            text-align: left;
        }

        .container img {
            margin-top: 20px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        button:active {
            transform: scale(1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Oh non... vous partez...</h1>
    <form action="index.php" method="get">
        <button type="submit">Retour à l'accueil</button>
    </form>
</div>

</body>
</html>
