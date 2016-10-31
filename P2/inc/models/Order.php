
<?php

class Order
{

  private $user_id;
  private $db;
  private $table = 'orders';

  private $id;
  private $cost;
  private $address;
  private $city;
  private $zipcode;
  private $state;
  private $tacking_number;


  public function __construct($id, $db, $user)
  {
    $this->db = $db;
    if($id == null) // Fresh Order
    {
      $this->user_id = $user->id();
      $this->db->insert($this->table, ['user_id'], [$user->id()]);
    }else {
      $this->id = $id;
      $row = $this->db->getRow($this->table, ['id'], [$id]);
      $this->user_id = $row['user_id'];
      $this->cost = $row['cost'];
      $this->address = $row['address'];
      $this->city = $row['city'];
      $this->zipcode = $row['zipcode'];
      $this->state = $row['state'];
      $this->tracking_number = $row['tracking_number'];
    }
  }

  public function id()
  {
    return $this->id;
  }

  public function cost()
  {
    return $this->cost;
  }

  public function setCost($cost)
  {
    $this->cost = $cost;
    $this->db->updateRow($this->table, ['cost'], [$cost]);
  }

  public function address()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
    $this->db->updateRow($this->table, ['address'], [$address]);
  }

}
