<?php

namespace App;

use PDO;

class AdapterMySQL {

	private $database;



	public function __construct() {
		// la base de données
		$this->database = new PDO('mysql:host=localhost;dbname=blog;charset=UTF8', 'root','%StayCool5%');
	}


	public function insertAll($table, array $data) {

		$this->database->query('TRUNCATE TABLE '.$table);
		$query = $this->database->prepare('INSERT INTO '.$table.' (`firstname`, `lastname`, `title`, `email`, `address`, `city`, `country`, `phone`)
				VALUES (:firstName, :lastName, :title, :email, :address, :city, :country, :phone)');

		foreach($data as $customer) {
			$query->execute($customer);
		}

	}
}

// Table customer a mettre sur le workbench

// CREATE TABLE IF NOT EXISTS `customer` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `firstname` varchar(40) NOT NULL,
//   `lastname` varchar(40) NOT NULL,
//   `title` enum('M','F') NOT NULL,
//   `email` varchar(120) NOT NULL,
//   `address` varchar(255) NOT NULL,
//   `city` varchar(80) NOT NULL,
//   `country` varchar(80) NOT NULL,
//   `phone` varchar(20) NOT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
