<?php

class OrderDetailsPage {
  private $db;
  private $order;
  private $user;

  public function __construct($db, $user, $order)
  {
    $this->db = $db;
    $this->user = $user;
    $this->order = $order;
  }

  public function view()
  {
    $view = '
<!DOCTYPE html>
<html>
<head>
<title>Hallmark Cards</title>
<link rel="stylesheet" href="css/index.css" />
</head>

<body>
<header>
<img src ="images/hallmarkCardsLogo.png">';
    if($this->user == null)
    {
        $view .= '<div class="nav">
      <ul class="outer-nav-ul">
        <li><a href="./index">Home</a></li>
        <ul class="inner-nav-ul">
          <li><a href="./register">Create Account</a></li>
          <li><a href="./help">Help</a></li>
          <li><a href ="./tracking">Track Orders</a></li>
          <li><a href="./templates">Templates</a></li>
          <li><a href="./login">Log In</a></li>

        </ul>
      </ul>
    </div>';
    }else
    {
        $view .= '<div class="nav">
      <ul class="outer-nav-ul">
        <li><a href="index">Home</a></li>
        <ul class="inner-nav-ul">
          <li><a href="./templates">Templates</a></li>
          <li><a href="./help">Help</a></li>
          <li><a href ="./tracking">Track Orders</a></li>
          <li><a href="./logout">Logout</a></li>
          <li><a href ="#">' . $this->user->name() . '</a></li>
        </ul>
      </ul>
    </div>';
    }
    $view .='</header>
   <body>
<div class="log" style="border: 1px solid black;">
  <h1>Order Details</h1>
  <h3>Cost: $';
  $view .= $this->order->cost();
  $view .= '</h3>
  <h3>Address: ';
  $view .= $this->order->address();
  $view .= '</h3>
  <h3>City: ';
  $view .= $this->order->city();
  $view .= ' </h3>
  <h3>Zipcode: ';
  $view .= $this->order->zipcode();
  $view .= '</h3>
  <h3>State: ';
  $view .= $this->order->state();
  $view .=  ' </h3>
  <h3>User Name: ';
  $view .= $this->user->name();
  $view .=  '</h3>
  <h3>Tracking Number: ';
  $view .= $this->order->trackingNumber();
  $view .= '</h3>
  </div>

<footer id="footer" style="text-align: center">
<hr>
<p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
<script src="../js/site.js"></script>
<script src="../js/trackOrders.js"></script>
</footer>

</body>

</html>';
    return $view;
  }
}
