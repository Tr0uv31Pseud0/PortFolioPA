<?php



$pdo = new PDO('mysql:host=localhost;dbname=blogpa', 'root', '%StayCool5%');
$pdo->exec('SET NAMES UTF8');


$queryNew = $pdo->prepare (

    'SELECT *
    FROM article
    JOIN auteur
    ON article.ID_Auteur = auteur.ID_Auteur
    GROUP BY Nom
    '
    );
    $queryNew->execute();

    $selectNames = $queryNew->fetchAll(PDO::FETCH_ASSOC);

$queryNew2 = $pdo->prepare (

    'SELECT ID, Nom_Cat
    FROM Categorie
    GROUP BY ID
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
    <form method="post" name="formulaire" id="form" action="successful.php">
            <ul>
                <li><label for="title">Titre Article <input type="text" name ="pseudo"></label></li>
                <li>
                    <label for="author"> Auteur : </label>
                    <select name="author" id="author">
                    <?php foreach($selectNames as $selectName) : ?>
                        <option value="<?= $selectName['ID_Auteur'] ?>"><?= $selectName['Nom'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </li>
                <li><label for="cat"> Catégorie : </label>
                    <select name="cat" id="cat">
                    <?php foreach($selectCats as $selectCat) : ?>
                        <option value="<?= $selectCat['ID'] ?>"><?= $selectCat['Nom_Cat'] ?></option>
                    <?php endforeach; ?>
                    </select>
                <li><input type="date" name="date" id="date"></li>
                </li>
                <li>
                    <label for="Nom">Contenu :<textarea name="input" id="textarea" cols="20" rows="10"></textarea></label>
                </li>
                <li><input type="submit" value="Ajouter l'article" class="button"></li>
            </ul>
       </form>
    </section>



</main>
</body>
</html>
