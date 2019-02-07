<?php



$pdo = new PDO('mysql:host=localhost;dbname=blogpa', 'root', '%StayCool5%');
$pdo->exec('SET NAMES UTF8');

$queryCat = $pdo->prepare (
    'SELECT Nom_Cat
    FROM Categorie
    WHERE Categorie.ID = ?
    '
);

$queryCat->execute(array($_GET['ID']));

$categories = $queryCat->fetch(PDO::FETCH_ASSOC);

$queryArt = $pdo->prepare (

'SELECT Titre, ID_Cat, ID
FROM article
WHERE ID_Cat = ?
'
);


$queryArt->execute(array($_GET['ID']));

$articles = $queryArt->fetchAll(PDO::FETCH_ASSOC);

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
        <h1> Dans la catégorie <?= $categories['Nom_Cat'] ?></h1>

        <?php foreach($articles as $article) : ?>
            <ul>
            <li><a href="articles.php?ID=<?=$article['ID'] ?>"><?= $article['Titre'] ?></a></li>
            </ul>
            <?php endforeach; ?>
    </main>
</body>
</html>
