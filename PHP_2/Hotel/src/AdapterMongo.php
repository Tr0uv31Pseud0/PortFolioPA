<?php

namespace App;

class AdapterMongo {

    private $database;

    public function __construct() {
      $server = new \MongoDB\Client('mongodb://51.15.217.149:27718');
      $this->database = $server->PA;
    }
    public function insertAll($collection, array $data) {

      $this->database->$collection->drop();
      $this->database->$collection->insertMany($data);

    }

    public function select($collection, array $filter = [], array $projection = [], $limit = 0, array $sort = []) {

		return $this->database->$collection->find(
			$filter,
			[
				'projection' 	=> $projection,
				'limit' 		=> $limit,
				'sort' 			=> $sort
			]
		)->toArray();
	}
  public function update($collection, array $filter = [], array $set = [])
{
$this->database->$collection->updateOne(
  $filter,
  [
    '$set' 	=> $set
  ]
);
}
}

 ?>
