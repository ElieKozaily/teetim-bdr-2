<?php
//étape 1 : connexton à la base de donné MySQL

$cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');

//étape 2 : écrire une requête sql

$sql = "SELECT theme.nom, SUM(ventes) as ventes_totales
    FROM produit 
        JOIN theme ON thm_id=theme.id
        WHERE cat_id=1
        GROUP BY thm_id
        ORDER BY ventes_totales DESC";


//étape 3 : soumettre la requête sql au serveur Mysql

$resultat = $cnx->query($sql);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test intégration PHP/MYSQL</title>
</head>
<body>

<h2>Ventes totales par nom de thème</h2>
<ul>
    <!--- Utiiser le résultat de la requête obtenu en haut de la page pour afficher les Li dans la liste -->
    <?php while($ligne = $resultat->fetch_object()) : ?>
    <li><?= $ligne->nom; ?>: <?= $ligne->ventes_totales; ?> </li>
    <?php endwhile ?>
</ul>
    
</body>
</html>