<?php

 class EditPage {

   private $db;
   private $user;
   private $order;

   public function __construct($db, $user, $order)
   {
     $this->db = $db;
     $this->user = $user;
     $this->order = $order;
   }

   public function view()
   {
     $view = '';
     return $view;
   }
 }
