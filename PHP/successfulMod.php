<?php



$pdo = new PDO('mysql:host=localhost;dbname=blogpa', 'root', '%StayCool5%');
$pdo->exec('SET NAMES UTF8');

$queryUpdate = $pdo->prepare (
    'UPDATE article
    SET ID_Auteur = ?,
        ID_Cat = ?,
        Contenu = ?,
        Date = ?,
        Titre = ?
    WHERE ID_Article = ?
    '
);

$queryUpdate->execute(array($_POST['author'],$_POST['cat'],$_POST['input'],$_POST['date'],$_POST['pseudo'], $_GET['ID']));

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

<p>Bravo ! Vous avez réussi à utiliser le 'update method', vous pouvez être fier de vous</p>
<a href="index.php">Retour à l'index</a>

</body>
</html>
