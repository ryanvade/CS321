<?php
class db
{
    private $db_username = '';
    private $db_password = '';
    private $db_database_name = '';
    private $db_server = '';
    private $mysqli = null;

    public function __construct()
    {
        $ini_array = parse_ini_file('config.ini', true);
        $this->db_username = $ini_array['DB']['username'];
        $this->db_password = $ini_array['DB']['password'];
        $this->db_database_name = $ini_array['DB']['database'];
        $this->db_server = $ini_array['DB']['server'];

        $this->mysqli = mysqli_connect($this->db_server, $this->db_username, $this->db_password, $this->db_database_name);
        if(mysqli_connect_errno())
        {
            echo 'username = ' . $this->db_username . ' password = ' . $this->db_password . ' database = ';
            echo $this->db_database_name . ' server = ' . $this->db_server;
            die();
        }

    }

    public function insert($table, $columns, $values)
    {
        $query = 'INSERT INTO ' . $table . '(';
        for($i = 0; $i < count($columns) - 1; $i++)
        {
            $query .= $columns[$i] . ',';
        }
        $query .= $columns[count($columns) - 1];
        $query .= ') VALUES (';
        for($j = 0; $j < count($values) - 1; $j++)
        {
            $query .= "'". $values[$j] . "'" . ',';
        }
        $query .= "'"  . $values[count($values) - 1] . "'";
        $query .=');';
        if($this->mysqli->query($query) === TRUE)
        {
            return $this->mysqli->insert_id;
        }else
        {
            return $this->mysqli->error;
        }
    }

    public function drop($table, $columns, $values)
    {
        $query = 'DELETE FROM ' . $table . 'WHERE ';
        for($i = 0; $i < count($columns); $i++)
        {
            $query .= $columns[$i] . ' = ' . "'" . $values[$i] . "'";
        }
        $query .= ' limit 1';

        if($this->mysqli->query($query) === TRUE)
        {
            return TRUE;
        }else
        {
            return $this->mysqli->error;
        }
    }

    public function getRow($table, $columns, $values)
    {
        $query = 'SELECT * FROM ' . $table . ' WHERE ' . $columns[0] . " = '" . $values[0] . "'";
        for($i = 1; $i < count($columns); $i++)
        {
            $query .= ' AND ' . $columns[$i] . " ='" . $values[$i] . "'";
        }
        $result = $this->mysqli->query($query);

        if($result)
        {
            $row = $result->fetch_row();
            return $row;
        }else
        {
            return $this->mysqli->error;
        }
    }

    public function close()
    {
        return $this->mysqli->close();
    }
}