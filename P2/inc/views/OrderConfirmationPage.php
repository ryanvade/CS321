<?php

class OrderConfirmationPage {
    private $user;
    private $order;
    public function __construct($user, $order)
    {
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
            <li><a href="index.html">Home</a></li>
            <ul class="inner-nav-ul">
              <li><a href="./templates">Templates</a></li>
              <li><a href="./help">Help</a></li>
              <li><a href="./logout">Logout</a></li>
              <li><a href ="#">' . $this->user->name() . '</a></li>
            </ul>
          </ul>
        </div>';
        }
        $view .='</header>
        <body class = "thanks">

    <h1 class = "thanks" id="headerOne">Hallmark Cards</h1>
    <ul class = "thanks" style = "list-style-type:none">
        <li class = "thanks" id="listZero"> Order complete!</li>
        <br>
        <li class = "thanks" id="listOne"> Confirmation Number:</li>
        <br>
        <li class = "thank_you" id="listTwo">' . $this->order->trackingNumber() .'</li>
        <br>
        <li id="listThree">Thanks!</li>
    </ul>
    <br>
      </body>
</html>
<footer id="footer" style="text-align: center">
    <hr>
    <p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
    <script src=js/site.js"></script>
    <script src="js/orderConfirmation.js"></script>
</footer>
    </html>';
        return $view;
    }
}
