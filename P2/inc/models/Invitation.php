
<?php

class Invitation
{
  private $table = "invitations";
  private $user;
  private $order;
  private $template;
  private $db;
  private $id;

  public function __construct($id, $db, $user, $order, $template)
  {
    if($id != null)
    {
      $row = $this->db->getRow($this->table, ['id'], [$id]);
      $this->id = $id;
      // could get the rest but the ID will only be used to
      // delete the invitation
    }
    $this->db = $db;
    $this->user = $user;
    $this->order = $order;
    $this->template = $template;
    $this->id = $db->insert($this->table,
    [
      'user_id',
      'template_id',
      'order_id'
    ],
    [
      $user->id(),
      $template->id(),
      $order->id()
    ]);
  }

  public function delete()
  {
    return $this->db->drop($this->table, ['id'], [$this->id]);
  }

}
