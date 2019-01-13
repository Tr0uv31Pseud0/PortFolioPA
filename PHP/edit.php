<?php


$pdo = new PDO('mysql:host=localhost;dbname=blogpa', 'root', '%StayCool5%');
$pdo->exec('SET NAMES UTF8');

$queryFill = $pdo->prepare (
    'SELECT *
    FROM article
    WHERE ID = ?
    '
    );

$queryFill->execute(array($_GET['ID']));

$autoFill = $queryFill->fetch(PDO::FETCH_ASSOC);

$queryNew = $pdo->prepare (

    'SELECT *
    FROM article
    JOIN auteur
    ON article.ID_Auteur = auteur.ID_Auteur
    '
    );
    $queryNew->execute();

    $selectNames = $queryNew->fetchAll(PDO::FETCH_ASSOC);

$queryNew2 = $pdo->prepare (

    'SELECT *
    FROM Categorie
    '
    );
    $queryNew2->execute();

    $selectCats = $queryNew2->fetchAll(PDO::FETCH_ASSOC);

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
<section class="newArt">
    <form method="post" name="formulaire" id="form" action="successfulMod.php?ID=<?= $_GET['ID']?>">
            <ul>
                <li><label for="title">Titre Article <input type="text" name ="pseudo" value="<?= $autoFill['Titre'] ?>" ></label></li>
                <li>
                    <label for="author"> Auteur : </label>
                    <select name="author" id="author">
                    <?php foreach($selectNames as $selectName) : ?>
                        <option value="<?= $selectName['Nom'] ?>"
                        <?php if ($autoFill['ID_Auteur'] == $selectName['ID_Auteur']) : ?>
                            selected
                        <?php endif; ?>>
                        <?= $selectName['Nom'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </li>
                <li><label for="cat"> Catégorie : </label>
                    <select name="cat" id="cat">
                    <?php foreach($selectCats as $selectCat) : ?>
                        <option value="<?= $selectCat['Nom_Cat'] ?>"
                        <?php if ($autoFill['ID_Auteur'] == $selectCat['ID']) : ?>
                            selected
                        <?php endif; ?>>
                        <?= $selectCat['Nom_Cat'] ?></option>
                    <?php endforeach; ?>
                    </select>
                <li><input type="date" name="date" id="date" value="<?= $autoFill['Date']?>"></li>
                </li>
                <li>
                    <label for="Nom">Contenu :<textarea name="input" id="textarea" cols="40" rows="20"><?= $autoFill['Contenu']?></textarea></label>
                </li>
                <li><input type="submit" value="Modifier l'article" class="button"></li>
            </ul>
       </form>
    </section>

</main>
</body>
</html>
