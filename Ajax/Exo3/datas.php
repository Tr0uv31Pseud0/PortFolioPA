<?php



$pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'troiswa');
$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare 
(
   'SELECT
   productName,
   productLine,
   productDescription
   FROM products
   '
);

$query->execute();

$products = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);

?>