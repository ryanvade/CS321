<?php
class LoginUser
{
    private $db;
    private $name;
    private $password;
    private $id;

    public function __construct($name, $password, $db)
    {
        $this->db = $db;
        $this->name = $name;
        $this->password = $password;
    }

    public function action()
    {
        $user = new User(null, $this->name, null, $this->password, $this->db);
        if($user->find())
        {
            return $user;
        }else
        {
            return null;
        }

    }
}