
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
  private $tracking_number;


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
      $this->cost = $row[1];
      $this->address = $row[2];
      $this->city = $row[3];
      $this->zipcode = $row[4];
      $this->state = $row[5];
      $this->user_id = $row[6];
      $this->tracking_number = $row[7];
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
    $this->db->updateRow($this->table, ['cost'], [$cost], ['id'], [$this->id]);
  }

  public function address()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
    $this->db->updateRow($this->table, ['address'], [$address], ['id'], [$this->id]);
  }

  public function city()
  {
    return $this->city;
  }

  public function setCity($city)
  {
    $this->city = $city;
    $this->db->updateRow($this->table, ['city'], [$city], ['id'], [$this->id]);
  }

  public function state()
  {
    return $this->state;
  }

  public function setState($state)
  {
    $this->state = $state;
    $this->db->updateRow($this->table, ['state'], [$state], ['id'], [$this->id]);
  }

  public function trackingNumber()
  {
    return $this->tracking_number;
  }

  public function setTrackingNumber($tracking_number)
  {
    $this->tracking_number = $tracking_number;
    $this->db->updateRow($this->table, ['tracking_number'], [$tracking_number], ['id'], [$this->id]);
  }
}
