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

        $this->mysqli = mysqli_connect($this->db_server, $this->db_username, $this->db_password);
        if(mysqli_connect_errno())
        {
            echo 'username = ' . $this->db_username . ' password = ' . $this->db_password . ' database = ';
            echo $this->db_database_name . ' server = ' . $this->db_server;
            die();
        }
        if(!$this->databaseExists())
        {
          $this->createDatabase();
          $this->populateDatabase();
        }else {
          $this->mysqli->close();
          $this->mysqli = mysqli_connect($this->db_server, $this->db_username, $this->db_password, $this->db_database_name);

          if(mysqli_connect_errno())
          {
              echo 'username = ' . $this->db_username . ' password = ' . $this->db_password . ' database = ';
              echo $this->db_database_name . ' server = ' . $this->db_server;
              die();
          }
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

    public function updateRow($table, $columns, $values, $colWhere, $colValue)
    {
      $query = 'UPDATE ' . $table  . ' WHERE';
      for($i = 0; $i < count($columns) - 1; $i++)
      {
        $query .= "SET '" . $columns[$i] . "' = '" . $values[$i] . "',";
      }
      $query .= "SET '" . $columns[count($columns) - 1] . "' = '" . $values[count($columns) - 1] . "' ";

      for($j = 0; $j < count($colWhere) - 1; $j++)
      {
        $query .= "WHERE '" . $colWhere[$j] . "' = '" . $colValue[$j] . "'";
      }
      $query .= "WHERE '" . $colWhere[count($colWhere) - 1] . "' = '" . $colValue[count($colWhere) - 1] . "'";
      $result = $this->mysqli->query($query);

      return $this->mysqli->error;
    }

    public function close()
    {
        return $this->mysqli->close();
    }

    public function databaseExists()
    {
      $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . $this->db_database_name ."'";
      $result = $this->mysqli->query($query);
      if($result->num_rows)
      {
        return true;
      }else {
        return false;
      }
    }

    public function createDatabase()
    {
      $query = "CREATE DATABASE IF NOT EXISTS " . $this->db_database_name;
      $result = $this->mysqli->query($query);

      $this->mysqli->close();
      $this->mysqli = mysqli_connect($this->db_server, $this->db_username, $this->db_password, $this->db_database_name);

      $query = "CREATE TABLE `images` (
        `id` int(11) NOT NULL,
        `invitation_id` int(11) NOT NULL,
        `image_location` varchar(150) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $this->mysqli->query($query);

      $query = "CREATE TABLE `invitations` (
        `id` int(11) NOT NULL,
        `user_id` int(11) NOT NULL,
        `template_id` int(11) NOT NULL,
        `order_id` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $this->mysqli->query($query);

      $query = "CREATE TABLE `orders` (
        `id` int(11) NOT NULL,
        `cost` int(11) NOT NULL DEFAULT '0',
        `address` varchar(255) DEFAULT NULL,
        `city` varchar(150) DEFAULT NULL,
        `zipcode` int(11) DEFAULT NULL,
        `state` varchar(100) DEFAULT NULL,
        `user_id` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $this->mysqli->query($query);

      $query = "CREATE TABLE `templates` (
        `id` int(11) NOT NULL,
        `image_location` varchar(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $this->mysqli->query($query);

      $query = "CREATE TABLE `users` (
        `id` int(11) NOT NULL,
        `name` varchar(64) NOT NULL,
        `email` varchar(320) NOT NULL,
        `password` varchar(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `images`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `images_id_uindex` (`id`),
        ADD KEY `images_invitations_id_fk` (`invitation_id`);";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `invitations`
          ADD PRIMARY KEY (`id`),
          ADD UNIQUE KEY `invitations_id_uindex` (`id`),
          ADD KEY `invitations_templates_id_fk` (`template_id`),
          ADD KEY `invitations_orders_id_fk` (`order_id`),
          ADD KEY `invitations_user_id_fk` (`user_id`);";
      $this->mysqli->query($query);

      $query ="ALTER TABLE `orders`
            ADD PRIMARY KEY (`id`),
            ADD UNIQUE KEY `orders_id_uindex` (`id`),
            ADD UNIQUE KEY `orders_cost_uindex` (`cost`),
            ADD UNIQUE KEY `orders_user_id_uindex` (`user_id`);";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `sessions`
            ADD PRIMARY KEY (`id`),
            ADD UNIQUE KEY `sessions_id_uindex` (`id`),
            ADD UNIQUE KEY `sessions_session_uindex` (`session`),
            ADD KEY `sessions_user_id_fk` (`user_id`);";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `templates`
              ADD PRIMARY KEY (`id`),
              ADD UNIQUE KEY `templates_id_uindex` (`id`);";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `users`
              ADD PRIMARY KEY (`id`),
              ADD UNIQUE KEY `user_id_uindex` (`id`),
              ADD UNIQUE KEY `user_name_uindex` (`name`),
              ADD UNIQUE KEY `user_email_uindex` (`email`);";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `images` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `invitations` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `orders` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `sessions` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `templates` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `images` ADD CONSTRAINT `images_invitations_id_fk` FOREIGN KEY (`invitation_id`) REFERENCES `invitations` (`id`);";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `invitations` ADD CONSTRAINT `invitations_orders_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
                              ADD CONSTRAINT `invitations_templates_id_fk` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
                              ADD CONSTRAINT `invitations_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);";
      $this->mysqli->query($query);

      $query = "ALTER TABLE `orders` ADD CONSTRAINT `orders_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);";
      $this->mysqli->query($query);


      $query = "ALTER TABLE `sessions` ADD CONSTRAINT `sessions_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);";
      $this->mysqli->query($query);
    }

    public function populateDatabase()
    {
      // Birthday
      $this->insert('templates', ['image_location'], ['images/birthday/birthday1.jpg']);
      $this->insert('templates', ['image_location'], ['images/birthday/birthday2.gif']);
      $this->insert('templates', ['image_location'], ['images/birthday/birthday3.jpg']);
      $this->insert('templates', ['image_location'], ['images/birthday/birthday5.jpg']);
      $this->insert('templates', ['image_location'], ['images/birthday/birthday6.jpg']);
      $this->insert('templates', ['image_location'], ['images/birthday/birthday7.jpg']);
      // Holiday
      $this->insert('templates', ['image_location'], ['images/holiday/holiday1.jpg']);
      $this->insert('templates', ['image_location'], ['images/holiday/holiday2.jpg']);
      // Kids
      $this->insert('templates', ['image_location'], ['images/kids/kids1.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids2.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids3.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids4.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids5.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids6.png']);
      $this->insert('templates', ['image_location'], ['images/kids/kids7.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids8.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids9.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids10.gif']);
      $this->insert('templates', ['image_location'], ['images/kids/kids11.jpg']);
      $this->insert('templates', ['image_location'], ['images/kids/kids12.jpg']);
      // Wedding
      $this->insert('templates', ['image_location'], ['images/wedding/wedding1.jpg']);
      $this->insert('templates', ['image_location'], ['images/wedding/wedding2.jpg']);
      $this->insert('templates', ['image_location'], ['images/wedding/wedding3.jpg']);
      // misc
      $this->insert('templates', ['image_location'], ['images/misc/misc1.png']);
      $this->insert('templates', ['image_location'], ['images/misc/misc2.jpg']);
      $this->insert('templates', ['image_location'], ['images/misc/misc3.jpg']);
      $this->insert('templates', ['image_location'], ['images/custom.png']);
      $this->insert('templates', ['image_location'], ['images/misc4.jpg']);
      $this->insert('templates', ['image_location'], ['images/misc/misc5.jpg']);
      $this->insert('templates', ['image_location'], ['images/misc/misc6.png']);
      $this->insert('templates', ['image_location'], ['images/misc/misc7.jpg']);
      $this->insert('templates', ['image_location'], ['images/misc/misc8.jpg']);
      $this->insert('templates', ['image_location'], ['images/misc/misc9.jpg']);
      $this->insert('templates', ['image_location'], ['images/misc/misc10.jpg']);
      $this->insert('templates', ['image_location'], ['images/misc/misc11.jpg']);
    }
}
