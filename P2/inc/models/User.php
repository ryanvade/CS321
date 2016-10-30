<?php


class User
{
    private $table = 'users';
    private $db = null;
    private $id = null;
    private $username = null;
    private $email = null;
    private $password = null;
    private $orders = array();

    public function __construct($id = null, $username = null, $email = null, $password = null, $db)
    {
        $this->db = $db;
        if($id != null)
        {
            $row = $db->getRow($this->table, ['id'], [$id]);
            $this->id = $row[0];
            $this->username = $row[1];
            $this->email = $row[2];
            $this->password = $row[3];
        }else
        {
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

    public function id()
    {
        return $this->id;
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

    public function find()
    {
        $row = $this->db->getRow($this->table, ['name', 'password'], [$this->username, $this->password]);
        if(isset($row[0]))
        {
            $this->id = $row[0];
            $this->name = $row[1];
            $this->email = $row[2];
            $this->password = $row[3];
            return true;
        }else
        {
            return false;
        }
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
        $id = $this->db->insert($this->table,$columns, $values);
        if(is_numeric($id))
        {
            $this->id = $id;
            return $id;
        }else
        {
            echo $id;
            die();
        }
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