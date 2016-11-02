<?php

class HelpPage {
  private $user;
  public function __construct($user)
  {
    $this->user = $user;
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
            <li><a href="index">Home</a></li>
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

         <div class="help" >
        <h1 class = "help"> Welcome to the help page</h1>
        <p class = "help">
            Sometimes using Hallmark Cards for designing invitations can seem daunting. Hopefully we
            can help you through the design process of your invitations.
        </p>

        <ul >
            <h2 class = "help">
                Having trouble logging in?
            </h2>
            <p>
                Try creating an account first:
            </p>

            <p>
                <img src="./images/Capture.PNG" alt="HTML5 Icon" style="width:800px;height:500px;">
                <img src="./images/createAccount.PNG" alt="HTML5 Icon" style="width:300px;height:250px;">
            </p>


            <p>
                After that try logging into your account:

            </p>

            <p>
                <img src="./images/login.PNG" alt="HTML5 Icon" style="width:100px;height:100px;">
                <img src="./images/loginInfo.PNG" alt="HTML5 Icon" style="width:500px;height:250px;">
            </p>

            <h2 class = "help">
                How to design an invitation:
            </h2>
            <li>
                First choose a template from the selection, like the one below, after logging in.
            </li>
            <p>
                <img src="./images/example.PNG" alt="HTML5 Icon" style="width:300px;height:250px;">
            </p>
            <li>
                Next on the design page feel free to upload images, implement text boxes, choose fonts, and sizing of
                lettering to make your invitation unique. To change the text box size you must click the bottom right
                and drag.
            </li>
            <p>
                <img src="./images/edit.PNG" alt="HTML5 Icon" style="width:400px;height:500px;">
            </p>
            <li>
                After you are done editing your invitation choose the quantity and fill out shipping
                information for your order.
            </li>
            <p>
                <img src="./images/payment.PNG" alt="HTML5 Icon" style="width:700px;height:500px;">
            </p>
            <li>
                You should be given a tracking number that you can enter into the tracking page and see your order\'s
                information now.
            </li>
            <h3 class = "help">
                It\'s That Easy!
            </h3>
        </ul>

    </div>

    </body>

    <footer id="footer">
        <hr>
        <p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>

    </footer>
    </html>';
    return $view;
  }
}
