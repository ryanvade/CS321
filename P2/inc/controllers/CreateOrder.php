<?php

class CreateOrder {
    private $db;
    private $cost;
    private $address;
    private $city;
    private $zipcode;
    private $state;
    private $user;

    public function __construct($db, $cost, $address, $city, $zipcode, $state, $user)
    {
        $this->db = $db;
        $this->cost = $cost;
        $this->address = $address;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->state = $state;
        $this->user = $user;
    }

    public function action()
    {
        $columns = array(
            'cost',
            'address',
            'city',
            'zipcode',
            'state',
            'user_id'
        );
        
        $values = array(
            $this->cost,
            $this->address,
            $this->city,
            $this->zipcode,
            $this->state,
            $this->user
        );
        
        
        return $this->db->insert('orders', $columns, $values);
    }
    
}