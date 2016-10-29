<?php

require '../models/User.php';
/**
 * Created by PhpStorm.
 * User: ryan owens
 * Date: 10/29/2016
 * Time: 11:25 AM
 */
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
        $user = new User($this->db, $this->username, $this->email, $this->password);
        $user->create();

        return $user;
    }
}