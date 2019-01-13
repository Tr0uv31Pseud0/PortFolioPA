<?php



$pdo = new PDO('mysql:host=localhost;dbname=blogpa', 'root', '%StayCool5%');
$pdo->exec('SET NAMES UTF8');

$queryAdm = $pdo->prepare (

    'SELECT *
    FROM article
    '
    );


    $queryAdm->execute();

    $articlesList = $queryAdm->fetchAll(PDO::FETCH_ASSOC);

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
    <section id="adminTable">
        <h2>Liste des articles </h2>
        <table>
        <?php foreach($articlesList as $articleList) : ?>
        <tr>
            <td><a href="articles.php?ID=<?=$articleList['ID'] ?>"><?= $articleList['Titre'] ?> - <?= $articleList['Date'] ?></td>
            <td><a href="edit.php?ID=<?=$articleList['ID'] ?>"><i class="fas fa-pen-square"></i></a></td>
            <td><a href="delete.php?ID=<?=$articleList['ID'] ?>"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
        <?php endforeach; ?>
        </table>
    </section>
    <a href="new_article.php" class="button">Nouvel article</a>

</main>
</body>
</html>
