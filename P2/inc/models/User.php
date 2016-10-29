<?php

/**
 * Created by PhpStorm.
 * User: ryan owens
 * Date: 10/28/2016
 * Time: 8:09 PM
 */
class User
{
    private $table = 'users';
    private $id = null;
    private $username = null;
    private $email = null;
    private $password = null;
    private $db = null;
    private $orders = array();

    public function __construct($db, $username = null, $email = null, $password = null, $id = null)
    {
        $this->db = $db;
        if($id != null)
        {
            $this->id = $id;
            if(!$this->getUserByID())
            {
                return null;
            }
        }else {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
    }

    public function name()
    {
        return $this->username;
    }

    public function email()
    {
        return $this->email;
    }

    public function orders()
    {
        return $this->orders;
    }

    public function addToOrders($order)
    {
        array_push($this->orders, $order);
    }

    public function getOrderById($id)
    {
        foreach ($this->orders as $order)
        {
            if($order->id == $id)
            {
                return $order;
            }
        }
        return null;
    }

    private function getUserByID()
    {
        $columns = array(
            'id'
        );
        $values = array(
            $this->id
        );
        $row = $this->db->getRow($this->table, $columns, $values);
        if($row = null)
        {
            return false;
        }else
        {
            $this->username = $row['name'];
            $this->email = $row['email'];
            $this->password = $row['password'];
        }
        return true;
    }

    public function create()
    {
        $columns = array(
            'name',
            'email',
            'password'
        );
        $values = array(
            $this->username,
            $this->email,
            $this->password
        );
        $this->id = $this->db->insert($this->table,$columns, $values);
        return $this->id;
    }

    public function delete()
    {
        if($this->id != null)
        {
            $columns = array(
                'id'
            );
            $values = array(
                $this->id
            );
        }else
        {
            $columns = array(
                'name',
                'email',
                'password'
            );

            $values = array(
                $this->username,
                $this->email,
                $this->password
            );
        }
        $this->db->drop($this->table, $columns, $values);
    }
}