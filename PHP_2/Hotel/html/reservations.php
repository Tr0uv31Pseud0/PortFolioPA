<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Bons de commande</h1>
        <a href="index.php"> Retour à l'acceuil </a>
</header>
<main>
    <section class="Ref">
        <h2> <?= $bons[0]['customerName'] ?> </h2>
        <p class ='CusN'> <?= $bons[0]['contactFirstName'] . ' ' . $bons[0]['contactLastName'] ?> </p>
        <p> <?= $bons[0]['addressLine1'] ?> </p>
        <p> <?= $bons[0]['city'] ?> </p>
    </section>
    <section>
         <table class="standard-table">
            <caption> Bon de commande n° <?= $bons[0]['orderNumber'] ?></caption>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Prix Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bons as $bon): ?>
                <tr>
                    <td><?= $bon["productName"] ?></td>
                    <td><?= $bon["priceEach"] ?></td>
                    <td><?= $bon["quantityOrdered"] ?></td>
                    <td><?= $bon["TotalPrice"] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td class="Mont">Montant Total HT  </td>
                    <td class="Mont"><?= $MontantHT ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td class="Mont"> TVA (20%) </td>
                    <td class="Mont"><?= $MontantTVA = $MontantHT * 0.2 ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td class="Mont"> Montant Total TTC </td>
                    <td class="Mont"><?= $MontantTTC = $MontantTVA + $MontantHT?></td>
                </tr>
                <!-- <?php var_dump($monts); ?> -->






                <!-- <?php foreach($orders as $order): ?>
                    <tr>
                        <td><a href="bon.php?orderNumber=<?= $order["orderNumber"] ?>"><?= $order['orderNumber'] ?></td>
                        <td><?= $order["orderDate"] ?></td>
                        <td><?= $order["shippedDate"] ?></td>
                        <td><?= $order["status"] ?></td>
                    </tr>
                <?php endforeach; ?> -->
            </tbody>
        </table>
    </section>
</main>
</body>
</html>
