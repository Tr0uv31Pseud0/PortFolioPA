<?php

// require 'vendor/autoload.php'; fonctionne, mais ce n'est pas propre (cherche pas et exécute)
// ROOT_DIR dans la constante permet de garder le __DIR__ (qui se réferre au dossier du fichier) et de
// l'appliquer à tous ceux qui prendront cette constante (tous les autres fichiers auront pour parent le dossier d'app.php)
// use MongoDB\Client est l'une des façons possibles de créer un nouveau client cf.namespacing

const ROOT_DIR = __DIR__;

require ROOT_DIR . '/vendor/autoload.php';

// Depuis php 7.1, on peut l'écrire de la manière suivante afin de le rendre plus propre et de gagner du temps
/*
use App\{Customer, Room, AdapterMongo};

// Plus besoin de l'écrire comme suit :
// $customer = new App\Customer(new App\AdapterMongo);
// Mais plutôt comme ceci :
$customer = new Customer(new AdapterMongo);
$room = new Room(new AdapterMongo);

$customer->load();
$room->load();
*/

$redis = new Predis\Client();
$redis->set('message', 'Hello World');
echo $redis->get('message');

 ?>
