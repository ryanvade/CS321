<?php

class RegisterUser
{
    private $db;
    private $username;
    private $email;
    private $password;

    public function __construct($db, $username, $email, $password)
    {
        $this->db = $db;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function action()
    {
        $user = new User(null, $this->username, $this->email, $this->password, $this->db);
        $id = $user->create();
        return $user;
    }
}