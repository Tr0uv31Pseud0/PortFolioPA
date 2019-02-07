<?php



$pdo = new PDO('mysql:host=localhost;dbname=blogpa', 'root', '%StayCool5%');
$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare (
'SELECT Nom_Cat, ID
FROM Categorie
'
);

$query->execute();

$indexes = $query->fetchAll(PDO::FETCH_ASSOC);


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
<h1> Bienvenue sur mon blog ! </h1>
<h2>Veuillez choisir votre catégorie</h2>
    <div>
    <?php foreach($indexes as $index) : ?>
    <a href="main.php?ID=<?=$index['ID'] ?>"><img src="images/<?=$index['ID'] ?>.jpg" ></a>
    <? var_dump($index['ID']);
    <p><?= $index['Nom_Cat'] ?></p>
    <?php endforeach; ?>
    </div>
</main>
</body>
</html>
