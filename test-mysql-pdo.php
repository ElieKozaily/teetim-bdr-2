<?php
$thm = $_GEt['thm'] ?? 1;
$nb = intval($_GEt['nb']) ?? 10;

//étape 1 : connexton à la base de donné avec la librairie pdo
// mini etape 0 : definir le DSN 

$dsn = "mysql:host=db;dbname=teetim;charset=utf8mb4"; //dans documentation pdo

$cnx = new PDO($dsn, 'teetim', 'teetim',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);



//étape 2 : écrire et préparer une requête ****paramétrée**** sql

$sql = "SELECT nom, prix, ventes FROM produit WHERE thm_id=? LIMIT $nb";
$reqParametree = $cnx->prepare($sql);
//étape 3 : soumettre la requête sql au serveur Mysql

$resultat = $reqParametree->execute([$thm]);
$enregistrements = $reqParametree-> fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test intégration PHP/MYSQL</title>
</head>
<body>

<h2>10 produits par thème (1)</h2>

    <?php foreach($enregistrements as $ligne) : ?>
    <div>
        <span><?= $ligne->nom; ?></span> / 
        <span><?= $ligne->prix; ?></span> / 
        <span><?= $ligne->ventes; ?></span>
    </div>
    <?php endforeach ?>

    
</body>
</html>