<?php

include 'db_connect.php';


$artQuery = $pdo->prepare("
  DELETE FROM article WHERE ID = ?
");

$artQuery->execute( [ $_GET['ID'] ] );

header("location:admin.php");
exit();

 ?>
