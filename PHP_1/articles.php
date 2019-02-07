<?php



$pdo = new PDO('mysql:host=localhost;dbname=blogpa', 'root', '%StayCool5%');
$pdo->exec('SET NAMES UTF8');

$queryArt = $pdo->prepare (

    'SELECT *
    FROM article
    JOIN auteur
    ON article.ID_Auteur = auteur.ID_Auteur
    WHERE article.ID = ?
    '
    );


    $queryArt->execute(array($_GET['ID']));

    $articles = $queryArt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['comment']) && isset($_POST['nick'])) {

    $queryAdd = $pdo->prepare (
        'INSERT INTO commentaire (Contenu_Com, Pseudo, Article_id)
        VALUES (?, ?, ?)
        '
    );


$queryAdd->execute( [ $_POST['comment'],  $_POST['nick'], $_GET['ID'] ] );

}


$queryCom = $pdo->prepare (

    'SELECT *
    FROM commentaire
    WHERE Article_id = ?
    '
    );
    $queryCom->execute(array($_GET['ID']));

    $commentaires= $queryCom->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   <link rel="stylesheet" href="css/main.css">
   <title>Blog de PA</title>
</head>
<body>
<header>
    <nav>
        <i class="fas fa-laugh"></i>
        <a href="admin.php"> Administrator</a>
        <a href="index.php"> Home</a>
    </nav>
</header>
<main>
<section>
    <h2><?= $articles['Titre'] ?></h2>
    <h3> Auteur : <?= $articles['Nom'] ?> En date du : <?= $articles['Date'] ?></h3>
    <p><?= $articles['Contenu'] ?></p>
</section>
<section>
    <h2>Commentaires</h2>
    <?php if ($commentaires != false) : ?>
    <?php foreach ($commentaires as $commentaire) : ?>
    <hr>
    <div class="comms">
    <h3><?= $commentaire['Pseudo'] ?></h3>
    <p><?= $commentaire['Contenu_Com'] ?></p>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</section>
<hr>
<table id="comms">
    <form method="post" action="articles.php?ID=<?= $_GET['ID'] ?>" id="comments">
        <tr>
            <td><label for="pseudo"> Pseudo </label></td>
            <td><input type="text" name="nick"></td>
        </tr>
        <tr>
            <td><label for="comment">Exprimez-vous :</label></td>
            <td><textarea name="comment" id="comment" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="Ajouter commentaire" class="button"></td>
        </tr>
    </form>
</table>
</main>
</body>
</html>
