<?php

namespace App;

class Customer {

  private $database;

  public function __construct($database) {
    $this->database = $database;
  }
  public function load() {
    $data = json_decode(file_get_contents( ROOT_DIR . '/data/Customer.json', true));
    $this->database->insertAll('Customer', $data);
  }
  public function selectAll()
{
  return $this->database->select('Customer');
}

}


 ?>
