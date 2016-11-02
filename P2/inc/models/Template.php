
<?php
class Template
{

  private $table = 'templates';
  private $id;
  private $db;
  private $image_location;

  public function __construct($db, $id)
  {
    $this->id = $id;
    $this->db = $db;

    $row = $this->db->getRow($this->table, ['id'], [$this->id]);
    $this->image_location = $row[1];
  }

  public function imageLocation()
  {
    return $this->image_location;
  }

  public function id()
  {
    return $this->id;
  }

}
