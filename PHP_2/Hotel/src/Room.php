<?php
namespace App;

class Room {

  private $database;

  public function __construct($database) {
    $this->database = $database;
  }
  public function load() {
    $data = json_decode(file_get_contents( ROOT_DIR . '/data/Room.json', true));
    $this->database->insertAll('Room', $data);
    $this->makeBooking();

  }

  public function makeBooking()
{
  $customer = new Customer($this->database);
  $customers = $customer->selectAll();
  $rooms = $this->database->select('Room', ['bookings' => ['$ne' => []]]);

  foreach ($rooms as $room) {
$this->database->update(
    'Room',
    ['_id' => $room['_id']],
    ['bookings.0.customer' => $customers[array_rand($customers)]]
  );
  }

}

}

 ?>
